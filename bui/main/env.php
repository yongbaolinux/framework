<?php @ini_get('short_open_tag', 'On'); ?>
<!DOCTYPE HTML>
<html>
<head>
    <title> 首页代码结构</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="../assets/css/dpl-min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/css/bui-min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/css/page-min.css" rel="stylesheet" type="text/css"/>
    <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
    <style type="text/css">
        code {
            padding: 0px 4px;
            color: #dd1144;
            background-color: #f7f7f9;
            border: 1px solid #e1e1e8;
        }
    </style>
</head>
<body>
<div class="container">
<div class="detail-page">
<div class="detail-section">
    <h3>服务器硬件及软件信息</h3>
    <div class="row detail-row">
        <div class="span8">
            <label>服务器IP：</label><span class="detail-text"><?= $_SERVER['SERVER_ADDR'] ?></span>
        </div>
        <div class="span8">
            <label>服务器主机名：</label><span class="detail-text"><?= $_SERVER['SERVER_NAME'] ?></span>
        </div>
        <div class="span8">
            <label>服务器CGI规范：</label><span class="detail-text"><?= $_SERVER['GATEWAY_INTERFACE'] ?></span>
        </div>
    </div>
    <div class="row detail-row">
        <div class="span8">
            <label>服务器通信协议：</label><span class="detail-text"><?= $_SERVER['SERVER_PROTOCOL'] ?></span>
        </div>
        <div class="span8">
            <label>服务器管理员邮箱：</label><span class="detail-text"><?= $_SERVER['SERVER_ADMIN'] ?></span>
        </div>
        <div class="span8">
            <label>服务器Web端口：</label><span class="detail-text"><?= $_SERVER['SERVER_PORT'] ?></span>
        </div>
    </div>
    <div class="row detail-row">
        <div class="span8">
            <label>当前脚本url相对路径：</label><span class="detail-text"><?= $_SERVER['SCRIPT_NAME'] ?></span>
        </div>
        <div class="span8">
            <label>当前脚本磁盘路径：</label><span class="detail-text"><?= __FILE__ ?></span>
        </div>
        <!--<div class="span8">
                     <label>当前脚本绝对路径：</label><span class="detail-text"><? /*=$_SERVER['SCRIPT_FILENAME']*/ ?></span>
                 </div>-->
        <div class="span8">
            <label>服务器标识字符串：</label><span class="detail-text"><?= $_SERVER['SERVER_SOFTWARE'] ?></span>
        </div>
    </div>
    <div class="row detail-row">
        <div class="span8">
            <label>服务器计算机名：</label><span class="detail-text"><?= getenv('COMPUTERNAME') ?></span>
        </div>
        <div class="span8">
            <label>服务器用户域：</label><span class="detail-text"><?= getenv('USERDOMAIN') ?></span>
        </div>
        <div class="span8">
            <label>服务器用户名：</label><span class="detail-text"><?= getenv('USERNAME') ?></span>
        </div>
    </div>
    <div class="row detail-row">
        <div class="span24">
            <label>服务器操作系统：</label><span class="detail-text"><?= php_uname() ?></span>
        </div>
    </div>
    <div class="row detail-row">
        <div class="span16">
            <label>服务器CPU架构平台：</label><span class="detail-text"><?php
                echo getenv('PROCESSOR_IDENTIFIER');
                if (substr(PHP_OS, 0, 3) == 'WIN') {
                    /*ob_start();
                    system('systeminfo', $retval);
                    $return = ob_get_contents();
                    ob_end_clean();
                    $arr = explode("\n", $return);
                    foreach ($arr as $item) {
                        $temp = explode(":", $item);
                        //从ob缓存中取出来的字符集为gbk 转换成utf8
                        $temp[0] = iconv('gbk', 'utf-8', $temp[0]);
                        if ($temp[0] == '系统类型') {
                            echo iconv('gbk', 'utf-8', $temp[1]);
                        }
                    }*/
                } else {


                }
                ?></span>
        </div>
        <div class="span8">
            <label>服务器CPU数量：</label>
            <span class="detail-text"><?=getenv('NUMBER_OF_PROCESSORS')?></span>
        </div>
    </div>
    <div class="row detail-row">
        <!--<div class="span8">
                     <label>Apache加载模块：</label>
				<span class="detail-text"><?php foreach (apache_get_modules() as $key => $module) {
            if ($key % 2 == 1) {
                echo "<a href='http://httpd.apache.org/docs/2.4/mod/" . $module . ".html' target='_new' style='background-color:#ccc;'>" . $module . "</a> ";
            } else {
                echo "<a href='http://httpd.apache.org/docs/2.4/mod/" . $module . ".html' target='_new'>" . $module . "</a> ";
            }
        }?></span>
                 </div>-->
        <div class="span24">
            <label>Apache加载模块：</label>
            <?php //根据$_SERVER['SERVER_SOFTWARE']的值获取Apache版本
                $temp_arr = explode('/',$_SERVER['SERVER_SOFTWARE']);
                $apache_version = substr($temp_arr[1],0,3);
                //用一个巨大的数组来维护apache各模板的备注信息
                $apache_module_info = array(
                                    'core'=>'核心模块',
                                    'http_core'=>'核心模块',
                                    'mpm_winnt'=>'专门针对Windows NT优化的MPM(多路处理模块)',
                                    'mod_win32'=>'未知',
                                    'mod_allowmethods'=>'Easily restrict what HTTP methods can be used on the server',
                                    'mod_access_compat'=>'Group authorizations based on host (name or IP address)',
                                    'mod_actions'=>'基于媒体类型或请求方法，为执行CGI脚本而提供',
                                    'mod_alias'=>'提供从文件系统的不同部分到文档树的映射和URL重定向',
                                    'mod_asis'=>'发送自己包含HTTP头内容的文件',
                                    'mod_authn_core'=>'Core Authentication',
                                    'mod_authz_core'=>'Core Authorization',
                                    'mod_auth_basic'=>'使用基本认证',
                                    'mod_auth_digest'=>'使用MD5摘要认证(更安全，但是只有最新的浏览器才支持)',
                                    'mod_authn_alias'=>'基于实际认证支持者创建扩展的认证支持者，并为它起一个别名以便于引用',
                                    'mod_authn_anon'=>'提供匿名用户认证支持',
                                    'mod_authn_dbd'=>'使用SQL数据库为认证提供支持',
                                    'mod_authn_dbm' =>'使用DBM数据库为认证提供支持',
                                    'mod_authn_default' =>'在未正确配置认证模块的情况下简单拒绝一切认证信息',
                                    'mod_authn_file' =>'使用纯文本文件为认证提供支持',
                                    'mod_authnz_ldap' =>'允许使用一个LDAP目录存储用户名和密码数据库来执行基本认证和授权',
                                    'mod_authz_dbm' =>'使用DBM数据库文件为组提供授权支持',
                                    'mod_authz_default' =>'在未正确配置授权支持模块的情况下简单拒绝一切授权请求',
                                    'mod_authz_groupfile'=>'使用纯文本文件为组提供授权支持',
                                    'mod_authz_host' =>'供基于主机名、IP地址、请求特征的访问控制',
                                    'mod_authz_owner'=>'基于文件的所有者进行授权',
                                    'mod_authz_user' =>'基于每个用户提供授权支持',
                                    'mod_autoindex' =>'自动对目录中的内容生成列表，类似于"ls"或"dir"命令',
                                    'mod_cache' =>'基于URI键的内容动态缓冲(内存或磁盘)',
                                    'mod_cern_meta' =>'允许Apache使用CERN httpd元文件，从而可以在发送文件时对头进行修改',
                                    'mod_cgi'=>'在非线程型MPM(prefork)上提供对CGI脚本执行的支持',
                                    'mod_cgid' =>'在线程型MPM(worker)上用一个外部CGI守护进程执行CGI脚本',
                                    'mod_charset_lite'=>'允许对页面进行字符集转换',
                                    'mod_dav'=>'允许Apache提供DAV协议支持',
                                    'mod_dav_fs'=>'为mod_dav访问服务器上的文件系统提供支持',
                                    'mod_dav_lock'=>'为mod_dav锁定服务器上的文件提供支持',
                                    'mod_dbd' =>'管理SQL数据库连接，为需要数据库功能的模块提供支持',
                                    'mod_deflate' =>'压缩发送给客户端的内容',
                                    'mod_dir' =>'指定目录索引文件以及为目录提供"尾斜杠"重定向',
                                    'mod_cache_disk'=>'基于磁盘的缓冲管理器',
                                    'mod_dumpio' =>'将所有I/O操作转储到错误日志中',
                                    'mod_echo' =>'一个很简单的协议演示模块',
                                    'mod_env' =>'允许Apache修改或清除传送到CGI脚本和SSI页面的环境变量',
                                    'mod_example'=>'一个很简单的Apache模块API演示模块',
                                    'mod_expires' =>'允许通过配置文件控制HTTP的"Expires:"和"Cache-Control:"头内容',
                                    'mod_ext_filter' =>'使用外部程序作为过滤器',
                                    'mod_file_cache' =>'提供文件描述符缓存支持，从而提高Apache性能',
                                    'mod_filter' =>'根据上下文实际情况对输出过滤器进行动态配置',
                                    'mod_headers' =>'允许通过配置文件控制任意的HTTP请求和应答头信息',
                                    'mod_ident' =>'实现RFC1413规定的ident查找',
                                    'mod_imagemap'=>'处理服务器端图像映射',
                                    'mod_include'=>'实现服务端包含文档(SSI)处理',
                                    'mod_info'=>'生成Apache配置情况的Web页面',
                                    'mod_isapi' =>'仅限于在Windows平台上实现ISAPI扩展',
                                    'mod_ldap'=>'为其它LDAP模块提供LDAP连接池和结果缓冲服务',
                                    'mod_log_config' =>'允许记录日志和定制日志文件格式',
                                    'mod_log_forensic' =>'实现"对比日志"，即在请求被处理之前和处理完成之后进行两次记录',
                                    'mod_logio' =>'对每个请求的输入/输出字节数以及HTTP头进行日志记录',
                                    'mod_mem_cache' =>'基于内存的缓冲管理器',
                                    'mod_mime' =>'根据文件扩展名决定应答的行为(处理器/过滤器)和内容(MIME类型/语言/字符集/编码)',
                                    'mod_mime_magic' =>'通过读取部分文件内容自动猜测文件的MIME类型',
                                    'mod_negotiation'=>'提供内容协商支持',
                                    'mod_nw_ssl' =>'仅限于在NetWare平台上实现SSL加密支持',
                                    'mod_proxy' =>'提供HTTP/1.1的代理/网关功能支持',
                                    'mod_proxy_ajp' =>'mod_proxy的扩展，提供Apache JServ Protocol支持',
                                    'mod_proxy_balancer' =>'mod_proxy的扩展，提供负载平衡支持',
                                    'mod_proxy_connect'=>'mod_proxy的扩展，提供对处理HTTP CONNECT方法的支持',
                                    'mod_proxy_ftp' =>'mod_proxy的FTP支持模块',
                                    'mod_proxy_http'=>'mod_proxy的HTTP支持模块',
                                    'mod_rewrite' =>'一个基于一定规则的实时重写URL请求的引擎',
                                    'mod_setenvif' =>'根据客户端请求头字段设置环境变量',
                                    'mod_so' =>'允许运行时加载DSO模块',
                                    'mod_speling' =>'自动纠正URL中的拼写错误',
                                    'mod_ssl'=>'使用安全套接字层(SSL)和传输层安全(TLS)协议实现高强度加密传输',
                                    'mod_status' =>'生成描述服务器状态的Web页面',
                                    'mod_suexec' =>'使用与调用web服务器的用户不同的用户身份来运行CGI和SSI程序',
                                    'mod_unique_id' =>'为每个请求生成唯一的标识以便跟踪',
                                    'mod_userdir'=>'允许用户从自己的主目录中提供页面(使用"/~username")',
                                    'mod_usertrack'=>'使用Session跟踪用户(会发送很多Cookie)，以记录用户的点击流',
                                    'mod_version' =>'提供基于版本的配置段支持',
                                    'mod_vhost_alias' =>'提供大批量虚拟主机的动态配置支持',
                                    'libmysql'=>'mysql模块',
                                    'mod_php5'=>'php模块');
            ?>
            <div id="grid">
                <div class="bui-simple-grid bui-simple-list bui-grid-border" style="width: 950px;" aria-disabled="false"
                     aria-pressed="false">
                    <table cellspacing="0" cellpadding="0" class="bui-grid-table">
                        <thead>
                        <tr>
                            <th width="80" class="bui-grid-hd ">
                                <div class="bui-grid-hd-inner">
                                    <span class="bui-grid-hd-title">模块名</span>
                                </div>
                            </th>
                            <th width="100" class="bui-grid-hd ">
                                <div class="bui-grid-hd-inner">
                                    <span class="bui-grid-hd-title">模块备注</span>
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach (apache_get_modules() as $key => $module) { ?>
                            <tr class="bui-grid-row bui-grid-row-odd">
                                <td class="bui-grid-cell ">
                                    <div class="bui-grid-cell-inner">
                                        <span class="bui-grid-cell-text"><a
                                                href='http://httpd.apache.org/docs/<?php echo $apache_version; ?>/mod/<?php echo $module; ?>.html'
                                                target='_new'
                                                style='/*background-color:#ccc;*/'><?php echo $module; ?></a></span>
                                    </div>
                                </td>
                                <td class="bui-grid-cell ">
                                    <div class="bui-grid-cell-inner">
                                        <span class="bui-grid-cell-text"><?php echo $apache_module_info[$module]; ?></span>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
<div class="detail-section">
    <h3>PHP信息</h3>
    <?php //用一个大数组来维护php各扩展的详细信息
        $php_extensions = array(
            'apache2handler'=>'apache与php连接组件',
            'bcmath'=>'对于任意精度的数学，PHP提供了支持用字符串表示的任意大小和精度的数字的二进制计算。',
            'bz2'=>'bzip2  压缩函数库',
            'calendar'=>'历法转换函数库    自 PHP 4.0.3 起内置',
            'cpdf'=>'ClibPDF 函数库',
            'crack'=>'密码破解函数库',
            'ctype'=>'ctype 家族函数库 自 PHP 4.3.0 起内置',
            'curl'=>'CURL，客户端 URL 库函数库 需要：libeay32.dll，ssleay32.dll（已附带）',
            'cybercash '=>'网络现金支付函数库 PHP <= 4.2.0',
            'core'=>'PHP核心',
            'com_dotnet'=>'.NET和COM组件支持',
            'date'=>'你可以使用这些函数获取运行 PHP 的服务器的日期和时间， 也可以使用这些函数把日期和时间 格式化成不同格式的字符串',
            'db'=>'DBM 函数库 已废弃。用 DBA 替代之（php_dba.dll）',
            'dba'=>'DBA：数据库（dbm 风格）抽象层函数库',
            'dbase.'=>'dBase 函数库',
            'dbx'=>'dbx 函数库',
            'dom'=>'The DOM extension allows you to operate on XML documents through the DOM API with PHP 5',
            'domxml'=>'DOM XML 函数库 PHP <= 4.2.0 需要：libxml2.dll（已附带），PHP >= 4.3.0 需要：iconv.dll（已附带）',
            'dotnet'=>'.NET 函数库 PHP <= 4.1.1',
            'exif'=>'EXIF 函数库 需要 php_mbstring.dll。并且在 php.ini 中，php_exif.dll 必须在 php_mbstring.dll之后加载。',
            'ereg'=>'正则式匹配',
            'fbsql'=>'FrontBase 函数库 PHP <= 4.2.0',
            'fdf'=>'FDF：表单数据格式化函数库 需要：fdftk.dll（已附带）',
            'filter'=>'This extension filters data by either validating or sanitizing it. This is especially useful when the data source contains unknown (or foreign) data, like user supplied input. For example, this data may come from an HTML form',
            'filepro'=>'filePro 函数库 只读访问',
            'fileinfo'=>'本模块中的函数通过在文件的给定位置查找特定的 魔术 字节序列 来猜测文件的内容类型以及编码。 虽然不是百分百的精确， 但是通常情况下能够很好的工作',
            'ftp'=>'FTP 函数库 自 PHP 4.0.3 起内置',
            'gd'=>'GD 库图像函数库 在 PHP 4.3.2 中删除。此外注意在 GD1 中不能用真彩色函数，用 php_gd2.dll 替代。',
            'gd2'=>'GD 库图像函数库 GD2',
            'gmp'=>'These functions allow you to work with arbitrary-length integers using the GNU MP library',
            'gettext'=>'Gettext 函数库 PHP <= 4.2.0 需要 gnu_gettext.dll（已附带），PHP >= 4.2.3 需要 libintl-1.dll，iconv.dll（已附带）。',
            'hyperwave'=>'HyperWave 函数库',
            'hash'=>'信息摘要（哈希）引擎。允许使用各种哈希算法直接或增量处理任意长度的信息',
            'iconv'=>'ICONV 字符集转换 需要：iconv-1.3.dll（已附带），PHP >=4.2.1 需要 iconv.dll',
            'ifx'=>'Informix 函数库 需要：Informix 库',
            'iisfunc'=>'IIS 管理函数库',
            'intl'=>'国际化编码支持',
            'imap'=>'IMAP，POP3 和 NNTP 函数库',
            'ingres'=>'Ingres II 函数库 需要：Ingres II 库',
            'interbase '=>'InterBase functions 需要：gds32.dll（已附带）',
            'java'=>'Java 函数库 PHP <= 4.0.6 需要：jvm.dll（已附带）',
            'json'=>'提供对json数据格式的转换',
            'ldap'=>'LDAP 函数库 PHP <= 4.2.0 需要 libsasl.dll（已附带），PHP >= 4.3.0 需要 libeay32.dll，ssleay32.dll（已附带）',
            'libxml'=>'These functions/constants are available as of PHP 5.1.0, and the following core extensions rely on this libxml extension: DOM, libxml, SimpleXML, SOAP, WDDX, XSL, XML, XMLReader, XMLRPC 和 XMLWriter.',
            'mbstring'=>'多字节字符串函数库',
            'mcrypt'=>'Mcrypt 加密函数库 需要：libmcrypt.dll',
            'memcache'=>'Memcache模块提供了于memcached方便的面向过程及面向对象的接口，memcached是为了降低动态web应用 从数据库加载数据而产生的一种常驻进程缓存产品',
            'mhash'=>'Mhash 函数库 PHP >= 4.3.0 需要：libmhash.dll（已附带）',
            'mime_magic'=>'Mimetype 函数库 需要：magic.mime（已附带）',
            'ming'=>'Ming 函数库（Flash）',
            'msql'=>'mSQL 函数库 需要：msql.dll（已附带）',
            'mssql'=>'MSSQL 函数库 需要：ntwdblib.dll（已附带）',
            'mysql'=>'MySQL 函数库 PHP >= 5.0.0 需要 libmysql.dll（已附带）',
            'mysqli'=>'MySQLi 函数库 PHP >= 5.0.0 需要 libmysql.dll（PHP <= 5.0.2 中是 libmysqli.dll）（已附带）',
            'mysqlnd'=>'MySQL Native Driver is a replacement for the MySQL Client Library (libmysqlclient). MySQL Native Driver is part of the official PHP sources as of PHP 5.3.0.',
            'oci8'=>'Oracle 8 函数库 需要：Oracle 8.1+ 客户端库',
            'odbc'=>'提供对下面几种数据库的支持：Adabas D,  IBM DB2,  iODBC,  Solid, Sybase SQL',
            'openssl'=>'OpenSSL 函数库 需要：libeay32.dll（已附带）',
            'oracle'=>'Oracle 函数库 需要：Oracle 7 客户端库',
            'overload'=>'对象重载函数库 自 PHP 4.3.0 起内置',
            'pcre'=>'正则表达式(兼容 Perl)',
            'pdf'=>'PDF函数库',
            'pdo'=>'PHP 数据对象 （PDO） 扩展为PHP访问数据库定义了一个轻量级的一致接口',
            'pdo_sqlite'=>'PDO_SQLITE is a driver that implements the PHP Data Objects (PDO) interface to enable access to SQLite 3 databases',
            'pdo_mysql'=>'PDO_MYSQL is a driver that implements the PHP Data Objects (PDO) interface to enable access from PHP to MySQL 3.x, 4.x and 5.x databases',
            'pgsql'=>'PostgreSQL 函数库',
            'printer'=>'打印机函数库',
            'phar'=>'Phar implements this functionality through a Stream Wrapper. Normally, to use an external file within a PHP script, you would use include',
            'reflection'=>'PHP 5 具有完整的反射 API，添加了对类、接口、函数、方法和扩展进行反向工程的能力。 此外，反射 API 提供了方法来取出函数、类和方法中的文档注释。',
            'shmop'=>'共享内存函数库',
            'simplexml'=>'SimpleXML 扩展提供了一个非常简单和易于使用的工具集，能将 XML 转换成一个带有一般属性选择器和数组迭代器的对象。',
            'snmp '=>'SNMP 函数库 仅用于 Windows NT！',
            'soap'=>'SOAP 函数库 PHP >= 5.0.0',
            'sockets'=>'Socket 函数库',
            'session'=>'会话支持',
            'sqlite3'=>'对 SQLite v3 数据库的支持信息',
            'sybase_ct'=>'Sybase 函数库 需要：Sybase 客户端库',
            'standard'=>'未知',
            'spl'=>'PHP标准库SPL是用于解决典型问题(standard problems)的一组接口与类的集合',
            'tidy'=>'Tidy 函数库 PHP >= 5.0.0',
            'tokenizer'=>'Tokenizer 函数库 自 PHP 4.3.0 起内置',
            'w32api'=>'W32api 函数库',
            'wddx'=>'未知',
            'xml'=>'此 PHP 扩展实现 支持 James Clark 使用 PHP 编写的 expat。 此工具包可解析(但不能验证) XML 文档。它支持 PHP 所提供的 3 种字符编码： US-ASCII, ISO-8859-1 和 UTF-8。 不支持 UTF-16。',
            'xmlrpc'=>'XML-RPC 函数库 PHP >= 4.2.1 需要 iconv.dll（已附带）',
            'xmlwriter'=>'This extension represents a writer that provides a non-cached, forward-only means of generating streams or files containing XML data.',
            'xmlreader'=>'The XMLReader extension is an XML Pull parser. The reader acts as a cursor going forward on the document stream and stopping at each node on the way.',
            'xslt'=>'XSLT 函数库 PHP <= 4.2.0 需要 sablot.dll，expat.dll（已附带）。PHP >= 4.2.1 需要 sablot.dll，expat.dll，iconv.dll（已附带）。 ',
            'xsl'=>'The XSL extension implements the XSL standard, performing » XSLT transformations using the » libxslt library',
            'yaz'=>'YAZ 函数库 需要：yaz.dll（已附带）',
            'zip'=>'Zip 文件函数库 只读访问',
            'zlib'=>'ZLib 压缩函数库 自 PHP 4.3.0 起内置',
            'xdebug'=>'PHP调试工具'
        );
    ?>
    <div class="row detail-row">
	<div class="span8">
            <label>PHP接口类型：</label><span class="detail-text"><?= php_sapi_name() ?></span>
        </div>
        <div class="span8">
            <label>PHP版本：</label><span class="detail-text"><?= PHP_VERSION ?></span>
        </div>
	<div class="span8">
            <label>PHP扩展存放路径：</label><span class="detail-text"><?= ini_get('extension_dir') ?></span>
        </div>
    </div>
    <div class="row detail-row">
        <div class="span24">
            <label>已加载的PHP普通扩展：</label>

            <div id="grid">
                <div class="bui-simple-grid bui-simple-list bui-grid-border" style="width: 950px;" aria-disabled="false"
                     aria-pressed="false">
                    <table cellspacing="0" cellpadding="0" class="bui-grid-table">
                        <thead>
                        <tr>
                            <th width="80" class="bui-grid-hd ">
                                <div class="bui-grid-hd-inner">
                                    <span class="bui-grid-hd-title">扩展名</span>
                                </div>
                            </th>
                            <th width="100" class="bui-grid-hd ">
                                <div class="bui-grid-hd-inner">
                                    <span class="bui-grid-hd-title">扩展备注</span>
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach (get_loaded_extensions(false) as $key => $extension) { ?>
                            <tr class="bui-grid-row bui-grid-row-odd">
                                <td class="bui-grid-cell ">
                                    <div class="bui-grid-cell-inner">
                                        <span class="bui-grid-cell-text"><a
                                                href="<?php
                                                if($extension == 'odbc'){
                                                    echo "http://php.net/manual/zh/book.uodbc.php";
                                                } elseif($extension == 'xdebug') {
                                                    echo "http://www.xdebug.org/";
                                                } elseif(substr($extension,0,4) == 'pdo_') {
                                                    echo "http://php.net/manual/zh/ref.".str_replace('_','-',strtolower($extension)).".php";
                                                } elseif($extension == 'gd') {
                                                    echo "http://php.net/manual/zh/book.image.php";
                                                } elseif($extension == 'com_dotnet'){
                                                    echo "http://php.net/manual/zh/book.com.php";
                                                } elseif($extension == 'apache2handler' || $extension == 'standard' || $extension == 'Core'){
                                                    echo "javascript:void(0)";
                                                } elseif($extension == 'bz2'){
                                                    echo "http://php.net/manual/zh/book.bzip2.php";
                                                } elseif($extension == 'ereg'){
                                                    echo "http://php.net/manual/zh/book.regex.php";
                                                } elseif($extension == 'date'){
                                                    echo "http://php.net/manual/zh/book.datetime.php";
                                                } elseif($extension == 'bcmath'){
                                                    echo "http://php.net/manual/zh/book.bc.php";
                                                } else {
                                                    echo "http://php.net/manual/zh/book.".strtolower($extension).".php";
                                                }
                                                ?>"
                                                target="_new"><?php echo $extension; ?></a></span>
                                    </div>
                                </td>
                                <td class="bui-grid-cell ">
                                    <div class="bui-grid-cell-inner">
                                        <span class="bui-grid-cell-text"><?php echo $php_extensions[strtolower($extension)];?></span>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- grid end -->
        </div>

    </div>
    <div class="row detail-row">
        <div class="span24">
            <label>已加载的Zend扩展：</label>

            <div id="grid">
                <div class="bui-simple-grid bui-simple-list bui-grid-border" style="width: 950px;" aria-disabled="false"
                     aria-pressed="false">
                    <table cellspacing="0" cellpadding="0" class="bui-grid-table">
                        <thead>
                        <tr>
                            <th width="80" class="bui-grid-hd ">
                                <div class="bui-grid-hd-inner">
                                    <span class="bui-grid-hd-title">扩展名</span>
                                </div>
                            </th>
                            <th width="100" class="bui-grid-hd ">
                                <div class="bui-grid-hd-inner">
                                    <span class="bui-grid-hd-title">扩展备注</span>
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach (get_loaded_extensions(true) as $key => $module) { ?>
                            <tr class="bui-grid-row bui-grid-row-odd">
                                <td class="bui-grid-cell ">
                                    <div class="bui-grid-cell-inner">
                                        <span class="bui-grid-cell-text"><?php echo $module; ?></span>
                                    </div>
                                </td>
                                <td class="bui-grid-cell ">
                                    <div class="bui-grid-cell-inner">
                                        <span class="bui-grid-cell-text">PHP调试工具</span>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- grid end -->
        </div>
    </div>
    <div class="row detail-row">
        <div class="span24">
            <label>PHP配置检测：</label>
            <?php //用一个大数组来维护配置的中文注解
            //desc 用于描述该配置项 switch是否对其值进行显示转换 不需要转换的就是本身就是数值 需要转换的是把 1 转成 On/0 转成 Off诸如此类
            $php_core_info = array(
                'allow_url_fopen'=>array('desc'=>'是否允许fopen函数远程打开一个url链接'),
                'allow_url_include'=>array('desc'=>'是否允许远程通过url包含一个php文件'),
                'asp_tags'=>array('desc'=>'是否开启ASP风格的标记'),
                'auto_detect_line_endings'=>array('desc'=>'是否在不同的系统上自动侦测换行符,以便fgets()和file()函数正常工作'),
                'date.timezone'=>array('desc'=>'默认时区','noswitch'=>1),
                'default_charset'=>array('desc'=>'默认字符集'),
                'default_mimetype'=>array('desc'=>'默认的mime类型','noswitch'=>1),
                'display_errors'=>array('desc'=>'是否显示php错误信息'),
                'default_socket_timeout'=>array('desc'=>'默认socket连接超时时间','noswitch'=>1),
                'display_startup_errors'=>array('desc'=>'是否打开PHP启动过程的错误提示,如果开启会将错误输入到系统的事件查看器'),
                'enable_dl'=>array('desc'=>'是否开启动态加载扩展'),
                'enable_post_data_reading'=>array('desc'=>'是否开启$_POST/$_FILES的获取,如果关闭该项,就只能用php://input来读取POST和FILES数据'),
                'error_log'=>array('desc'=>'错误日志存放路径','noswitch'=>1),
                'engine'=>array('desc'=>'打开或关闭 PHP 解析。本指令仅在将PHP作为Apache的模块运行时才有用'),
                'error_reporting'=>array('desc'=>'设置php报告错误级别','noswitch'=>1),
                'expose_php'=>array('desc'=>'是否暴露php的某些信息，关掉该项可以提高安全性'),
                'extension_dir'=>array('desc'=>'php扩展存放路径','noswitch'=>1),
                'file_uploads'=>array('desc'=>'是否允许通过HTTP进行文件上传'),
                'html_errors'=>array('desc'=>'是否在错误信息中关闭HTML标签。这种新的HTML格式的错误信息是可以点击，它引导用户前往描述该错误或者导致该错误发生的函数的参考信息页面'),
                'iconv.input_encoding'=>array(),
                'iconv.internal_encoding'=>array(),
                'iconv.output_encoding'=>array(),
                'ignore_repeated_errors'=>array('desc'=>'是否忽略同一个文件同一行代码上的重复信息'),
                'ignore_repeated_source'=>array('desc'=>'是否忽略重复消息,不管消息是不是来自同一文件同一行'),
                'ignore_user_abort'=>array('desc'=>'客户端断开连接后，脚本是否继续运行'),
                'implicit_flush'=>array('desc'=>'是否每段信息块输出后自动刷新，这等同于每次使用print echo 函数或每个HTML代码块后调用 flush函数，在WEB下默认关闭'),
                'include_path'=>array('desc'=>'指定require include 等函数查找文件的目录','noswitch'=>1),
                'log_errors'=>array('desc'=>'设置是否将脚本运行的错误信息记录到服务器错误日志或者error_log之中'),
                'log_errors_max_len'=>array('desc'=>'设置 log_errors 的最大字节数','noswitch'=>1),
                'max_execution_time'=>array('desc'=>'设置了脚本被解析器中止之前允许的最大执行时间，单位秒','noswitch'=>1),
                'max_file_uploads'=>array('desc'=>'一个表单所能上传的文件数最大值','noswitch'=>1),
                'max_input_nesting_level'=>array('desc'=>'设置输入变量的嵌套深度($_POST[1][2]','noswitch'=>1),
                'max_input_time'=>array('desc'=>'设置PHP解析POST和GET数据所允许的最大时间值,单位为秒','noswitch'=>1),
                'max_input_vars'=>array('desc'=>'设置能够接受input变量的数值','noswitch'=>1),
                'memory_limit'=>array('desc'=>'设置一个脚本执行时所能分配内存的最大值,单位为字节','noswitch'=>1),
                'output_buffering'=>array('desc'=>'设置输出缓冲区的最大值','noswitch'=>1),
                'post_max_size'=>array('desc'=>'设置POST数据所允许的最大值','noswitch'=>1),
                'precision'=>array('desc'=>'设置浮点数中显示有效数字的位数','noswitch'=>1),
                'realpath_cache_size'=>array('desc'=>'设置realpath_cache的内存使用大小,对include require所包含的文件路径进行缓存,默认为16k','noswitch'=>1),
                'realpath_cache_ttl'=>array('desc'=>'设置realpath_cache的缓存有效时间','noswitch'=>1),
                'register_argc_argv'=>array('desc'=>'在CLI中，设置是否可以访问到argc和argv的值'),
                'report_memleaks'=>array('desc'=>'设置是否显示内存泄露消息'),
                'request_order'=>array('desc'=>'定义$_REQUEST数组的构成,G代表$_GET,P代表$_POST,C代表$_COOKIE,变量从左至右被覆盖','noswitch'=>1),
                'short_open_tag'=>array('desc'=>'是否打开短标记<?= ?>'),
                'smtp'=>array('desc'=>'邮件服务器域名','noswitch'=>1),
                'smtp_port'=>array('desc'=>'邮件服务器端口','noswitch'=>1),
                'sql.safe_mode'=>array('desc'=>'开启后数据库连接函数会忽略参数'),
                'upload_max_filesize'=>array('desc'=>'设置单个上传文件所允许的大小','noswitch'=>1),
                'upload_tmp_dir'=>array('desc'=>'设置上传文件的临时存放文件夹','noswitch'=>1),

            );
            //转换函数 将布尔值转换成显示更友好的图形方式
            function getStatus($status){
                return $status ? '<img src="../assets/img/tick_circle.png" />' : '<img src="../assets/img/cross_circle.png" />';
            }
            ?>
            <div id="grid">
                <div class="bui-simple-grid bui-simple-list bui-grid-border" style="width: 950px;" aria-disabled="false"
                     aria-pressed="false">
                    <table cellspacing="0" cellpadding="0" class="bui-grid-table">
                        <thead>
                        <tr>
                            <th width="80" class="bui-grid-hd ">
                                <div class="bui-grid-hd-inner">
                                    <span class="bui-grid-hd-title">配置项</span>
                                </div>
                            </th>
                            <th width="80" class="bui-grid-hd ">
                                <div class="bui-grid-hd-inner">
                                    <span class="bui-grid-hd-title">配置描述</span>
                                </div>
                            </th>
                            <th width="100" class="bui-grid-hd ">
                                <div class="bui-grid-hd-inner">
                                    <span class="bui-grid-hd-title">配置值</span> ( <img src="../assets/img/tick_circle.png" />说明该配置项为打开 <img src="../assets/img/cross_circle.png" />说明该配置项关闭或未配置 )
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach (ini_get_all('core') as $key => $value) { if(isset($php_core_info[$key]) && !empty($php_core_info[$key])){ ?>
                            <tr class="bui-grid-row bui-grid-row-odd">
                                <td class="bui-grid-cell ">
                                    <div class="bui-grid-cell-inner">
                                        <span class="bui-grid-cell-text"><?php echo $key;?></span>
                                    </div>
                                </td>
                                <td class="bui-grid-cell ">
                                    <div class="bui-grid-cell-inner">
                                        <span class="bui-grid-cell-text"><?php echo $php_core_info[$key]['desc'];?></span>
                                    </div>
                                </td>
                                <td class="bui-grid-cell ">
                                    <div class="bui-grid-cell-inner">
                                        <span class="bui-grid-cell-text"><?php
                                            if(isset($php_core_info[$key]['noswitch'])){
                                                echo $value['global_value'];
                                            } else {
                                                echo getStatus($value['global_value']);
                                            }
                                            ?></span>
                                    </div>
                                </td>
                            </tr>
                        <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- grid end -->
        </div>
    </div>
</div>
<div class="detail-section">

</div>
</div>
</div>
<script type="text/javascript" src="../assets/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="../assets/js/bui-min.js"></script>
<script type="text/javascript" src="../assets/js/config-min.js"></script>
<script type="text/javascript">
    BUI.use('common/page');
</script>

<body>
</html>
