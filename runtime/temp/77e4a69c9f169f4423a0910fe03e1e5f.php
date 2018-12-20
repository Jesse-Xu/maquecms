<?php /*a:3:{s:53:"G:\www2\cms2\application\admin\view\auth\loglist.html";i:1540918250;s:52:"G:\www2\cms2\application\admin\view\public\base.html";i:1543161944;s:52:"G:\www2\cms2\application\admin\view\public\head.html";i:1541778938;}*/ ?>
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
   
      
<div class="layui-form">
  条件搜索：
  <div class="layui-inline">
    <input class="layui-input" name="keyword" id="keyword"  placeholder="请输入关键字">
  </div>
  <div class="layui-inline">
    <input class="layui-input" name="start" id="start"  placeholder="请输入开始时间">
  </div>
  <div class="layui-inline">
    <input class="layui-input" name="end" id="end"  placeholder="请输入结束时间">
  </div>
  <div class="layui-inline">
    <button class="layui-btn" lay-filter="submit" lay-submit>搜索</button>
    <button class="layui-btn layui-btn-primary"  lay-filter="submit" lay-submit>重置</button>
  </div>

</div>
<table class="layui-table" lay-data="{height:500,url:'<?php echo Url('loglist'); ?>', page:true, id:'videolist'}" lay-filter="table" lay-size="lg">
  <thead>
    <tr>
      <th lay-data="{field:'logid',width:75}">ID</th>
      <th lay-data="{field:'name',width:125}">管理员名称</th>
      <th lay-data="{field:'content'}">日志</th>
      <th lay-data="{field:'ip'}">ip</th>
      <th lay-data="{field:'addtime'}">操作时间</th>
    </tr>
  </thead>
</table>


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

  //搜索
  form.on('submit(submit)', function(data){
   
    var field=data.field;

    if($(data.elem).html()=="重置"){

        $("input").val("");
        field="";
    }

    table.reload('table', {
       where: field
    });

    return false; 
  });


});

</script>

       
  </div>
</div> 


<script type="text/javascript" src="/static/admin/js/admin.js"></script>
</body>
</html>