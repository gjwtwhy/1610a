<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/5/10
 * Time: 16:10
 */
class Db{

    private $_PDO = null;
    private $_pageNum = 3;
    public function __construct($name)
    {
        $this->_PDO = new PDO('mysql:host=localhost;dbname='.$name.';charset=utf8','root','');
    }

    public function getList(){
        $sql = "select * from staff order by y_id desc";
        return $this->_PDO->query($sql)->fetchAll();
    }

    public function updatename($id,$name){
        $sql = "update staff set y_name='$name' where y_id=$id";
        return $this->_PDO->exec($sql);
    }

    //分页数据
    public function getPageList($page,$name){
        $offset = ($page-1)*$this->_pageNum;

        $sql = "select * from staff ";
        if ($name){
            $sql .= " where y_name like '%".$name."%'";
        }
        $sql .= " order by y_id desc limit $offset,$this->_pageNum";

        $list = $this->_PDO->query($sql)->fetchAll();

        //计算总页数
        $sql1 = "select count(y_id) as num from staff";
        if ($name){
            $sql1 .= " where y_name like '%".$name."%' ";
        }
        $row = $this->_PDO->query($sql1)->fetch();
        $totalNum = $row['num'];
        $totalPage = ceil($totalNum/$this->_pageNum);
        return ['list'=>$list,'totalPage'=>$totalPage];
    }
}