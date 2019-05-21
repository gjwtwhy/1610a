<?php
/**
 * 新闻表数据库操作
 * User: guoju
 * Date: 2019/5/21
 * Time: 15:47
 */
include 'Model.php';
class News extends Model{

    public function getList(){
        $sql = "select * from book";
        return $this->_db->query($sql)->fetchAll();
    }

    
}