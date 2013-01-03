<?php

namespace Fuel\Migrations;

class Create_answer_infos
{
	public function up()
	{
		\DBUtil::create_table('answer_infos', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'user_profile_mst_id' => array('constraint' => 11, 'type' => 'int'),
			'question_list_id' => array('constraint' => 11, 'type' => 'int'),
			'answer' => array('constraint' => 2, 'type' => 'varchar'),
			'user_name' => array('constraint' => 50, 'type' => 'varchar'),
			'time' => array('constraint' => 11, 'type' => 'int'),
                        'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('answer_infos');
	}
}