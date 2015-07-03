<?php
class Controller_Albaran extends Controller_Template
{

	public function action_index()
	{
		$data['albarans'] = Model_Albaran::find('all');
		$this->template->title = "Albarans";
		$this->template->content = View::forge('albaran/index', $data);

	}

    public function action_list()
    {
        $data['albarans'] = Model_Albaran::find('all');
        $this->template->title = "Albaranes hasta la fecha";
        $this->template->content = View::forge('albaran/list', $data);

    }

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('albaran');

		if ( ! $data['albaran'] = Model_Albaran::find($id))
		{
			Session::set_flash('error', 'Could not find albaran #'.$id);
			Response::redirect('albaran/list');
		}

		$this->template->title = "Albaran";
		$this->template->content = View::forge('albaran/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Albaran::validate('create');

			if ($val->run())
			{
				$albaran = Model_Albaran::forge(array(
					'idalbaran' => Input::post('idalbaran'),
					'identrega' => Input::post('identrega'),
					'idproveedor' => Input::post('idproveedor'),
                    'comentario' => Input::post('comentario'),
				));

				if ($albaran and $albaran->save())
				{
					Session::set_flash('success', 'Albaran Núm.'.$albaran->id.' creado correctamente.');

					Response::redirect('albaran/list');
				}

				else
				{
					Session::set_flash('error', 'No se pudo almacenar el albarán.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Albaranes";
		$this->template->content = View::forge('albaran/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('albaran/list');

		if ( ! $albaran = Model_Albaran::find($id)){
			Session::set_flash('error', 'No existe en el sistema el albarán núm. '.$id);
			Response::redirect('albaran/list');
		}

		$val = Model_Albaran::validate('edit');

		if ($val->run())
		{
			$albaran->idalbaran = Input::post('idalbaran');
			$albaran->identrega = Input::post('identrega');
			$albaran->idproveedor = Input::post('idproveedor');
            $albaran->comentario = Input::post('comentario');

			if ($albaran->save()){
				Session::set_flash('success', 'Albarán núm. ' . $id .' actualizado.');
				Response::redirect('albaran/list');
			}
			else{
				Session::set_flash('error', 'Could not update albaran #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$albaran->idalbaran = $val->validated('idalbaran');
				$albaran->identrega = $val->validated('identrega');
				$albaran->idproveedor = $val->validated('idproveedor');
                $albaran->comentario = $val->validated('comentario');
				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('albaran', $albaran, false);
		}

		$this->template->title = "Albaranes";
		$this->template->content = View::forge('albaran/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('albaran/list');

		if ($albaran = Model_Albaran::find($id)){
			$albaran->delete();
			Session::set_flash('success', 'Albarán núm. '.$id. ' borrado.');
		}
		else{
			Session::set_flash('error', 'No se pudo borrar el albarán núm. '.$id);
		}
		Response::redirect('albaran/list');
	}

}
