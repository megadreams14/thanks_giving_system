<?php
use Orm\Model;

class Model_Answer_Info extends Model
{
	protected static $_properties = array(
		'id',
		'user_profile_mst_id',
		'question_list_id',
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
		$val->add_field('user_profile_mst_id', 'User Profile Mst Id', 'required|valid_string[numeric]');
		$val->add_field('question_list_id', 'Question List Id', 'required|valid_string[numeric]');

		return $val;
	}

}
