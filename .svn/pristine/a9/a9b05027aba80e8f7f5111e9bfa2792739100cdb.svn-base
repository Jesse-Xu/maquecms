<?php
namespace app\admin\model;
use think\Db;

class BannerModel extends BaseModel{


	public function BannerDel($bannerid){

		if(empty($bannerid)){
			$this->error('banner不存在！');
		}

       return Db::name('banner_list')->where('bannerid',$bannerid)->delete();

	}
    
    /*添加banner*/
    public function BannerIns($data){

    	$data['addtime']=date('Y-m-d H:i:s',time());
    	return Db::name('banner_list')->strict(false)->insert($data);

    }

    /*修改banner*/
    public function BannerUp($data){

    	 $data['uptime']=date('Y-m-d H:i:s',time());

    	 return Db::name('banner_list')->strict(false)->update($data);

    }




    
}
