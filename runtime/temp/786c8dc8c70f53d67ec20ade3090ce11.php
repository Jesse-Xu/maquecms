<?php /*a:3:{s:55:"G:\www2\cms2\application\admin\view\auth\actionadd.html";i:1542724143;s:52:"G:\www2\cms2\application\admin\view\public\base.html";i:1543161944;s:52:"G:\www2\cms2\application\admin\view\public\head.html";i:1541778938;}*/ ?>
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
          <label class="layui-form-label"><span class="form-required">*</span>分类</label>
          <div class="layui-input-block"  style="width:350px;">
            <select name="type" lay-verify="required" lay-filter="select">
              <option value="">请选择分类</option>
              <option value="控制器"  <?php if($info['type'] == '控制器'): ?>selected="selected"<?php endif; ?>>控制器</option>
              <option value="操作"  <?php if($info['type'] == '操作'): ?>selected="selected"<?php endif; ?>>操作</option>
            </select>
          </div>
        </div>
        <div class="layui-form-item" <?php if($info['type'] == '操作'): ?>style="display:none;" <?php endif; ?> id="pid">
          <label class="layui-form-label">所属控制器</label>
          <div class="layui-input-block"  style="width:350px;">
            <select name="pid" <?php if($info['type'] == '操作'): ?> selected <?php endif; ?>>
              <option value="">请选择控制器</option>
              <?php foreach($list as $v): ?>
              <option value="<?php echo htmlentities($v['actionid']); ?>"  <?php if($info['pid'] == $v['actionid']): ?>selected="selected"<?php endif; ?>><?php echo htmlentities($v['name']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label"><span class="form-required">*</span>名称</label>
          <div class="layui-input-inline" style="width:350px;">
            <input type="text" name="name" required lay-verify="required" placeholder="名称" autocomplete="off" class="layui-input"  value="">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label"><span class="form-required">*</span>数值</label>
          <div class="layui-input-inline" style="width:350px;">
            <input type="text" name="value" required lay-verify="required" placeholder="数值" autocomplete="off" class="layui-input"  value="">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">排序</label>
          <div class="layui-input-inline" style="width:350px;">
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
	layui.use(['form','layedit','upload'], function(){
	  var form = layui.form
    ,upload  = layui.upload;
     
	   form.on('select(select)', function(data){
       if(data.value=="操作"){
         $("#pid").show();
         $("#pid").find("select").attr('disabled',false);
       }else{
         $("#pid").hide();
         $("#pid").find("select").attr('disabled',true);
       }
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