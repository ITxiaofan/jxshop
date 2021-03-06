<?php
namespace models;

class Category extends Model
{
    // 设置这个模型对应的表
    protected $table = 'category';
    // 设置允许接收的字段
    protected $fillable = ['cat_name','parent_id','path'];
    // 取出一个分类的子分类
    public function getCat($parent_id = 0){
       return $this->findAll([
            'where' => "parent_id=$parent_id"
        ]);
    }
    //递归排序
    public function tree(){
        // 取出所有的分类
        $data = $this->findAll([
            'pre_page' => 99999999,
        ]);
        // 递归排序
       return $this->_sort($data['data']);


    }
    // 递归
    // 排序的数据
    public function _sort($data,$parent_id=0,$level=0){
        // 定义保存出来的分类
        static $_arr = [];
        // 循环分类
        foreach ($data as $v){
            if($v['parent_id'] == $parent_id){
                // /标记第几级
                $v['level'] = $level;
                $_arr[] = $v;
                // 继续挑子分类
                $this->_sort($data , $v['id'] , $level+1);
            }
        }
        // 把挑完的数组返回
        return $_arr;

    }
}