<?php
namespace app\api\controller\user;
use think\Controller;
use think\Request;
use think\Db;
use think\facade\Session;
use think\facade\Config;
use app\api\validate\User;

class Index extends Controller{


	public function __construct(Request $request){
        
        $this->request = $request;
  
        parent::__construct();

        //关闭站点
        if(Config::get('site.site.status')=='关闭'){

            exit();
        }
        

    }


    public function cate(){

        $cateid=$this->request->param();
   

        $map[]=array(
            ['status','=','1'],
            ['pushtime','<=',date('Y-m-d H:i:s')]
        );

        if(!empty($param['cateid'])){
            $map[]=['cateid','=',$param['cateid'] ];
        }

        if(!empty($param['keyword'])){
            $map[]=['title','like',"%".$param['keyword']."%"];
        }

        if(!empty($param['pid'])){
            $map[]=['pid','=',$param['pid']];
        }

        $list = Db::name('news_list')->where($map)->paginate(10,true,$param);
        $page = $list->render();

        $this->assign('list',$list);
        $this->assign('page',$page);


    }

    #新闻列表#
    public function lists(){

        $param=$this->request->param();

        $page=!empty($param['page'])?$param['page']:"1";
        $num=!empty($param['num'])?$param['num']:"10";

        $map[]=array(
            ['status','=','1'],
            ['pushtime','<=',date('Y-m-d H:i:s')]
        );

        if(!empty($param['cateid'])){
            $map[]=['cateid','=',$param['cateid'] ];

            $map_cate=array(
                'cateid'=>$param['cateid'],
                'status'=>'1'
            );
            $cateinfo=Db::name('news_cate')->where($map_cate)->find();
            $this->assign('cateinfo',$cateinfo);
        
        }

        if(!empty($param['keyword'])){
            $map[]=['title','like',"%".$param['keyword']."%"];
        }

        if(!empty($param['pid'])){
            $map[]=['pid','=',$param['pid']];
        }

        $list = Db::name('news_list')->where($map)->order('pushtime desc')->page($page,$num)->field('newsid,cateid,catename,title,keyword,description,thumb,abstract,hits,hot,top,authorid,authorname,authorpic,url,iscomment,pushtime')->select(); 

        $count=Db::name('news_list')->where($map)->count('newsid');

        $data=array(
            'list'=>$list,
            'count'=>$count,
            'msg'=>'请求成功',
            'status'=>'200'
        );

        return json_encode($data);
       
    }
    #内容页#
    public function content(){
        
        $newsid=$this->request->param('newsid');
        $cateid=$this->request->param('cateid');

        $map[]=array(
            ['status','=','1'],
            ['pushtime','<',date('Y-m-d H:i:s')]
        );

        if(!empty($newsid)){
            $map[]=['newsid','=',$newsid];
        }


        if(!empty($cateid)){
            $map[]=['cateid','=',$cateid];
        }

        $newsinfo=Db::name('news_list')->where($map)->field('newsid,cateid,catename,title,keyword,description,thumb,abstract,hits,hot,top,authorid,content,photos,files,authorname,authorpic,url,iscomment,pushtime')->find();

        if(!empty($newsinfo)){

            $newsinfo['content']=htmlspecialchars_decode($newsinfo['content']);

            //更新阅读量
            Db::name('news_list')->where($map)->setInc('hits');

            $data=array(
                'info'=>$newsinfo,
                'count'=>'1',
                'msg'=>'请求成功',
                'status'=>'200'
            );

        }else{

            $data=array(
                'info'=>"",
                'count'=>'0',
                'msg'=>'请求成功,暂无内容',
                'status'=>'200'
            );
        }
        

        return json_encode($data);

        

    }

    public function cateinfo(){

        $cateid=$this->request->param('cateid');

        if($cateid){

            $data=array(
                'msg'=>'cateid 不能为空！',
                'status'=>'200'
            );

        }else{

            $map=array(
                'cateid'=>$cateid,
                'status'=>"1"
            );

            $cateinfo=Db::name('news_cate')->where($map_cate)->find();

            $data=array(
                'info'=>$cateinfo,
                'status'=>'200'
            );

        }
        
        return json_encode($data);

    }

    #评论列表#
    public function commentlist(){
        
        $newsid=$this->request->param('newsid','0');
        $floor=$this->request->param('floor','0');
        $order=$this->request->param('order','id');
        $sort=$this->request->param('sort','desc');
        $page=$this->request->param('page','1');
        $num=$this->request->param('num','10');
  

        $map=array(
            'newsid'=>$newsid,
            'floor'=>$floor,
            'status'=>'1'
        );

        $list=Db::name("comment_list")->where($map)->page($page,$num)->order("$order $sort")->select(); 

        $count=Db::name("comment_list")->where($map)->count('id'); 

        foreach ($list as $k => $v) {
            $where=array(
                'floor'=>$v['id'],
                'newsid'=>$newsid,
                'status'=>'1'
            );
            $list[$k]['list']=Db::name("comment_list")->where($where)->limit(0,6)->select();
            
        }


        $data=array(
            'list'=>$list,
            'count'=>$count,
            'msg'=>'请求成功',
            'status'=>'200'
        );

       return json_encode($data);

    }
    #评论#
    public function comment(){
        if($this->request->ispost()){

            $post=$this->request->param();

            $where=array(
                'newsid'=>$post['newsid'],
                'status'=>'1',
                'iscomment'=>'1'
            );
            $count=Db::name('news_list')->where($where)->count('newsid');
            /*if($count=='0' or session('user')== '' ){
                $this->error("评论失败！");
            }*/

            // $validate=User::comment($post);
            
            // if(isset($validate)){
            //     $this->error($validate);
            // }

            if( isset($post['pid']) && $post['pid'] > 0 ){
                $username="随即用户";
                //$username=Db::name("comment_list")->where("id",$post['pid'])->value('username');
                $post['content']="回复给 ".$username."：".$post['content'];
            }

            $user=session('user');

            $post=array(
                'newsid'=>empty($post['newsid'])?"0":$post['newsid'],
                'floor'=>empty($post['floor'])?"0":$post['floor'],
                'pid'=>empty($post['pid'])?"0":$post['pid'],
                'nickname'=>"昵称用户".rand(100,200),//$user['nickname'],
                'userid'=>$user['userid'],
                'avatar'=>"https://www.layui.com/template/xianyan/demo/res/static/images/info-img.png",//$user['headavatar'],
                'content'=>$post['content'],
                'status'=>"1",
                'addtime'=>date('Y-m-d H:i:s')
            );
            $res=Db::name("comment_list")->insert($post);
            if($res!==false){
                $this->success("评论成功~");
            }else{
                $this->error("评论失败~");
            }
            

        }
    }
    
    #站点地图#
    public function sitemap(){
        $map=array(
            'pid'=>'0',
            'status'=>'1'
        );
        $list=Db::name('news_cate')->where($map)->order('cateid desc')->filed('cateid,catename,url')->select();
        if(is_array($list)){
            foreach ($list as $k => $v) {
                $this->GetCateList($v['cateid']);
            }
        }


    }
    
    public function GetCateList($cateid,$arr=array()){
        $map=array(
            'pid'=>$cateid,
            'status'=>'1'
        );
        $list=Db::name('news_cate')->where($map)->order('cateid desc')->filed('cateid,catename,url')->select();
        if(is_array($list)){
            foreach ($list as $k => $v) {
               return $this->GetCateList($v['cateid'],$arr);
            }
        }
    }


   
}
