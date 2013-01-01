<?php

namespace Fuel\Migrations;

class Create_view_type_msts
{
	public function up()
	{
		\DBUtil::create_table('view_type_msts', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'discription' => array('constraint' => 255, 'type' => 'varchar'),
			'file_name' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('view_type_msts');
	}
}