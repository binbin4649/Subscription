<?php
App::import('Model', 'AppModel');

class SubBook extends AppModel {

	public $name = 'SubBook';
	
	public $belongsTo = [
		'SubMonth' => [
			'className' => 'Subscription.SubMonth',
			'foreignKey' => 'sub_month_id']
	];
	
	
	// このbookはユニークか？
	// beforeは必ず一つだけ、念の為チェック
	public function isBookUnique($mypage_id){
		$SubBook = $this->find('first', array(
        	'conditions' => array(
        		'SubBook.mypage_id' => $mypage_id,
        		'SubBook.status' => 'before',
        	),
        	'recursive' => -1
		));
		if($SubBook){
			return false;
		}else{
			return true;
		}
	}
	
	//次の課金予定を作成
	public function nextBook($SubMonth){
		if(!$this->isBookUnique($SubMonth['SubMonth']['mypage_id'])){
			return false;
		}
		$SubBook['SubBook'] = [
			'mypage_id' => $SubMonth['SubMonth']['mypage_id'],
			'sub_month_id' => $SubMonth['SubMonth']['id'],
			'status' => 'before',
			'price' => $SubMonth['SubMonth']['price'],
			'exp_date' => $this->getNextMonth($SubMonth['SubMonth']['activate_date']),
		];
		$this->create();
		if(!$this->save($SubBook)){
			$this->log('SubBook.php nextBook. save error.:'.print_r($SubMonth, true));
		}
		$SubMonth['SubBook'] = $SubBook['SubBook'];
		return $SubMonth;
	}
	
	//1回目の課金を記録
	public function nowBook($SubMonth){
		$SubBook['SubBook'] = [
			'mypage_id' => $SubMonth['SubMonth']['mypage_id'],
			'sub_month_id' => $SubMonth['SubMonth']['id'],
			'payjp_charge_id' => $SubMonth['PayjpCharge']['id'],
			'status' => 'run',
			'price' => $SubMonth['PayjpCharge']['charge'],
			'in_date' => date('Y-m-d'),
		];
		$this->create();
		if(!$this->save($SubBook)){
			$this->log('SubBook.php nowBook. save error.:'.print_r($SubMonth, true));
		}
		$SubMonth['SubBook'] = $SubBook['SubBook'];
		return $SubMonth;
	}
	
	//申込日をベースに翌月の同日を返す
	public function getNextMonth($date){
		// 年月日を取得
		//$y = date('Y', strtotime($date));//申込日をベースにするためこの辺削除
		//$m = date('n', strtotime($date));
		//$d = date('j', strtotime($date));
		$y = date('Y');
		$m = date('n');
		$d = substr($date, -2);
		$d = ltrim($d, '0');
		// 年越しの処理
		if($m+1>12) { $m=1; $y++; } else { $m++; }
		// 1ヶ月後の日付生成
		if(checkdate($m, $d, $y)){
			return date('Y-m-d', strtotime(sprintf('%04d-%02d-%02d', $y, $m, $d)));
		}else{
			return date('Y-m-d', strtotime(sprintf('%04d-%02d-01 -1 day', $y, ($m+1))));
		}
	}


}
