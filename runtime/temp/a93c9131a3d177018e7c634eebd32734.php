<?php /*a:1:{s:50:"../application/index/view/xianyan/index\index.html";i:1536077334;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>闲言轻博客</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/static/index/xianyan/layui/css/layui.css">
	<link rel="stylesheet" href="/static/index/xianyan/static/css/mian.css">
</head>
<body class="lay-blog">
		<div class="header">
			<div class="header-wrap">
				<h1 class="logo pull-left">
					<a href="index.html">
						<img src="/static/index/xianyan/static/images/logo.png" alt="" class="logo-img">
						<img src="/static/index/xianyan/static/images/logo-text.png" alt="" class="logo-text">
					</a>
				</h1>
				<form class="layui-form blog-seach pull-left" action="">
					<div class="layui-form-item blog-sewrap">
					    <div class="layui-input-block blog-sebox">
					      <i class="layui-icon layui-icon-search"></i>
					      <input type="text" name="title" lay-verify="title" autocomplete="off"  class="layui-input">
					    </div>
					</div>
				</form>
				<div class="blog-nav pull-right">
					<ul class="layui-nav pull-left">
					  <li class="layui-nav-item layui-this"><a href="index.html">首页</a></li>
					  <li class="layui-nav-item"><a href="message.html">留言</a></li>
					  <li class="layui-nav-item"><a href="about.html">关于</a></li>
					</ul>
					<a href="#" class="personal pull-left">
						<i class="layui-icon layui-icon-username"></i>
					</a>
				</div>
				<div class="mobile-nav pull-right" id="mobile-nav">
					<a href="javascript:;">
						<i class="layui-icon layui-icon-more"></i>
					</a>
				</div>
			</div>
			<ul class="pop-nav" id="pop-nav">
				<li><a href="index.html">首页</a></li>
				<li><a href="message.html">留言</a></li>
				<li><a href="about.html">关于</a></li>
			</ul>
		</div>
		<div class="container-wrap">
			<div class="container">
					<div class="contar-wrap">
						<h4 class="item-title">
							<p><i class="layui-icon layui-icon-speaker"></i>公告：<span>欢迎来到我的轻博客</span></p>
						</h4>
						<?php  $map=array();$map[]=["status","=","1"];$map[]=["pushtime","<=","2018-09-08 10:16:57"];$order="newsid desc";$field=empty($tag["field"])?"newsid,cateid,abstract,catename,title,thumb,authorpic,url,pushtime,hot,top":$tag["field"];$limit="3";$list = Db::name('news_list')->where($map)->order($order)->limit($limit)->select();if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
						<div class="item">
							<div class="item-box  layer-photos-demo1 layer-photos-demo">
								<h3><a href="<?php echo htmlentities($v['url']); ?>"><?php echo htmlentities($v['title']); ?></a></h3>
								<h5>发布于：<span><?php echo htmlentities(friendlyDate(strtotime($v['pushtime']))); ?></span></h5>
								<p><?php echo htmlentities($v['abstract']); ?></p>
								<img src="<?php echo htmlentities($v['thumb']); ?>" alt="<?php echo htmlentities($v['title']); ?>">
							</div>
							<div class="comment count">
								<a href="<?php echo htmlentities($v['url']); ?>#comment">评论</a>
								<a href="javascript:;" class="like">点赞</a>
							</div>
						</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						
						
					</div>
					<div class="item-btn">
						<button class="layui-btn layui-btn-normal">下一页</button>
					</div>
			</div>
		</div>
		<div class="footer">
			<p>
				<span>&copy; 2018</span>
				<span><a href="http://www.layui.com" target="_blank">layui.com</a></span> 
				<span>MIT license</span>
			</p>
			<p><span>人生就是一场修行</span></p>
		</div>
	<script src="/static/index/xianyan/layui/layui.js"></script>
	<script>
		layui.config({
		  base: '/static/index/xianyan/static/js/' 
		}).use('blog');	
	</script>
</body>
</html>