<?php
//App::uses('Mylog', 'Members.Model');

class SubBookTest extends BaserTestCase {
	
    public $fixtures = array(
	    'plugin.subscription.Default/Mypage',
        'plugin.subscription.Default/SubMonth',
        'plugin.subscription.Default/SubBook',
        'plugin.subscription.Default/PayjpCustomer',
        'plugin.subscription.Default/PayjpCharge',
    );

    public function setUp() {
        $this->SubBook = ClassRegistry::init('Subscription.SubBook');
        parent::setUp();
    }
    
    public function tearDown(){
	    unset($this->SubBook);
	    parent::tearDown();
    }
    
    public function testGetNextMonth(){
	    $r = $this->SubBook->getNextMonth('2019-01-09');
	    $this->assertEquals(10, strlen($r));
    }
    

    
/*
    public function testFalseRecord(){
	    $result = $this->Mylog->record();
        $this->assertFalse($result);
    }
    
    public function testLastLog(){
	    $result = $this->Mylog->lastLog(1);
	    $this->assertEquals('none', $result['Mylog']['action']);
    }
*/
    
    
    

}