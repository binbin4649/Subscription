<?php

App::import('Model', 'AppModel');

class SubMonth extends AppModel {

	public $name = 'SubMonth';
	
	public $hasMany = [
		'SubBook' => [
			'className' => 'Subscription.SubBook',
			'foreignKey' => 'sub_month_id',
			'order' => 'SubBook.created DESC',
			'limit' => 10
	]];

	
	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		$this->PayjpCharge = ClassRegistry::init('Payjp.PayjpCharge');
	}
	
	// 新規登録
	public function newRegist($payjp_token, $price, $mypage_id){
		$PayjpCharge = $this->PayjpCharge->createAndCharge($payjp_token, $price, $mypage_id);
		if(!$PayjpCharge){
			return false;
		}
		$SubMonth['SubMonth'] = [
			'mypage_id' => $mypage_id,
			'payjp_customer_id' => $PayjpCharge['PayjpCharge']['payjp_customer_id'],
			'status' => 'active',
			'price' => $price,
			'activate_date' => date('Y-m-d'),
		];
		$this->create();
		$this->save($SubMonth);
		$SubMonth['SubMonth']['id'] = $this->getLastInsertId();
		$SubMonth['PayjpCharge'] = $PayjpCharge['PayjpCharge'];
		$this->SubBook->nowBook($SubMonth);
		return $this->SubBook->nextBook($SubMonth);
	}
	
	// プラン(price)と申込日(activate_date)を更新
	public function editRegist($price, $mypage_id){
		
	}
	
	// 追加課金、プラン変更時など
	public function addCharge($price, $mypage_id){
		
	}
	
	// 定期課金の実行
	public function subscCharge($mypage_id){
		
	}
	


}
