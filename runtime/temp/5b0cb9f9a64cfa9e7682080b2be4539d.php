<?php /*a:3:{s:56:"G:\www2\cms2\application\admin\view\news\authorlist.html";i:1540918275;s:52:"G:\www2\cms2\application\admin\view\public\base.html";i:1541603122;s:52:"G:\www2\cms2\application\admin\view\public\head.html";i:1541602514;}*/ ?>
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



  
  <div class="layui-body">
   <!-- 内容主体区域 -->
  <div id="main">

      <blockquote class="layui-elem-quote">
        <?php echo htmlentities($title); ?>  

        
      </blockquote>
   
      
<div class="demoTable">
  <a  href="<?php echo Url('authorinfo'); ?>" class="layui-btn" data-type="reload" >添加作者</a>
</div>
<table class="layui-table" lay-data="{height:650,url:location.href, page:true, id:'list'}" lay-filter="table" lay-size="lg">
  <thead>
    <tr>
      <th lay-data="{field:'authorid',width:75}">ID</th>
      <th lay-data="{field:'px',width:75}">排序</th>
      <th lay-data="{field:'pic',templet:'#pic',width:65}">头像</th>
      <th lay-data="{field:'name'}">作者名称</th>
      <th lay-data="{field:'status',templet:'#status',width:105}">状态</th>
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
      layer.confirm('真的删除本条数据吗？', function(index){

        $.post("<?php echo Url('authordel'); ?>",{'authorid': data.authorid},function(data){
           if(data=='1'){
              alert();
              obj.del();
              layer.close(index);
           }else{
             alert("删除失败请重试！");
           }
        })
        
      });
    } else if(obj.event === 'edit'){
        location.href="/admin.php/news/authorinfo/authorid/"+data.authorid;
    }
    
  });

  //图片查看
  $("body").on("click","img",function(e){
        layer.photos({ photos: {"data": [{"src": e.target.src}]},anim: 5 });
  });

  //开关
  form.on('switch(status)', function(data){

    var name=$(this).attr('name');

    $.post("<?php echo url('authorup'); ?>",{type:name,value:data.elem.checked,'authorid':data.value},function(res){
      if(res=='0'){
        alert("操作失败");
      }
    });
   
  }); 


});

</script>

<script type="text/html" id="pic">
  <img src='{{d.pic}}' >
</script>
<script type="text/html" id="status">
  {{#  if(d.status == 1){ }}
    <input type="checkbox" name="status" lay-skin="switch" lay-text="启用|禁用" lay-filter="status" value="{{d.authorid}}" checked>
  {{#  } else { }}
    <input type="checkbox" name="status" lay-skin="switch" lay-text="启用|禁用" lay-filter="status"  value="{{d.authorid}}">
  {{#  } }}
</script>


       
  </div>
</div> 


<script type="text/javascript" src="/static/admin/js/admin.js"></script>
</body>
</html>