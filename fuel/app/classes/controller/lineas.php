<?php
class Controller_Lineas extends Controller_Template
{

	public function action_index()
	{
		$data['lineas'] = Model_Linea::find('all');
		$this->template->title = "Lineas";
		$this->template->content = View::forge('lineas/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('lineas');

		if ( ! $data['linea'] = Model_Linea::find($id))
		{
			Session::set_flash('error', 'Could not find linea #'.$id);
			Response::redirect('lineas');
		}

		$this->template->title = "Linea";
		$this->template->content = View::forge('lineas/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Linea::validate('create');

			if ($val->run())
			{
				$linea = Model_Linea::forge(array(
					'idfactura' => Input::post('idfactura'),
					'concepto' => Input::post('concepto'),
					'precio' => Input::post('precio'),
					'kg' => Input::post('kg'),
					'importe' => Input::post('importe'),
				));

				if ($linea and $linea->save())
				{
					Session::set_flash('success', 'Added linea #'.$linea->id.'.');

					Response::redirect('lineas');
				}

				else
				{
					Session::set_flash('error', 'Could not save linea.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Lineas";
		$this->template->content = View::forge('lineas/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('lineas');

		if ( ! $linea = Model_Linea::find($id))
		{
			Session::set_flash('error', 'Could not find linea #'.$id);
			Response::redirect('lineas');
		}

		$val = Model_Linea::validate('edit');

		if ($val->run())
		{
			$linea->idfactura = Input::post('idfactura');
			$linea->concepto = Input::post('concepto');
			$linea->precio = Input::post('precio');
			$linea->kg = Input::post('kg');
			$linea->importe = Input::post('importe');

			if ($linea->save())
			{
				Session::set_flash('success', 'Updated linea #' . $id);

				Response::redirect('lineas');
			}

			else
			{
				Session::set_flash('error', 'Could not update linea #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$linea->idfactura = $val->validated('idfactura');
				$linea->concepto = $val->validated('concepto');
				$linea->precio = $val->validated('precio');
				$linea->kg = $val->validated('kg');
				$linea->importe = $val->validated('importe');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('linea', $linea, false);
		}

		$this->template->title = "Lineas";
		$this->template->content = View::forge('lineas/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('lineas');

		if ($linea = Model_Linea::find($id))
		{
			$linea->delete();

			Session::set_flash('success', 'Deleted linea #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete linea #'.$id);
		}

		Response::redirect('lineas');

	}

}
