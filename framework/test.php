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
//var_dump($db->query("DELETE FROM `user`"));
//core_db::getInstance();
$db->lock("user");
$db->unlock();
?>