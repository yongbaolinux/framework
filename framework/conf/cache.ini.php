<?php
return array(
    'cache'=>array(
        'type'=>'memcache',     //缓存类型
        'host'=>'127.0.0.1',    //缓存服务器主机地址
        'port'=>'11211',        //缓存服务器端口
        'flag'=>false,           //是否启用数据压缩
        'expire'=>3600          //设置缓存数据过期时间
    )
);
?>