<?php /*a:3:{s:51:"G:\www2\cms2\application\admin\view\site\index.html";i:1535000978;s:52:"G:\www2\cms2\application\admin\view\public\base.html";i:1543161944;s:52:"G:\www2\cms2\application\admin\view\public\head.html";i:1541778938;}*/ ?>
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
</div> 


<script type="text/javascript" src="/static/admin/js/admin.js"></script>
</body>
</html>