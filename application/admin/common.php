<?php

error_reporting(E_ALL ^ E_NOTICE);

#后台数据json格式返回#
function AdminJson($data,$msg="数据请求成功",$status="0"){
	$data=array(
		'data'=>$data,
		'code'=>$status,
		'count'=>count($data),
		'msg'=>$msg
	);

	return json_encode($data);

}
#返回角色对应的菜单#
function RoleMenu(){

	//$roleid="3";//=session('admin.roleid');

	$menu= cache('role_menu_'.session('admin.roleid'));
	
	if(empty($menu)){
		$event = \think\facade\App::controller('Admin/Auth', 'controller');
		echo $event->RoleMenuBuild(session('admin.roleid')); // 输出 菜单
		
	}else{
		echo $menu;
	}

}


