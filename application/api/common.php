<?php
use think\Db;

#导航分类#
function catelists($pid='0',$catepx='asc'){

    $map=array(
        'pid'=>$pid,
        'status'=>'1',
        'isnav'=>'1'
    );

    $list= Db::name('news_cate')->where($map)->order('catepx '.$catepx)->select();

    return $list;
}
#轮播列表#
function bannerlist(){
    return Db::name('banner_list')->where('status','1')->order('px desc')->select(); 
}
#分类列表#
function CateList($pid=""){
    $map=array();
    $map[]=['status','=','1'];
    if(!empty($pid)){
        $map[]=['pid','=',$pid];
    }
    return Db::name('news_cate')->where($map)->order('catepx desc')->select(); 
}
#数据查询#
function datalist($limit='20',$cateid="",$order='addtime desc',$map=''){
    $map['cateid']=empty($cateid)?input('cateid'):$cateid;

    return Db::name('news_list')->where($map)->where('status','1')->order($order)->limit($limit)->select();
}
#新闻#
function newslist($limit='20',$order='newsid desc',$map=''){
    return Db::name('news_list')->where($map)->where('status','1')->order($order)->limit($limit)->select();
}
#分页#
function listpage($cateid="",$page='10',$order='newsid desc'){

    if(empty($cateid)){
        $map=array(
            ['status','=','1'],
            ['pushtime','<=',date('Y-m-d H:i:s')],
        );
    }else{
        $map=array(
            ['cateid','=',$cateid],
            ['status','=','1'],
            ['pushtime','<=',date('Y-m-d H:i:s')],
        );
    }

    return Db::name('news_list')->where($map)->order($order)->paginate($page,false,array(
'query' => ['cateid'=>$cateid]));
}
#排行#
function  newsrank($num='10',$cateid=""){
    if(empty($cateid)){
        $map=array(
            ['status','=','1'],
            ['pushtime','<=',date('Y-m-d H:i:s')],
        );
    }else{
        $map=array(
            ['cateid','=',$cateid],
            ['status','=','1'],
            ['pushtime','<=',date('Y-m-d H:i:s')],
        );
    }
    
    return Db::name('news_list')->where($map)->order('hits desc')->limit($num)->select();
}
#置顶列表#
function  hotlist($num='10',$cateid=""){
    if(empty($cateid)){
        $map=array(
            ['status','=','1'],
            ['pushtime','<=',date('Y-m-d H:i:s')],
        );
    }else{
        $map=array(
            ['cateid','=',$cateid],
            ['status','=','1'],
            ['pushtime','<=',date('Y-m-d H:i:s')],
        );
    }

    $map[]=['hot','=','1'];
    
    return Db::name('news_list')->where($map)->order('pushtime desc')->limit($num)->select();
}
#友情链接#
function linklist(){
    return Db::name('link_list')->where('status','1')->order('px desc')->select(); 
}
#置顶列表#
function  toplist($num='10',$cateid=""){
    if(empty($cateid)){
        $map=array(
            ['status','=','1'],
            ['pushtime','<=',date('Y-m-d H:i:s')],
        );
    }else{
        $map=array(
            ['cateid','=',$cateid],
            ['status','=','1'],
            ['pushtime','<=',date('Y-m-d H:i:s')],
        );
    }

    $map[]=['top','=','1'];
    
    return Db::name('news_list')->where($map)->order('pushtime desc')->limit($num)->select();
}
//上一篇
function news_before($type=''){

    //$map=input('get.');

    $map=array(
        'cateid'=>input('cateid'),
        'newsid'=>array('lt',input('newsid')),
        'status'=>"1"
    );
    $data= db('news_list')->where($map)->field('newsid,title')->order('newsid asc')->find();
    
    if($type=='title'){

        if(empty($data)){
            return "暂时没有内容";
        }
        return $data['title'];

    }else if($type=='link'){

        if(empty($data)){
            return "";
        }

        return url('content',array('cateid'=>$map['cateid'],'newsid'=>$data['newsid']),'html',true);
    }else{
        return array(
            'title'=>empty($data)?'没有更多了':$data['title'],
            'link'=>empty($data)?'javascirpt:;':url('content',array('cateid'=>$map['cateid'],'newsid'=>$data['newsid']),'html',true)
        );
    }
    
}

//下一篇
function  news_next($type=''){

    //$map=input('get.');

    $map=array(
        'cateid'=>input('cateid'),
        'newsid'=>array('gt',input('newsid')),
        'status'=>"1"
    );

    $data= db('news_list')->where($map)->field('newsid,title')->order('newsid asc')->find();
    

    if($type=='title'){

        if(empty($data)){
            return "暂时没有内容";
        }
        return $data['title'];

    }else if($type=='link'){

        if(empty($data)){
            return ""; 
        }

        return url('content',array('cateid'=>$map['cateid'],'newsid'=>$data['newsid']),'html',true);
    }else {
        return array(
            'title'=>empty($data['title'])?'没有更多了':$data['title'],
            'link'=>empty($data)?'javascirpt:;':url('content',array('cateid'=>$map['cateid'],'newsid'=>$data['newsid']),'html',true)
        );
    }
    
}




