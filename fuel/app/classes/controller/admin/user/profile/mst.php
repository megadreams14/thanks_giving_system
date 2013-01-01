<?php
class Controller_Admin_User_Profile_Mst extends Controller_Template 
{

	public function action_index()
	{
		$data['user_profile_msts'] = Model_User_Profile_Mst::find('all');
		$this->template->title = "User_profile_msts";
		$this->template->content = View::forge('admin/user/profile/mst/index', $data);

	}

	public function action_view($id = null)
	{
		$data['user_profile_mst'] = Model_User_Profile_Mst::find($id);

		is_null($id) and Response::redirect('User_Profile_Mst');

		$this->template->title = "User_profile_mst";
		$this->template->content = View::forge('admin/user/profile/mst/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User_Profile_Mst::validate('create');
			
			if ($val->run())
			{
				$user_profile_mst = Model_User_Profile_Mst::forge(array(
					'user_name' => Input::post('user_name'),
				));

				if ($user_profile_mst and $user_profile_mst->save())
				{
					Session::set_flash('success', 'Added user_profile_mst #'.$user_profile_mst->id.'.');

					Response::redirect('admin/user/profile/mst');
				}

				else
				{
					Session::set_flash('error', 'Could not save user_profile_mst.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "User_Profile_Msts";
		$this->template->content = View::forge('admin/user/profile/mst/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('User_Profile_Mst');

		$user_profile_mst = Model_User_Profile_Mst::find($id);

		$val = Model_User_Profile_Mst::validate('edit');

		if ($val->run())
		{
			$user_profile_mst->user_name = Input::post('user_name');

			if ($user_profile_mst->save())
			{
				Session::set_flash('success', 'Updated user_profile_mst #' . $id);

				Response::redirect('admin/user/profile/mst');
			}

			else
			{
				Session::set_flash('error', 'Could not update user_profile_mst #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$user_profile_mst->user_name = $val->validated('user_name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('user_profile_mst', $user_profile_mst, false);
		}

		$this->template->title = "User_profile_msts";
		$this->template->content = View::forge('admin/user/profile/mst/edit');

	}

	public function action_delete($id = null)
	{
		if ($user_profile_mst = Model_User_Profile_Mst::find($id))
		{
			$user_profile_mst->delete();

			Session::set_flash('success', 'Deleted user_profile_mst #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete user_profile_mst #'.$id);
		}

		Response::redirect('admin/user/profile/mst');

	}


}