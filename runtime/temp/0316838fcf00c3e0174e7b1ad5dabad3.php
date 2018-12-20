<?php /*a:3:{s:54:"G:\www2\cms2\application\admin\view\news\newslist.html";i:1543079482;s:52:"G:\www2\cms2\application\admin\view\public\base.html";i:1543161944;s:52:"G:\www2\cms2\application\admin\view\public\head.html";i:1541778938;}*/ ?>
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
      <select name="cateid">
        <option value="">全部分类</option>
        <?php if(!(empty($catelist) || (($catelist instanceof \think\Collection || $catelist instanceof \think\Paginator ) && $catelist->isEmpty()))): foreach($catelist as $v): ?>
          <option value="<?php echo htmlentities($v['cateid']); ?>"><?php echo htmlentities($v['catename']); ?></option>
          <?php endforeach; endif; ?>
      </select> 
    </div>
    <div class="layui-inline">
      <select name="authorid">
        <option value="">全部作者</option>
        <?php if(!(empty($authorlist) || (($authorlist instanceof \think\Collection || $authorlist instanceof \think\Paginator ) && $authorlist->isEmpty()))): foreach($authorlist as $v): ?>
          <option value="<?php echo htmlentities($v['authorid']); ?>"><?php echo htmlentities($v['name']); ?></option>
          <?php endforeach; endif; ?>
      </select> 
    </div>
    <div class="layui-inline">
      <select name="wheretype">
        <option value="">全部状态</option>
        <option value="ishot">已推荐</option>
        <option value="nohot">未推荐</option>
        <option value="istop">已置顶</option>
        <option value="notop">未置顶</option>
        <option value="isstatus">正常</option>
        <option value="nostatus">下架</option>
        <option value="caogao">草稿</option>
      </select> 
    </div>
    <div class="layui-inline">
      <input class="layui-input" name="keyword" id="keyword" autocomplete="off" placeholder="请输入关键字">
    </div>
    <div class="layui-inline">
      <input class="layui-input" name="start" id="start"  placeholder="请输入发布开始时间">
    </div>
    <div class="layui-inline">
      <input class="layui-input" name="end" id="end"  placeholder="请输入发布结束时间">
    </div>
    <div class="layui-inline">
      <button class="layui-btn" lay-filter="submit" lay-submit>搜索</button>
      <button class="layui-btn layui-btn-primary"  lay-filter="submit" lay-submit>重置</button>
      <a href="javascript:LayerOpen('<?php echo url('news/newsadd'); ?>');" class="layui-btn layui-btn-normal" >添加新闻</a>
    </div>

  </div>
</form>
<table class="layui-table" lay-data="{height:650,url:location.href,where:{cateid:'<?php echo input('cateid'); ?>'}, page:true, id:'table',toolbar:'#tool'}" lay-filter="table" lay-size="lg">
  <thead>
    <tr>
      <th lay-data="{type: 'radio', fixed: 'left'}">选项</th>
      <th lay-data="{field:'newsid',width:75}">ID</th>
      <th lay-data="{field:'thumb',templet:'#thumb',width:75}">缩略图</th>
      <th lay-data="{field:'catename',width:100}">所属分类</th>
      <th lay-data="{field:'title',templet:'#link'}">标题</th>
      <th lay-data="{field:'hits',width:100}">阅读量</th>
      <th lay-data="{field:'authorname',width:100}">作者</th>
      <th lay-data="{field:'status',templet:'#status',width:150}">状态</th>
      <th lay-data="{field:'pushtime',width:180}">发布时间</th>
      <th lay-data="{fixed: 'right', width:160, align:'center', toolbar: '#barDemo'}">操作</th>
    </tr>
  </thead>
</table>

<script type="text/html" id="barDemo">
  <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
  <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
</script>

<script type="text/html" id="tool">
  <a class="layui-btn layui-btn-xs" lay-event="LookPdf">查看pdf</a>
  <a class="layui-btn layui-btn-xs" lay-event="DownPdf">导出pdf</a>
  <!-- <a class="layui-btn layui-btn-xs" lay-event="LookWord">查看word</a>
  <a class="layui-btn layui-btn-xs" lay-event="DownWord">导出word</a> -->
</script>

<script>
layui.use(['table','laydate','form'], function(){
  table = layui.table;
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
   

   table.on('toolbar(table)', function(obj){

      var newsid = table.checkStatus(obj.config.id).data[0].newsid;

      switch(obj.event){
        case 'LookPdf':
          LayerOpen("/admin.php/news/articlepdf/newsid/"+newsid);
        break;
        case 'DownPdf':
          window.location.href = "/admin.php/news/articlepdf/newsid/"+newsid+"/type/D";
        break;
        case 'LookWord':
          LayerOpen("/admin.php/news/articleword/newsid/"+newsid);
        break;
        case 'DownWord':
          window.location.href = "/admin.php/news/articleword/newsid/"+newsid+"/type/D";
        break;
      };
      
  });


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
    var data = obj.data;

    if(obj.event === 'del'){

      Delete("<?php echo Url('newsdel'); ?>",{'newsid': data.newsid});
      
    } else if(obj.event === 'edit'){

        LayerOpen("/admin.php/news/newsedit/newsid/"+data.newsid);
      //layer.alert('编辑行：<br>'+ JSON.stringify(data))
    }
  });

  form.on('switch(status)', function(data){

    var name=$(this).attr('name');
    Status("<?php echo url('newsup'); ?>",{type:name,value:data.elem.checked,'newsid':data.value});

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
<script type="text/html" id="thumb">
  <img src='{{d.thumb}}'>
</script>

<script type="text/html" id="status">
  {{#  if(d.status == '1'){ }}
    <span class="layui-badge layui-bg-green">上架</span>
  {{#  } }}
  {{#  if(d.status == '0'){ }}
    <span class="layui-badge layui-bg-gray">下架</span>
  {{#  } }}
  {{#  if(d.status == '-1'){ }}
    <span class="layui-badge layui-bg-blue">草稿</span>
  {{#  } }}
  {{#  if(d.hot == '1'){ }}
    <span class="layui-badge layui-bg-orange">推荐</span>
  {{#  } }}
  {{#  if(d.top == '1'){ }}
    <span class="layui-badge ">置顶</span>
  {{#  } }}
</script>

<script type="text/html" id="count">
    <span class="layui-badge layui-bg-gray" title="图片 {{d.count.img}}个"><i class="layui-icon">&#xe60d;</i> {{d.count.img}}</span>
    <span class="layui-badge layui-bg-gray " title="附件 {{d.count.file}}个"><i class="layui-icon">&#xe621;</i> {{d.count.file}} </span>
    <span class="layui-badge layui-bg-gray " title="评论 {{d.count.comment}}个"><i class="layui-icon">&#xe611;</i> {{d.count.comment}} </span>
</script>





       
  </div>
</div> 


<script type="text/javascript" src="/static/admin/js/admin.js"></script>
</body>
</html>