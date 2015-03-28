<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_buy extends CI_Migration {

	public function up()
	{

		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 9,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			),
			'product_id' => array(
				'type' => 'INT',
				'constraint' => '9',
				'null' => FALSE
			),
			'count' => array(
				'type' => 'INT',
				'constraint' => '9',
				'null' => FALSE
			),
			'price' => array(
				'type' => 'INT',
				'constraint' => '9',
				'null' => FALSE
			),
			
			'buy_time' => array(
				'type' => 'TIMESTAMP',
			),
			'user_id' => array(
				'type' => 'INT',
				'null'=> TRUE,
				'constraint' => '9',
			),
			
			'ip' => array(
				'type' => 'VARCHAR',
				'constraint' => '15',
				'null' => TRUE,
			),			
		));
		$this->dbforge->add_key('id', TRUE);

		$this->dbforge->create_table('buys');
	}

	public function down()
	{
		$this->dbforge->drop_table('buys');
	}
}