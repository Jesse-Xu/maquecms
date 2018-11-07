<?php /*a:3:{s:51:"G:\www2\cms2\application\admin\view\user\lists.html";i:1541608387;s:52:"G:\www2\cms2\application\admin\view\public\base.html";i:1541603122;s:52:"G:\www2\cms2\application\admin\view\public\head.html";i:1541608406;}*/ ?>
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
    <input class="layui-input" name="start" id="start"  placeholder="请输入开始时间">
  </div>
  <div class="layui-inline">
    <input class="layui-input" name="end" id="end"  placeholder="请输入结束时间">
  </div>
  <div class="layui-inline">
    <input class="layui-input" name="keyword"  placeholder="请输入搜索关键字">
  </div>
  <div class="layui-inline">
    <button class="layui-btn" lay-filter="submit" lay-submit>搜索</button>
    <button class="layui-btn layui-btn-primary"  lay-filter="submit" lay-submit>重置</button>
    <button class="layui-btn layui-btn-normal" onclick="ExportExcel();" >导出用户</button>
    <button class="layui-btn layui-btn-normal" type="reset" data-type="reload" lay-filter="reset" lay-submit lay-event="ImportExcel">导入用户</button>
  </div>

</div>
<table class="layui-table" lay-data="{height:500,url:location.href, page:true, id:'table'}" lay-filter="table" lay-size="lg">
  <thead>
    <tr>
      <th lay-data="{field:'userid',width:75}">ID</th>
      <th lay-data="{field:'src',templet:'#src',width:75}">头像</th>
      <th lay-data="{field:'nickname'}">用户昵称</th>
      <th lay-data="{field:'tel'}">手机号</th>
      <th lay-data="{field:'email'}">邮箱</th>
      <th lay-data="{field:'status',templet:'#status',width:105}">状态</th>
      <th lay-data="{field:'addtime', sort: true}">加入时间</th>
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


  table.on('tool(table)', function(obj){
    return false;
    var data = obj.data;

    if(obj.event === 'del'){
      layer.confirm('真的删除本条数据吗？', function(index){

        $.post("<?php echo Url('del'); ?>",{'userid': data.userid},function(data){
           if(data=='1'){
              alert("操作成功~");
              obj.del();
              layer.close(index);
           }else{
             alert("删除失败请重试！");
           }
        })
        
      });
    }
  });

  //图片查看
  $("body").on("click","img",function(e){
        layer.photos({ photos: {"data": [{"src": e.target.src}]},anim: 5 });
  });
  
  //开关
  form.on('switch(status)', function(data){

    $.post("<?php echo url('up'); ?>",{'status':data.elem.checked,'userid':data.value},function(res){
      if(res=='0'){
        alert("操作失败");
      }
    });
   
  });  

});



</script>

<script type="text/html" id="link">
  <a href="{{d.link}}" class="layui-table-link" target="_blank">{{d.link}}</a>
</script>
<script type="text/html" id="src">
  <img src='{{d.src}}' width="50px;">
</script>
<script type="text/html" id="order">
  <a href="order/orderlist/userid/{{d.userid}}" style="color:#009688;"  target="_blank">点击查看</a>
</script>
<script type="text/html" id="status">
  {{#  if(d.status == 1){ }}
    <input type="checkbox" name="status" lay-skin="switch" lay-text="启用|禁用" lay-filter="status" value="{{d.userid}}" checked>
  {{#  } else { }}
    <input type="checkbox" name="status" lay-skin="switch" lay-text="启用|禁用" lay-filter="status"  value="{{d.userid}}">
  {{#  } }}
</script>

<script type="text/javascript">

  function ExportExcel(){
     $.post("<?php echo url('ExportExcel'); ?>",function(){
      alert("ASd");
     });
  }
 
</script>

       
  </div>
</div> 


<script type="text/javascript" src="/static/admin/js/admin.js"></script>
</body>
</html>