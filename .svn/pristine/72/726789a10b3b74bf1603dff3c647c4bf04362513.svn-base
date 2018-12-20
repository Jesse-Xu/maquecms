<?php
namespace app\user\controller;
use think\Controller;
use think\Request;
use app\user\model\UserModel;
use app\user\validate\User as UserValidate;

class Login extends Controller{

    public $request;

	public function initialize(){
        
    }

    #登录#
    public function index(Request $request){
       
        if($request->isGet()){
                
            return $this->fetch();

        }else{

            $post=$request->post();

            //数据验证
            
            if( !captcha_check($post['vercode'])){
                return json(['msg'=>"验证码错误~",'status'=>'0']);
            }

            $message=UserValidate::Login($post);

            if($message !== true){
                 return json(['msg'=>$message,'status'=>'0']);
            }

            $res=UserModel::Login($post['email'],$post['password']);

            if($res){
                $data=array(
                    'status'=>"1",
                    'msg'=>"登录成功~",
                    'url'=>url('user/index')
                );
                return json($data);
                
            }else{
                return json(['msg'=>$res,'status'=>'0']);
            }

        }

    }

    #注册#
    public function register(Request $request){
       
        if($request->isGet()){
                
            return $this->fetch();

        }else{

            $post=$request->post();

            //数据验证
            
            //if( !captcha_check($post['vercode'])){
               // return json(['msg'=>"验证码错误~",'status'=>'0']);
            //}

            $message=UserValidate::Register($post);
            
            if($message !== true){
                 return json(['msg'=>$message,'status'=>'0']);
            }
            

            $res=UserModel::IsRegister($post['email']);

            if(!$res){
                return json(['msg'=>$res,'status'=>'0']);
            }

            $res=UserModel::Register($post['nickname'],$post['password'],$post['email']);

            if($res){
                $data=array(
                    'status'=>"1",
                    'msg'=>"注册成功~",
                    'url'=>url('login/index')
                );
                return json($data);
                
            }else{
                return json(['msg'=>$res,'status'=>'0']);
            }

        }

    }
    #退出#
    public function loginout(){

        
    }


   
}
