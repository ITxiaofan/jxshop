<?php
namespace controllers;
class CategoryController{
// 显示列表
    public function index(){
        view('category/index');
    }
    // 添加表单
    public function create(){
        view('category/create');
    }
    // 插入表单
    public function insert(){

    }
    // 修改表单
    public function edit(){
        view('category/edit');
    }
    // 更新表单
    public function update(){

    }
    // 删除表单
    public function delete(){

    }
}