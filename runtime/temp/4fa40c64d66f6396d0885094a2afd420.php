<?php /*a:3:{s:53:"G:\www2\cms2\application\admin\view\news\comment.html";i:1542125875;s:52:"G:\www2\cms2\application\admin\view\public\base.html";i:1543161944;s:52:"G:\www2\cms2\application\admin\view\public\head.html";i:1541778938;}*/ ?>
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
   
      
<form class="layui-form">
  <div class="demoTable">
    条件搜索：
    <div class="layui-inline">
      <input class="layui-input" name="keyword" id="keyword" autocomplete="off" placeholder="请输入关键字">
    </div>
    <div class="layui-inline">
      <input class="layui-input" name="start" id="start"  placeholder="请输入评论开始时间">
    </div>
    <div class="layui-inline">
      <input class="layui-input" name="end" id="end"  placeholder="请输入评论结束时间">
    </div>
    <div class="layui-inline">
      <button class="layui-btn" data-type="reload" lay-filter="submit" lay-submit>搜索</button>
      <button class="layui-btn layui-btn-primary" type="reset" data-type="reload" lay-filter="reset" lay-submit>重置</button>
    </div>

  </div>
</form>
<table class="layui-table" lay-data="{height:650,url:location.href,where:{newsid:'<?php echo input('newsid'); ?>'}, page:true, id:'comment'}" lay-filter="table">
  <thead>
    <tr>
      <th lay-data="{field:'id', sort: true,width:75}">ID</th>
      <th lay-data="{field:'title'}">新闻标题</th>
      <th lay-data="{field:'avatar',templet:'#avatar',width:75}">头像</th>
      <th lay-data="{field:'nickname'}">昵称</th>
      <th lay-data="{field:'content'}">评论内容</th>
      <th lay-data="{field:'status',templet:'#status',width:105}">状态</th>
      <th lay-data="{field:'addtime', sort: true}">评论时间</th>
      <th lay-data="{fixed: 'right', width:160, align:'center', toolbar: '#barDemo'}">操作</th>
    </tr>
  </thead>
</table>

<script type="text/html" id="barDemo">
  <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
</script>

<script>
layui.use(['table','laydate','form'], function(){
  var table = layui.table;
  var laydate = layui.laydate;
  var form = layui.form;
   laydate.render({
      elem: '#start',
      max: 0
   });
    laydate.render({
      elem: '#end',
      max: 1
   });
   
  var $ = layui.$;

  //搜索
  form.on('submit(submit)', function(data){

    var keyword=$("input[name='keyword']").val();
    var start=$("input[name='start']").val();
    var end=$("input[name='end']").val();
    var cateid=$("select[name='cateid']").val();
    var id=$("select[name='id']").val();
    var wheretype=$("select[name='wheretype']").val();
    
    
    table.reload('comment', {
    where: { 
      keyword:keyword,
      start:start,
      end:end,
      cateid:cateid,
      id:id,
      wheretype:wheretype
    }
  });

    return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
  });




  table.on('tool(table)', function(obj){
    var data = obj.data;

    if(obj.event === 'del'){

      Delete("<?php echo Url('del'); ?>",{'id': data.id},obj);

    } 

  });

  //开关
  form.on('switch(status)', function(data){

    var name=$(this).attr('name');

    Status("<?php echo url('commentup'); ?>",{type:name,value:data.elem.checked,'id':data.value});
    
  }); 

  //图片查看
  $("body").on("click","img",function(e){
        layer.photos({ photos: {"data": [{"src": e.target.src}]},anim: 5 });
  });


});

</script>


<script type="text/html" id="link">
  {{#  if(d.url != '' && typeof(d.url) != 'undefined'){ }}
     <a href="{{d.url}}" class="layui-table-link" target="_blank">{{d.title}}</a>
  {{#  } else { }}
    {{d.title}}
  {{#  } }}
</script>
<script type="text/html" id="avatar">
  <img src='{{d.avatar}}'>
</script>


<script type="text/html" id="status">
  {{#  if(d.status == 1){ }}
    <input type="checkbox" name="status" lay-skin="switch" lay-text="启用|禁用" lay-filter="status" value="{{d.id}}" checked>
  {{#  } else { }}
    <input type="checkbox" name="status" lay-skin="switch" lay-text="启用|禁用" lay-filter="status"  value="{{d.id}}">
  {{#  } }}
</script>





       
  </div>
</div> 


<script type="text/javascript" src="/static/admin/js/admin.js"></script>
</body>
</html>