<?php
namespace app\common;
use think\template\TagLib;
use think\facade\Config;
use think\Db;

/*2018-08-15 01:53*/

class Cms extends TagLib{
    /**
     * 定义标签列表
     */
    protected $tags   =  [
        // 标签定义：    attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
        'close'     =>  ['attr' => 'time,format', 'close' => 0], //闭合标签，默认为不闭合
        'open'      =>  ['attr' => 'name,type', 'close' => 1], 
        'nav'       =>  ['attr' => 'cateid,pid,isnav,order,limit,field', 'close' => 1], //导航 
        'banner'    =>  ['attr' => 'order,limit,field', 'close' => 1], //轮播
        'link'      =>  ['attr' => 'name,order,limit,field', 'close' => 1], //友链
        'news'      =>  ['attr' => 'cateid,newsid,keyword,order,limit,field,hot,top', 'close' => 1], //新闻列表
        'author'    =>  ['attr' => 'name,authorid,px,limit,field', 'close' => 1], //作者列表
        'comment'  =>   ['attr' => 'name,limit,newsid,pid,floor,order,field', 'close' => 1], //评论
        'newsnode'  =>  ['attr' => 'type,cateid,newsid,order,limit,field,hot,top,laber,class,id', 'close' => 0], //新闻节点，上一篇，，下一篇
        'newspage'  =>  ['attr' => 'class,id,text,start,end,laber', 'close' => 0], //翻页，上一页，下一页  
        'mianbaoxie'  =>  ['attr' => 'cateid,newsid,class,id,fengefu,start,end,laber', 'close' => 0], //面包屑 
        'sitemap'  =>  ['attr' => 'class,id,fengefu,start,end,laber', 'close' => 0], //面包屑 

    ];

    public $arr=array();
    #使用办法#
    /* {cms:news name="vs" order="newsid desc" limit='2,3'}
        {$vs['newsid']}__{$vs['title']}<br>
    {/cms:news}
    
    {cms:NewsNode cateid="100" type="next" /}
    */
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
    
     
    public function tagNav($tag, $content){

        $name = $tag['name'];

        $parse = '<?php  $map=array();';

        if(isset($tag["cateid"])){
            $parse .= '$map["cateid"]='.$tag["cateid"].';';
        }
        if(isset($tag["isnav"])){
            $parse .= '$map["isnav"]='.$tag["isnav"].';';
        }

        $parse .= '$map["pid"]=empty($tag["pid"])?"0":$tag["pid"];';

        $parse .= '$map["status"]="1";';

        $order=isset($tag["order"])?$tag["order"]:"cateid asc";
     
        $parse .= '$order="'.$order.'";';

        $parse .= '$field=empty($tag["field"])?"cateid,pid,catename,catethumb,url,isnav":$tag["field"];';
    
        if(isset($tag['limit'])){
            $parse .= '$limit="'.$tag['limit'].'";';
            $parse .= '$list = Db::name(\'news_cate\')->where($map)->order($order)->limit($limit)->select();';
        }else{
            $parse .= '$list = Db::name(\'news_cate\')->where($map)->order($order)->select();';
        }
        
        $parse .= '?>';
        $parse .= '{volist name="list" id="' . $name . '"}';
        $parse .= $content;
        $parse .= '{/volist}';
       
        return $parse;


    }

    #轮播列表#
    public function TagBanner($tag, $content){

        $parse = '<?php ';

        $parse .= '$map["status"]="1";';

        $order=isset($tag["order"])?$tag["order"]:"cateid desc";

        $parse .= '$order="'.$order.'";';

        $parse .= '$field=empty($tag["field"])?"bannerid,src,link":$tag["field"];';
    
        if(isset($tag['limit'])){
            $parse .= '$limit="'.$tag['limit'].'";';
            $parse .= '$list = Db::name(\'banner_list\')->where("status","1")->order($order)->limit($limit)->select();';
        }else{
            $parse .= '$list = Db::name(\'banner_list\')->where("status","1")->order($order)->select();';
        }
        
        $parse .= '?>';
        $parse .= '{volist name="list" id="' . $tag['name'] . '"}';
        $parse .= $content;
        $parse .= '{/volist}';
       
        return $parse;
    }

    #友情链接#
    public function TagLink($tag, $content){

        $parse = '<?php ';

        $order=isset($tag["order"])?$tag["order"]:"px desc";

        $parse .= '$order="'.$order.'";';

        $parse .= '$field=empty($tag["field"])?"linkid,name,link":$tag["field"];';
    
        if(isset($tag['limit'])){
            $parse .= '$limit="'.$tag['limit'].'";';
            $parse .= '$list = Db::name(\'link_list\')->where("status","1")->order($order)->limit($limit)->select();';
        }else{
            $parse .= '$list = Db::name(\'link_list\')->where("status","1")->order($order)->select();';
        }
        
        $parse .= '?>';
        $parse .= '{volist name="list" id="' . $tag['name'] . '"}';
        $parse .= $content;
        $parse .= '{/volist}';
       
        return $parse;
    }
    #作者列表#
    public function TagAuthor($tag, $content){

        $parse = '<?php ';

        $order=isset($tag["order"])?$tag["order"]:"px desc";

        $parse .= '$order="'.$order.'";';

        $parse .= '$field=empty($tag["field"])?"authorid,name,pic":$tag["field"];';
    
        if(isset($tag['limit'])){
            $parse .= '$limit="'.$tag['limit'].'";';
            $parse .= '$list = Db::name(\'news_author\')->where("status","1")->order($order)->limit($limit)->field($field)->select();';
        }else{
            $parse .= '$list = Db::name(\'news_author\')->where("status","1")->order($order)->field($field)->select();';
        }
        
        $parse .= '?>';
        $parse .= '{volist name="list" id="' . $tag['name'] . '"}';
        $parse .= $content;
        $parse .= '{/volist}';
       
        return $parse;
    }
    #评论列表#
    public function TagComment($tag, $content){

        $parse = '<?php $map=array();';

        $order=isset($tag["order"])?$tag["order"]:"id desc";

        $parse .= '$order="'.$order.'";';

        $tag["newsid"]=isset($tag["newsid"])?$tag["newsid"]:input('newsid');

        if(!empty($tag["newsid"])){
            $parse .= '$map[]=["newsid","=",'.$tag["newsid"].'];';
        }

        if(!empty($tag["pid"])){
            $parse .= '$map[]=["pid","=",'.$tag["pid"].'];';
        }

        $floor=isset($tag["floor"])?$tag["floor"]:"0";

        $parse .= '$map[]=["floor","=",'.$floor.'];';

        $parse .= '$map[]=["status","=","1"];';

        $parse .= '$field=empty($tag["field"])?"*":$tag["field"];';

        $parse .= '$limit=!empty($tag["limit"])?$tag["limit"]:"0,10";';
    
        $parse .= '$list = Db::name(\'comment_list\')->where($map)->order($order)->limit($limit)->field($field)->select();';
        
        $parse .= '?>';
        $parse .= '{volist name="list" id="' . $tag['name'] . '"}';
        $parse .= $content;
        $parse .= '{/volist}';
       
        return $parse;
    }
    #新闻列表#
    public function tagNews($tag, $content){

        $name = $tag['name'];

        $parse = '<?php  $map=array();';

        if(isset($tag["cateid"])){
            $parse .= '$map[]=["cateid","=",'.$tag["cateid"].'];';
        }
        if(isset($tag["newsid"])){
            $parse .= '$map[]=["newsid","=",'.$tag["newsid"].'];';
        }
        if(isset($tag["top"])){
            $parse .= '$map[]=["top","=",'.$tag["top"].'];';
        }
        if(isset($tag["hot"])){
            $parse .= '$map[]=["hot","=",'.$tag["hot"].'];';
        }
        if(isset($tag["keyword"])){
            $parse .= '$map[]=["title","like","%'.$tag["keyword"].'%"];';
        }
        $parse .= '$map[]=["status","=","1"];';

        $parse .= '$map[]=["pushtime","<=","'.date('Y-m-d H:i:s').'"];';

        $order=isset($tag["order"])?$tag["order"]:"newsid desc";
     
        $parse .= '$order="'.$order.'";';

        $parse .= '$field=empty($tag["field"])?"newsid,cateid,abstract,catename,title,thumb,authorpic,url,pushtime,hot,top":$tag["field"];';

        if(isset($tag['limit'])){
            $parse .= '$limit="'.$tag['limit'].'";';
            $parse .= '$list = Db::name(\'news_list\')->where($map)->order($order)->limit($limit)->select();';
        }else{
            $parse .= '$list = Db::name(\'news_list\')->where($map)->order($order)->select();';
        }
        
        $parse .= '?>';
        $parse .= '{volist name="list" id="' . $name . '"}';
        $parse .= $content;
        $parse .= '{/volist}';
       
        return $parse;


    }

    #新闻节点 上一篇befor，下一篇after#
    public function tagNewsNode($tag, $content){

        $tag['newsid']=!empty($tag['newsid'])?$tag['newsid']:input('newsid');

        if(isset($tag["newsid"])){
            if($tag['type']=='before'){
                $map[]=["newsid","<",$tag["newsid"]];
            }
            if($tag['type']=='after'){
                $map[]=["newsid",">",$tag["newsid"]];
            }
        }
        if(isset($tag["cateid"])){
            $map[]=["cateid","=",$tag["cateid"]];
        }
        if(isset($tag["top"])){
            $map[]=["top","=",$tag["top"]];
        }
        if(isset($tag["hot"])){
            $map[]=["hot","=",$tag["hot"]];
        }
        
        $map[]=["status","=","1"];

        $map[]=["pushtime","<=",date('Y-m-d H:i:s')];

        $field=empty($tag["field"])?"newsid,cateid,catename,title,thumb,authorpic,url,pushtime,hot,top":$tag["field"];

        $info = Db::name('news_list')->where($map)->field($field)->find();
        
        $info["title"]=empty($info["title"])?"没有更多了":$info["title"];

        $info["url"]=empty($info["url"])?"javascript:;":$info["url"];

        $laber=isset($tag['laber'])?$tag['laber']:"a"; 

        $class=isset($tag['class'])?$tag['class']:""; 

        $id=isset($tag['id'])?$tag['id']:""; 
        
        $parse = '<?php ';

        $parse .= 'echo "<'.$laber.' href=\"'.$info["url"].'\" class=\"'.$class.'\" id=\"'.$id.'\">'.$info["title"].'</'.$laber.'>";';  

        $parse .= ' ?>';
        
        return $parse;

    }

    #翻页 上一页befor，下一页after 模板缓存严重，暂不可用# 
    public function tagNewsPage($tag, $content){

        $param=input();
        //echo $param['page']."<br/><br/>";exit;
        if(isset($tag['newsid']) || isset($param['newsid'])){
            $param['newsid']=!empty($tag['newsid'])?$tag['newsid']:$param['newsid'];
        }

        //上一页
        if($tag['type']=='befor'){
            if($param['page']>=2){
               $param['page']=!empty($param['page'])?$param['page']-1:"1"; 
            }else{
                unset($param['page']);
            }
            
        }else{ //下一页
            $param['page']=!empty($param['page'])?$param['page']+1:"2";
        }
        
        $url=url('',$param);
   
        $laber=isset($tag['laber'])?$tag['laber']:"a"; 

        $class=isset($tag['class'])?$tag['class']:""; 

        $id=isset($tag['id'])?$tag['id']:""; 
        
        $parse = '<?php ';

        $parse .= 'echo "<'.$laber.' href=\"'.url("",$param).'\" class=\"'.$class.'\" id=\"'.$id.'\">'.$tag["text"].'</'.$laber.'>";';  

        $parse .= ' ?>';
        
        return $parse;

    }

    #面包屑导航#
    public function tagMianbaoxie($tag, $content){

        $newsid=!empty($tag['newsid'])?$tag['newsid']:input('newsid');

        $tag['cateid']=!empty($tag['cateid'])?$tag['cateid']:input('cateid');

        $title="";

        if(!empty($newsid) ){

            $map=array(
                'newsid'=>$newsid,
                'status'=>"1"
            );

            $cateinfo=Db::name('news_list')->where($map)->field('newsid,cateid,url,title')->find();
            
            $tag['cateid']=$cateinfo['cateid'];

            $exp=isset($tag['fengefu'])?$tag['fengefu']:"&nbsp;/&nbsp;";

            $laber=isset($tag['laber'])?$tag['laber']:"a"; 

            $class=isset($tag['class'])?$tag['class']:"";

            $title =$exp.'<'.$laber.' href="'.$cateinfo['url'].'" class="'.$class.'">'.$cateinfo['title'].'</'.$laber.'>';

        }

        $text= $this->GetCatePid($tag['cateid'],$tag).$title;

       
        if(isset($tag['start'])){
            $text=$tag['start'].$text;
        }

        if(isset($tag['end'])){
            $text=$text.$tag['end'];
        }

        $parse = "<?php echo '".$text."'; ?>";

        return $parse;

    }


    #站点地图#
    public function tagSitemap($tag, $content){
       
        $catelist=Db::name('news_cate')->where('pid','0')->order('catepx desc')->field('cateid,pid,catename')->select();

        $data=self::getcatelist($catelist);
        //$data=$this->arr;
        
        print_r($data);exit;
        $parse = "<?php echo '".$data."'; ?>";

        return $parse;


    }

    #递归分类数据#
    private function getcatelist($list,$data=array()){
        
        if(is_array($list)){

            foreach ($list as $k => $v) {

                /*$arr=array(
                    'cateid'=>$v['cateid'],
                    
                );*/

                
             
                array_push($data,$v);

                $arr=Db::name('news_cate')->where('pid',$v['cateid'])->order('catepx desc')->field('cateid,pid,catename')->select();

                $list[$k]["list"]=self::getcatelist($arr,$data);
                
            }

            return $list;

        }

        return $data;


    }



    #递归生成导航# 
    protected function GetCatePid($cateid,$tag,$text=""){

        $map[]=["cateid","=",$cateid];
        
        $map[]=["status","=","1"];

        $exp=isset($tag['fengefu'])?$tag['fengefu']:"&nbsp;/&nbsp;";

        $laber=isset($tag['laber'])?$tag['laber']:"a"; 

        $class=isset($tag['class'])?$tag['class']:"";

        $info = Db::name('news_cate')->where($map)->field('cateid,pid,catename,url')->find();

        if($info){

            $text ='<'.$laber.' href="'.$info['url'].'" class="'.$class.'">'.$info['catename'].'</'.$laber.'>'.$exp.$text;
            if($info['pid'] > 0){

                return $this->GetCatePid($info['pid'],$tag,$text);
            }
        }
         
        return  $text;
    }
   
}