<?php

namespace app\index\model;

use think\Db;

class Log extends Db{
    static $table = 'itrookie_visit_log';
    /**
     * 用户访问详情
     * @access public
     * @param  int      $type          用户类型
     * @param  str      $ip            IP地址
     * @param  datatime $time          访问时间
     * @param  varchar  $visit_info    设备信息
     */
    public static function visitLog($type,$ip,$time,$visit_info){
        $data = [
            'type' => $type,
            'ip'   => $ip,
            'time' => $time,
            'visit_info'   => $visit_info
        ];
        Db::table(self::$table)->insert($data);
    }
//    登录
    public function login(){
        
    }
//    退出登录
    public function logout(){
        
    }
}
