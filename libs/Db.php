<?php 
namespace libs;
class Db
{
    private static $_obj = null;
    private $pdo;
    private function __clone(){}
    private function __construct(){
        $this->pdo = new \PDO('mysql:host=127.0.0.1;dbname=jxshop','root','123456');
        $this->pdo->exec('SET NAMES utf8');
    }
    // 返回唯一对象
    public static function make(){
        if(self::$_obj === null){
            self::$_obj = new self;

        }
        return self::$_obj;
    }
    public function prepare($sql){
        return $this->pdo->prepare($sql);
    }

}
    