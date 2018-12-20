<?php /*a:3:{s:55:"G:\www2\cms2\application\admin\view\news\modellist.html";i:1541910621;s:52:"G:\www2\cms2\application\admin\view\public\base.html";i:1543161944;s:52:"G:\www2\cms2\application\admin\view\public\head.html";i:1541778938;}*/ ?>
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
  <a  href="javascript:LayerOpen('<?php echo Url('modeladd'); ?>');" class="layui-btn layui-btn-normal" data-type="reload" >添加模型</a>
</div>
<table class="layui-table" lay-data="{height:650,url:location.href, page:true, id:'list'}" lay-filter="table" lay-size="lg">
  <thead>
    <tr>
      <th lay-data="{field:'modelid',width:75}">ID</th>
      <th lay-data="{field:'px',width:75}">排序</th>
      <th lay-data="{field:'name'}">模型名称</th>
      <th lay-data="{field:'type'}">类型</th>
      <th lay-data="{field:'page'}">单页模板</th>
      <th lay-data="{field:'list'}">列表模板</th>
      <th lay-data="{field:'content'}">内容模板</th>
      <th lay-data="{field:'addtime'}">添加时间</th>
      <th lay-data="{fixed: 'right',toolbar: '#barDemo'}">操作</th>
    </tr>
  </thead>
</table>

<script type="text/html" id="barDemo">
  
  <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
   
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
  

  table.on('tool(table)', function(obj){
    var data = obj.data;

    if(obj.event === 'del'){

       Delete("<?php echo Url('modeldel'); ?>",{'modelid': data.modelid},obj);
      
    } else if(obj.event === 'edit'){
        LayerOpen("/admin.php/news/modeledit/modelid/"+data.modelid);
    }

  });


});

</script>

       
  </div>
</div> 


<script type="text/javascript" src="/static/admin/js/admin.js"></script>
</body>
</html>