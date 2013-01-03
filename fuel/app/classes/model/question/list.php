<?php
use Orm\Model;

class Model_Question_List extends Model {

        
	protected static $_properties = array(
		'id',
		'question_infos_mst_id',
		'question_mst_id',
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
		$val->add_field('question_infos_mst_id', 'Question Infos Mst Id', 'required|valid_string[numeric]');
		$val->add_field('question_mst_id', 'Question Mst Id', 'required|valid_string[numeric]');

		return $val;
	}

}
