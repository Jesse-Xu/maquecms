<?php
namespace app\index\controller;
use think\Controller;
use think\Model;
use app\index\model\LoginModel;

class Login extends Controller{

    #初始化操作#
    protected function initialize(){

    }

    public function index(){
         
        if($this->request->isGet()){
        	
            return $this->fetch();
        		
        }else{
        	
        	$data=$this->request->post('','','trim');
     		
            $data = [
                'name'  => 'thinkphp',
                'email' => 'thinkphp@qq.com',
            ];

            $validate = new \app\index\validate\User;

            if (!$validate->check($data)) {
                dump($validate->getError());
            }
        
     		/*if( !captcha_check($data['vercode'])){
     			$arr = ['name' => '验证码错误~', 'status' => '0'];
        		echo  json_encode($arr); exit;
     		}*/

        	if(LoginModel::login($data) ==true){
                $this->success("用户登录成功~");
            }else{
                $this->error("用户登录失败~");
            }

        }

    }

    #退出登录#
    public function loginout(){
        LoginModel::loginout();
        $this->success("退出成功~");
    }
}
