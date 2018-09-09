<?php
namespace app\admin\model;
use think\Db;

class CateModel extends BaseModel{



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
		$pid=empty($param['limit'])?"0":$param['limit'];

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

		$map[]=['cate.pid','=',$pid];
		
		$list=Db::name('cate_list')->alias('cate')->join(config('database.prefix').'model_list model','cate.modelid=model.modelid' )->where($map)->order('cate.cateid desc')->field('cate.*,model.name as modelname')->page($page.','.$limit)->select();
		
		$data=array(
			'data'=>$list,
			'code'=>"0",
			'count'=>Db::name('cate_list')->alias('cate')->join(config('database.prefix').'model_list model','cate.modelid=model.modelid' )->where($map)->count(),
			'msg'=>"请求成功"
		);

		return json_encode($data);
	

    }

	



    
	
    
    
}
