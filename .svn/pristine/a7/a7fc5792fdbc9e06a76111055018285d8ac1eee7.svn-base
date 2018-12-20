<?php
namespace app\user\model;

use think\Model;
use think\Db;
use think\facade\Session;

class UserModel extends Model{

  	#用户登陆#
    public static function Login($email,$password){
      
  		$map=array(
  			'email'=>$email,
  			'password'=>md5($password)
  		);

      $info= Db::name('user_list')->where($map)->find();

       	if($info){

          if($info['status']=='0'){
            return "您的账号已被禁用，请联系管理员";
          }

       		Session::set('user',$info);

        	return true;

       	}else{
       		
        	return "账号密码错误，请重试！";

       	}

    }

    #用户是否注册#
    public static function IsRegister($email){
      
      if(Db::name('user_list')->where('email',$email)->count('userid') > 0){
          return "当前用户已经注册";
      }else{
          return true;
      }

    } 

    #用户注册#
    public static function Register($nickname,$password,$email="",$tel=""){

      $data=array(
          'nickname'=>$nickname,
          'password'=>md5($password),
          'email'=>$email,
          'tel'=>$tel,
          'addtime'=>date('Y-m-d H:i:s')
      );

      return Db::name('user_list')->insert($data);

    }
    #用户信息#
    public static function UserInfo($userid=""){
      $userid=empty($userid)?session('user.userid'):$userid;
      return Db::name('user_list')->where('userid',$userid)->find();
    }
    #修改用户资料#
    public static function ModifyUser($data){

      $update=array();

      //邮箱
      if(!empty($data['email'])){
        $update['email']=$data['email'];
      }
      //昵称
      if(!empty($data['nickname'])){
        $update['nickname']=$data['nickname'];
      }
      //手机号
      if(!empty($data['tel'])){
        $update['tel']=$data['tel'];
      }
      //头像
      if(!empty($data['avatar'])){
        $update['avatar']=$data['avatar'];
      }
      //签名
      if(!empty($data['sign'])){
        $update['sign']=$data['sign'];
      }
      
      return Db::name('user_list')->where('userid',session('user.userid'))->update($update);

    }

    #修改密码#
    public static function ModifyPass($password1,$password2){
        
        $where=array(
          'userid'=>session('user.userid'),
          'password'=>$password1
        );
        if(Db::name('user_list')->where($where)->count('userid')=='0'){
          return "旧密码错误";
        }else{
          $update=array(
            'userid'=>session('user.userid'),
            'password'=>md5($password2),
            'uptime'=>date('Y-m-d H:i:s')
        );
          return Db::name('user_list')->update($update);
        }

    }

    #退出登录#
    public static function LoginOut(){
      Session::delete('user');
    }

    #用户发帖#
    public static function Detail($page="1",$num="10",$order="addtime desc"){

    }


    #评论分页#
    public static function Comment1($page="1",$num="10",$order="addtime desc"){
        
        $map=array(
          'userid'=>session('user.userid')
        );
        return Db::name("comment_list")->where($map)->page("$page,$num")->order($order)->select();
    
    }

    #发帖分页#
    public static function NewsList($page="1",$num="10",$order="addtime desc",$field=""){
          
        $field=!empty($field)?$field:"newsid,cateid,catename,title,thumb,hits,hot,top,status,url,pushtime";
        $map=array(
          'authorid'=>session('user.userid'),
        );
        return Db::name("news_list")->where($map)->page("$page,$num")->order($order)->field($field)->select();
    
    }
    #最近回答/评论#
    public static function ComList($page="1",$num="10",$order="addtime desc"){
        
        $map=array(
          array('userid','=',session('user.userid')),
          array('newsid','neq','0'),
          /*'floor'=>array('neq','0'),
          'pid'=>array('neq','0'),*/
        );
        return Db::name("comment_list")->where($map)->page("$page,$num")->order($order)->select();
    
    }
    #回复我的评论#
    public static function MyComList($page="1",$num="10",$order="addtime desc"){
        
        $map=array(
          array('touserid','=',session('user.userid')),
          array('status','=','1')
        );

        $field="id,newsid,newsurl,newsurl,floor,pid,touserid,nickname,addtime";
        return Db::name("comment_list")->where($map)->page("$page,$num")->order($order)->field($field)->select();
    
    }

    #删除评论/修改评论状态#
    public static function DelCom($id){
        $map=array(
          'touserid'=>session('user.userid'),
          'id'=>$id
        );

        $updata=array(
          'status'=>'0',
          'uptime'=>date('Y-m-d H:i:s'),
        );
        return Db::name("comment_list")->where($map)->update($updata);
    }
    #统计#
    public static function  UserCount(){
        $data=array();
        $userid=session('user.userid');
        //帖子
        $data['news']=Db::name('news_list')->where('authorid',$userid)->count('newsid');
        //回复
        $data['com']=Db::name('comment_list')->where('userid',$userid)->count('id');
        return $data;
    }



    
    
}
