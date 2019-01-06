<?php
namespace app\admin\model;
use think\Db;
use think\facade\Env;

class ToolModel extends BaseModel{


    #创建curd#
	public function CurlAdd($data=""){

        if(empty($data['controller'])){
            $this->error("控制器不能为空！");
        }
        if(empty($data['tablename'])){
            $this->error("表名不能为空！");
        }
        if(empty($data['keyname'])){
            $this->error("表主键名称不能为空！");
        }
   

        $BasePath=Env::get('app_path')."/admin/";
        
        if(file_exists($BasePath."model/".ucwords($data['controller'])."Model.php")){
            $this->error("当前控制器模型名称文件已经存在，请重新输入控制器名称！");
        }

        if(file_exists($BasePath."controller/".ucwords($data['controller']).".php")){
            $this->error("当前控制器文件已经存在，请重新输入控制器名称！");
        }


        //获取并替换控制器名称
       // $Controller = file_get_contents($BasePath."copy/Controller.php");

        $file = $BasePath."controller/
            ".ucwords($data['controller']).".php";
        $copy_file =file_get_contents($BasePath."copy/Controller.php");


        $data =str_replace(array("控制器名称","主键id","表名","搜索条件"),array(ucwords($data['controller']),$data['keyname'],$data['tablename'],$data['search']),$copy_file );



//echo $file;exit;
$file = str_replace('\/', '/', $file);

$source = iconv("UTF-8","GBK//IGNORE",'000000');

//file_put_contents($file, "sss");exit;
$f = fopen($file, "w");
fwrite($f, $source);
exit;
        file_put_contents($file, iconv("UTF-8","GB2312//IGNORE","aaaaaa"));
        exit;
       //echo $file;exit;
  
        //控制器
        $res_controller=file_put_contents($file, $data);
        exit;
        //模型
        $res_model=file_put_contents($BasePath."model/
            ".ucwords($data['controller'])."Model.php", str_replace(array("控制器名称","表名称","主键id"),array(ucwords($data['controller']),$data['tablename'],$data['keyname']),file_get_contents($BasePath."copy/Model.php") ));


        if($res_controller && $res_model){
            $this->success("控制器模型创建成功~");
        }

        $this->error("创建失败");


	}
    
   



    
}
