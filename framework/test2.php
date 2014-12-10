<?php
require './core/init.php';
//session_start();
//echo class_session::getSession('name');
//class_session::cleanSession('name');

/* class_session::setSession('name','abc');
class_session::setSession('key',array('b','c'));
var_dump(class_session::getSession());
class_session::cleanSession('name');
var_dump(class_session::getSession()); */
//$filehandler = new drivers_session_fileHandler;
//session_set_save_handler(array($filehandler,'open'),array($filehandler,'close'),array($filehandler,'read'),array($filehandler,'write'),array($filehandler,'destroy'),array($filehandler,'gc'));
//session_start();

$dbhandler = new drivers_session_dbHandler();
session_start();
echo session_status();
session_write_close();
session_set_save_handler(array($dbhandler,'open'),array($dbhandler,'close'),array($dbhandler,'read'),array($dbhandler,'write'),array($dbhandler,'destroy'),array($dbhandler,'gc'));

session_start();
?>