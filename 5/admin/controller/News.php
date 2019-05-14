<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\controller\Common;
use app\admin\model\Book;

class News extends Common
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //接参数
        $name = input('book_name');
        $auther = input('auther');
//        $where = [];
//        if ($name){
//            $where= [
//                ['book_name','like','%'.$name.'%']
//            ];
//        }
        //$list = Book::where($where)->order('book_id','desc')->select();
        $list = Book::withSearch(['book_name','auther'],['book_name'=>$name,'auther'=>$auther])->order('book_id','desc')->paginate(10,false,[
            'type'     => 'bootstrap',
            'var_page' => 'page',
            'query'=>[
                'book_name'=>$name,
                'auther'=>$auther
            ]
        ]);
        //echo Book::getlastsql();exit;
        return view('index',['list'=>$list]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
