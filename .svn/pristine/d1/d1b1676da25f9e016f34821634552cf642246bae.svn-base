<?php
namespace app\admin\controller;

use app\admin\model\IndexModel;
use think\Controller;
use think\facade\Cache; //use think\Cache; 报错？
use think\facade\Config;
use think\facade\App;
use think\Db;
use think\facade\Session;

#@后台主页@#
class Index extends Common{


	#初始化操作#
	protected function initialize(){

    }

    public function index(){
    
        if($this->request->isGet()){

          return $this->fetch();

        }else{

          $post=$this->request->param();
           
          if(isset($post['type'])){
            echo IndexModel::Statistics($post['type']);
          }else if(isset($post['start']) && isset($post['end'])){
          
            echo IndexModel::Statistics("",$post['start'],$post['end']);
          }
         

        }

    }

    #清空缓存#
    public function delcache(){
        Cache::clear();
        //删除文件？ 
        array_map( 'unlink', glob( temp.DS.'.php' ) );
       
        

        $this->success("缓存清理成功~");
    }
    #服务器信息#
    public function serverinfo(){

        $config=Config::get('database.'); 

        $con=mysqli_connect($config['hostname'], $config['username'], $config['password']);

        $info = array(
          '操作系统'=>PHP_OS,
          '运行环境'=>$_SERVER["SERVER_SOFTWARE"],
          'PHP服务器版本'=>PHP_VERSION,
          'Mysql版本'=>mysqli_get_server_info($con),
          'PHP运行方式'=>php_sapi_name(),
          'ThinkPHP版本'=>  App::version(),
          '上传附件限制'=>ini_get('upload_max_filesize'),
          '执行时间限制'=>ini_get('max_execution_time').'秒',
          '服务器时间'=>date("Y年n月j日 H:i:s"),
          '北京时间'=>gmdate("Y年n月j日 H:i:s",time()+8*3600),
          '服务器域名/IP'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]',
          //'剩余空间'=>function_exists(disk_free_space)?round((disk_free_space(".")/(1024*1024)),2).'M':'未知',
          'register_globals'=>get_cfg_var("register_globals")=="1" ? "ON" : "OFF",
          'magic_quotes_gpc'=>(1===get_magic_quotes_gpc())?'YES':'NO',
          'magic_quotes_runtime'=>(1===get_magic_quotes_runtime())?'YES':'NO',

        );

        $this->assign('info',$info);

        return $this->fetch();
    }



}
