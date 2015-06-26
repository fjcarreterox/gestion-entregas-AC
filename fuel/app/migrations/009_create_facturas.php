<?php

namespace Fuel\Migrations;

class Create_facturas
{
	public function up()
	{
		\DBUtil::create_table('facturas', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'idprov' => array('constraint' => 11, 'type' => 'int'),
			'concepto' => array('constraint' => 255, 'type' => 'varchar'),
			'base_imponible' => array('type' => 'float'),
			'iva' => array('constraint' => 11, 'type' => 'int'),
			'retencion' => array('constraint' => 11, 'type' => 'int'),
			'total' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('facturas');
	}
}