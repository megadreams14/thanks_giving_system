<?php
use Orm\Model;

class Model_Question_Mst extends Model
{
	protected static $_properties = array(
		'id',
		'question',
		'answer',
		'select_a',
		'select_b',
		'select_c',
		'select_d',
		'question_type_mst_id',
		'view_type_mst_id',
		'movies_path',
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
		$val->add_field('question', 'Question', 'required|max_length[255]');
		$val->add_field('answer', 'Answer', 'required|max_length[2]');
		$val->add_field('select_a', 'Select A', 'required|max_length[255]');
		$val->add_field('select_b', 'Select B', 'required|max_length[255]');
		$val->add_field('select_c', 'Select C', 'required|max_length[255]');
		$val->add_field('select_d', 'Select D', 'required|max_length[255]');
		$val->add_field('question_type_mst_id', 'Question Type Mst Id', 'required|valid_string[numeric]');
		$val->add_field('view_type_mst_id', 'View Type Mst Id', 'required|valid_string[numeric]');
		$val->add_field('movies_path', 'Movies Path', 'required|max_length[255]');
		return $val;
	}

}
