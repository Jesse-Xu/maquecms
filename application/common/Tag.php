<?php
namespace app\common;
use think\template\TagLib;
use think\facade\Config;

class Tag extends TagLib{
    /**
     * 定义标签列表
     */
    protected $tags   =  [
        // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
        'close'     => ['attr' => 'time,format', 'close' => 0], //闭合标签，默认为不闭合
        'open'      => ['attr' => 'name,type', 'close' => 1], 
        'auth'      => ['attr' => 'action,controller', 'close' => 1], 
        'uedit'     => ['attr'=>'id,name,style,data,imageUrl,imagePath','close' =>0] //定义一个 百度编辑器 标签    
    ];

    /**
     * 这是一个闭合标签的简单演示
     */
    public function tagClose($tag)
    {
        $format = empty($tag['format']) ? 'Y-m-d H:i:s' : $tag['format'];
        $time = empty($tag['time']) ? time() : $tag['time'];
        $parse = '<?php ';
        $parse .= 'echo date("' . $format . '",' . $time . ');';
        $parse .= ' ?>';
        return $parse;
    }
    

    /**
    * 定义一个百度编辑器闭合标签,使用：{tag:Uedit name='content' data="htmlspecialchars_decode($info['content'])"/} 
    * @param string id 元素id
    * @param string name 元素name
    * @param string style 元素样式
    * @param string data 数据
    * @param string imageUrl 提交数据
    * @param string imagePath 图片地址
    * @return string
    * 
    */
    public function tagUedit($tag){

        $id = empty($tag['id']) ? 'content' : $tag['id'];
        $name = empty($tag['name']) ? 'content' : $tag['name'];
        $style = empty($tag['style']) ? 'height:240px;width:100%;' : $tag['style'];
        $data = empty($tag['data']) ? "" : $tag['data'];
        $imageUrl = empty($tag['imageUrl']) ? url('common/fileupload') : $tag['imageUrl'];
        $imagePath = empty($tag['imagePath']) ? "" : $tag['imagePath'];
 
        $parse = '<?php ';
        $parse .= 'echo "<link href=\"__ADMIN__/com/uedit/themes/default/css/umeditor.css\" type=\"text/css\" rel=\"stylesheet\">";';
        $parse .= 'echo "<script type=\"text/javascript\" charset=\"utf-8\" src=\"__ADMIN__/com/uedit/umeditor.config.js\"></script>";';
        $parse .= 'echo "<script type=\"text/javascript\" charset=\"utf-8\" src=\"__ADMIN__/com/uedit/umeditor.js\"></script>";';

        if(!empty($imagePath)){
            $parse .= 'echo "<script type=\"text/javascript\">var um = UM.getEditor(\''.$id.'\',{imageUrl:\''.$imageUrl.'\',imagePath:'.$imagePath.'});</script>";';
        }else{

            //开始oss
            if(Config::get('type.type')=='OSS'){
            
                $parse .= 'echo "<script type=\"text/javascript\">var um = UM.getEditor(\''.$id.'\',{imageUrl:\''.$imageUrl.'\',imagePath:\"\"});</script>";';

            }else{
                //默认
                $parse .= 'echo "<script type=\"text/javascript\">var um = UM.getEditor(\''.$id.'\',{imageUrl:\''.$imageUrl.'\'});</script>";';
            }

        }

        $parse .= 'echo "<script type=\"text/plain\" id=\"'.$id.'\" name=\"'.$name.'\" style=\"'.$style.'\">".'.$data.'."</script>";';

        $parse .= ' ?>';

        return $parse;

    }
    
    /**
     * 这是一个非闭合标签的简单演示
     */
    public function tagOpen($tag, $content)
    {
        $type = empty($tag['type']) ? 0 : 1; // 这个type目的是为了区分类型，一般来源是数据库
        $name = $tag['name']; // name是必填项，这里不做判断了
        $parse = '<?php ';
        $parse .= '$test_arr=[[1,3,5,7,9],[2,4,6,8,10]];'; // 这里是模拟数据
        $parse .= '$__LIST__ = $test_arr[' . $type . '];';
        $parse .= ' ?>';
        $parse .= '{volist name="__LIST__" id="' . $name . '"}';
        $parse .= $content;
        $parse .= '{/volist}';
        return $parse;
    }

    #暂不完善 不可用#
    public function tagAuth($tag, $content){
        if(empty($tag['action']) && empty($tag['controller']) ){
            $parseStr  = '<?php ' . $content . ' ?>';
        }else{
            $parseStr  = '<?php ?>' . $content . '<?php endif; ?>';
        }
        
       
        $parseStr  = '<?php ' . $content . ' ?>';
        return $parseStr;
    }
   
}