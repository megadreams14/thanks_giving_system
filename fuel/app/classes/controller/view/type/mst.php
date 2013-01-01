<?php
class Controller_View_Type_Mst extends Controller_Template 
{

	public function action_index()
	{
		$data['view_type_msts'] = Model_View_Type_Mst::find('all');
		$this->template->title = "View_type_msts";
		$this->template->content = View::forge('view/type/mst/index', $data);

	}

	public function action_view($id = null)
	{
		$data['view_type_mst'] = Model_View_Type_Mst::find($id);

		is_null($id) and Response::redirect('View_Type_Mst');

		$this->template->title = "View_type_mst";
		$this->template->content = View::forge('view/type/mst/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_View_Type_Mst::validate('create');
			
			if ($val->run())
			{
				$view_type_mst = Model_View_Type_Mst::forge(array(
					'discription' => Input::post('discription'),
					'file_name' => Input::post('file_name'),
				));

				if ($view_type_mst and $view_type_mst->save())
				{
					Session::set_flash('success', 'Added view_type_mst #'.$view_type_mst->id.'.');

					Response::redirect('view/type/mst');
				}

				else
				{
					Session::set_flash('error', 'Could not save view_type_mst.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "View_Type_Msts";
		$this->template->content = View::forge('view/type/mst/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('View_Type_Mst');

		$view_type_mst = Model_View_Type_Mst::find($id);

		$val = Model_View_Type_Mst::validate('edit');

		if ($val->run())
		{
			$view_type_mst->discription = Input::post('discription');
			$view_type_mst->file_name = Input::post('file_name');

			if ($view_type_mst->save())
			{
				Session::set_flash('success', 'Updated view_type_mst #' . $id);

				Response::redirect('view/type/mst');
			}

			else
			{
				Session::set_flash('error', 'Could not update view_type_mst #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$view_type_mst->discription = $val->validated('discription');
				$view_type_mst->file_name = $val->validated('file_name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('view_type_mst', $view_type_mst, false);
		}

		$this->template->title = "View_type_msts";
		$this->template->content = View::forge('view/type/mst/edit');

	}

	public function action_delete($id = null)
	{
		if ($view_type_mst = Model_View_Type_Mst::find($id))
		{
			$view_type_mst->delete();

			Session::set_flash('success', 'Deleted view_type_mst #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete view_type_mst #'.$id);
		}

		Response::redirect('view/type/mst');

	}


}