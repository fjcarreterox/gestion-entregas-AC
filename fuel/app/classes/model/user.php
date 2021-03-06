<?php
use Orm\Model;

class Model_User extends Model
{
	protected static $_properties = array(
		'id',
		'username',
		'pass',
        'idpuesto',
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
		$val->add_field('username', 'Nombre de usuario', 'required|max_length[50]');
        $val->add_field('idpuesto', 'Puesto', 'required|valid_string[numeric]');

		return $val;
	}

    public static function validate_new_pass($factory)
    {
        $val = Validation::forge($factory);
        //$val->add_field('pass', 'Contraseña')->add_rule('match_collection', array('pass2'));
        $val->add_field('pass', 'Contraseña','required');
        return $val;
    }
}
