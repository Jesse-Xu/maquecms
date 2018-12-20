<?php /*a:3:{s:54:"G:\www2\cms2\application\admin\view\auth\rolemenu.html";i:1543245720;s:52:"G:\www2\cms2\application\admin\view\public\base.html";i:1543161944;s:52:"G:\www2\cms2\application\admin\view\public\head.html";i:1541778938;}*/ ?>
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
  <script type="text/javascript" src="https://cdn.bootcss.com/layer/2.3/layer.js"></script>
  <script type="text/javascript" src="/static/admin/js/admin.js"></script>
  
</head>
<body class="layui-layout-body">



  
  <div class="layui-body">
   <!-- 内容主体区域 -->
  <div id="main">

      <blockquote class="layui-elem-quote">
        <?php echo htmlentities($title); ?>  

        
      </blockquote>
   
      
<div class="demoTable">
  <form class="layui-form" action="">
  <div class="layui-input-inline">
    <a  href="javascript:LayerOpen('<?php echo Url('menuadd',array('roleid'=>input('roleid'))); ?>');" class="layui-btn layui-btn-normal" data-type="reload" lay-filter="menuadd" lay-submit>添加菜单</a>
  </div>
  <div class="layui-input-inline">
    <a  href="javascript:LayerOpen('<?php echo Url('menutree'); ?>');" class="layui-btn layui-btn-normal" data-type="reload" lay-filter="menuadd" lay-submit>查看菜单</a>
  </div>
</div>
<table class="layui-table" lay-data="{height:500,url:location.href, page:true, id:'table'}" lay-filter="table" lay-size="lg">
  <thead>
    <tr>
      <th lay-data="{field:'menuid',width:65}">ID</th>
      <th lay-data="{field:'px',width:65}">排序</th>
      <th lay-data="{field:'thumb',templet:'#thumb',width:75}">图标</th>
      <th lay-data="{field:'name'}">菜单名称</th>
      <th lay-data="{field:'type',templet:'#link'}">类型</th>
      <th lay-data="{field:'data'}">参数</th>
      <th lay-data="{field:'status',templet:'#status',width:105}">状态</th>
      <th lay-data="{field:'addtime'}">添加时间</th>
      <th lay-data="{fixed: 'right',  toolbar: '#barDemo'}">操作</th>

      <!-- <th lay-data="{field:'menuid',width:65}">ID</th>
      <th lay-data="{field:'menupx',width:65}">排序</th>
      <th lay-data="{field:'menuthumb',templet:'#thumb',width:75}">缩略图</th>
      <th lay-data="{field:'menuname'}">分类名称</th>
      <th lay-data="{field:'url',templet:'#link'}">跳转连接</th>
      <th lay-data="{field:'modelname'}">模型</th>
      <th lay-data="{field:'isnav',templet:'#nav',width:105}">导航</th>
      <th lay-data="{field:'status',templet:'#status',width:105}">状态</th>
      <th lay-data="{field:'addtime'}">添加时间</th>
      <th lay-data="{fixed: 'right',  toolbar: '#barDemo'}">操作</th> -->
    </tr>
  </thead>
</table>

<!-- <a class="layui-btn layui-btn-sm layui-btn-normal" lay-event="child">子菜单</a> -->

<script type="text/html" id="barDemo">
  
  
  <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
   
  <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
  {{#  if(d.menutype == '单页面'){ }}
      <a class="layui-btn layui-btn-sm" lay-event="editpage">页面编辑</a>
  {{#  } }} 
</script>

<script>
layui.use(['table','laydate','form'], function(){
  table = layui.table;
  laydate = layui.laydate;
  form = layui.form;

  table.on('tool(table)', function(obj){
    var data = obj.data;

    if(obj.event === 'del'){

      Delete("<?php echo Url('menudel'); ?>",{'menuid': data.menuid},obj);
      
    } else if(obj.event === 'edit'){
        LayerOpen('/admin.php/news/menuedit/menuid/'+data.menuid);
      //layer.alert('编辑行：<br>'+ JSON.stringify(data))
    } else if(obj.event === 'editpage'){
        location.href="/admin.php/news/pageinfo/menuid/"+data.menuid;
      //layer.alert('编辑行：<br>'+ JSON.stringify(data))
    } else if(obj.event === 'child'){
      location.href="/admin.php/news/menulist/pid/"+data.menuid;
    }/* else if(obj.event === 'content'){
 			
    	console.log(obj.data.menutype);

   		if(obj.data.menutype=='单页面'){

   			location.href="/admin.php/menu/content/menuid/"+data.menuid;

   		}else if(obj.data.menutype=='文章模型'){

   			location.href="/admin.php/menu/newslist/menuid/"+data.menuid;

   		}
       
    }else if(obj.event === 'addcontent'){
    	location.href= "/admin.php/menu/content/menuid/"+data.menuid;
    }*/
    
  });

 //图片查看
  $("body").on("click","img",function(e){
        layer.photos({ photos: {"data": [{"src": e.target.src}]},anim: 5 });
  });

  //开关
  form.on('switch(status)', function(data){

    var name=$(this).attr('name');
    Status("<?php echo url('menuup'); ?>",{type:name,value:data.elem.checked,'menuid':data.value});

  });

  //下拉选择
  form.on('select(select)', function(data){

    table.reload('list', {
      url: location.href
      ,where: {
         pid:data.value
      } 
      
    });

  });      
    

});
</script>

<script type="text/html" id="link">
  {{#  if(d.url != '' && typeof(d.url) != 'undefined'){ }}
     <a href="{{d.url}}" class="layui-table-link" target="_blank">{{d.url}}</a>
  {{#  } }}
</script>
<script type="text/html" id="thumb">
  <img src='{{d.src}}' >
</script>
<script type="text/html" id="status">
  {{#  if(d.status == 1){ }}
    <input type="checkbox" name="status" lay-skin="switch" lay-text="启用|禁用" lay-filter="status" value="{{d.menuid}}" checked>
  {{#  } else { }}
    <input type="checkbox" name="status" lay-skin="switch" lay-text="启用|禁用" lay-filter="status"  value="{{d.menuid}}">
  {{#  } }}
</script>
<script type="text/html" id="nav">
  {{#  if(d.isnav == 1){ }}
    <input type="checkbox" name="isnav" lay-skin="switch" lay-text="显示|隐藏" lay-filter="status" value="{{d.menuid}}" checked>
  {{#  } else { }}
    <input type="checkbox" name="isnav" lay-skin="switch" lay-text="显示|隐藏" lay-filter="status"  value="{{d.menuid}}">
  {{#  } }}
</script>




       
  </div>
</div> 


<script type="text/javascript" src="/static/admin/js/admin.js"></script>
</body>
</html>