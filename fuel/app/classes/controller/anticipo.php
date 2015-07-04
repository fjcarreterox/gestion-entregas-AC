<?php
class Controller_Anticipo extends Controller_Template
{

	public function action_index()
	{
        $data['proveedores'] = Model_Proveedor::find('all',array('order_by' => 'nombre'));
		//$data['anticipos'] = Model_Anticipo::find('all');
		$this->template->title = "Calcular Anticipo";
		$this->template->content = View::forge('anticipo/index', $data);

	}

    public function action_list()
    {
        $data['anticipos'] = Model_Anticipo::find('all');
        $this->template->title = "Anticipos";
        $this->template->content = View::forge('anticipo/list', $data);

    }

    public function action_calculo()
    {
        $data['anticipos'] = Model_Anticipo::find('all');
        $this->template->title = "Cálculo Anticipo";
        $this->template->content = View::forge('anticipo/calculo', $data);

    }

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('anticipo');

		if ( ! $data['anticipo'] = Model_Anticipo::find($id))
		{
			Session::set_flash('error', 'Could not find anticipo #'.$id);
			Response::redirect('anticipo');
		}

		$this->template->title = "Anticipo";
		$this->template->content = View::forge('anticipo/view', $data);

	}

	public function action_create()
	{
        $data["bancos"]=Model_Banco::find('all');
		if (Input::method() == 'POST')
		{
			$val = Model_Anticipo::validate('create');

			if ($val->run())
			{
				$anticipo = Model_Anticipo::forge(array(
					'fecha' => Input::post('fecha'),
					'idprov' => Input::post('idprov'),
					'numcheque' => Input::post('numcheque'),
					'idbanco' => Input::post('idbanco'),
					'cuantia' => Input::post('cuantia'),
					'recogido' => Input::post('recogido'),
				));

				if ($anticipo and $anticipo->save()){
                    \Fuel\Core\Session::delete('ses_anticipo_prov');
                    \Fuel\Core\Session::delete('ses_anticipo_cuantia');
					Session::set_flash('success', 'Anticipo añadido al sistema (#'.$anticipo->id.').');
					Response::redirect('anticipo/list');
				}
				else{
					Session::set_flash('error', 'No se pudo guardar el anticipo.');
				}
			}
			else{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Anticipos";
		$this->template->content = View::forge('anticipo/create',$data);

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('anticipo');

		if ( ! $anticipo = Model_Anticipo::find($id))
		{
			Session::set_flash('error', 'Could not find anticipo #'.$id);
			Response::redirect('anticipo');
		}

        $data["bancos"]=Model_Banco::find('all');
		$val = Model_Anticipo::validate('edit');

		if ($val->run())
		{
			$anticipo->fecha = Input::post('fecha');
			$anticipo->idprov = Input::post('idprov');
			$anticipo->numcheque = Input::post('numcheque');
			$anticipo->idbanco = Input::post('idbanco');
			$anticipo->cuantia = Input::post('cuantia');
			$anticipo->recogido = Input::post('recogido');

			if ($anticipo->save()){
				Session::set_flash('success', 'Anticipo actualizado (#' . $id.').');
				Response::redirect('anticipo/list');
			}else{
				Session::set_flash('error', 'No se pudo actualizar el anticipo seleccionado');
			}
		}
		else
		{
			if (Input::method() == 'POST')
			{
				$anticipo->fecha = $val->validated('fecha');
				$anticipo->idprov = $val->validated('idprov');
				$anticipo->numcheque = $val->validated('numcheque');
				$anticipo->idbanco = $val->validated('idbanco');
				$anticipo->cuantia = $val->validated('cuantia');
				$anticipo->recogido = $val->validated('recogido');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('anticipo', $anticipo, false);
		}

		$this->template->title = "Anticipos";
		$this->template->content = View::forge('anticipo/edit',$data);

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('anticipo');

		if ($anticipo = Model_Anticipo::find($id))
		{
			$anticipo->delete();

			Session::set_flash('success', 'Deleted anticipo #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete anticipo #'.$id);
		}

		Response::redirect('anticipo');

	}

}
