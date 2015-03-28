<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_accounts extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 9,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '30',
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'firstname' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => TRUE,
			),
			'lastname' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => TRUE,
			),
			'mobile' => array(
				'type' => 'VARCHAR',
				'constraint' => '11',
				'null' => TRUE,
			),
			'last_login' => array(
				'type' => 'TIMESTAMP',
				
				'null' => TRUE,
			),
			'last_ip' => array(
				'type' => 'VARCHAR',
				'constraint' => '15',
				'null' => TRUE,
			),
			'last_os' => array(
				'type' => 'VARCHAR',
				'constraint' => '30',
				'null' => TRUE,
			),
			'last_browser' => array(
				'type' => 'VARCHAR',
				'constraint' => '30',
				'null' => TRUE,
			),
			
		));
		$this->dbforge->add_key('id', TRUE);

		$this->dbforge->create_table('accounts');
	}

	public function down()
	{
		$this->dbforge->drop_table('accounts');
	}
}