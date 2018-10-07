<?php

namespace app\index\validate;
use think\Validate;

class User extends Validate{
   

   public function Login($data){

		$rule = [
			'username'  => 'require',
			'password'   => 'require|',
		];

		$msg = [
			'username.require' => '登录账号不能为空',
			'password.require'     => '登录密码不能为空'
		];

		$validate   = Validate::make($rule,$msg);
		$result = $validate->check($data);

		if(!$result) {
			return $validate->getError() ;
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