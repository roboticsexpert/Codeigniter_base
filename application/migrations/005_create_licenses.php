<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_licenses extends CI_Migration {

	public function up()
	{

		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 9,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			),
			'license' => array(
				'type' => 'VARCHAR',
				'constraint' => '30',
				'null' => FALSE
			),
			'computer_code' => array(
				'type' => 'VARCHAR',
				'constraint' => '50',
				'null' => TRUE
			),
			'activation_code' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE
			),
			'activation_time' => array(
				'type' => 'TIMESTAMP',
				'null' => TRUE,
			),
			'released' => array(
				'type' => 'TINYINT',
				'null'=> FALSE,
				'default'=> 0,
				'constraint' => '1',
			),
			'activated' => array(
				'type' => 'TINYINT',
				'null'=> FALSE,
				'default'=> 0,
				'constraint' => '1',
			),
			'user_id' => array(
				'type' => 'INT',
				'null'=> TRUE,
				'constraint' => '9',
			),
			'author_id' => array(
				'type' => 'INT',
				'null'=> FALSE,
				'constraint' => '9',
			),
			'buy_id' => array(
				'type' => 'INT',
				'null'=> FALSE,
				'constraint' => '9',
			),
			'product_id' => array(
				'type' => 'INT',
				'null'=> FALSE,
				'constraint' => '9',
			),
			'ip' => array(
				'type' => 'VARCHAR',
				'constraint' => '15',
				'null' => TRUE,
			),			
		));
		$this->dbforge->add_key('id', TRUE);

		$this->dbforge->create_table('licenses');
	}

	public function down()
	{
		$this->dbforge->drop_table('licenses');
	}
}