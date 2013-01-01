<?php
use Orm\Model;

class Model_User_Profile_Mst extends Model
{
	protected static $_properties = array(
		'id',
		'user_name',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('user_name', 'User Name', 'required|max_length[50]');

		return $val;
	}

}
