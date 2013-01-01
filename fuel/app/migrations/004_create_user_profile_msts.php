<?php

namespace Fuel\Migrations;

class Create_user_profile_msts
{
	public function up()
	{
		\DBUtil::create_table('user_profile_msts', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'user_name' => array('constraint' => 50, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('user_profile_msts');
	}
}