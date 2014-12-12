<?php if ( ! defined('DRPATH')) exit('访问错误');
//配置参数
return array(
    'session'=>array(
        'handler'=>'db',
        'files_path'=>'/',
        'table_name'=>'session'
        
    )
);
?>