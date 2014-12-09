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
$memcache = core_cache::getInstance();
$memcache->connect();
//$memcache->add('test_key','test_values');
$memcache->add('test_key','abc');
//$str = class_charset::set_charset('你好!','gbk');
//echo class_charset::advance_urlencode('你好!');
//$str = class_charset::set_charset($str,'gbk');
echo class_charset::advance_urlencode('你好!');

?>