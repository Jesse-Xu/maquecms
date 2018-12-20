<?php /*a:3:{s:51:"G:\www2\cms2\application\admin\view\banner\add.html";i:1542724494;s:52:"G:\www2\cms2\application\admin\view\public\base.html";i:1543161944;s:52:"G:\www2\cms2\application\admin\view\public\head.html";i:1541778938;}*/ ?>
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
   
      

<form class="layui-form form" action="" method="POST">
        <div class="layui-form-item">
          <label class="layui-form-label"><span class="form-required">*</span>轮播图片</label>
          <div class="layui-input-inline" >
            <input type="text" name="src" required lay-verify="required" placeholder="封面图片地址" autocomplete="off" class="layui-input"  value="">
           
          </div>
          <div class="layui-input-inline" >
            <button type="button" class="layui-btn layui-btn-small layui-btn-normal fileupload" lay-data="{data:{type:'image'},accept:'images'}" data-name="src">
              <i class="layui-icon">&#xe64a;</i>上传图片
            </button>
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">跳转地址</label>
          <div class="layui-input-block" >
            <input type="text" name="link"  placeholder="图片跳转地址" autocomplete="off" class="layui-input"  value="">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">排序</label>
          <div class="layui-input-inline" >
            <input type="text" name="px"  placeholder="排序" autocomplete="off" class="layui-input"  value="">
          </div>
        </div>
        
        <div class="layui-form-item">
          <label class="layui-form-label">状态</label>
          <div class="layui-input-block">
            <input type="checkbox" name="status" lay-skin="switch" lay-text="启用|禁用" lay-filter="switchTest" value="1" checked=''>
            <div class="layui-unselect layui-form-switch" lay-skin="_switch">
              <em>OFF</em><i></i>
            </div>
          </div>
        </div>
        <div class="layui-form-item"> 
          <div class="layui-input-block">
            <button class="layui-btn" lay-submit="" lay-filter="submit">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
          </div>
        </div>
</form>

<script type="text/javascript">
  layui.use(['form','upload','table'], function(){
    var form = layui.form
    ,upload  = layui.upload
    ,table  = layui.table;
     //上传
    upload.render({
      elem: '.fileupload' //绑定元素
      ,url: '<?php echo Url('common/fileupload'); ?>' //上传接口
      ,before: function(obj){ //obj参数包含的信息，跟 choose回调完全一致，可参见上文。

        layer.load(); //上传loading
      }
      ,done: function(res,index){ 

          layer.closeAll('loading');

          if(res.status=='1'){ 
            alert("上传成功~"); 

              var item = this.item;

              var dom=item.attr('data-name');
              layui.$("input[name='"+dom+"']").val(res.path);

          }else{
            alert("上传失败,请重试！");
          }
      }
      ,error: function(){
          layer.closeAll('loading');
          alert("上传失败,请重试！");
      }
      ,field:'file' 

    });

    form.on('submit(submit)', function(data){
      
      return FormAjax(location.href,data.field);
     
    });
    

  });
</script>





       
  </div>
</div> 


<script type="text/javascript" src="/static/admin/js/admin.js"></script>
</body>
</html>