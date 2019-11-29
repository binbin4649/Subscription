<?php
App::import('Model', 'AppModel');

class SubBook extends AppModel {

	public $name = 'SubBook';
	
	public $belongsTo = [
		'SubMonth' => [
			'className' => 'Subscription.SubMonth',
			'foreignKey' => 'sub_month_id']
	];
	
    
    
    
    

}
