<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;
use think\facade\Session;
use think\facade\Config;
use think\facade\Cache;
use app\common\Oss;


class Common extends Controller{

    protected $request;

    public function __construct(){
      
        if(Session::get('admin')=="" && administrator !='麻雀cms'){
            $this->error("请先登录",url('login/index'));
            exit;
        }
              
        //$this->request = Request;

        //放在最后面
        parent::__construct();
      
        $controller=strtolower($this->request->controller());
        $action=strtolower($this->request->action());

        $map=array(
          'controller'=>$controller,
          'action'=>$action,
        );

        $title=Db::name('admin_action')->where($map)->cache(true)->value('name');

        if($this->request->isGet()){
          $method="访问";
          if(!empty($this->request->param())){
            $param=" , 参数：".json_encode($this->request->param());
          }
        }
        if($this->request->ispost()){
          $method="提交";
        }
        if($this->request->isajax()){
          $method="操作";
          if(!empty($this->request->param())){
            $param=" , 参数：".json_encode($this->request->param());
          }
        }

        $content="[".$method."_".$title."] , 控制器：".$controller."/".$action.$param;

        //添加日志
        $this->log($content);

        //权限验证
        if(Session::get('admin.adminid') !="1" &&  administrator !='麻雀cms'){
        
          $this->isauth($map);

        }
        
        $this->assign('title',$title);
        $this->assign('controller',$controller);
        $this->assign('action',$action);
    }

    #空操作#
    /*public function _empty($name){

       echo "这是一个空操作";

    }*/

    #日志#
    public function log($content=""){

      $log=array(
            'adminid'=> administrator =='麻雀cms' ? '': session('admin.adminid'),
            'name'=> administrator =='麻雀cms' ? '': session('admin.nickname'),
            'content'=>$content,
            'addtime'=>date('Y-m-d H:i:s',time())
        );

      Db::name('admin_log')->insert($log);
      
    }
    #权限验证#
    private function  isauth($data){

      $roleid=session('admin.roleid');

      $auth=Cache::get('role_auth_'.$roleid);

        if(empty($auth)){
          $map=array(
            'roleid'=>$roleid,
            'status'=>'1'
          );
          $res=Db::name('admin_role')->where($map)->value('auth');
          $auth=json_decode($res,true);
          Cache::set('role_auth_'.$roleid,$auth);
        }

        if(!is_array($auth[$data['controller']]) || !in_array($data['action'],$auth[$data['controller']]) ){
            $this->error("访问权限不足~");
        }

    }

    public function index(){
       
       if($this->request->isGet()){

          echo "公共模块";

       }else{

       }

    }


  #文件上传#
  public function fileupload(){

    if(request()->ispost()){
     
      $editorid=$this->request->param('editorid'); // 百度编辑器
      $width=$this->request->param('width'); //图片宽度
      $height=$this->request->param('height'); //图片高度
      $other=$this->request->param('other'); // 其他
      $isvalidate=$this->request->param('isvalidate'); // 格式验证
      $notwater=$this->request->param('notwater'); //任何参数不带水印
      $type=$this->request->param('type');
      $catalog=$this->request->param("catalog","file");

      
      if(isset($editorid)){ //百度编辑器
        $file = request()->file('upfile');
      }else{
        $file = request()->file('file');
      }


      //文件上传路径
      //$file_up_path=ROOT_PATH . 'public' . DS . 'uploads'. DS .$catalog;
      $Env=new \think\facade\Env;

      $file_up_path= $Env::get('root_path').'/public/uploads/';
      
      //创建目录
      if(!is_dir($file_up_path)) mkdir($file_up_path,0777,true); 

      $validate=Config::get('upload.file');

      /*if(!empty($validate) && empty($isvalidate)){//验证
        $info = $file->validate(['size'=>15678000,'ext'=>$validate])->move($file_up_path);
      }else{
        $info = $file->move($file_up_path);
      }*/

      $info = $file->move($file_up_path);
     
      //规则验证失败~
      if($info=== false){
        $this->error("上传出错");
      }

      $path="./uploads/" .str_replace('\\','/',$info->getSaveName());  

      $img_type=['jpeg','jpg','png','gif'];
      //如果是图片
      if(in_array($info->getExtension(),$img_type)){
          //修改图片宽高
          if(!empty($width) || !empty($height)){
            $image = \think\Image::open($path);
            $image->thumb($width, $height,\think\Image::THUMB_CENTER)->save($path);
          }

          $water=Config::get('water.');

         //水印

        if($water['water']!='0' && empty($notwater)){
         
          if($water['water']=='img'){

              $image = \think\Image::open($path);
              $image->water(".".$water['wate_path'],$water['wate_position'],$water['wate_transparent'])->save($path);
          
          }else if($water['water']=='text'){

              $image = \think\Image::open($path);
              $font=$water['text_font'];
              $image->text($water['wate_text'],$font,$water['text_size'],$water['text_color'])->save($path);
          
          }

        }

      }


      //上传到oss
      if(Config::get('upload.type')=='OSS'){

          $Oss=new Oss;
          $filename=md5($path).".".$info->getExtension();
          $res=$Oss->LoadFile($filename,'.'.$path);
          $url=$res['oss-request-url'];
         
      }

      $path=substr($path,1);
     
      //编辑器上传
      if(!empty($editorid) ){

          if($info){

              $json=array(
                'originalName'=>$info->getInfo()['name'],
                'name'=>$info->getSaveName(),
                'url'=>isset($url)?$url:'/../../../../../..'.$path,
                'size'=>$info->getInfo()['size'],
                'type'=>".".$info->getExtension(),
                'state'=>"SUCCESS"
              );

              
              
          }else{ //失败提醒

              $data=array(
                'state'=>"ERROR"
              );

              echo json_encode($data);exit;
          }
        
      } else { //正常上传
          
          $json=array(
            'path'=>isset($url)?$url:$path,
            'status'=>'1',
            'filename'=>$info->getInfo()['name'] //文件原来的名称
          );

      }

        //return json($file->getError());
        if(isset($url)){
          unset($info);
          unlink(".".$path);
        }
        echo json_encode($json);exit;


      }else{
        $this->error("当前页面不存在~");
      }
  
  }

  #删除文件#
  public function removefile($file=""){
    
    $config=Config::get('site');

    if($config['delete']=='1'){
      
      if($config['type']=='本地'){
        @unlink($file);
      }else if($config['type']=='qiniu'){

      }else if($config['type']=='OSS'){

      }

    }

  }
 

}
