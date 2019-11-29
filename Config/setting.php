<?php
 
$config['BcApp.adminNavi.subscription'] = array(
  'name' => 'Subscription',
  'contents' => array(
    array('name' => '課金会員一覧', 'url' => array('admin' => true, 'plugin' => 'subscription', 'controller' => 'sub_months', 'action' => 'index')),
  )
);
 
 
?>