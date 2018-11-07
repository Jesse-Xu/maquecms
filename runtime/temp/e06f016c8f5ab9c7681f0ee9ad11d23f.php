<?php /*a:4:{s:51:"G:\www2\cms2\application\admin\view\site\index.html";i:1535000978;s:52:"G:\www2\cms2\application\admin\view\public\base.html";i:1538900193;s:52:"G:\www2\cms2\application\admin\view\public\head.html";i:1537970790;s:52:"G:\www2\cms2\application\admin\view\public\foot.html";i:1535000978;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>后台管理中心</title>

  <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
  
  <script src="/static/admin/layui/layui.js?v=1"></script>


  <link rel="stylesheet" href="/static/admin/layui/css/layui.css?v=2">
  <link rel="stylesheet" href="/static/admin/css/admin.css?v=1.4">
 
</head>
<body class="layui-layout-body">

<div class="layui-layout layui-layout-admin">
  <div class="layui-header">

    <div></div>
    <div class="layui-logo">后台管理中心</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left layui-hide-xs">
      <li class="layui-nav-item"><a href="<?php echo Url('index/index'); ?>">功能管理</a></li>
      <li class="layui-nav-item "><a href="/index.php" target="_blank">网站首页</a></li>
    </ul>
    <ul class="layui-nav layui-layout-right ">
      <li class="layui-nav-item layui-hide-xs">
        <a href="javascript:;">
          <img src="<?php echo htmlentities(app('session')->get('admin.avatar')); ?>" class="layui-nav-img">
          <?php echo htmlentities(app('session')->get('admin.nickname')); ?>
        </a>
      </li>
      <li class="layui-nav-item"><a href="<?php echo Url('login/loginout'); ?>">退出</a></li>
    </ul>
  </div>

  <div class="layui-side layui-bg-black left-menu">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->

      <ul class="layui-nav layui-nav-tree"  lay-filter="test">

      
        <?php if((app('session')->get('admin.adminid') == '1') or (administrator == '麻雀cms')): ?>
        <li class="layui-nav-item <?php if($controller == 'index'): ?>layui-nav-itemed<?php endif; ?>">

          <a class="" href="<?php echo Url('index/index'); ?>">
            <i class="layui-icon">&#xe68e;</i>  数据统计
          </a>
        </li>
        
        <li class="layui-nav-item <?php if($controller == 'banner'): ?>layui-nav-itemed<?php endif; ?>">
          <a class="" href="javascript:;">
            <i class="layui-icon">&#xe634;</i>  轮播管理
          </a>
          <dl class="layui-nav-child">
            <dd><a href="<?php echo Url('banner/lists'); ?>">轮播列表</a></dd>
            <dd><a href="<?php echo Url('banner/info'); ?>">轮播添加</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item <?php if($controller == 'news'): ?>layui-nav-itemed<?php endif; ?>">
          <a class="" href="javascript:;">
            <i class="layui-icon">&#xe62a;</i>  新闻管理
          </a>
          <dl class="layui-nav-child">
            <dd><a href="<?php echo Url('news/newslist'); ?>">新闻列表</a></dd>
            <!-- <dd><a href="<?php echo Url('news/newsinfo'); ?>">添加新闻</a></dd> -->
            <dd><a href="<?php echo Url('news/catelist'); ?>">分类管理</a></dd>
            <!-- <dd><a href="<?php echo Url('news/cateinfo'); ?>">添加分类</a></dd> -->
            <dd><a href="<?php echo Url('news/modellist'); ?>">模型管理</a></dd>
            <!-- <dd><a href="<?php echo Url('news/modelinfo'); ?>">添加模型</a></dd> -->
            <dd><a href="<?php echo Url('news/authorlist'); ?>">作者管理</a></dd>
            <!-- <dd><a href="<?php echo Url('news/authorinfo'); ?>">添加作者</a></dd> -->
            <dd><a href="<?php echo Url('news/comment'); ?>">评论管理</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item <?php if($controller == 'user'): ?>layui-nav-itemed<?php endif; ?>">
          <a class="" href="javascript:;">
            <i class="layui-icon">&#xe770;</i>  用户管理
          </a>
          <dl class="layui-nav-child">
            <dd><a class="" href="<?php echo Url('user/lists'); ?>">用户列表</a></dd>
            <!-- <dd><a href="<?php echo Url('news/newsinfo'); ?>">添加新闻</a></dd> -->
          </dl>
        </li>
        <li class="layui-nav-item <?php if($controller == 'msg'): ?>layui-nav-itemed<?php endif; ?>">
          <a class="" href="<?php echo url('msg/lists'); ?>">
            <i class="layui-icon">&#xe63c;</i>  留言管理
          </a>
        </li>
        <li class="layui-nav-item <?php if($controller == 'link'): ?>layui-nav-itemed<?php endif; ?>">
          <a class="" href="javascript:;">
            <i class="layui-icon">&#xe64c;</i>  友情链接
          </a>
          <dl class="layui-nav-child">
            <dd><a href="<?php echo Url('link/lists'); ?>">链接列表</a></dd>
            <dd><a href="<?php echo Url('link/info'); ?>">链接添加</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item <?php if($controller == 'site'): ?>layui-nav-itemed<?php endif; ?>">
          <a class="" href="javascript:;">
            <i class="layui-icon">&#xe716;</i>  站点管理
          </a>
          <dl class="layui-nav-child">
            <dd><a href="<?php echo Url('site/index'); ?>">网站信息</a></dd>
            <dd><a href="<?php echo Url('site/water'); ?>">水印设置</a></dd>
            <dd><a href="<?php echo Url('site/upload'); ?>">上传设置</a></dd>
            <dd><a href="<?php echo Url('site/template'); ?>">模板选择</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item <?php if($controller == 'auth'): ?>layui-nav-itemed<?php endif; ?>">
          <a class="" href="javascript:;">
            <i class="layui-icon">&#xe613;</i>  权限管理
          </a>
          <dl class="layui-nav-child">
            <dd><a href="<?php echo Url('auth/adminlist'); ?>">管理员列表</a></dd>
            <dd><a href="<?php echo Url('auth/rolelist'); ?>">角色列表</a></dd>
            <dd><a href="<?php echo Url('auth/actionlist'); ?>">权限列表</a></dd>
            <dd><a href="<?php echo Url('auth/loglist'); ?>">操作日志</a></dd>
            <dd><a href="<?php echo Url('auth/modifypd'); ?>">修改密码</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item ">
          <a class="" href="<?php echo url('index/delcache'); ?>">
            <i class="layui-icon">&#xe60b;</i>  清空缓存
          </a>
        </li>
        <li class="layui-nav-item ">
          <a class="" href="<?php echo url('index/serverinfo'); ?>">
            <i class="layui-icon">&#xe631;</i>  服务器信息
          </a>
        </li>
      <?php else: ?>
      <?php echo RoleMenu(); endif; ?>
        <li class="layui-nav-item ">
          <a class="" href="<?php echo url('login/loginout'); ?>">
            <i class="layui-icon">&#xe60f;</i>  退出登录
          </a>
        </li>
      </ul>
    </div>
  </div>
  
  <div class="layui-body">
   <!-- 内容主体区域 -->
  <div id="main">

      <blockquote class="layui-elem-quote">
        <?php echo htmlentities($title); ?>  

        
      </blockquote>
   
      

<form class="layui-form" action="" method="POST">
        <div class="layui-form-item">
          <label class="layui-form-label">网站状态</label>
          <div class="layui-input-block">
            <input type="radio" name="status" value="开启" title="开启" <?php if(($info['status'] == '开启') or ($info['status'] == '')): ?>checked<?php endif; ?> >
            <input type="radio" name="status" value="关闭" title="关闭" <?php if($info['status'] == '关闭'): ?>checked<?php endif; ?>>
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">访问类型</label>
          <div class="layui-input-block">
            <input type="checkbox" name="type[pc]" title="电脑端" <?php if($info['type']['pc'] == 'on'): ?>checked<?php endif; if($info['type'] == ''): ?>checked<?php endif; ?>>
            <input type="checkbox" name="type[mb]" title="手机端" <?php if($info['type']['mb'] == 'on'): ?>checked<?php endif; ?>>
            <input type="checkbox" name="type[wx]" title="微信端" <?php if($info['type']['wx'] == 'on'): ?>checked<?php endif; ?>>
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">网站logo</label>
          <div class="layui-input-inline" style="width:350px;">
            <input type="text" name="logo"  lay-verify="logo" placeholder="logo图片地址" autocomplete="off" class="layui-input"  value="<?php echo htmlentities($info['logo']); ?>">
          </div>
          <div class="layui-word-aux">
            <img src="<?php echo htmlentities($info['logo']); ?>" id="logo" style="width:35px;<?php if($info['logo'] == ''): ?>display:none;<?php endif; ?>">
            <button type="button" class="layui-btn layui-btn-small fileupload" lay-data="{data:{type:'image'},accept:'images'}" data-name="logo">
              <i class="layui-icon">&#xe64a;</i>上传Logo
            </button>
          </div>
        </div>
        
        <div class="layui-form-item">
          <label class="layui-form-label"><span class="form-required">*</span>站点名称</label>
          <div class="layui-input-inline" style="width:350px;">
            <input type="text" name="title" required lay-verify="required" placeholder="请输入站点名称" autocomplete="off" class="layui-input"  value="<?php echo htmlentities($info['title']); ?>">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label"><span class="form-required">*</span>站点域名</label>
          <div class="layui-input-inline" style="width:350px;">
            <input type="text" name="yuming" required lay-verify="required" placeholder="请输入站点域名" autocomplete="off" class="layui-input"  value="<?php echo htmlentities($info['yuming']); ?>">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label"><span class="form-required">*</span>站点关键字</label>
          <div class="layui-input-inline" style="width:350px;">
            <textarea name="keyword" required lay-verify="required" placeholder="站点关键字" class="layui-textarea"><?php echo htmlentities($info['keyword']); ?></textarea>
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label"><span class="form-required">*</span>站点描述</label>
          <div class="layui-input-inline" style="width:350px;">
            <textarea name="descript" required lay-verify="required" placeholder="请输入站点描述" class="layui-textarea"><?php echo htmlentities($info['descript']); ?></textarea>
          </div>

        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">统计代码</label>
          <div class="layui-input-inline" style="width:350px;">
          <textarea name="tongji"  placeholder="请输入统计代码" class="layui-textarea"><?php echo htmlentities($info['tongji']); ?></textarea>
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">备案号</label>
          <div class="layui-input-inline" style="width:350px;">
            <input type="text" name="beian"  placeholder="请输入备案号" autocomplete="off" class="layui-input"  value="<?php echo htmlentities($info['beian']); ?>">
          </div>
        </div>
        </div>
        <div class="layui-form-item">
          <div class="layui-input-block">
            <button class="layui-btn" lay-submit="" lay-filter="formDemo">立即提交</button>
          </div>
        </div>
</form>

<script type="text/javascript">
	layui.use(['form','upload'], function(){
	  var form = layui.form
    ,upload  = layui.upload;
     //上传
    upload.render({
      elem: '.fileupload' //绑定元素
      ,url: '<?php echo Url('common/fileupload',array('other'=>'water')); ?>' //上传接口
      ,before: function(obj){ //obj参数包含的信息，跟 choose回调完全一致，可参见上文。

        layer.load(); //上传loading
      }
      ,done: function(res,index){ 

          layer.closeAll('loading');

          if(res.status=='1'){ 
            alert("上传成功~"); 

              var item = this.item;
              layui.$("input[name='logo']").val(res.path);
              $("#logo").attr("src",res.path);
              $("#logo").show();

          }else{
            alert("上传失败,请重试！");
          }
      }
      ,error: function(){
          layer.closeAll('loading');
          alert("上传失败,请重试！");
        //请求异常回调
      }
      ,field:'file' //字段名

    });
    
  layer.photos({
    photos: 'div'
    ,anim: 5 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
  }); 
  

     

	});
</script>


       
  </div>
  
  <!-- 引入底部 -->
  <div class="layui-footer">
    <!-- 底部固定区域 -->
    <a href="https://gitee.com/32684028888/MaQuecms" target="_blank" >© 麻雀cms</a>
  </div>
</div> 

<script>
//左边菜单栏目代码区域
layui.use('element', function(){
  var element = layui.element;
});
</script>
<script type="text/javascript" src="/static/admin/js/admin.js"></script>
</body>
</html>