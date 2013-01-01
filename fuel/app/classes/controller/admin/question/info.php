<?php
class Controller_Admin_Question_Info extends Controller_Template 
{

	public function action_index()
	{
		$data['question_infos'] = Model_Question_Info::find('all');
		$this->template->title = "Question_infos";
		$this->template->content = View::forge('admin/question/info/index', $data);

	}

	public function action_view($id = null)
	{
		$data['question_info'] = Model_Question_Info::find($id);

		is_null($id) and Response::redirect('Question_Info');

		$this->template->title = "Question_info";
		$this->template->content = View::forge('admin/question/info/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Question_Info::validate('create');
			
			if ($val->run())
			{
				$question_info = Model_Question_Info::forge(array(
					'title' => Input::post('title'),
					'description' => Input::post('description'),
					'start' => Input::post('start'),
					'end' => Input::post('end'),
				));

				if ($question_info and $question_info->save())
				{
					Session::set_flash('success', 'Added question_info #'.$question_info->id.'.');

					Response::redirect('admin/question/info');
				}

				else
				{
					Session::set_flash('error', 'Could not save question_info.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Question_Infos";
		$this->template->content = View::forge('admin/question/info/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Question_Info');

		$question_info = Model_Question_Info::find($id);

		$val = Model_Question_Info::validate('edit');

		if ($val->run())
		{
			$question_info->title = Input::post('title');
			$question_info->description = Input::post('description');
			$question_info->start = Input::post('start');
			$question_info->end = Input::post('end');

			if ($question_info->save())
			{
				Session::set_flash('success', 'Updated question_info #' . $id);

				Response::redirect('admin/question/info');
			}

			else
			{
				Session::set_flash('error', 'Could not update question_info #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$question_info->title = $val->validated('title');
				$question_info->description = $val->validated('description');
				$question_info->start = $val->validated('start');
				$question_info->end = $val->validated('end');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('admin_question_info', $question_info, false);
		}

		$this->template->title = "Question_infos";
		$this->template->content = View::forge('admin/question/info/edit');

	}

	public function action_delete($id = null)
	{
		if ($question_info = Model_Question_Info::find($id))
		{
			$question_info->delete();

			Session::set_flash('success', 'Deleted question_info #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete question_info #'.$id);
		}

		Response::redirect('admin/question/info');

	}


}