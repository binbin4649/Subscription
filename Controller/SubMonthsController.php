<?php 

class SubMonthsController extends SubscriptionAppController {
  
  public $name = 'SubMonths';

  public $uses = array('Plugin', 'User', 'Members.Mypage', 'Members.Mylog', 'Subscription.SubMonths');
  
  public $helpers = array('BcPage', 'BcHtml', 'BcTime', 'BcForm', 'Members.Mypage');
  
  public $components = ['BcAuth', 'Cookie', 'BcAuthConfigure'];
  
  public $subMenuElements = array('');

  public $crumbs = array(
    array('name' => '課金会員一覧', 'url' => array('controller' => 'sub_months', 'action' => 'index')),
  );

	public function beforeFilter() {
		parent::beforeFilter();
		$this->BcAuth->allow();
		
	}

	//管理画面用のデフォルトアクション
	public function admin_index(){
		$conditions = array();
		if ($this->request->is('post')){
		  $data = $this->request->data;
		  if($data['Mypage']['id']) $conditions[] = array('Mypage.id' => $data['Mypage']['id']);
		  if($data['Mypage']['name']) $conditions[] = array('Mypage.name like' => '%'.$data['Mypage']['name'].'%');
		  if($data['Mypage']['email']) $conditions[] = array('Mypage.email like' => '%'.$data['Mypage']['email'].'%');
		}
		
		$this->paginate = array('conditions' => $conditions,
		  'order' => 'Mypage.id ASC',
		  'limit' => 20
		);
		$mypage = $this->paginate('Mypage');
		$this->set('mypage', $mypage);
		
		$this->pageTitle = '会員一覧';
		//$this->search = 'users_index';
		//$this->help = 'users_index';
	}

	public function admin_edit($id = null){
		$this->pageTitle = '会員-編集';
		if (empty($id)) {
		  $this->setMessage('無効なIDです。', true);
		  $this->redirect(array('action' => 'index'));
		}
		$user = $this->BcAuth->user();
		if(empty($this->request->data)){
			$mypage = $this->Mypage->findById($id);
		}else{
		  if(empty($this->request->data['Mypage']['password'])){
		    unset($this->request->data['Mypage']['password']);
		  }
		  unset($this->Mypage->validate['username']);//ログインIDのバリデート外す。メールアドレス以外の入力も受付る。
		  unset($this->Mypage->validate['email']);
		  if( $this->Mypage->save($this->request->data)){
		    $this->Mylog->record($id, 'edit', $user['id'], $user);
		    $this->setMessage( '編集しました');
		    $this->redirect(array('action' => 'index'));
		  }else{
		    $mypage = $this->Mypage->findById($id);
		    $this->setMessage('エラー', true);
		  }
		}
		$this->paginate = array(
		  'conditions' => array('Mylog.mypage_id'=>$id),
		  'order' => 'Mylog.created DESC',
		  'limit' => 10
		);
		$mylog = $this->paginate('Mylog');
		$this->set('mylog', $mylog);
		$this->pageTitle = 'Members 編集';
		unset($mypage['Mypage']['password']);
		$this->request->data = $mypage;
	}
  
	public function admin_add(){
	  $this->pageTitle = '会員-新規登録';
	  if($this->request->data){
		  $this->request->data['Mypage']['username'] = $this->request->data['Mypage']['email'];
		  if( $this->Mypage->save($this->request->data)){
			  $name = $this->request->data['Mypage']['name'];
			  $this->setMessage( $name.' さんを登録しました。');
			  $this->redirect(array('action' => 'index'));
		  }else{
			  $this->setMessage('入力エラー', true);
		  }
	  }
	}


}




?>