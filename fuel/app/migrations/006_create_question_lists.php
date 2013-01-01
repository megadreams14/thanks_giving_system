<?php

namespace Fuel\Migrations;

class Create_question_lists
{
	public function up()
	{
		\DBUtil::create_table('question_lists', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'question_infos_mst_id' => array('constraint' => 11, 'type' => 'int'),
			'question_mst_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('question_lists');
	}
}