<?php

namespace Fuel\Migrations;

class Create_question_infos
{
	public function up()
	{
		\DBUtil::create_table('question_infos', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'user_name' => array('constraint' => 50, 'type' => 'varchar'),
			'description' => array('constraint' => 255, 'type' => 'varchar'),
			'start' => array('constraint' => 11, 'type' => 'int'),
			'end' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('question_infos');
	}
}