<?php
namespace controllers;
class IndexController{
    function index(){
        view('index/index');
    }
    function top(){
        view('index/top');
    }
    function main(){
        view('index/main');
    }
    function menu(){
        view('index/menu');
    }
    
}