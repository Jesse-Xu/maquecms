<?php
namespace app\admin\controller;
use app\admin\model\BaseModel;
use app\admin\validate\BaseValidate;

#@轮播管理@#
class Banner extends Common{

    public $table="banner_list";
    public $pk="bannerid";

    #数据列表#
    public function lists(){

        if($this->request->isGet()){

            //ajax请求
            if($this->request->isAjax()){
                
                $param=$this->request->param();

                echo BaseModel::Page($this->table,$param,"bannerid|link");
               
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
    

    #删除数据#
    public function del(){

        if($this->request->isAjax()){


          $map[$this->pk]=$this->request->param($this->pk);

          $res=BaseValidate::Required($map[$this->pk]);
          if($res) $this->error($res);

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
     

        echo  BaseModel::DataUp($this->table,$post);

        }
    }

}
