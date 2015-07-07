<?php
class Controller_Factura extends Controller_Template
{

	public function action_index()
	{
		$data['facturas'] = Model_Factura::find('all');
		$this->template->title = "Facturas";
		$this->template->content = View::forge('factura/index', $data);

	}
    public function action_list()
    {
        $data['facturas'] = Model_Factura::find('all');
        $this->template->title = "Facturas registradas en el sistema";
        $this->template->content = View::forge('factura/list', $data);
    }

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('factura');

		if ( ! $data['factura'] = Model_Factura::find($id))
		{
			Session::set_flash('error', 'No se ha podido encontrar la factura núm. '.$id);
			Response::redirect('factura');
		}

		$this->template->title = "Factura";
		$this->template->content = View::forge('factura/view', $data);
	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Factura::validate('create');

			if ($val->run())
			{
				$factura = Model_Factura::forge(array(
					'idprov' => Input::post('idprov'),
					'fecha' => Input::post('fecha'),
					'total' => Input::post('total'),
                    'comentario' => Input::post('comentario'),
				));

				if ($factura and $factura->save())				{
					Session::set_flash('success', 'Factura núm. '.$factura->id.' registrada en el sistema.');
					Response::redirect('factura/list');
				}

				else
				{
					Session::set_flash('error', 'No se ha podido guardar la factura.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

        $data['proveedores'] = Model_Proveedor::find('all',array('select' => array('id', 'nombre'),'order_by' => 'nombre'));
		$this->template->title = "Facturas";
		$this->template->content = View::forge('factura/create',$data);

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('factura');

		if ( ! $factura = Model_Factura::find($id))
		{
			Session::set_flash('error', 'No se ha podido encontrar la factura núm.'.$id);
			Response::redirect('factura');
		}

		$val = Model_Factura::validate('edit');

		if ($val->run())
		{
			$factura->idprov = Input::post('idprov');
			$factura->fecha = Input::post('fecha');
			$factura->total = Input::post('total');
            $factura->comentario = Input::post('comentario');

			if ($factura->save())
			{
				Session::set_flash('success', 'Factura núm. ' . $id . ' actualizada correctamente.');
				Response::redirect('factura/list');
			}
			else
			{
				Session::set_flash('error', 'No se ha podido actualizar la factura núm. ' . $id);
			}
		}
		else
		{
			if (Input::method() == 'POST')
			{
				$factura->idprov = $val->validated('idprov');
				$factura->fecha = $val->validated('fecha');
				$factura->total = $val->validated('total');
                $factura->comentario = $val->validated('comentario');
				Session::set_flash('error', $val->error());
			}
			$this->template->set_global('factura', $factura, false);
		}
		$this->template->title = "Facturas";
		$this->template->content = View::forge('factura/edit');
	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('factura');

		if ($factura = Model_Factura::find($id))
		{
			$factura->delete();
			Session::set_flash('success', 'Factura núm. '.$id . ' borrada del sistema.');
		}
		else
		{
			Session::set_flash('error', 'No se ha podido borrar la factura núm. '.$id);
		}

		Response::redirect('factura/list');
	}

}
