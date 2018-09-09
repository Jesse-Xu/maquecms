<?php
namespace app\admin\controller;
use think\Db;
use think\facade\Config;

use app\admin\model\NewsModel;
use app\admin\validate\NewsValidate;
#@新闻管理@#
class News extends Common{

	public $arr=array();

	#初始化操作#
  	protected function initialize(){

    }
	
	
    /*开始*/

    #分类列表#
	public function catelist(){
		if($this->request->isGet()){

			if($this->request->isajax()){

				$param=$this->request->param();
				echo NewsModel::CatePage($param);
				exit;

			}

			$this->assign('catelist',self::GetCateListData());
			return $this->fetch();
		}
	} 

	#分类信息#
	public function cateinfo(){
		if($this->request->isGet()){

			//整理后的 所有的菜单
			$catelist=self::GetCateListData();
			
			$cateid=$this->request->param('cateid');

			if($cateid){
				$info=NewsModel::DataFind('news_cate',['cateid'=>$cateid]);
				if(empty($info)){
					$this->error("当前信息不存在~");
				}
				$this->assign('info',$info);
			}
			
			$this->assign('modellist',NewsModel::ModelList());
			$this->assign('pages',NewsModel::GetTemplate());
			$this->assign('catelist',$catelist);
			
			return $this->fetch();

		}else{

			$data=$this->request->post();
			unset($data['file']);

			if($data['pid']==$data['cateid']){
				$this->error("父菜单不能选择为自己~");
			}

			if(empty($data['modelid'])){

				$this->error("请选择相应的模型");

			}else{

				$modelinfo=NewsModel::DataFind('news_model',['modelid'=>$data['modelid']],'modelid,type,page,category,list,content');

				if($modelinfo['type']=='单页类型'){
					$data['template']=$modelinfo['page'];
				}	

				if($modelinfo['type']=='列表类型'){
					$data['template']=$modelinfo['list'];
				}
					
			}
	
			$data['status']=empty($data['status'])?"1":$data['status'];

		
			if(!empty($data['cateid'])){
				
				$map=array(
					['cateid','neq',$data['cateid']],
					['catename','eq',$data['catename']]
				);
				
				if(NewsModel::DataCount('news_cate',$map,'cateid')>0){
					$this->error("当前分类已经存在!");
				}

				if($data['url'] ==''){
					if($data['pid'] !='0'){
						$data['url']="/cate-{$data['cateid']}-pid-{$data['pid']}.html";
					}else{
						$data['url']="/cate-{$data['cateid']}.html";
					}
					
				}

				$data['uptime']=date('Y-m-d H:i:s');
				$res=NewsModel::DataUp('news_cate',$data);
				
				if($res==true){
					$this->success("分类修改成功！",url('catelist'));
				}else{
					$this->error("分类修改失败！",url('catelist'));
				}

			}else{
				
				/*if(Db::name('news_cate')->where(['catename'=>$data['catename']])->count()>0){
					$this->error("当前分类已经存在!");
				}*/

				$data['addtime']=date('Y-m-d H:i:s');

				$cateid=Db::name('news_cate')->insertGetId($data);

				if($cateid){

					if($data['url'] ==''){
						if($data['pid'] !='0'){
							$url="/cate-{$cateid}-pid-{$data['pid']}.html";
						}else{
							$url="/cate-{$cateid}.html";
						}
						
					}

					
					NewsModel::DataUp('news_cate',['url'=>$url],['cateid'=>$cateid]);

					$this->success("分类添加成功~",url('catelist'));

				}else{
					$this->error("添加失败，请重试~");
				}
			}
		}
	}

	#修改分类#
	public function cateup(){

		if($this->request->ispost()){

			$post=$this->request->post();

			if($post['value']==='false'){
				$post['value']='0';
			}else{
				$post['value']='1';
			}
			
			$data["cateid"]=$post['cateid'];
			$data[$post['type']]=$post['value'];

			echo NewsModel::DataUp('news_cate',$data,'','uptime');
		}
		
		
	}

	#删除分类#
	public function catedel(){

		if($this->request->ispost()){
		
			$cateid=$this->request->param('cateid');

			$message=NewsValidate::Del($cateid);
			if(isset($message)){
				$this->error($message);
			}

			if(config('site.file_del')=='1'){
				$this->removefile(NewsModel::DataFind('news_cate',['cateid'=>$cateid],"catethumb"));
			}

			echo NewsModel::DataDel('news_cate',['cateid'=>$cateid]);
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
					'cateid'=>$v['cateid'],
					'catename'=>html_entity_decode(str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",$num))."L_".$v['catename']
				);

				array_push($this->arr,$arr);

				$arr=Db::name('news_cate')->where('pid',$v['cateid'])->order('catepx desc')->field('cateid,pid,catename')->select();

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

			$info=NewsModel::DataFind('news_cate',['cateid'=>$cateid]);
			
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

				echo NewsModel::Page("news_model",$param);
				exit;

			}

			return $this->fetch();
		}
	}
	#模型信息#
	public function modelinfo(){
		if($this->request->isGet()){

			$modelid=$this->request->param('modelid');

			if($modelid){

				$info=NewsModel::DataFind('news_model',['modelid'=>$modelid]);
				if(empty($info)){
					$this->error("当前模型信息不存在~");
				}
				
				$this->assign('info',$info);
			}
				
			//获取所有模型
			$this->assign('templates',NewsModel::GetTemplate());
			$this->assign('authorlist',NewsModel::AuthorList());

			return $this->fetch();

		}else{

			$data=$this->request->post();

			if(empty($data['type'])){
				$this->error("请先选择栏目类型");
			}

			if($data['type']=='单页类型' && $data['page']==''){
				$this->error("请先选择单页模板！");
			}

			if($data['type']=='列表类型'){

				/*if($data['category']==''){
					$this->error("请先选择栏目模板！");
				}*/
				if($data['list']==''){
					$this->error("请先选择列表模板！");
				}
				if($data['content']==''){
					$this->error("请先选择内容模板！");
				}

			}


			$data['status']=empty($data['status'])?"1":$data['status'];

			if($data['modelid']){

				$map=array(
					['modelid','neq',$data['modelid']],
					['name','=',$data['name']],
				);
			
				if(Db::name('news_model')->where($map)->count('modelid')>0){
					$this->error("当前模型名称已经存在!");
				}
				

				if(!empty($data['up'])){
					
					
					$model_info=NewsModel::DataFind('news_model',['modelid'=>$data['modelid']],'page,category,list,content');

					if($data['type']=='单页类型'){

						if($data['page'] !=$model_info['page']){
							//更新条件
							$up_where=array(
								['modelid','=',$data['modelid']],
								['template','neq',$model_info['page']]
							);
							//结果
							$up_data=['template'=>$model_info['page']];

							Db::name('news_cate')->where($up_where)->update($up_data);

						}

					}

					if($data['type']=='列表类型'){

						if($data['list'] !=$model_info['list']){
							//更新条件
							$up_where=array(
								['modelid','=',$data['modelid']],
								['template','neq',$data['list']]
							);
							//更新结果
							$up_data=['template'=>$data['list']];

							Db::name('news_cate')->where($up_where)->update($up_data);
						}

						if($data['content'] !=$model_info['content']){
							//更新条件
							$up_where=array(
								['modelid','=',$data['modelid']],
								['template','neq',$data['content']]
							);
							//更新结果
							$up_data=['template'=>$data['content']];

							Db::name('news_list')->where($up_where)->update($up_data);
						}
					
					}

					unset($data['up']);
				}
				

				$data['uptime']=date('Y-m-d H:i:s',time());
				//更新分类模板
			
				$res=NewsModel::DataUp('news_model',$data);

				if($res==true){
					$this->success("模型修改成功~",url('modellist'));
				}else{
					$this->error("模型修改失败~");
				}

			}else{

				$map=array(
					'name'=>$data['name']
				);
			
				if(Db::name('news_model')->where($map)->count()>0){
					$this->error("当前模型已经存在!");
				}


				$data['addtime']=date('Y-m-d H:i:s',time());

				$res=NewsModel::DataIns("news_model",$data);
				
				if($res==true){
					$this->success("模型添加成功~",url('modellist'));
				}else{
					$this->error("模型添加失败~");
				}

			}
		}
	}
	#删除模型#
	public function modeldel(){
		if($this->request->ispost()){

			$modelid=$this->request->param('modelid');

			$message=NewsValidate::Del($modelid);
			if(isset($message)){
				$this->error($message);
			}

			echo NewsModel::DataDel('news_model',['modelid'=>$modelid]);
		}
	}


	#所有分类数据#
	private function GetCateListData(){
		$catelist=Db::name('news_cate')->where('pid','0')->order('catepx desc')->field('cateid,pid,catename')->select();

		self::getcatelist($catelist);
			
		return $this->arr;
	}

	#新闻列表#
	public function newslist(){
		if($this->request->isGet()){

			if($this->request->isajax()){

				$param=$this->request->param();
				echo NewsModel::NewsPage($param);
				exit;

			}

			$this->assign('authorlist',NewsModel::AuthorList());
			$this->assign('catelist',self::GetCateListData());
			return $this->fetch();
		}
	} 

	#分类分类#
	public function newsinfo(){
		if($this->request->isGet()){

			//获取分类对应文件模板
			if($this->request->isajax()){

				$cateid=$this->request->param('cateid');

				if(empty($cateid)){
					$this->error("分类id 不能为空");
				}

				$type=NewsModel::CateModelType($cateid);
				
				if($type=='单页模型'){
					$count=Db::name('news_list')->where('cateid',$cateid)->count('newsid');
					if($count>0){
						$this->error("当前类型已经添加过内容，请选择其他分类~");
					}
				}

				$modelinfo=NewsModel::CateModel($cateid);

				$map_model=array(
					'modelid'=>$modelinfo['modelid'],
					'status'=>'1'
				);
				
				$data=array();

				$data['pages']=NewsModel::GetTemplate($modelinfo['type']);
				$data['modelinfo']=$modelinfo;

				$this->success($data);

				exit;
			}

			$newsid=$this->request->param('newsid');

			if(NewsModel::DataCount('news_cate',['status'=>'1'],'cateid')=='0'){
				$this->error("请先添加一个分类",url('cateinfo'));
			}
			
			//分类列表
			$catelist=self::GetCateListData();
			$this->assign('catelist',$catelist);


			if(!empty($newsid)){

				$info=NewsModel::DataFind('news_list',['newsid'=>$newsid]);
				if(empty($info)){
					$this->error("当前新闻不存在~");
				}
				$info['photos']=json_decode($info['photos'],true);
				$info['files']=json_decode($info['files'],true);
				$this->assign('info',$info);

				
				
				$modelinfo=NewsModel::CateModel($info['cateid']);

				$pages=NewsModel::GetTemplate($modelinfo['type']);

				if($modelinfo['type']==""){
					$pages=array_merge($pages['page'],$pages['category'],$pages['list'],$pages['content']);
				} 

				$this->assign('pages',$pages);
			}
			

			$this->assign('authorlist',NewsModel::AuthorList());

			return $this->fetch();
		}else{
			
			$post=$this->request->post();

			//转json
			$post['photos']=json_encode($post['photos']);

			$post['status']=empty($post['status'])?"0":$post['status'];
			$post['hot']=isset($post['hot'])?"1":"0";
			$post['top']=isset($post['top'])?"1":"0";
			$post['files']=json_encode($post['files']);
			unset($post['file']);

			
			//作者信息
			if(!empty($post['authorid'])){

				$authorinfo=NewsModel::DataFind('news_author',['authorid'=>$post['authorid']]);
				$post['authorid']=$authorinfo['authorid'];
				$post['authorname']=$authorinfo['name'];
				$post['authorpic']=$authorinfo['pic'];

			}

			if(empty($post['template'])){
				$CateModelInfo=NewsModel::CateModel($post['cateid']);
				$post['template']=$CateModelInfo['content'];//页面模板
			}
			

			if(!empty($post['newsid'])){

				/*$map=array(
					'newsid'=>array('neq',$post['newsid']),
					'newsname'=>$post['newsname']
				);*/
			
				/*if(Db::name('news_list')->where($map)->count()>0){
					$this->error("当前分类已经存在!");
				}*/


				if($post['url'] ==''){
					$post['url']="/content-{$post['newsid']}.html";
				}

				$post['uptime']=date('Y-m-d H:i:s',time());

				$r=Db::name('news_list')->update($post);

				if(NewsModel::CateModelType($post['cateid']) =='单页类型' ){
					$cateurl=$url="/content-{$post['newsid']}-cate-{$post['cateid']}-.html";
					Db::name('news_cate')->where('cateid',$post['cateid'])->update(['url'=>$cateurl]);
				}
		
				$url=Url('news/newslist');

				if($r==true){
					$this->success("新闻修改成功！",$url);
				}else{
					$this->error("新闻修改失败！",$url);
				}

			}else{

				$type=NewsModel::CateModelType($post['cateid']);
				
				if($type=='单页模型'){
					$count=Db::name('news_list')->where('cateid',$cateid)->count('newsid');
					if($count>0){
						$this->error("当前类型已经添加过内容，请选择其他分类~");
					}
				}


				$post['addtime']=date('Y-m-d H:i:s',time());
				if(empty($post['pushtime'])){
					$post['pushtime']=$post['addtime'];
				}

				$newsid=Db::name('news_list')->insertGetId($post);

				if($newsid){
					if($data['url'] ==''){
						$url="/content-{$newsid}.html";
					}

					if(NewsModel::CateModelType($post['cateid']) =='单页类型' ){
						$cateurl=$url="/content-{$newsid}-cateid-{$post['cateid']}.html";
						Db::name('news_cate')->where('cate',$post['cateid'])->update(['url'=>$cateurl]);
					}

					Db::name('news_list')->where(['newsid'=>$newsid])->update(['url'=>$url]);
					$this->success("新闻添加成功~",url('newslist'));
				}else{
					$this->error("添加失败，请重试~");
				}


			}
		}
	}

	#检查是否重复#
	public function pageset(){
		if($this->request->ispost()){
			
			$cateid=$this->request->param('cateid');
			
			$type=NewsModel::CateModelType($cateid);
			
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

		if($this->request->ispost()){

			$newsid=$this->request->param('newsid');

			$message=NewsValidate::Del($newsid);
			if(isset($message)){
				$this->error($message);
			}

			if(config('site.file_del')=='1'){
				$newsinfo=Db::name('news_list')->where(['newsid'=>$newsid])->find();
				//删除缩略图
				$this->removefile($newsinfo['thumb']);
				//删除图集
				$photos=json_decode($newsinfo['photos'],true);
				if(is_array($photos['path'])){
					foreach ($photos['path'] as $k => $v) {
						$this->removefile($v);
					}
				}
				//删除文件
				if(isset($newsinfo['files'])){
					$files=json_decode($newsinfo['files'],true);
					$this->removefile($files['src']);
				}
			}

			echo NewsModel::DataDel('news_list',['newsid'=>$newsid]);

		}
		
	}

	#修改新闻#
	public function newsup(){

		if($this->request->ispost()){

			$post=$this->request->post();

			if($post['value']==='false'){
				$post['value']='0';
			}else{
				$post['value']='1';
			}
			
			$data["newsid"]=$post['newsid'];
			$data[$post['type']]=$post['value'];

			echo NewsModel::DataUp('news_list',$data,'','uptime');
		}

	}


	#作者管理#
	public function authorlist(){
		if($this->request->isGet()){
			if($this->request->isajax()){

				$param=$this->request->param();

				echo NewsModel::Page("news_author",$param);
				exit;

			}

			return $this->fetch();
		}
	}
	#作者信息#
	public function authorinfo(){
		if($this->request->isGet()){

			$authorid=$this->request->param('authorid');

			if($authorid){

				$info=NewsModel::DataFind('news_author',['authorid'=>$authorid]);
				if(empty($info)){
					$this->error("当前作者信息不存在~");
				}
				
				$this->assign('info',$info);
			}
				
			return $this->fetch();

		}else{

			$post=$this->request->post();
			unset($post['file']);

			if(!empty($post['authorid'])){

				$map=array(
					['authorid','neq',$post['authorid']],
					['name','=',$post['name']],
				);
			
				if(Db::name('news_author')->where($map)->count('authorid')>0){
					$this->error("当前作者名称已经存在!");
				}

				$post['uptime']=date('Y-m-d H:i:s',time());
							
				$res=NewsModel::DataUp('news_author',$post);

				if($res==true){
					$this->success("作者修改成功~",url('authorlist'));
				}else{
					$this->error("作者修改失败~");
				}

			}else{

				$map=array(
					'name'=>$post['name']
				);
			
				if(Db::name('news_author')->where($map)->count()>0){
					$this->error("当前作者已经存在!");
				}

				$post['addtime']=date('Y-m-d H:i:s',time());

				$res=NewsModel::DataIns("news_author",$post);
				
				if($res==true){
					$this->success("作者添加成功~",url('authorlist'));
				}else{
					$this->error("作者添加失败~");
				}

			}
		}
	}
	#删除作者#
	public function authordel(){
		if($this->request->ispost()){
			$authorid=$this->request->param('authorid');
			$message=NewsValidate::Del($authorid);
			if(isset($message)){
				$this->error($message);
			}
			echo NewsModel::DataDel('news_author',['authorid'=>$authorid]);
		}
	}
	#修改作者#
	public function authorup(){

		if($this->request->ispost()){

			$post=$this->request->post();

			if($post['value']==='false'){
				$post['value']='0';
			}else{
				$post['value']='1';
			}
			
			$data["authorid"]=$post['authorid'];
			$data[$post['type']]=$post['value'];

			echo NewsModel::DataUp('news_author',$data,'','uptime');
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
			
			if($info){
				$this->assign('info',$info);
			}
			
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

				echo NewsModel::CommentPage($param);
				exit;

			}

			return $this->fetch();
		}
	}
	#删除评论#
	public function commentdel(){

		if($this->request->ispost()){

			$id=$this->request->param('id');

			$message=NewsValidate::Del($authorid);
			if(isset($message)){
				$this->error($message);
			}

			echo NewsModel::DataDel('comment_list',['id'=>$id]);
		}
	}
	#修改评论状态#
	public function commentup(){

		if($this->request->ispost()){

			$post=$this->request->post();

			if($post['value']==='false'){
				$post['value']='0';
			}else{
				$post['value']='1';
			}
			
			$data["id"]=$post['id'];
			$data[$post['type']]=$post['value'];

			echo NewsModel::DataUp('comment_list',$data,'','uptime');
		}
		
		
	}




}