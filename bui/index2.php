<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/21
 * Time: 1:58
 */
foreach(ini_get_all() as $k=>$v){
    echo $k.'=>'.$v['global_value']."<br/>";

}
