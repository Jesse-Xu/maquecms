<?php
namespace app\user\controller;
use app\user\model\UserModel;
use think\Request;
class User extends Common{

	public function initialize(){
      
        //$this->assign('action',);
        $this->assign('userinfo',session('user'));
    }

    #用户中心#
    public function index(Request $request){
            
        if($request->isajax()){
            
            $type=$request->post('type');

            if($type=='news'){
                $list=UserModel::NewsList($request->post('page'));
            }else if($type=='com'){
                $list=UserModel::ComList($request->post('page'));
            }

            $data=array(
                'list'=>$list
            );
            
           return json($data);exit;
        }
        $this->assign('count',UserModel::UserCount());

    	return $this->fetch();

    }
    #用户主页#
    public function home(){

        $this->assign('newslist',UserModel::NewsList());//帖子
        $this->assign('comment',UserModel::ComList()); //最近回复
        return $this->fetch();
    }
    #基本设置# //改这里了
    public function set(Request $request){

        if($request->isget()){
            $info=UserModel::UserInfo();
            $this->assign('info',$info);
            return $this->fetch();
        }else{
            $post=$request->post();

            if(isset($post['password'])){
                $res=UserModel::ModifyPass($post['nowpass'],$post['password']);
            }else{
                $res=UserModel::ModifyUser($post);
            }
              
            if($res!= false ){
                $data=array(
                        'msg'=>'修改成功~',
                        'status'=>'1'
                    );
            }else{
                $data=array(
                        'msg'=>'修改失败~',
                        'status'=>'0'
                    );
            }
            return json($data);
        }
    }
    #我的消息#
    public function message(Request $request){
        if($request->isget()){
            if($request->isajax()){
                $id=$request->param('id');
                if(empty($id)){
                    $data=array(
                        'msg'=>'参数错误，评论删除错误！',
                        'status'=>'0'
                    );
                    return json($data);
                }
                
                $res=UserModel::DelCom($id);

                if($res != false){
                    $data=array(
                        'msg'=>'评论删除成功！',
                        'status'=>'1'
                    );
                }else{
                    $data=array(
                        'msg'=>'评论删除失败！',
                        'status'=>'0'
                    );
                }
                return json($data);
                exit;
            }
            return $this->fetch();
        }else{
            $page=$request->post('page');
            $list=UserModel::MyComList($page);
            $data=array(
                'list'=>$list
            );
            
           return json($data);exit;
        }
    }
    #邮箱激活#
    public function activate(){
        return $this->fetch();
    }
    

   
}
