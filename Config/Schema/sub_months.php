<?php 
class SubMonthsSchema extends CakeSchema {

	public $file = 'sub_months.php';

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $sub_months = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'mypage_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false),
		'status' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'price' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 8, 'unsigned' => false),
		'activate_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

}
