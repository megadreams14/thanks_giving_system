<?php
class Controller_Admin_Question_Type_Mst extends Controller_Template 
{

	public function action_index()
	{
		$data['question_type_msts'] = Model_Question_Type_Mst::find('all');
		$this->template->title = "Question_type_msts";
		$this->template->content = View::forge('admin/question/type/mst/index', $data);

	}

	public function action_view($id = null)
	{
		$data['question_type_mst'] = Model_Question_Type_Mst::find($id);

		is_null($id) and Response::redirect('Question_Type_Mst');

		$this->template->title = "Question_type_mst";
		$this->template->content = View::forge('admin/question/type/mst/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Question_Type_Mst::validate('create');
			
			if ($val->run())
			{
				$question_type_mst = Model_Question_Type_Mst::forge(array(
					'title' => Input::post('title'),
					'description' => Input::post('description'),
				));

				if ($question_type_mst and $question_type_mst->save())
				{
					Session::set_flash('success', 'Added question_type_mst #'.$question_type_mst->id.'.');

					Response::redirect('admin/question/type/mst');
				}

				else
				{
					Session::set_flash('error', 'Could not save question_type_mst.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Question_Type_Msts";
		$this->template->content = View::forge('admin/question/type/mst/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Question_Type_Mst');

		$question_type_mst = Model_Question_Type_Mst::find($id);

		$val = Model_Question_Type_Mst::validate('edit');

		if ($val->run())
		{
			$question_type_mst->title = Input::post('title');
			$question_type_mst->description = Input::post('description');

			if ($question_type_mst->save())
			{
				Session::set_flash('success', 'Updated question_type_mst #' . $id);

				Response::redirect('admin/question/type/mst');
			}

			else
			{
				Session::set_flash('error', 'Could not update question_type_mst #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$question_type_mst->title = $val->validated('title');
				$question_type_mst->description = $val->validated('description');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('admin_question_type_mst', $question_type_mst, false);
		}

		$this->template->title = "Question_type_msts";
		$this->template->content = View::forge('admin/question/type/mst/edit');

	}

	public function action_delete($id = null)
	{
		if ($question_type_mst = Model_Question_Type_Mst::find($id))
		{
			$question_type_mst->delete();

			Session::set_flash('success', 'Deleted question_type_mst #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete question_type_mst #'.$id);
		}

		Response::redirect('admin/question/type/mst');

	}


}