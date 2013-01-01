<?php
class Controller_Admin_Answer_Info extends Controller_Template 
{

	public function action_index()
	{
		$data['answer_infos'] = Model_Answer_Info::find('all');
		$this->template->title = "Answer_infos";
		$this->template->content = View::forge('admin/answer/info/index', $data);

	}

	public function action_view($id = null)
	{
		$data['answer_info'] = Model_Answer_Info::find($id);

		is_null($id) and Response::redirect('Answer_Info');

		$this->template->title = "Answer_info";
		$this->template->content = View::forge('admin/answer/info/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Answer_Info::validate('create');
			
			if ($val->run())
			{
				$answer_info = Model_Answer_Info::forge(array(
					'user_profile_mst_id' => Input::post('user_profile_mst_id'),
					'question_list_id' => Input::post('question_list_id'),
				));

				if ($answer_info and $answer_info->save())
				{
					Session::set_flash('success', 'Added answer_info #'.$answer_info->id.'.');

					Response::redirect('answer/info');
				}

				else
				{
					Session::set_flash('error', 'Could not save answer_info.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Answer_Infos";
		$this->template->content = View::forge('admin/answer/info/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Answer_Info');

		$answer_info = Model_Answer_Info::find($id);

		$val = Model_Answer_Info::validate('edit');

		if ($val->run())
		{
			$answer_info->user_profile_mst_id = Input::post('user_profile_mst_id');
			$answer_info->question_list_id = Input::post('question_list_id');

			if ($answer_info->save())
			{
				Session::set_flash('success', 'Updated answer_info #' . $id);

				Response::redirect('answer/info');
			}

			else
			{
				Session::set_flash('error', 'Could not update answer_info #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$answer_info->user_profile_mst_id = $val->validated('user_profile_mst_id');
				$answer_info->question_list_id = $val->validated('question_list_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('answer_info', $answer_info, false);
		}

		$this->template->title = "Answer_infos";
		$this->template->content = View::forge('admin/answer/info/edit');

	}

	public function action_delete($id = null)
	{
		if ($answer_info = Model_Answer_Info::find($id))
		{
			$answer_info->delete();

			Session::set_flash('success', 'Deleted answer_info #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete answer_info #'.$id);
		}

		Response::redirect('answer/info');

	}


}