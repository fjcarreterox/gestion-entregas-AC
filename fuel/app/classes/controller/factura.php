<?php
class Controller_Factura extends Controller_Template
{

	public function action_index()
	{
		$data['facturas'] = Model_Factura::find('all');
		$this->template->title = "Facturas";
		$this->template->content = View::forge('factura/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('factura');

		if ( ! $data['factura'] = Model_Factura::find($id))
		{
			Session::set_flash('error', 'Could not find factura #'.$id);
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
					'concepto' => Input::post('concepto'),
					'base_imponible' => Input::post('base_imponible'),
					'iva' => Input::post('iva'),
					'retencion' => Input::post('retencion'),
					'total' => Input::post('total'),
				));

				if ($factura and $factura->save())
				{
					Session::set_flash('success', 'Added factura #'.$factura->id.'.');

					Response::redirect('factura');
				}

				else
				{
					Session::set_flash('error', 'Could not save factura.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Facturas";
		$this->template->content = View::forge('factura/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('factura');

		if ( ! $factura = Model_Factura::find($id))
		{
			Session::set_flash('error', 'Could not find factura #'.$id);
			Response::redirect('factura');
		}

		$val = Model_Factura::validate('edit');

		if ($val->run())
		{
			$factura->idprov = Input::post('idprov');
			$factura->concepto = Input::post('concepto');
			$factura->base_imponible = Input::post('base_imponible');
			$factura->iva = Input::post('iva');
			$factura->retencion = Input::post('retencion');
			$factura->total = Input::post('total');

			if ($factura->save())
			{
				Session::set_flash('success', 'Updated factura #' . $id);

				Response::redirect('factura');
			}

			else
			{
				Session::set_flash('error', 'Could not update factura #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$factura->idprov = $val->validated('idprov');
				$factura->concepto = $val->validated('concepto');
				$factura->base_imponible = $val->validated('base_imponible');
				$factura->iva = $val->validated('iva');
				$factura->retencion = $val->validated('retencion');
				$factura->total = $val->validated('total');

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

			Session::set_flash('success', 'Deleted factura #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete factura #'.$id);
		}

		Response::redirect('factura');

	}

}
