<?php
use Orm\Model;

class Model_Item extends Model
{
	protected static $_properties = array(
		'id',
		'item_cd',
		'item_name',
		'maker',
		'area',
		'comment',
		'item_top',
		'item_left',
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
		$val->add_field('Kouji_cd', 'Kouji Cd', 'required|max_length[8]');
		$val->add_field('kouji_name', 'Kouji Name', 'required|max_length[100]');
		$val->add_field('kouji_type', 'Kouji Type', 'required|max_length[100]');
		$val->add_field('kouji_state', 'Kouji State', 'required|max_length[1]');
		$val->add_field('ip', 'Ip', 'required|max_length[39]');

		return $val;
	}

}
