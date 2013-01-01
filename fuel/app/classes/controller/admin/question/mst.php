<?php


class Controller_Admin_Question_Mst extends Controller_Template 
{

	public function action_index()
	{
		$data['question_msts'] = Model_Question_Mst::find('all');
		$this->template->title = "問題一覧";
		$this->template->content = View::forge('admin/question/mst/index', $data);

	}

	public function action_view($id = null)
	{
		$data['question_mst'] = Model_Question_Mst::find($id);

		is_null($id) and Response::redirect('Question_Mst');

		$this->template->title = "問題一覧画面";
		$this->template->content = View::forge('admin/question/mst/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Question_Mst::validate('create');
			
			if ($val->run())
			{
				$question_mst = Model_Question_Mst::forge(array(
					'question' => Input::post('question'),
					'answer' => Input::post('answer'),
					'select_a' => Input::post('select_a'),
					'select_b' => Input::post('select_b'),
					'select_c' => Input::post('select_c'),
					'select_d' => Input::post('select_d'),
					'question_type_mst_id' => Input::post('question_type_mst_id'),
					'view_type_mst_id' => Input::post('view_type_mst_id'),
					'movies_path' => Input::post('movies_path'),
				));

				if ($question_mst and $question_mst->save())
				{
					Session::set_flash('success', 'Added question_mst #'.$question_mst->id.'.');

					Response::redirect('admin/question/mst');
				}

				else
				{
					Session::set_flash('error', 'Could not save question_mst.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "問題新規登録画面";
		$this->template->content = View::forge('admin/question/mst/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Question_Mst');

		$question_mst = Model_Question_Mst::find($id);

		$val = Model_Question_Mst::validate('edit');

		if ($val->run())
		{
			$question_mst->question = Input::post('question');
			$question_mst->answer = Input::post('answer');
			$question_mst->select_a = Input::post('select_a');
			$question_mst->select_b = Input::post('select_b');
			$question_mst->select_c = Input::post('select_c');
			$question_mst->select_d = Input::post('select_d');
			$question_mst->question_type_mst_id = Input::post('question_type_mst_id');
			$question_mst->view_type_mst_id = Input::post('view_type_mst_id');
			$question_mst->movies_path = Input::post('movies_path');

			if ($question_mst->save())
			{
				Session::set_flash('success', 'Updated question_mst #' . $id);

				Response::redirect('admin/question/mst');
			}

			else
			{
				Session::set_flash('error', 'Could not update question_mst #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$question_mst->question = $val->validated('question');
				$question_mst->answer = $val->validated('answer');
				$question_mst->select_a = $val->validated('select_a');
				$question_mst->select_b = $val->validated('select_b');
				$question_mst->select_c = $val->validated('select_c');
				$question_mst->select_d = $val->validated('select_d');
				$question_mst->question_type_mst_id = $val->validated('question_type_mst_id');
				$question_mst->view_type_mst_id = $val->validated('view_type_mst_id');
				$question_mst->movies_path = $val->validated('movies_path');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('admin_question_mst', $question_mst, false);
		}

		$this->template->title = "問題編集画面";
		$this->template->content = View::forge('admin/question/mst/edit');

	}

	public function action_delete($id = null)
	{
		if ($question_mst = Model_Question_Mst::find($id))
		{
			$question_mst->delete();

			Session::set_flash('success', 'Deleted question_mst #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete question_mst #'.$id);
		}

		Response::redirect('admin/question/mst');

	}


}