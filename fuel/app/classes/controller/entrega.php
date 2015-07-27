<?php
class Controller_Entrega extends Controller_Template
{
	public function action_index()
	{
		//$data['proveedores'] = Model_Proveedor::find('all',array('order_by' => 'nombre'));
        $q = Model_Albaran::query()->select('idalbaran')->order_by('idalbaran');
        $data['idAlbaran']=$q->max('idalbaran');
		$this->template->title = "Registrar nueva entrega";
		$this->template->content = View::forge('entrega/index', $data);
	}

    public function action_list($idpuesto = null){

        if(is_null($idpuesto)) {
            $data['entregas'] = Model_Entrega::find('all', array('order_by' => array('Fecha' => 'desc'),'order_by' => array('id' => 'desc')));
            $this->template->title = "Listado de todas las entregas realizadas";
        }
        else{
            $data['fecha']=date('Y-m-d');
            $nombre_puesto = Model_Puesto::find($idpuesto)->get('nombre');
            $data['puesto'] = $nombre_puesto;
            //$data['entregas'] = Model_Entrega::find('all',array('where' => array('idpuesto' => $idpuesto),'order_by' => array('Fecha' => 'desc')));
            $data['entregas'] = Model_Entrega::find('all',
                array('where' => array(
                        array('idpuesto' => $idpuesto),
                        //'AND' => array(
                            array('fecha','>', date('Y-m-d'))
                        //)
                ),'order_by' => array('Fecha' => 'desc')));
            $this->template->title = "Entrega diaria para el puesto: ".$nombre_puesto;
        }
        $this->template->content = View::forge('entrega/list', $data);
    }

    public function action_diaria()
    {
        if (Input::method() == 'POST'){
            $data['idpuesto']=\Fuel\Core\Input::post('idpuesto');
            $data['fecha']=date('Y-m-d');
            $this->template->title = "Entregas del día de hoy";
            $this->template->content = View::forge('entrega/list', $data);
        }
        else{
            $data['puestos'] = Model_Puesto::find('all');
            $this->template->title = "Listado de Entregas por puesto";
            $this->template->content = View::forge('entrega/_diaria', $data);
        }
    }

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('entrega');

		if ( ! $data['entrega'] = Model_Entrega::find($id))
		{
			Session::set_flash('error', 'Could not find entrega #'.$id);
			Response::redirect('entrega');
		}

		$this->template->title = "Detalle de Entrega";
		$this->template->content = View::forge('entrega/view', $data);
	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Entrega::validate('create');

			if ($val->run())
			{
                $last_albaran=Model_Albaran::find('last');

                if(!$last_albaran) {
                    $last_albaran_id = 1;
                    $last_albaran_num = 1;
                }
                else {
                    $last_albaran_id = $last_albaran->get('id');
                    $last_albaran_num = $last_albaran->get('idalbaran');
                }

				$entrega = Model_Entrega::forge(array(
					'fecha' => Input::post('fecha'),
					'albaran' => $last_albaran_id+1,
					'variedad' => Input::post('variedad'),
					'tam' => Input::post('tam'),
					'total' => Input::post('total'),
					'rate_picado' => Input::post('rate_picado'),
					'rate_molestado' => Input::post('rate_molestado'),
					'rate_morado' => Input::post('rate_morado'),
					'rate_mosca' => Input::post('rate_mosca'),
					'rate_azofairon' => Input::post('rate_azofairon'),
					'rate_agostado' => Input::post('rate_agostado'),
					'rate_granizado' => Input::post('rate_granizado'),
					'rate_perdigon' => Input::post('rate_perdigon'),
					'rate_taladro' => Input::post('rate_taladro'),
                    'idpuesto' => Input::post('idpuesto'),
				));

				if ($entrega and $entrega->save())
				{
                    $current_albaran_num=$last_albaran_num+1;
                    if(\Fuel\Core\Session::get('num_alb')){
                        $current_albaran_num=\Fuel\Core\Session::get('num_alb');
                    }

                    $albaran = Model_Albaran::forge(array(
                        'id'=> $last_albaran_id+1,
                        'idalbaran' => $current_albaran_num,
                        'identrega' => $entrega->id,
                        'idproveedor' => Input::post('idprov'),
                        'comentario' => "",
                    ));

                    if($albaran->save()){
                        Session::set_flash('success', 'Entrega añadida (núm. '.$entrega->id.'). Albarán añadido (núm. '.$albaran->idalbaran.').');
                    }
                    if(isset($_POST['more'])) {
                        \Fuel\Core\Session::set('idprov',Input::post('idprov'));
                        \Fuel\Core\Session::set('num_alb',$albaran->idalbaran);
                        Response::redirect('entrega/create');
                    }
                    else{
                        //eliminamos variables de sesion que ya no nos sirven
                        \Fuel\Core\Session::delete('idprov');
                        \Fuel\Core\Session::delete('num_alb');
                        Response::redirect('albaran/print/'.$albaran->id);
                    }
				}

				else
				{
					Session::set_flash('error', 'No se pudo registrar la nueva entrega.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Registrar nueva entrega";
		$this->template->content = View::forge('entrega/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('entrega');

		if ( ! $entrega = Model_Entrega::find($id))
		{
			Session::set_flash('error', 'Could not find entrega #'.$id);
			Response::redirect('entrega');
		}

		$val = Model_Entrega::validate('edit');

		if ($val->run())
		{
			$entrega->fecha = Input::post('fecha');
			$entrega->albaran = Input::post('albaran');
			$entrega->variedad = Input::post('variedad');
			$entrega->tam = Input::post('tam');
			$entrega->total = Input::post('total');
			$entrega->rate_picado = Input::post('rate_picado');
			$entrega->rate_molestado = Input::post('rate_molestado');
			$entrega->rate_morado = Input::post('rate_morado');
			$entrega->rate_mosca = Input::post('rate_mosca');
			$entrega->rate_azofairon = Input::post('rate_azofairon');
			$entrega->rate_agostado = Input::post('rate_agostado');
			$entrega->rate_granizado = Input::post('rate_granizado');
			$entrega->rate_perdigon = Input::post('rate_perdigon');
			$entrega->rate_taladro = Input::post('rate_taladro');
            $entrega->idpuesto = Input::post('idpuesto');

			if ($entrega->save())
			{
				Session::set_flash('success', 'Datos de la entrega actualizados.');
				Response::redirect('entrega/list');
			}

			else
			{
				Session::set_flash('error', 'No se ha podido actualizar la entrega.');
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$entrega->fecha = $val->validated('fecha');
				$entrega->albaran = $val->validated('albaran');
				$entrega->variedad = $val->validated('variedad');
				$entrega->tam = $val->validated('tam');
				$entrega->total = $val->validated('total');
				$entrega->rate_picado = $val->validated('rate_picado');
				$entrega->rate_molestado = $val->validated('rate_molestado');
				$entrega->rate_morado = $val->validated('rate_morado');
				$entrega->rate_mosca = $val->validated('rate_mosca');
				$entrega->rate_azofairon = $val->validated('rate_azofairon');
				$entrega->rate_agostado = $val->validated('rate_agostado');
				$entrega->rate_granizado = $val->validated('rate_granizado');
				$entrega->rate_perdigon = $val->validated('rate_perdigon');
				$entrega->rate_taladro = $val->validated('rate_taladro');
                $entrega->idpuesto = $val->validated('idpuesto');

				Session::set_flash('error', $val->error());
			}
			$this->template->set_global('entrega', $entrega, false);
		}

		$this->template->title = "Entregas";
		$this->template->content = View::forge('entrega/edit');
	}

	public function action_delete($id = null){
		is_null($id) and Response::redirect('entrega');
		if ($entrega = Model_Entrega::find($id)){
            //Deleting the associated line on Albaran model.
            $albaran = Model_Albaran::find($entrega->albaran);
			$entrega->delete();
            $albaran->delete();
			Session::set_flash('success', 'Entrega borrada y albarán asociado actualizado.');
		}else{
			Session::set_flash('error', 'No se ha podido borrar la entrega solicitada.');
		}
		Response::redirect('entrega/list');
	}
}
