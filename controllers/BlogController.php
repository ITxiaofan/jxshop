<?php
namespace controllers;

class BlogController{
// 显示列表
    public function index(){
        view('blog/index');
    }
    // 添加表单
    public function create(){
        view('blog/create');
    }
    // 插入表单
    public function insert(){
        $blog = new \models\Blog;

        //填充数据
        $blog->fill($_POST);

        $blog->insert();
    }
    // 修改表单
    public function edit(){
        view('blog/edit');
    }
    // 更新表单
    public function update(){

    }
    // 删除表单
    public function delete(){

    }
}