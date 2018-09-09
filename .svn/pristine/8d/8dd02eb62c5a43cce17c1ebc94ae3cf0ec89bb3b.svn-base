<?php
namespace app\admin\model;
use think\Db;

class NewsModel extends BaseModel{



	/*
	* 分类接口
	* @access public
	* @param  string    $table 表名
	* @param  string    $param 分页请求条件
	* @param  string    $key   like查询字段
	* @param  string    $order 默认排序方式
	* @param  string    $time  默认时间查询字段
	* @param  string    $type  返回数据类型
	* @return mixed
	*/
    public static function CatePage($param){

		$page=!empty($param['page'])?$param['page']:"1";
		$limit=!empty($param['limit'])?$param['limit']:"10";
		//$pid=empty($param['pid'])?"0":$param['pid'];
		$pid=empty($param['pid'])?"":$param['pid'];

		$map="";

		if(!empty($param['cateid'])){
			$map[]=['cate.cateid','=',$param['cateid']];
		}
		if(!empty($keyword)){
			$map[]=['cate.title|cate.keyword|cate.description|cate.content|cate.catename','like',"%$keyword%"];
		}
		
		if(!empty($param['start']) && empty($param['end'])){
	
			$map[]=['cate.addtime','>=',$param['start']];

		} else if(!empty($param['end']) && empty($param['start'])){

			$map[]=['cate.addtime','<=',$param['end']];

		} else if(!empty($param['start']) && !empty($param['end'])){

			$map[]=['cate.addtime','between',[$param['start'],$param['end']]];

		}

		unset($param['start']);
		unset($param['end']);

		if(!empty($pid)){
			$map[]=['cate.pid','=',$pid];
		}

		
		

		$list=Db::name('news_cate')->alias('cate')->leftJoin (config('database.prefix').'news_model model','cate.modelid=model.modelid' )->where($map)->order('cate.cateid desc')->field('cate.*,model.name as modelname')->page($page.','.$limit)->select();
		
		$data=array(
			'data'=>$list,
			'code'=>"0",
			'count'=>Db::name('news_cate')->alias('cate')->leftJoin (config('database.prefix').'news_model model','cate.modelid=model.modelid' )->where($map)->count(),
			'msg'=>"请求成功"
		);

		return json_encode($data);
	

    }

	/*
	* 新闻分页接口
	* @access public
	* @param  string    $table 表名
	* @param  string    $param 分页请求条件
	* @param  string    $key   like查询字段
	* @param  string    $order 默认排序方式
	* @param  string    $time  默认时间查询字段
	* @param  string    $type  返回数据类型
	* @return mixed
	*/
    public static function NewsPage($param){

		$page=!empty($param['page'])?$param['page']:"1";
		$limit=!empty($param['limit'])?$param['limit']:"10";
		$pid=empty($param['pid'])?"0":$param['pid'];

		$map="";

		if(!empty($param['cateid'])){
			$map[]=['news.cateid','=',$param['cateid']];
		}
		if(!empty($param['authorid'])){
			$map[]=['author.authorid','=',$param['authorid']];
		}
		if(!empty($pid)){
			$map[]=['news.pid','=',$pid];
		}
		if(!empty($param['keyword'])){
			$keyword=$param['keyword'];
			$map[]=['news.title|news.keyword|news.description|cate.catename','like',"%$keyword%"];
		}
		
		if(!empty($param['wheretype'])){
			switch ($param['wheretype']) {
				case 'ishot':
					$map[]=['news.hot','=','1'];
					break;
				case 'nohot':
					$map[]=['news.hot','=','0'];
					break;
				case 'istop':
					$map[]=['news.top','=','1'];
					break;
				case 'notop':
					$map[]=['news.top','=','0'];
					break;
				case 'isstatus':
					$map[]=['news.status','=','1'];
					break;
				case 'nostatus':
					$map[]=['news.status','=','0'];
					break; 
				case 'caogao':
					$map[]=['news.status','=','-1'];
					break; 
				
			}
			
		}

		if(!empty($param['start']) && empty($param['end'])){
	
			$map[]=['news.addtime','>=',$param['start']];

		} else if(!empty($param['end']) && empty($param['start'])){

			$map[]=['news.addtime','<=',$param['end']];

		} else if(!empty($param['start']) && !empty($param['end'])){

			$map[]=['news.addtime','between',[$param['start'],$param['end']]];

		}

		unset($param['start']);
		unset($param['end']);


		$list=Db::name('news_list')
		->alias('news')
		->leftJoin(config('database.prefix').'news_cate cate','news.cateid=cate.cateid' )
		->leftJoin(config('database.prefix').'news_author author','news.authorid=author.authorid' )
		->where($map)->order('news.newsid desc')
		->field('news.*,cate.catename,author.name as authorname')
		->page($page.','.$limit)
		->select();
		

		foreach ($list as $k => $v) {
			$list[$k]['count']['comment']=Db::name('comment_list')->where("newsid",$v['newsid'])->count('id');
			$list[$k]['count']['file']=Db::name('comment_list')->where("newsid",$v['newsid'])->count('id');
			$list[$k]['count']['img']=Db::name('comment_list')->where("newsid",$v['newsid'])->count('id');
		}
		
		$data=array(
			'data'=>$list,
			'code'=>"0",
			'count'=>Db::name('news_list')->alias('news')->leftJoin (config('database.prefix').'news_cate cate','news.cateid=cate.cateid' )->leftJoin(config('database.prefix').'news_author author','news.authorid=author.authorid' )->where($map)->count(),
			'msg'=>"请求成功"
		);

		return json_encode($data);
	

    }

    #模型列表#
    public static function ModelList(){
    	return Db::name('news_model')->order('px desc')->select();
    }
    #作者列表#
    public static function AuthorList($field="*"){
    	return Db::name('news_author')->where('status','1')->order('px desc')->field($field)->select();
    }
    #获取模型类型#
    public static function CateModelType($cateid){
    	return Db::name('news_cate')
		->alias('c')
		->leftJoin('news_model m','c.modelid = m.modelid')
		->where('c.cateid',$cateid)
		->value('m.type');
    }
        /*
	* 根据cateid显示模型信息
	* @access public
	* @param  string    $table 表名
	* @param  array     $where  条件
	* @return bool
	*/
    public static function CateModel($cateid){

    	$map=array(
    		'cate.cateid'=>$cateid,
    		'cate.status'=>"1",
    		'model.status'=>"1"
    	);
    
    	return Db::name('news_cate')
		->alias('cate')
		->where($map)
		->join('news_model model','cate.modelid = model.modelid')
		->field("model.*")
		->find();

    }

    #评论分页#
    public static function CommentPage($param){

		$page=!empty($param['page'])?$param['page']:"1";
		$limit=!empty($param['limit'])?$param['limit']:"10";


		$map="";

		if(!empty($param['newsid'])){
			$map[]=['comment.newsid','=',$param['newsid']];
		}

		if(!empty($param['keyword'])){
			$map[]=['comment.content|comment.id|comment.nickname|comment.newsid|news.title','like',"%".$param['keyword']."%"];
		}

		if(!empty($param['start']) && empty($param['end'])){
	
			$map[]=['comment.addtime','>=',$param['start']];

		} else if(!empty($param['end']) && empty($param['start'])){

			$map[]=['comment.addtime','<=',$param['end']];

		} else if(!empty($param['start']) && !empty($param['end'])){

			$map[]=['comment.addtime','between',[$param['start'],$param['end']]];

		}

		$list=Db::name('comment_list')->alias('comment')->leftJoin (config('database.prefix').'news_list news','comment.newsid=news.newsid' )->where($map)->order('comment.id desc')->field('comment.*,news.title,news.url')->page($page.','.$limit)->select();
		
		$data=array(
			'data'=>$list,
			'code'=>"0",
			'count'=>Db::name('comment_list')->alias('comment')->leftJoin (config('database.prefix').'news_list news','comment.newsid=news.newsid' )->where($map)->count(),
			'msg'=>"请求成功"
		);

		return json_encode($data);
	

    }

    #获取所有页面模板#
    public static function GetTemplate($type=""){

    	$Env=new \think\facade\Env;

    	$dir=$Env::get('root_path')."application/index/view/".config('template.user_template')."/index/";
    	
    	if(!is_dir($dir)){
    		return "";
    	}

		$template=array("page"=>array(),"category"=>array(),"list"=>array(),"content"=>array() );
		
	    foreach (scandir($dir) as $k => $v) {

	    	//单页
	       if(preg_match("/page_(.*?).html/",$v,$r)==true){
	            array_push($template['page'],str_replace(".html","",$v));
	        //栏目
	       }else if(preg_match("/category_(.*?).html/",$v,$r)==true){ //
	       		array_push($template['category'],str_replace(".html","",$v));
	        //列表页
	       }else if(preg_match("/list_(.*?).html/",$v,$r)==true){
	       		array_push($template['list'],str_replace(".html","",$v));
	        //内容页
	       }else if(preg_match("/content_(.*?).html/",$v,$r)==true){
	       		array_push($template['content'],str_replace(".html","",$v));
	       }

	    }
	    if($type=="单页类型"){
	    	return $template['page'];
	    }
	    if($type=="列表类型"){
	    	return $template['content'];
	    }
	    
	    return $template;
    }



   
	
    
    
}
