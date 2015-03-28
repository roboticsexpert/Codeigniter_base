<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_accounts_sample_type extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_column('accounts',
		array(
			'type' => array(
				'type' => 'ENUM("admin","seller","user")',
				'null' => FALSE,
				'default'=> 'user',
			)
			));	
	}

	public function down()
	{
		$this->dbforge->drop_column('accounts', 'type');

	}
}