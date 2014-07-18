<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_table_users extends CI_Migration 
{
	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => '10',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => '32',
			),
			'password' => array(
				'type' => 'CHAR',
				'constraint' => '32',
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'level' => array(
				'type' => 'INT',
				'constraint' => '1',
				'default' => '1',
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('user');
	}

	public function down()
	{
		$this->dbforge->drop_table('user');
	}
}