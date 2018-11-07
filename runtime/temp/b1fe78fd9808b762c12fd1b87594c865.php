<?php /*a:4:{s:54:"G:\www2\cms2\application\admin\view\site\template.html";i:1535000979;s:52:"G:\www2\cms2\application\admin\view\public\base.html";i:1538900193;s:52:"G:\www2\cms2\application\admin\view\public\head.html";i:1537970790;s:52:"G:\www2\cms2\application\admin\view\public\foot.html";i:1535000978;}*/ ?>
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
   
      

<table class="layui-table" lay-data="{height:500,url:location.href, page:true, id:'table'}" lay-filter="table">
  <thead>
    <tr>
      <th lay-data="{field:'template'}">模板名称</th>
      <th lay-data="{field:'author'}">作者</th>
      <th lay-data="{field:'describe'}">说明</th>
      <th lay-data="{field:'status',templet:'#status'}">状态</th>
    </tr>
  </thead>
</table>

<script>
layui.use(['table','form'], function(){
  var table = layui.table;
  var form = layui.form;

  
  //开关
  form.on('switch(template)', function(data){

    $.post(location.href,{'template':data.elem.value},function(res){
      //form.render('checkbox', 'test2'); 
      if(res=='0'){
        alert("操作失败");
      }else{
        location.reload();
      }
    });
   
  });  

});



</script>


<script type="text/html" id="status">
  {{#  if(d.set == 1){ }}
    <input type="checkbox" lay-skin="switch" lay-text="启用|禁用" lay-filter="template" value="{{d.template}}" checked>
  {{#  } else { }}
    <input type="checkbox" lay-skin="switch" lay-text="启用|禁用" lay-filter="template"  value="{{d.template}}">
  {{#  } }}
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