<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/5/21
 * Time: 15:35
 */
include 'model/News.php';
include 'model/Admin.php';
$objNews = new News();
$list = $objNews->getList();
var_dump($list);
//$objAdmin = new Admin();
