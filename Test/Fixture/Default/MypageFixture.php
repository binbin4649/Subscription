<?php

class MypageFixture extends CakeTestFixture {
	
	public $import = array('model' => 'Members.Mypage');
	
	public $records = array(
		array(
			'id' => 1,
			'name' => 'テストテスト1',
			'username' => 'test1@test.com',
			'status' => '0',
			'password' => 'fbcf5055496900b9b62caa77a0ddbd9e0e622dbe',
			'email' => 'test1@test.com',
			'created' => '2018-07-30 14:06:01',
			'modified' => '2018-07-30 14:06:01'
		),
	);

}