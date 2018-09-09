<?php /*a:1:{s:60:"../application/index/view/xianyan/index\content_comment.html";i:1536336713;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>评论-闲言轻博客</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/static/index/xianyan/layui/css/layui.css">
	<link rel="stylesheet" href="/static/index/xianyan/static/css/mian.css">
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="/static/index/js/common.js"></script>
	
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
			<div class="container container-message container-details container-comment">
					<div class="contar-wrap">
						<div class="item">
							<div class="item-box  layer-photos-demo1 layer-photos-demo">
								<h3><?php echo htmlentities($newsinfo['title']); ?></h3>
								<h5>发布于：<span><?php echo htmlentities(friendlyDate(strtotime($newsinfo['pushtime']))); ?></span></h5>
								<p><?php echo htmlentities($newsinfo['abstract']); ?></p>
								<p><?php echo htmlspecialchars_decode($newsinfo['content']); ?></p>
								<div class="count layui-clear">
									<span class="pull-left">阅读 <em><?php echo htmlentities($newsinfo['hits']); ?></em></span>
									<span class="pull-right like"><i class="layui-icon layui-icon-praise"></i><em>999</em></span>
								</div>
							</div>
						</div>	
						<form class="layui-form" id="comment">
							<input type="hidden" name="newsid" value="<?php echo htmlentities($data['newsid']); ?>"> 
						    <input type="hidden" name="pid" value=""> 
						    <input type="hidden" name="floor" value=""> 

							<div class="layui-form-item layui-form-text">
								<textarea  class="layui-textarea"  style="resize:none" placeholder="评论点什么啊" name="content"></textarea>
							</div>
							<div class="btnbox">
								<button type="button" class="layui-btn" onclick="javascript:comment($(this));">评论</button>
							</div>
						</form>


						<div id="LAY-msg-box">
							<?php $map=array();$order="id desc";$map[]=["newsid","=",5];$map[]=["floor","=",0];$map[]=["status","=","1"];$field=empty($tag["field"])?"*":$tag["field"];$limit=!empty($tag["limit"])?$tag["limit"]:"0,10";$list = Db::name('comment_list')->where($map)->order($order)->limit($limit)->field($field)->select();if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
							<div class="info-box">
								<div class="info-item">
									<img class="info-img" src="<?php echo htmlentities($v['avatar']); ?>" alt="">
									<div class="info-text">
										<p class="title count">
											<span class="name"><?php echo htmlentities($v['nickname']); ?></span>
											<span class="info-img like">发表时间：<?php echo htmlentities($v['addtime']); ?>  <i class="layui-icon layui-icon-praise"></i><?php echo htmlentities($v['zan']); ?></span>
										</p>
										<p class="info-intr"><?php echo htmlentities($v['content']); ?><span style="float:right;font-size:12px;" onclick='javascript:huifu("<?php echo htmlentities($v['id']); ?>","<?php echo htmlentities($v['id']); ?>","<?php echo htmlentities($v['nickname']); ?>");'>
											   回复
										</span></p>
									</div>
								</div>
							</div>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>

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
	<script src="/static/index/xianyan/layui/layui.js">

	</script>
	<script>
		layui.config({
		  base: '/static/index/xianyan/static/js/' 
		}).use('blog');
	</script>
	

</body>
</html>