<?php
namespace app\member\controller;

use think\Controller;
use think\View;

class Index extends Controller{
    public function index(){
        exec("php /usr/share/nginx/html/itrookie/application/member/controller/ws_server.php");
        return $this->fetch();
    }
    
    
}


