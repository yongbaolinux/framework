<?php
/**
 * 实现自动加载功能
 * 自动加载类
// */

class loader{
    static $_loaded_file = array();      //存放已经加载的文件
    static $_loaded_class = array();      //存放已经加载的类
    static function autoload($className){
        if(!defined(DRPATH)){
            define(DRPATH,'./');
        }
        //根据要加载的类名获取包含该类的文件路径
        $classFilePathArr = explode('_',$className);
        $classFilePathDir = rtrim(DRPATH,'/').'/'.$classFilePathArr[0];
        $classFilePath = $classFilePathDir.'/'.$classFilePathArr[1].'.php';
        if(file_exists($classFilePath)){
            require_once $classFilePath;
            self::$_loaded_file[] = $classFilePath;
            if(!class_exists($className)){
                throw new \Exception('类定义不存在，请确认类名是否采用"目录名_文件名"的形式');
            } else {
                self::$_loaded_class[] = $className;
            }
        } else {
            throw new \Exception('类文件不存在');
        }
    }
}

spl_autoload_register(array('loader','autoload'));
?>
