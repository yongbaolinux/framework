<?php    if(!defined('DRPATH')) exit('访问错误');
//namespace diskroom;
//use \Exception;
class class_filesystem{
    //windows上文件命名规则  true 为合法文件名  false为不合法
    public static function checkFileName($fileName){
        //
        $fileName = trim(strtolower($fileName));
        if(empty($fileName)){
            return false;
        }
        $reg = '/^com[1-9]|con|prn|aux|nul|lpt[1-9]$/';
        if(preg_match($reg,$fileName)){
            return false;
        }
        $reg = '/^[^\\\\\/\:\*\?\<\>\|]{1,255}$/';
        return preg_match($reg,$fileName);
    }
    
    /**
     * 递归删除文件夹中的所有内容
     * @param string $path 待删除的文件夹路径
     * @param string $deleteDir 是否删除文件夹  true为删除 false为不删除 默认为false
     */
    public static function recursiveUnlink($dirPath,$deleteDir = false){
        if(!is_dir($dirPath)){
            throw new Exception('待删除的目标不是文件夹');
        }
        if(!$dir_h = opendir($dirPath)){
            throw new Exception('文件打开异常');
        }
        while($file_h = readdir($dir_h)){
            if($file_h == '.' || $file_h == '..'){
                continue;
            } elseif (is_file($dirPath.'/'.$file_h)){
                unlink($dirPath.'/'.$file_h);
            } else {
                self::recursiveUnlink($dirPath.'/'.$file_h,$deleteDir);
            }
        }
        @closedir($dir_h);
        if($deleteDir){
            $res = @unlink($dirPath);
            if(!$res){
                throw new Exception('删除文件夹失效');
            }
        }
    }
    
    /**
     * 删除文件 
     * @param $filePath string 待删除的文件  不存在或不是文件则会抛出一个异常
     * @return bool true 成功删除     false 删除失败 
     */
    public static function unlinkFile($filePath){
        if(!is_file($filePath)){
            throw new Exception('待删除的目标不是文件');
        }
        return @unlink($filePath);
    }
    
     /**
      * 清除php缓存
      */
    public static function clearPhpCaches()
    {
        if (function_exists('apc_clear_cache')) {
            apc_clear_cache(); // clear the system (aka 'opcode') cache
        }
    
        if (function_exists('opcache_reset')) {
            @opcache_reset(); // reset the opcode cache (php 5.5.0+)
        }
    
        if (function_exists('wincache_refresh_if_changed')) {
            @wincache_refresh_if_changed(); // reset the wincache
        }
    
        if (function_exists('xcache_clear_cache') && defined('XC_TYPE_VAR')) {
    
            if (ini_get('xcache.admin.enable_auth')) {
                // XCache will not be cleared because "xcache.admin.enable_auth" is enabled in php.ini.
            } else {
                @xcache_clear_cache(XC_TYPE_VAR);
            }
        }
    }
    
    /**
     * 测试两个文件是否有相同的内容
     * 
     */
    public static function fileEquivalent($file1,$file2){
        $file1_hash = md5_file($file1);
        $file2_hash = md5_file($file2);
        return $file1_hash === $file2_hash;
    }
    
    
}


?>