<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/11/25
 * Time: 23:46
 */

require './core/init.php';
//core_log::getInstance('file',array('./'),'',array())->write_log('hah');
//core_config::getInstance();
 try {
    $db = core_db::getInstance();
} catch(Exception $e){
    echo $e->getMessage();
}

//$db->lock("user");
//$db->transaction(array("DELETE FROM `user` WHERE `name`='zhangsan'"));
//$db->unlock();
//$db->query("INSERT INTO `user`(`name`) VALUES('zhangsan')");
//$id = htmlspecialchars($_GET['id'],ENT_QUOTES);
//$id= ($_GET['id']);
//var_dump($id);
//$res = $db->query("SELECT * FROM `user` WHERE `id`='".$id."'");
//core_common::dump($res);

//require './core/init.php';
////core_log::getInstance('file',array('./'),'',array())->write_log('hah');
////core_config::getInstance();
// try {
//    $db = core_db::getInstance();
//} catch(Exception $e){
//    echo $e->getMessage();
//}
//$db->lock('user');
//core_common::dump($_SERVER);
//core_cache::getInstance()->add('test_key','test_value2');
core_cache::getInstance()->set('test_key','test_value2');
//core_cache::getInstance()->addServer('127.0.0.1',11212);
//core_cache::getInstance()->add('test_key2','test_value2');
//core_cache::getInstance()->add('test_key3','test_value3');
//$memcache->add('test_key','test_values');
//$str = class_charset::set_charset('你好!','gbk');
//echo class_charset::advance_urlencode('你好!');
//$str = class_charset::set_charset($str,'gbk');
//echo class_charset::advance_urlencode('你好!');
//echo class_cookie::setCookie("123","456");
//var_dump(class_session::getSession());
//echo ceil(4.1);

?>