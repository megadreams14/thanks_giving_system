<?php

namespace Fuel\Migrations;

class Create_question_msts
{
	public function up()
	{
		\DBUtil::create_table('question_msts', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'question' => array('constraint' => 255, 'type' => 'varchar'),
			'answer' => array('constraint' => 2, 'type' => 'varchar'),
			'select_a' => array('constraint' => 255, 'type' => 'varchar'),
			'select_b' => array('constraint' => 255, 'type' => 'varchar'),
			'select_c' => array('constraint' => 255, 'type' => 'varchar'),
			'select_d' => array('constraint' => 255, 'type' => 'varchar'),
			'question_type_mst_id' => array('constraint' => 11, 'type' => 'int'),
			'view_type_mst_id' => array('constraint' => 11, 'type' => 'int'),
			'movies_path' => array('constraint' => 255, 'type' => 'varcharnt'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('question_msts');
	}
}