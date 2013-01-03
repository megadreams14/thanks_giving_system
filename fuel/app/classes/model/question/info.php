<?php
use Orm\Model;

class Model_Question_Info extends Model
{
        protected static$_has_many = array(
            'question_lists'
        );
        
        protected static $_properties = array(
		'id',
		'title',
		'description',
		'start',
		'end',
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
		$val->add_field('title', 'Title', 'required|max_length[50]');
		$val->add_field('description', 'Description', 'required|max_length[255]');
		$val->add_field('start', 'Start', 'required|valid_string[numeric]');
		$val->add_field('end', 'End', 'required|valid_string[numeric]');

		return $val;
	}

}
