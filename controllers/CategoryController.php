<?php
namespace controllers;

use models\Category;

class CategoryController{
    // 列表页
    public function index()
    {

        $model = new Category;
        $tree = $model->tree();
        foreach($tree as $v){
            echo str_repeat('&nbsp;',$v['level']*8) . $v['cat_name']."<hr>";
        }
        echo "<pre>";
        var_dump($tree);

        $data = $model->findAll([
            'order_by' =>'concat(path,id,"-")',
            'order_way' => 'asc',
            'per_page' => 999999999,
        ]);
        view('category/index', $data);
    }

    // 显示添加的表单
    public function create()
    {
        view('category/create');
    }

    // 处理添加表单
    public function insert()
    {
        $model = new Category;
        $model->fill($_POST);
        $model->insert();
        redirect('/category/index');
    }

    // 显示修改的表单
    public function edit()
    {
        $model = new Category;
        $data=$model->findOne($_GET['id']);
        view('category/edit', [
            'data' => $data,    
        ]);
    }

    // 修改表单的方法
    public function update()
    {
        $model = new Category;
        $model->fill($_POST);
        $model->update($_GET['id']);
        redirect('/category/index');
    }

    // 删除
    public function delete()
    {
        $model = new Category;
        $model->delete($_GET['id']);
        redirect('/category/index');
    }
}