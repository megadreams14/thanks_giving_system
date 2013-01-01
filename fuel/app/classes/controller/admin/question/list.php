<?php
class Controller_Admin_Question_List extends Controller_Template 
{

	public function action_index()
	{
		$data['question_lists'] = Model_Question_List::find('all');
		$this->template->title = "Question_lists";
		$this->template->content = View::forge('admin/question/list/index', $data);

	}

	public function action_view($id = null)
	{
		$data['question_list'] = Model_Question_List::find($id);

		is_null($id) and Response::redirect('Question_List');

		$this->template->title = "Question_list";
		$this->template->content = View::forge('admin/question/list/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Question_List::validate('create');
			
			if ($val->run())
			{
				$question_list = Model_Question_List::forge(array(
					'question_infos_mst_id' => Input::post('question_infos_mst_id'),
					'question_mst_id' => Input::post('question_mst_id'),
				));

				if ($question_list and $question_list->save())
				{
					Session::set_flash('success', 'Added question_list #'.$question_list->id.'.');

					Response::redirect('admin/question/list');
				}

				else
				{
					Session::set_flash('error', 'Could not save question_list.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Question_Lists";
		$this->template->content = View::forge('admin/question/list/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Admin_Question_List');

		$question_list = Model_Question_List::find($id);

		$val = Model_Question_List::validate('edit');

		if ($val->run())
		{
			$question_list->question_infos_mst_id = Input::post('question_infos_mst_id');
			$question_list->question_mst_id = Input::post('question_mst_id');

			if ($question_list->save())
			{
				Session::set_flash('success', 'Updated question_list #' . $id);

				Response::redirect('admin/question/list');
			}

			else
			{
				Session::set_flash('error', 'Could not update question_list #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$question_list->question_infos_mst_id = $val->validated('question_infos_mst_id');
				$question_list->question_mst_id = $val->validated('question_mst_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('admin_question_list', $question_list, false);
		}

		$this->template->title = "Question_lists";
		$this->template->content = View::forge('admin/question/list/edit');

	}

	public function action_delete($id = null)
	{
		if ($question_list = Model_Question_List::find($id))
		{
			$question_list->delete();

			Session::set_flash('success', 'Deleted question_list #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete question_list #'.$id);
		}

		Response::redirect('admin/question/list');

	}


}