<?php 
class SubBooksSchema extends CakeSchema {

	public $file = 'sub_books.php';

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $sub_books = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false, 'key' => 'primary'),
		'mypage_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false),
		'sub_month_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20, 'unsigned' => false),
		'payjp_charge_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20, 'unsigned' => false),
		'status' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'price' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 8, 'unsigned' => false),
		'exp_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'in_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

}
