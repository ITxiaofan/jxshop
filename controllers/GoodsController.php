<?php
namespace controllers;

use models\Goods;

class GoodsController{
    public function ajax_get_cat(){
        $id = (int)$_GET['id'];
        // 根据id查询子分类
        $model = new \models\Category;
        $data = $model->getCat($id);
        // 转成json
        echo json_encode($data);
    }
    // 列表页
    public function index()
    {
         $model = new Goods;
         $data = $model->findAll();
         view('goods/index', $data);
    }

    // 显示添加的表单
    public function create()
    {
        // 取出一级分类
        $model = new \models\Category;
        $topCat = $model->getCat();
        // echo "<pre>";
        // var_dump($topCat);
        // die;
        view('goods/create',[
            'topCat' => $topCat['data'],
        ]);
    }

    // 处理添加表单
    public function insert()
    {
        $model = new Goods;
        $model->fill($_POST);
        $model->insert();
        redirect('/goods/index');
    }

    // 显示修改的表单
    public function edit()
    {
        $model = new Goods;
        $data=$model->findOne($_GET['id']);
        view('goods/edit', [
            'data' => $data,    
        ]);
    }

    // 修改表单的方法
    public function update()
    {
        $model = new Goods;
        $model->fill($_POST);
        $model->update($_GET['id']);
        redirect('/goods/index');
    }

    // 删除
    public function delete()
    {
        $model = new Goods;
        $model->delete($_GET['id']);
        redirect('/goods/index');
    }
}