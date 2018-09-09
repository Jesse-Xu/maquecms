<?php
namespace app\admin\controller;
use app\admin\model\BaseModel;

#@留言管理@#
class Msg extends Common{

    public $table="msg_list";
    public $pk="msgid";


    #数据列表#
    public function lists(){

        if($this->request->isGet()){

            //ajax请求
            if($this->request->isAjax()){
                
                $param=$this->request->param();

                echo BaseModel::Page($this->table,$param,"name|sex|tel|email|add|msg|content");
               
                exit;
            }
          
        		return $this->fetch();

        }

    }

    #添加数据#
    public function info(){
        
        if($this->request->isGet()){

            $get=$this->request->param();
            
            if(isset($get[$this->pk])){

                //查询条件
                $map[$this->pk]=$get[$this->pk];

                $info=BaseModel::DataFind($this->table,$map);

                if(!empty($info)){
                    $this->assign('info',$info);
                }
            }

            return $this->fetch();

        }else{ //修改 or 添加

            $post=$param=$this->request->param();
            unset($post['file']);
            //修改
            if(!empty($post[$this->pk])){

               $post['uptime']=date('Y-m-d H:i:s',time());

               $res= BaseModel::DataUp($this->table,$post);

            }else{ //添加

               $post['addtime']=date('Y-m-d H:i:s',time());

               $res= BaseModel::DataIns($this->table,$post);

            }
            
            if($res==true){
                $this->success("操作成功~",url('lists'));
            } else {
                $this->error("操作失败，请重试！");
            }  

        }
    }
    #创建表单#
    public function forminfo(){
        return $this->fetch();
    }
    

    #删除数据#
    public function del(){

        if($this->request->isAjax()){

          $map[$this->pk]=$this->request->param($this->pk);

          echo  BaseModel::DataDel($this->table,$map);

        }
    }

    #修改状态#
    public function up(){

        if($this->request->isAjax()){

        $post= $this->request->param();

        if($post['status']== 'true'){
            $post['status']="1";
        }else{
            $post['status']="0";
        }
     

        echo  BaseModel::DataUp($this->table,$post,'','uptime');

        }
    }

}
