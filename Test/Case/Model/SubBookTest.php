<?php
//App::uses('Mylog', 'Members.Model');

class SubBookTest extends BaserTestCase {
	
    public $fixtures = array(
	    //'plugin.members.Default/Mypage',
        //'plugin.members.Default/Mylog',
        'plugin.subscription.Default/SubBook',
    );

    public function setUp() {
        $this->SubBook = ClassRegistry::init('Subscription.SubBook');
        parent::setUp();
    }
    
    public function tearDown(){
	    unset($this->SubBook);
	    parent::tearDown();
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