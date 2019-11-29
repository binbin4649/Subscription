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

	
    
    
    
    
    

}
