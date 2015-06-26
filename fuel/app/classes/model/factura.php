<?php
use Orm\Model;

class Model_Factura extends Model
{
	protected static $_properties = array(
		'id',
		'idprov',
		'concepto',
		'base_imponible',
		'iva',
		'retencion',
		'total',
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
		$val->add_field('idprov', 'Idprov', 'required|valid_string[numeric]');
		$val->add_field('concepto', 'Concepto', 'required|max_length[255]');
		$val->add_field('base_imponible', 'Base Imponible', 'required');
		$val->add_field('iva', 'Iva', 'required|valid_string[numeric]');
		$val->add_field('retencion', 'Retencion', 'required|valid_string[numeric]');
		$val->add_field('total', 'Total', 'required|valid_string[numeric]');

		return $val;
	}

}
