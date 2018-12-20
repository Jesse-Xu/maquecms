<?php
namespace app\admin\model;
use think\Db;

class AuthModel extends BaseModel{


	/*
	* 分类接口
	* @access public
	* @param  string    $table 表名
	* @param  string    $param 分页请求条件
	* @param  string    $key   like查询字段
	* @param  string    $order 默认排序方式
	* @param  string    $time  默认时间查询字段
	* @param  string    $type  返回数据类型
	* @return mixed
	*/
    public static function AdminPage($param){

		$page=!empty($param['page'])?$param['page']:"1";
		$limit=!empty($param['limit'])?$param['limit']:"10";
	
		$map="";

	
		if(!empty($keyword)){
			$map[]=['admin.username|admin.nickname','like',"%$keyword%"];
		}
		
		if(!empty($param['start']) && empty($param['end'])){
	
			$map[]=['admin.addtime','>=',$param['start']];

		} else if(!empty($param['end']) && empty($param['start'])){

			$map[]=['admin.addtime','<=',$param['end']];

		} else if(!empty($param['start']) && !empty($param['end'])){

			$map[]=['admin.addtime','between',[$param['start'],$param['end']]];

		}

		unset($param['start']);
		unset($param['end']);


		$list=Db::name('admin_list')->alias('admin')->leftJoin(config('database.prefix').'admin_role role','admin.roleid=role.roleid' )->where($map)->order('admin.adminid desc')->field('admin.*,role.name as rolename')->page($page.','.$limit)->select();
		
		$data=array(
			'data'=>$list,
			'code'=>"0",
			'count'=>Db::name('admin_list')->alias('admin')->leftJoin(config('database.prefix').'admin_role role','admin.roleid=role.roleid' )->where($map)->count(),
			'msg'=>"请求成功"
		);

		return json_encode($data);
	

    }

	/*
	* 角色列表
	* @access public
	* @param  string    $field 查询字段
	* @param  string    $order 默认排序方式
	* @param  string    $type  返回数据类型
	* @return mixed
	*/
    public static function Rolelist($field="*",$order="px desc"){

    	return Db::name("admin_role")->where(['status'=>"1"])->order($order)->field($field)->select();
		
    }
    /*
	* 权限列表
	* @access public
	* @param  string    $field 查询字段
	* @param  string    $order 默认排序方式
	* @param  string    $type  返回数据类型
	* @return mixed
	*/
    public static function ActionList($where="",$field="*",$order="px desc"){

    	return Db::name("admin_action")->where($where)->order($order)->field($field)->select();
		
    }

    #所有权限操作分组#
	public static function ActionGroupList(){

		$list=Db::name("admin_action")->where(['type'=>"控制器",'status'=>"1"])->order('px desc')->select();
		foreach ($list as $k => $v) {
			$list[$k]['list']=Db::name("admin_action")->where(['type'=>"操作",'status'=>"1",'pid'=>$v['actionid']])->order('px desc')->select();
		}

		return $list;
	}

	#管理员信息#
	public function AdminInfo($adminid){

		if(empty($adminid)){
			$this->error('adminid 不能为空');
		}
		return $this->DataFind('admin_list',['adminid'=>$adminid]);
		
	}

	#添加管理员#
	public function AdminAdd($data){

		$data['status']=empty($data['status'])?"0":$data['status'];

		if(empty($data['roleid'])){
			$this->error("请选择管理员所属角色~");
		}

		$map=array(
			'username'=>$data['username']
		);
		
		if($this->DataCount('admin_list',$map,"adminid")>0){
			$this->error("当前账号已经存在~");
		}

		$map=array(
			'nickname'=>$data['nickname']
		);

		if($this->DataCount('admin_list',$map,"adminid")>0){
			$this->error("当前管理员名称已经存在~");
		}
		
		if($data['password']==""){
			$this->error("请输入管理员密码！");
		}

		$data['password']=md5($data['password']);

		return $this->DataIns("admin_list",$data,'addtime');
	}

	#编辑管理员#
	public function AdminEdit($data){

		$data['status']=empty($data['status'])?"0":$data['status'];

		if(empty($data['roleid'])){
			$this->error("请选择管理员所属角色~");
		}

		if($data['adminid']=="1"){
			$this->error("超级管理员不可修改！！");
		}

		$map=array(
			['nickname','=',$data['nickname']],
			['adminid','neq',$data['adminid']],
		);
	
		if($this->DataCount('admin_list',$map,'adminid') > 0){
			$this->error("当前管理员名称已经存在~");
		}

		$map=array(
			['username','=',$data['username']],
			['adminid','neq',$data['adminid']],
		);
	
		if($this->DataCount('admin_list',$map,'adminid') > 0){
			$this->error("当前账号已经存在~");
		}

		if($data['password']==""){
			unset($data['password']);
		}else{
			$data['password']=md5($data['password']);
		}

		return $this->DataUp("admin_list",$data,'','uptime');
	}

	#修改状态#
	public function AdminUp($data){

		return  $this->DataUp('admin_list',$data,'','uptime');

	}

	#删除管理员#
	public function AdminDel($adminid){

		if(empty($adminid)){
			$this->error("adminid 不能为空~");
		}

		return  $this->DataDel('admin_list',['adminid'=>$adminid]);
	}

	#角色信息#
	public function RoleInfo($roleid){

		if(empty($roleid)){
			$this->error("roleid 不能为空~");
		}

		return $this->DataFind('admin_role',['roleid'=>$roleid]);
	}

	#编辑角色#
	public function RoleEdit($data){

		$data['status']=empty($data['status'])?"0":$data['status'];

		$map=array(
			['name','=',$data['name']],
			['roleid','neq',$data['roleid']],
		);

		if($this->DataCount('admin_role',$map,"name") > 0){
			$this->error("当前角色名称已经存在~");
		}

		return $this->DataUp("admin_role",$data,'','uptime');

	}

	#添加角色#
	public function RoleAdd($data){

	}

	#删除角色#
	public function  RoleDel($roleid){

		if(empty($roleid)){
			$this->error("roleid 不能为空~");
		}

		return $this->DataDel('admin_role',['roleid'=>$roleid]);

	}

	#修改状态#
	public function RoleUp($data){

		return $this->DataUp('admin_role',$data,'','uptime');

	}


	#权限信息#
	public function ActionInfo($actionid){

		if(empty($actionid)){
			$this->error('actionid 不能为空');
		}
		return $this->DataFind('admin_action',['actionid'=>$actionid]);
		
	}

	#添加权限#
	public function ActionAdd($data){

		$data['status']=empty($data['status'])?"0":$data['status'];

		return $this->DataIns("admin_action",$data,'addtime');
	}

	#编辑权限#
	public function ActionEdit($data){

		$data['status']=empty($data['status'])?"0":$data['status'];
			
		return $this->DataUp("admin_action",'',$data,'uptime');
	}

	#修改状态#
	public function ActionUp($data){


		return  $this->DataUp('admin_action',$data,'','uptime');

	}

	#删除权限#
	public function ActionDel($actionid){

		if(empty($actionid)){
			$this->error("actionid 不能为空~");
		}

		return  $this->DataDel('admin_action',['actionid'=>$actionid]);
	}
 

  	#菜单信息#
	public function MenuInfo($menuid){

		if(empty($menuid)){
			$this->error('menuid 不能为空');
		}
		return $this->DataFind('admin_menu',['menuid'=>$menuid]);
		
	}

	#添加菜单#
	public function MenuAdd($data){

		$data['status']=empty($data['status'])?"0":$data['status'];

		return $this->DataIns("admin_menu",$data,'addtime');
	}

	#编辑菜单#
	public function MenuEdit($data){

		$data['status']=empty($data['status'])?"0":$data['status'];
			
		return $this->DataUp("admin_menu",'',$data,'uptime');
	}

	#修改状态#
	public function MenuUp($data){


		return  $this->DataUp('admin_menu',$data,'','uptime');

	}

	#删除菜单#
	public function MenuDel($menuid){

		if(empty($menuid)){
			$this->error("menuid 不能为空~");
		}

		return  $this->DataDel('admin_menu',['menuid'=>$menuid]);
	}

	
    
    
}
