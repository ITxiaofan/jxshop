<?php
namespace models;

class Member extends Model
{
    // 设置这个模型对应的表
    protected $table = 'member';
    // 设置允许接收的字段
    protected $fillable = ['username','password'];
}