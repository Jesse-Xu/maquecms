<?php
namespace app\admin\model;
use think\Db;

class LinkModel extends BaseModel{


	public function LinkDel($Linkid){

		if(empty($Linkid)){
			$this->error('Linkid不存在！');
		}

       return Db::name('Link_list')->where('Linkid',$Linkid)->delete();

	}
    
    /*添加Link*/
    public function LinkIns($data){

    	$data['addtime']=date('Y-m-d H:i:s',time());

    	return Db::name('Link_list')->strict(false)->insert($data);

    }

    /*修改Link*/
    public function LinkUp($data){

    	 $data['uptime']=date('Y-m-d H:i:s',time());

    	 return Db::name('Link_list')->strict(false)->update($data);

    }




    
}
