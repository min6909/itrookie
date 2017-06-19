<?php
namespace app\index\controller;

use app\common\model;
use app\index\model\Log;

use think\Controller;
use think\View;

class Index extends Controller{
    public function Index(){
        $time = date('Y-m-d  H:i:s',time());
        $agent = $_SERVER['HTTP_USER_AGENT'];   //获取用户使用何种设备浏览网站
        //获取用户访问设备(1：pc端，2：移动端，3：其它)
        if(preg_match('/win/i', $agent)){
            $type = '1';
        }elseif (preg_match('/mobile/i', $agent)) {
            $type = '2';
        }else{
            $type = '3';
        }
        $ip   = $_SERVER['REMOTE_ADDR'];        //获取用户ip
        $Model = new Log();
        $Model::visitLog($type,$ip,$time,$agent);
        
        return $this->fetch();
    }
    
    /*
     *首页访问统计图 
     * 
     */
    public function Statistic(){
        
        return $this->fetch();
    }

    public function Test(){
//       $model = new model\Min();
//        $this->assign('name','hello!');
        return $this->fetch();
    }
    
//    public function info(){
//        echo phpinfo();
//    }
}
