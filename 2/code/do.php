<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/5/10
 * Time: 16:32
 */
$a = $_GET['a'];
//修改名称
if ($a=='changename'){
    $id = $_POST['id'];
    $name = $_POST['name'];

    include 'Db.php';
    $objDb = new Db('10a');
    $data = $objDb->updatename($id,$name);
    if ($data){
        echo json_encode(['code'=>200]);
    } else {
        echo json_encode(['code'=>201,'message'=>'修改失败']);
    }
}
//分页数据
if ($a == 'list'){
    $page = isset($_GET['p'])?$_GET['p']:1;
    $name = $_GET['name'];
    include 'Db.php';
    $objDb = new Db('10a');
    $list = $objDb->getPageList($page,$name);

    echo json_encode(['code'=>200,'message'=>'','data'=>$list]);
}