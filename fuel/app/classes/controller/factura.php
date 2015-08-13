<?php
class Controller_Factura extends Controller_Template
{

	public function action_index()
	{
		$data['facturas'] = Model_Factura::find('all');
		$this->template->title = "Facturas";
		$this->template->content = View::forge('factura/index', $data);
	}

    public function action_init()
    {
        $this->template->title = "Selección de proveedor";
        $this->template->content = View::forge('factura/init');
    }

    public function action_list()
    {
        $data['facturas'] = Model_Factura::find('all',array('order_by' => array('fecha' => 'desc')));
        $data['titulo'] = "";
        $this->template->title = "Facturas registradas en el sistema";
        $this->template->content = View::forge('factura/list', $data);
    }

    public function action_list_prov($idprov)
    {
        is_null($idprov) and Response::redirect('factura/list');

        if ( !Model_Proveedor::find($idprov)) {
            Session::set_flash('error', 'No se ha podido encontrar el proveedor indicado');
            Response::redirect('factura/list');
        }else{
            $data['facturas'] = Model_Factura::find('all', array(
                'where' => array(
                    array('idprov', $idprov),
                ),
                'order_by' => array('fecha' => 'desc'),
            ));

            $data['titulo'] = "para el proveedor: " . Model_Proveedor::find($idprov)->get('nombre');
        }
        $this->template->title = "Facturas emitidas para el proveedor";
        $this->template->content = View::forge('factura/list', $data);
    }

    public function action_print($idfactura)
    {
        is_null($idfactura) and Response::redirect('factura/list');

        if ( ! $factura = Model_Factura::find($idfactura))
        {
            Session::set_flash('error', 'No se ha podido encontrar en el sistema la factura núm. '.$idfactura);
            Response::redirect('factura/list');
        }

        if (Input::method() == 'POST')
        {
            $factura->fecha = Input::post('fecha');
            $factura->total = Input::post('total_factura');
            $factura->comentario = Input::post('comentario');
            //$lineas = Input::post('lineas');

            if ($factura->save())
            {
                Session::set_flash('success', 'Factura núm. ' . $idfactura . ' almacenada correctamente.');
                Response::redirect('factura/print/'.$idfactura);
            }
            else{
                Session::set_flash('error', 'No se ha podido almacenar la factura núm. ' . $idfactura);
            }

        }else {
            $data['factura'] = $factura;
            $data['lineas'] = Model_Linea::find('all',array('where'=>array('idfactura'=>$idfactura),'order_by'=>'orden'));
            $this->template->title = "Sistema automático de facturación de ACEITUNAS CORIA S.L.";
            $this->template->content = View::forge('factura/print', $data);
        }
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
			if ($val->run()){
				$factura = Model_Factura::forge(array(
					'idprov' => Input::post('idprov'),
					'fecha' => Input::post('fecha'),
					'total' => Input::post('total'),
                    'comentario' => Input::post('comentario'),
				));

				if ($factura and $factura->save()){
					Session::set_flash('success', 'Factura núm. '.$factura->id.' registrada en el sistema.');
                    //Session::set_flash('idprov',Input::post('idprov'));
                    //\Fuel\Core\Session::set('idfactura',$factura->id);
                    //\Fuel\Core\Session::set('fecha',Input::post('fecha'));
                    //\Fuel\Core\Session::set('idprov',Input::post('idprov'));
                    //\Fuel\Core\Session::set('comment',Input::post('comentario'));
					Response::redirect('factura/print/'.$factura->id);
				}
				else{
					Session::set_flash('error', 'No se ha podido guardar la factura.');
				}
			}
			else{
				Session::set_flash('error', $val->error());
			}
		}

        //$data['proveedores'] = Model_Proveedor::find('all',array('select' => array('id', 'nombre'),'order_by' => 'nombre'));
		$this->template->title = "Emisión de facturas";
		$this->template->content = View::forge('factura/create');

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
