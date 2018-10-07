<?php
namespace app\user\controller;
use think\Controller;
use think\Request;
use think\Db;
use think\facade\Session;
use think\facade\Config;
use app\user\validate\User;

class Common extends Controller{

    public $request;
    
	public function __construct(Request $request){

        $this->request = $request;

        //关闭站点
        if(Config::get('site.site.status') =='关闭'){

            exit();
        }
        //echo "1";

        if(session('user')==''){
            $this->error('请先登录~',url('login/index'));
        }

        parent::__construct();

        


        
    }

   
}
