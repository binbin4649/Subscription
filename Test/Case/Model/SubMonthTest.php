<?php
//App::uses('Mypage', 'Members.Model');

class SubMonthTest extends BaserTestCase {
	
    public $fixtures = array(
        //'plugin.members.Default/Mypage',
        //'plugin.members.Default/Mylog',
        'plugin.subscription.Default/SubMonth',
    );

    public function setUp() {
        $this->SubMonth = ClassRegistry::init('Subscription.SubMonth');
        parent::setUp();
    }
    
    public function tearDown(){
	    unset($this->SubMonth);
	    parent::tearDown();
    }

/*
    public function testValidateFalse(){
	    $this->Mypage->create([
		    'Mypage' => [
			    'name' => '',
			    'username' => '',
			    'password' => '',
			    'email' => '' 
		    ]
	    ]);
	    $this->assertFalse($this->Mypage->validates());
	    $this->assertArrayHasKey('name', $this->Mypage->validationErrors);
	    $this->assertEquals('名前を入力して下さい。', current($this->Mypage->validationErrors['name']));
	    $this->assertArrayHasKey('username', $this->Mypage->validationErrors);
	    $this->assertEquals('メールアドレスが正しくありません。', current($this->Mypage->validationErrors['username']));
	    $this->assertArrayHasKey('password', $this->Mypage->validationErrors);
	    $this->assertEquals('パスワードは6文字以上で入力してください。', current($this->Mypage->validationErrors['password']));
	    $this->assertArrayHasKey('email', $this->Mypage->validationErrors);
	    $this->assertEquals('Eメールを入力して下さい。', current($this->Mypage->validationErrors['email']));
    }
    
    public function testValidateTrue(){
	    $this->Mypage->create(['Mypage' => [
		    'name' => 'テスト',
		    'username' => 'test@test.com',
		    'email' => 'test@test.com',
		    'password' => '111222',
		    'password_confirm' => '111222'
	    ]]);
	    $this->assertTrue($this->Mypage->validates());
    }
*/
    
    
    

}