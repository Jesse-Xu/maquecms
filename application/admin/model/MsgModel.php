<?php
namespace app\admin\model;
use think\Db;

class MsgModel extends BaseModel{


	public function MsgDel($msgid){

		if(empty($msgid)){
			$this->error('msg不存在！');
		}

       return Db::name('msg_list')->where('msgid',$msgid)->delete();

	}
    
    /*添加留言*/
    public function MsgIns($data){

    	$data['addtime']=date('Y-m-d H:i:s',time());
    	return Db::name('msg_list')->strict(false)->insert($data);

    }

    /*修改留言*/
    public function MsgUp($data){

    	 $data['uptime']=date('Y-m-d H:i:s',time());
    	 return Db::name('msg_list')->strict(false)->update($data);

    }




    
}
