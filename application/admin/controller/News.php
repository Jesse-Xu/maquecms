<?php
namespace app\admin\controller;
use think\Db;
use think\facade\Config;
use app\admin\model\ArticleModel;

#@新闻管理@#
#
class News extends Common{

	public $arr=array();

	public $model;

    protected function initialize(){

        $this->model = new \app\admin\model\ArticleModel();
    }
	
    /*开始*/

    #分类列表#
	public function catelist(){
		
		if($this->request->isGet()){

			if($this->request->isajax()){

				$pid=$this->request->param('pid');

				$list = self::GetCateListData($pid);

				$data=array(
					'data'=>$list,
					'code'=>"0",
					'count'=>count($list),
					'msg'=>"请求成功"
				);
				
				echo json_encode($data);
			
				exit;

			}

			$this->assign('catelist',self::GetCateListData());
			return $this->fetch();
		}
	} 

	#分类树#
	public function catetree(){

		$info = array();

		$list = self::GetCateListData();

		foreach ($list as $k => $v) {
			$arr=array(
				'id'=>$v['cateid'],
				'pId'=>$v['pid'], 
				'name'=>str_replace('|------','',trim($v['catename'],chr(0xc2).chr(0xa0))),
				'open'=>true
			);
			array_push($info, $arr);
		}

		$this->assign('info',json_encode($info));

		return $this->fetch();

	}
	#分类信息添加#
	public function cateadd(){
		if($this->request->isGet()){

			//整理后的 所有的菜单
			$catelist=self::GetCateListData();
			
			$cateid=$this->request->param('cateid');

			if($cateid){
				$info=$this->model->DataFind('news_cate',['cateid'=>$cateid]);
				if(empty($info)){
					$this->error("当前信息不存在~");
				}
				$this->assign('info',$info);
			}
			
			$this->assign('modellist',$this->model->ModelList());
			$this->assign('pages',$this->model->GetTemplate());
			$this->assign('catelist',$catelist);
			
			return $this->fetch();

		}else{

			$data=$this->request->post();

			$res = $this->model->CateAdd($data);

			if($res){
				$this->success('分类添加成功~');
			}

			$this->error('分类添加失败~');
			
		}
	}

	#分类信息编辑#
	public function cateedit(){
		if($this->request->isGet()){

			//整理后的 所有的菜单
			$catelist=self::GetCateListData();
			
			$cateid=$this->request->param('cateid');

			if(!$cateid){
				$this->error('cateid不存在');
			}
			
			$info=$this->model->DataFind('news_cate',['cateid'=>$cateid]);
			if(empty($info)){
				$this->error("当前信息不存在~");
			}
			$this->assign('info',$info);

			$this->assign('modellist',$this->model->ModelList());
			$this->assign('pages',$this->model->GetTemplate());
			$this->assign('catelist',$catelist);
			
			return $this->fetch();

		}else if($this->request->isPut()){

			$data=$this->request->put();

			$res = $this->model->CateEdit($data);
			
			if($res==true){
				$this->success("分类修改成功！",url('catelist'));
			}
				
			$this->error("分类修改失败！",url('catelist'));
		}

	}

	#修改分类状态#
	public function cateup(){

		if($this->request->isPut()){

			$data=$this->request->put();

			if($data['value']==='false'){
				$data['value']='0';
			}else{
				$data['value']='1';
			}
			
			$data["cateid"]=$data['cateid'];

			$data[$data['type']]=$data['value'];

			$res = $this->model->CateUp($data);

			if($res==true){
				$this->success("状态修改成功！",url('catelist'));
			}
				
			$this->error("状态修改失败！",url('catelist'));

		}
		
		
	}

	#删除分类#
	public function catedel(){

		if($this->request->isDelete()){
		
			$cateid=$this->request->delete('cateid');

			$res = $this->model->CateDel($cateid);

			if($res){
                $this->success('分类删除成功');
			}

			$this->success('分类删除失败');
		}
	}

	//递归获取所有菜单
	public function getlist($list){
		if(is_array($list)){

			foreach ($list as $k => $v) {
				
				$arr=Db::name('news_cate')->where('pid',$v['cateid'])->order('catepx desc')->field('cateid,pid,catename')->select();

				$list[$k]["list"]=$this->getlist($arr);
				
			}

			return $list;

		}

		return $list;
		
	}

	#分类数据#
	private function getcatelist($list,$num="0"){
		
		if(is_array($list)){

			$num++;

			foreach ($list as $k => $v) {

				$arr=array(
					'catepx'=>$v['catepx'],
					'catethumb'=>$v['catethumb'],
					'cateid'=>$v['cateid'],
					'pid'=>$v['pid'],
					'catename'=>html_entity_decode(str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",$num))."|------ ".$v['catename'],
					'template'=>$v['template'],
					'url'=>$v['url'],
					'isnav'=>$v['isnav'],
					'status'=>$v['status'],
					'addtime'=>$v['addtime']
				);

				array_push($this->arr,$arr);

				$arr=Db::name('news_cate')->where('pid',$v['cateid'])->order('catepx desc')->field('cateid,pid,catepx,catethumb,pid,catename,url,template,addtime,isnav,status')->select();

				$list[$k]["list"]=self::getcatelist($arr,$num);
				
			}

			return $list;

		}

		return $list;
	}	
	


	
	#页面编辑#
	public function pageinfo(){
		if($this->request->isget()){
			
			exit();
			$cateid=$this->request->param('cateid');

			if(empty($cateid)){
				$this->error("当前cateid不存在");
			}

			$info=$this->model->DataFind('news_cate',['cateid'=>$cateid]);
			
			$this->assign('template',$this->dir.$info['template'].'.html');

			return $this->fetch();

		}else{

			$data=input('post.');
			file_put_contents($data['template'], htmlspecialchars_decode($data['pageinfo']));
			$this->success("页面编辑成功~");
		}
	}

	#模型管理#
	public function modellist(){
		if($this->request->isGet()){
			if($this->request->isajax()){

				$param=$this->request->param();

				echo $this->model->Page("news_model",$param);
				exit;

			}

			return $this->fetch();
		}
	}
	
	#模型信息添加#
	public function modeladd(){
		if($this->request->isGet()){

			$modelid=$this->request->param('modelid');

			if($modelid){

				$info=$this->model->DataFind('news_model',['modelid'=>$modelid]);
				if(empty($info)){
					$this->error("当前模型信息不存在~");
				}
				
				$this->assign('info',$info);
			}
				
			//获取所有模型
			$this->assign('templates',$this->model->GetTemplate());
			$this->assign('authorlist',$this->model->AuthorList());

			return $this->fetch();

		}else{

			$data=$this->request->post();

			$res = $this->model->ModelAdd($data);

			if($res==true){
				$this->success("模型添加成功~",url('modellist'));
			}
				
			$this->error("模型添加失败~");
		}
	}
	#模型信息编辑#
	public function modeledit(){
		if($this->request->isGet()){

			$modelid=$this->request->param('modelid');

			if($modelid){

				$info=$this->model->DataFind('news_model',['modelid'=>$modelid]);
				if(empty($info)){
					$this->error("当前模型信息不存在~");
				}
				
				$this->assign('info',$info);
			}
				
			//获取所有模型
			$this->assign('templates',$this->model->GetTemplate());
			$this->assign('authorlist',$this->model->AuthorList());

			return $this->fetch();

		}else if($this->request->isPut()){

			$data=$this->request->put();

			$res = $this->model->ModelEdit($data);

			if($res==true){
				$this->success("模型修改成功~",url('modellist'));
			}
				
			$this->error("模型修改失败~");
			
		}
	}

	#删除模型#
	public function modeldel(){
		if($this->request->isput()){

			$modelid=$this->request->put('modelid');

			$res = $this->model->Modeldel($modelid);

			if($res==true){
				$this->success("模型删除成功~",url('modellist'));
			}
				
			$this->error("模型删除失败~");
		}
	}


	#所有分类数据#
	private function GetCateListData($pid = '0'){

		$catelist=Db::name('news_cate')->where('pid',$pid)->order('catepx desc')->field('cateid,pid,catepx,catethumb,pid,catename,url,template,addtime,isnav,status')->select();

		self::getcatelist($catelist);
			
		return $this->arr;
	}

	#新闻列表#
	public function newslist(){
		if($this->request->isGet()){

			if($this->request->isajax()){

				$param=$this->request->param();
				echo $this->model->NewsPage($param);
				exit;

			}

			$this->assign('authorlist',$this->model->AuthorList());
			$this->assign('catelist',self::GetCateListData());
			return $this->fetch();
		}
	} 

	#添加新闻#
	public function newsadd(){

		if($this->request->isGet()){

			//获取分类对应文件模板
			if($this->request->isajax()){

				$cateid=$this->request->param('cateid');

				if(empty($cateid)){
					$this->error("分类id 不能为空");
				}

				$type=$this->model->CateModelType($cateid);
				
				if($type=='单页模型'){
					$count=Db::name('news_list')->where('cateid',$cateid)->count('newsid');
					if($count>0){
						$this->error("当前类型已经添加过内容，请选择其他分类~");
					}
				}

				$modelinfo=$this->model->CateModel($cateid);

				$map_model=array(
					'modelid'=>$modelinfo['modelid'],
					'status'=>'1'
				);
				
				$data=array();

				$data['pages']=$this->model->GetTemplate($modelinfo['type']);
				$data['modelinfo']=$modelinfo;

				$this->success($data);

				exit;
			}

			$newsid=$this->request->param('newsid');

			if($this->model->DataCount('news_cate',['status'=>'1'],'cateid')=='0'){
				$this->error("请先添加一个分类",url('cateinfo'));
			}
			
			//分类列表
			$catelist=self::GetCateListData();
			$this->assign('catelist',$catelist);
			

			$this->assign('authorlist',$this->model->AuthorList());

			return $this->fetch();
		}else{
			
			$data=$this->request->post();

			//转json
			$data['photos']=json_encode($data['photos']);
			

			$res = $this->model->ArticleAdd($data);
			
			if($res==true){
				$this->success("文章添加成功~",url('modellist'));
			}
				
			$this->error("文章添加失败~");

			
		}
	}
	#文章修改#
	public function newsedit(){

		if($this->request->isGet()){

			//获取分类对应文件模板
			if($this->request->isajax()){

				$cateid=$this->request->param('cateid');

				if(empty($cateid)){
					$this->error("分类id 不能为空");
				}

				$type=$this->model->CateModelType($cateid);
				
				if($type=='单页模型'){
					$count=Db::name('news_list')->where('cateid',$cateid)->count('newsid');
					if($count>0){
						$this->error("当前类型已经添加过内容，请选择其他分类~");
					}
				}

				$modelinfo=$this->model->CateModel($cateid);

				$map_model=array(
					'modelid'=>$modelinfo['modelid'],
					'status'=>'1'
				);
				
				$data=array();

				$data['pages']=$this->model->GetTemplate($modelinfo['type']);
				$data['modelinfo']=$modelinfo;

				$this->success($data);

				exit;
			}

			$newsid=$this->request->param('newsid');

			if($this->model->DataCount('news_cate',['status'=>'1'],'cateid')=='0'){
				$this->error("请先添加一个分类",url('cateinfo'));
			}
			
			//分类列表
			$catelist=self::GetCateListData();

			$this->assign('catelist',$catelist);

						if(!empty($newsid)){

				$info = $this->model->ArticleInfo($newsid);

				if(empty($info)){
					$this->error("当前新闻不存在~");
				}

				$this->assign('info',$info);
				
				$modelinfo=$this->model->CateModel($info['cateid']);

				$pages=$this->model->GetTemplate($modelinfo['type']);

				if($modelinfo['type']==""){
					$pages=array_merge($pages['page'],$pages['category'],$pages['list'],$pages['content']);
				} 

				$this->assign('pages',$pages);
			}

			$this->assign('authorlist',$this->model->AuthorList());

			return $this->fetch();
		}else if($this->request->isPut()){
			
			$post=$this->request->put();


			$r = $this->model->ArticleEdit($post);
	
			$url=Url('news/newslist');

			if($r==true){
				$this->success("新闻修改成功！",$url);
			}

			$this->error("新闻修改失败！",$url);

		}
	}

	#检查是否重复#
	public function pageset(){
		if($this->request->ispost()){
			
			$cateid=$this->request->param('cateid');
			
			$type=$this->model->CateModelType($cateid);
			
			if($type=='单页模型'){
				$count=Db::name('news_list')->where('cateid',$cateid)->count('newsid');
				if($count>0){
					$this->error("当前类型已经添加过内容，请选择其他分类~");
				}
			}

		}
	}

	#删除新闻#
	public function newsdel(){

		if($this->request->isDelete()){

			$newsid=$this->request->delete('newsid');

			$res = $this->model->ArticleDel($newsid);

			if($res){
				$this->success('新闻删除成功！');
			}
			$this->error('新闻删除失败！');

		}
		
	}

	#修改新闻#
	public function newsup(){

		if($this->request->isput()){

			$post=$this->request->put();

			if($post['value']==='false'){
				$post['value']='0';
			}else{
				$post['value']='1';
			}
			
			$data["newsid"]=$post['newsid'];
			$data[$post['type']]=$post['value'];


			$res = $this->model->NewsUp($data);

			if($res){
				$this->success('状态修改成功！');
			}
			$this->error('状态状态失败！');
		}

	}


	#作者管理#
	public function authorlist(){
		if($this->request->isGet()){
			if($this->request->isajax()){

				$param=$this->request->param();

				echo $this->model->Page("news_author",$param);
				exit;

			}

			return $this->fetch();
		}
	}
	#作者信息#
	public function authoradd(){

		if($this->request->isGet()){
	
			return $this->fetch();

		}else{

			$post=$this->request->post();

			$res=$this->model->AuthorAdd($post);
			
			if($res==true){
				$this->success("作者添加成功~",url('authorlist'));
			}else{
				$this->error("作者添加失败~");
			}

			
		}
	}
	#作者信息#
	public function authoredit(){
		if($this->request->isGet()){

			$authorid=$this->request->param('authorid');

			if($authorid){

				$info=$this->model->DataFind('news_author',['authorid'=>$authorid]);
				if(empty($info)){
					$this->error("当前作者信息不存在~");
				}
				
				$this->assign('info',$info);
			}
				
			return $this->fetch();

		}else if($this->request->isPut()){

			$post=$this->request->put();

			$res=$this->model->AuthorEdit($post);

			if($res==true){
				$this->success("作者修改成功~",url('authorlist'));
			}
				
			$this->error("作者修改失败~");
			

		}
	}
	#删除作者#
	public function authordel(){

		if($this->request->isDelete()){

			$authorid=$this->request->delete('authorid');
			
			$res=$this->model->AuthorDel($authorid);

			if($res==true){
				$this->success("作者删除成功~",url('authorlist'));
			}
				
			$this->error("作者删除失败~");
		}
	}
	#修改作者#
	public function authorup(){

		if($this->request->isPut()){

			$post=$this->request->put();

			$data["authorid"]=$post['authorid'];

			$data[$post['type']]=$post['value']==='false'?"0":"1";

			$res =  $this->model->AuthorUp($data);

			if($res==true){
				$this->success("作者状态修改成功~",url('authorlist'));
			}
				
			$this->error("作者状态修改失败~");

		}
		
		
	}


	public function content(){
		if($this->request->isGet()){
			$newsid=input('newsid');
			$newsid=input('newsid');

			$this->assign('title',"文章详情");
			
			if($newsid){
				$map=array(
					'newsid'=>$newsid,
					'newsid'=>$newsid
				);
			}else{
				$map=array(
					'newsid'=>$newsid
				);
			}
			$newstype=Db::name('news_list')->where('newsid',$newsid)->value('newstype');

			if($newstype=='文章模型'&& $newsid==''){
				return $this->fetch('content');
			}
			
			//print_r($newstype);exit;
			

			$info=Db::name('news_list')->where($map)->find();
			
			if($info) $this->assign('info',$info);
				
			return $this->fetch('content');
			exit;

			switch ($newstype) {

				case '单页面':
					

					$info=Db::name('news_list')->where('newsid',$newsid)->find();
					$this->assign('info',$info);
					return $this->fetch('content');
					
					break;

				case '文章模型':
					
					$this->redirect('newslist',array('newsid'=>$newsid));
					exit;

					$list=Db::name('news_list')->where('newsid',$newsid)->order('addtime desc')->select();
					$this->assign('info',$info);
					return $this->fetch('newslist');
				break;
				default:
					# code...
					break;
			}

		}else{


			$data=input('post.');
			unset($data['file']);

			//修改
			if($data['newsid']){

				$r=Db::name('news_list')->update($data);
				
				if($r==true){
					$this->success("修改成功~",url('newslist',array('newsid'=>$data['newsid'])));
				}else{
					$this->error("修改失败~",url('newslist',array('newsid'=>$data['newsid'])));
				}

			//添加
			}else{

				$r=Db::name('news_list')->insert($data);

				if($r==true){
					$this->success("添加成功~",url('newslist',array('newsid'=>$data['newsid'])));
				}else{
					$this->error("添加失败~",url('newslist',array('newsid'=>$data['newsid'])));
				}


			}

		}
	}

	public function getpageinfo(){

		if($this->request->isajax()){
			$cateid=input('cateid');
			$template=Db::name('news_cate')->where('cateid',$cateid)->value('template');
			if(strstr($template,"/")){
				$data=explode("/",$template);
				echo $data[1];
			}else{
				echo $template;
			}
		}
	}

    #评论列表#
	public function comment(){
		if($this->request->isGet()){

			if($this->request->isajax()){

				$param=$this->request->param();

				echo $this->model->CommentPage($param);
				exit;

			}

			return $this->fetch();
		}
	}
	#删除评论#
	public function commentdel(){

		if($this->request->isDelete()){

			$id=$this->request->delete('id');

			$res = $this->model->CommentDel($id);

			if($res){
				$this->success('评论删除成功~');
			}
			$this->error('评论删除失败~');
		}
	}

	#修改评论状态#
	public function commentup(){

		if($this->request->isPut()){

			$post=$this->request->put();
			$data["id"]=$post['id'];
			$data[$post['type']]=$post['value']==='false'?'0':'1';

			$res = $this->model->CommentUp($data);

			if($res){
				$this->success('评论状态修改成功~');
			}
			$this->error('评论状态修改失败~');

		}
		
		
	}

	public function  articlepdf(){

		$newsid = $this->request->param('newsid');
		$type = $this->request->param('type','I');

		$this->model->MakePdf($newsid, $type);

	}




}