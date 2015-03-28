<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_products extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 9,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			),
			'title' => array(
				'type' => 'VARCHAR',
				'constraint' => '60',
			),
			'price' => array(
				'type' => 'INT',
				'constraint' => '9',
				'null' => FALSE
			),
			'seller_price' => array(
				'type' => 'INT',
				'constraint' => '9',
				'null' => FALSE
			),
			'decs' => array(
				'type' => 'text',
				'null' => TRUE,
			),
			'author_id' => array(
				'type' => 'INT',
				'constraint' => '9',
				
			),
			'imges' => array(
				'type' => 'text',
				'null' => TRUE,
			),
			
			'create_time' => array(
				'type' => 'TIMESTAMP',
			),
			
			'views' => array(
				'type' => 'INT',
				'constraint' => '9',
				'defult' => 0,
			),
			
		));
		$this->dbforge->add_key('id', TRUE);

		$this->dbforge->create_table('products');
	}

	public function down()
	{
		$this->dbforge->drop_table('products');
	}
}