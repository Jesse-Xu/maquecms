<?php
namespace app\admin\model;
use think\Db;

class 控制器名称Model extends BaseModel{


	public function 控制器名称Del($主键id){

		if(empty($主键id)){
			$this->error('主键id不存在！');
		}

       return Db::name('表名称')->where('主键id',$主键id)->delete();

	}
    
    /*添加控制器名称*/
    public function 控制器名称Ins($data){

    	$data['addtime']=date('Y-m-d H:i:s',time());

    	return Db::name('表名称')->strict(false)->insert($data);

    }

    /*修改控制器名称*/
    public function 控制器名称Up($data){

    	 $data['uptime']=date('Y-m-d H:i:s',time());

    	 return Db::name('表名称')->strict(false)->update($data);

    }




    
}
