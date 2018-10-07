<?php
namespace app\user\validate;
use think\Validate;

class User extends Validate{
   

	#登录#
    public static function Login($data){

		$rule = [
			'email'  => 'require',
			'password'   => 'require',
		];

		$msg = [
			'email.require' => '登录邮箱不能为空',
			'password.require'     => '登录密码不能为空',
			//'password.between'     => '登录密码6-16个字符之间',
		];

		$validate   = Validate::make($rule,$msg);
		$result = $validate->check($data);

		if(!$result) {
			return $validate->getError() ;
		}

		return true;

   }
   #注册#
   public static function Register($data){


   		$rule = [
			'email'  => 'require|email',
			'nickname'  => 'require',
			'password'   => 'require',
			'vercode'   => 'require',
		];

		$msg = [
			'email.require' => '注册邮箱不能为空',
			'email.email' => '注册邮箱格式错误',
			'nickname.require' => '注册昵称不能为空',
			'password.require'     => '注册密码不能为空',
			//'password.between'     => '注册密码6-16个字符之间',
			'vercode.require'     => '验证码不能为空'
		];

		$validate   = Validate::make($rule,$msg);
		$result = $validate->check($data);

		if(!$result) {
			return $validate->getError() ;
		}else{
			return true;
		}
   }
   #评论#
   public static function comment($data){

   		$rule = [
			'content'  => 'require'
		];

		$msg = [
			'content.require' => '评论内容不能为空'
		];

		$validate   = Validate::make($rule,$msg);
		$result = $validate->check($data);

		if(!$result) {
			return $validate->getError() ;
		}

		

   }

}