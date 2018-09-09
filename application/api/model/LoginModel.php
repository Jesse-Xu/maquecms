<?php
namespace app\index\model;

use think\Model;
use think\Db;
use think\facade\Session;
use think\facade\Cookie;

class LoginModel extends Model{

	#用户登陆#
    public static function login($data){
    
		$map=array(
			'username'=>$data['username'],
			'password'=>md5($data['password']),
			'status'=>'1'
		);

        $info= Db::name('user_list')->where($map)->find();
       	if($info){

       		Session::set('user',$info);

       		
        	return true;

       	}else{
       		
       		
        	return false;

       	}

    }

    #退出登录#
    public static function loginout(){
      Session::delete('user');
    }

    
    
}
