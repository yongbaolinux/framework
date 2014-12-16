<?php   if ( ! defined('DRPATH')) exit('访问错误');
return array(
    'log'=>array(
        'type'=>'file',
        'path'=>rtrim(DRPATH,'/').'/log/',
        'format'=>'Y-m-d H:i:s',
        'level'=>2
    )
);
?>
