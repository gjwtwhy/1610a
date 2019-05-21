<?php
/**
 * 把数据库连接对象赋值给类内的成员属性.
 * User: guoju
 * Date: 2019/5/21
 * Time: 16:19
 */


class Model{
    public $_db;
    public function __construct()
    {
        include 'DbHandle.php';
        $dbHandle = DbHandle::getInstance();
        $this->_db = $dbHandle->_pdo;
    }
}