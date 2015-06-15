<?php
class Controller_Proveedor extends Controller_Template
{

	public function action_index()
	{
		$data['proveedors'] = Model_Proveedor::find('all');
		$this->template->title = "Proveedores";
		$this->template->content = View::forge('proveedor/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('proveedor');

		if ( ! $data['proveedor'] = Model_Proveedor::find($id))
		{
			Session::set_flash('error', 'Could not find proveedor #'.$id);
			Response::redirect('proveedor');
		}

		$this->template->title = "Proveedor";
		$this->template->content = View::forge('proveedor/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Proveedor::validate('create');

			if ($val->run())
			{
				$proveedor = Model_Proveedor::forge(array(
					'nombre' => Input::post('nombre'),
					'domicilio' => Input::post('domicilio'),
					'poblacion' => Input::post('poblacion'),
					'nifcif' => Input::post('nifcif'),
					'telefono' => Input::post('telefono'),
					'tipo' => Input::post('tipo'),
                    'comentario' => Input::post('comentario'),
                    'envases' => Input::post('envases'),
				));

				if ($proveedor and $proveedor->save()){
					Session::set_flash('success', 'Proveedor añadido al sistema: '.$proveedor->nombre.'.');
					Response::redirect('proveedor');
				}
				else{
					Session::set_flash('error', 'No se pudo crear el nuevo proveedor.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}
		$this->template->title = "Alta de proveedor";
		$this->template->content = View::forge('proveedor/create');
	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('proveedor');

		if ( ! $proveedor = Model_Proveedor::find($id))
		{
			Session::set_flash('error', 'No encontramos nada sobre el proveedor #'.$id);
			Response::redirect('proveedor');
		}

		$val = Model_Proveedor::validate('edit');

		if ($val->run())
		{
			$proveedor->nombre = Input::post('nombre');
			$proveedor->domicilio = Input::post('domicilio');
			$proveedor->poblacion = Input::post('poblacion');
			$proveedor->nifcif = Input::post('nifcif');
			$proveedor->telefono = Input::post('telefono');
			$proveedor->tipo = Input::post('tipo');
            $proveedor->comentario = Input::post('comentario');
            $proveedor->envases = Input::post('envases');

			if ($proveedor->save())
			{
				Session::set_flash('success', '¡Proveedor actualizado!');

				Response::redirect('proveedor');
			}

			else
			{
				Session::set_flash('error', 'Could not update proveedor #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$proveedor->nombre = $val->validated('nombre');
				$proveedor->domicilio = $val->validated('domicilio');
				$proveedor->poblacion = $val->validated('poblacion');
				$proveedor->nifcif = $val->validated('nifcif');
				$proveedor->telefono = $val->validated('telefono');
				$proveedor->tipo = $val->validated('tipo');
                $proveedor->comentario = $val->validated('comentario');
                $proveedor->envases = $val->validated('envases');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('proveedor', $proveedor, false);
		}

		$this->template->title = "Proveedores";
		$this->template->content = View::forge('proveedor/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('proveedor');

		if ($proveedor = Model_Proveedor::find($id))
		{
			$proveedor->delete();

			Session::set_flash('success', 'Proveedor borrado: #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete proveedor #'.$id);
		}

		Response::redirect('proveedor');

	}

}
