<?php
namespace app\simplechat\controller;

use think\Controller;
use think\view;

class index extends controller{
    public function index(){
        //require_once ROOT_PATH.'workerman/Autoloader.php';

        return $this->fetch();
    }
   
}

