<?php
namespace controllers;

class GoodsController{
// 显示列表
    public function index(){
        view('goods/index');
    }
    // 添加表单
    public function create(){
        view('goods/create');
    }
    // 插入表单
    public function insert(){

    }
    // 修改表单
    public function edit(){
        view('goods/edit');
    }
    // 更新表单
    public function update(){

    }
    // 删除表单
    public function delete(){

    }
}