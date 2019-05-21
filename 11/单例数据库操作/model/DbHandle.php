<?php
/**
 * 返回单例的数据库连接对象
 * User: guoju
 * Date: 2019/5/21
 * Time: 15:31
 */
class DbHandle{
    //私有的静态的属性 来存储当前类的实例
    private static $_instance = null;
    public $_pdo=null;

    //私有的构造函数
    private function __construct()
    {
        $this->_pdo = new PDO('mysql:host=localhost;dbname=10a;charset=utf8','root','');
    }

    //私有的克隆方法
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    //公共的静态方法返回当前类的实例
    public static function getInstance(){
        if (!(self::$_instance instanceof DbHandle)){
            self::$_instance = new DbHandle();
        }

        return self::$_instance;
    }

    /**
     * 返回数据库连接对象
     * @return null|PDO
     */
    public function getPdo(){
        return $this->_pdo;
    }
}