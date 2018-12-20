<?php
namespace app\admin\model;
use think\Db;

class UserModel extends BaseModel{


	public function userDel($userid){

		if(empty($userid)){
			$this->error('user不存在！');
		}

       return Db::name('user_list')->where('userid',$userid)->delete();

	}
    
    /*添加user*/
    public function userIns($data){

    	$data['addtime']=date('Y-m-d H:i:s',time());
    	return Db::name('user_list')->strict(false)->insert($data);

    }

    /*修改user*/
    public function userUp($data){

    	 $data['uptime']=date('Y-m-d H:i:s',time());
    	 return Db::name('user_list')->strict(false)->update($data);

    }




    
}
