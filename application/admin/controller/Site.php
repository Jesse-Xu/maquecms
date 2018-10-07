<?php
namespace app\admin\controller;

use app\admin\model\BaseModel;
use think\facade\Config;
use think\facade\Env;

#@站点设置@#
class Site extends Common{

    #基本设置#
    public function index(){
        if($this->request->isGet()){
          
            $this->assign('info',Config::get('site.site'));
            return $this->fetch();

        }else{

            $data=$this->request->param();
            //print_r($data);exit;
            unset($data['file']);
            
            $r=$this->WriteSite($data,'site');

            if($r){
                $this->success("网站设置修改成功~");
            }else{
                $this->success("网站设置修改失败！");
            }
            
        }
    }
    #水印设置#
    public function water(){

        if($this->request->isGet()){
           
            $this->assign('info',Config::get('site.water'));
        	return $this->fetch();

        }else{

            $data=$this->request->param();

            $r=$this->WriteSite($data,'water');

            //取消单个配置文件
            /*$text="<?php
                return [
                    
                    'water'        => '{$data['water']}', //是否开启水印，text,img
                    'wate_position'=>'{$data['wate_position']}', //水印位置
                    'wate_path'=>'{$data['wate_path']}', //图片位置
                    'wate_transparent'=>'{$data['wate_transparent']}' ,//图片透明度
                    'wate_text'=>'{$data['wate_text']}', //水印文字
                    'text_font'=>'{$data['text_font']}', //水印字体
                    'text_color'=>'{$data['text_color']}' ,//字体颜色
                    'text_size'=>'{$data['text_size']}', //字体大小
                    'file_del'=>'{$data['file_del']}', //文件删除
                    'rukou'=>'{$data['rukou']}', //入口文件
                ];";
                
                $file=Env::get('root_path') ."/config/water.php";
               
                $r=file_put_contents($file, $text);*/
                
                if($r){
                    $this->success("水印设置修改成功~");
                }else{
                    $this->success("水印设置修改失败！");
                }
            
        }

    }

    #上传设置#
    public function upload(){

        if($this->request->isGet()){
             
            $this->assign('info',Config::get('site.upload'));
            return $this->fetch();

        }else{

            $data=$this->request->post();

            $r=$this->WriteSite($data,'upload');

            //取消单个配置文件
            /*$text="<?php
                return [
                    
                    'type'        => '{$data['type']}', //储存位置
                    'OSS'=>array(
                        'key'   =>'{$data['OSS'][key]}',
                        'server'   =>'{$data['OSS'][server]}',
                        'put'   =>'{$data['OSS'][put]}',
                    ),
                    'qiniu'=>array(
                        'key'   =>'{$data['qiniu'][key]}',
                        'server'   =>'{$data['qiniu'][server]}',
                        'put'   =>'{$data['qiniu'][put]}',
                    ),
    
                    'delete'=>'{$data['delete']}', //文件删除
                    'file'=>'{$data['file']}', //允许的上传格式
                    
                ];";
                
                $file=Env::get('root_path') ."/config/upload.php";
               
                $r=file_put_contents($file, $text);*/
                
                if($r){
                    $this->success("网站设置修改成功~");
                }else{
                    $this->success("网站设置修改失败！");
                }
            
        }

    }

    #模板选择#
    public function template(){

        if($this->request->isGet()){
            
            if($this->request->isajax()){
                $list=array();

                $file=Env::get('root_path') ."/application/index/view/";

                $template=(getDir($file));
                
                $now_template=Config::get('template.user_template');

                foreach ($template as $k => $v) {

                    $config="../application/index/view/".$v."/config.php";
                    
                    $info = include($config);
                    
                    $list[$k]['template']=$v;
                    $list[$k]['name']=$info['name'];
                    $list[$k]['img']="../application/index/view/".$v."/cover.jpg";

                    //当前模板
                    if($v==$now_template)  $list[$k]['set']='1';
                }
                
                $data=array(
                    'code'=>'0',
                    'data'=>$list,
                    'count'=>count($list),
                    'msg'=>"请求成功~"
                );
                echo json_encode($data);
                exit;

            }
            return $this->fetch();

        }else{

            $template=$this->request->post('template');
              
            $file=Env::get('root_path') ."/config/template.php";
            $text= file_get_contents($file);
            $config = include($file);
          
            $text=str_replace("{$config['user_template']}","{$template}",$text);
           
            $r=file_put_contents($file, $text);

            if($r){
                echo true;
            }else{
                echo false;
            }

            exit;

            //格式化内容
            //$text="<?php return ".var_export($config, true).";";

        }
    }

    #写入配置文件#
    protected function WriteSite($data,$field){

        $site_file="../config/site.php";
                    
        $arr = include($site_file);

        $arr[$field]=$data;

        $text="<?php return ".var_export($arr, true).";";

        //$file=Env::get('root_path') ."/config/site.php";
       
        return file_put_contents($site_file, $text);

    }
    
}
