<?php

namespace Fuel\Migrations;

class Create_koujis
{
	public function up()
	{
		\DBUtil::create_table('koujis', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'kouji_cd' => array('constraint' => 8, 'null' => false, 'type' => 'varchar'),
			'kouji_name' => array('constraint' => 100, 'null' => false, 'type' => 'varchar'),
			'kouji_type' => array('constraint' => 1, 'null' => false, 'type' => 'varchar'),
			'kouji_state' => array('constraint' => 1, 'null' => false, 'type' => 'varchar'),
			'ip' => array('constraint' => 39, 'null' => false, 'type' => 'varchar'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('koujis');
	}
}