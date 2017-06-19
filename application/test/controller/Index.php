<?php
namespace app\test\controller;

use think\Controller;
use think\View;

class Index extends Controller{
    public function index(){
        return $this->fetch();
    }

}

