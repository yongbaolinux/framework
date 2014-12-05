<?php if ( ! defined('DRPATH')) exit('访问错误');
//配置参数
return array(
    'db'=>array(
        'host' => 'localhost',  //数据库主机地址
        'user' => 'root',       //数据库用户名
        'pwd' => 'h8720828',    //数据库密码
        'port' => '3306',       //数据库服务端口
        'name'=>'test',         //访问数据库名
        'prefix'=>'dk_',
        'character'=>'utf8',    //访问字符集
        'type'=>'mysql',        //数据库类型
        'pconnect'=>'1'         //是否开启持久连接
    )
);
?>