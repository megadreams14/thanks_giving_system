<?php

namespace Fuel\Migrations;

class Create_question_type_msts
{
	public function up()
	{
		\DBUtil::create_table('question_type_msts', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'title' => array('constraint' => 50, 'type' => 'varchar'),
			'description' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('question_type_msts');
	}
}