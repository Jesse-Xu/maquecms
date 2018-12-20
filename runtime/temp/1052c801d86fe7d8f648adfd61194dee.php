<?php /*a:3:{s:55:"G:\www2\cms2\application\admin\view\news\modeledit.html";i:1542722643;s:52:"G:\www2\cms2\application\admin\view\public\base.html";i:1541603122;s:52:"G:\www2\cms2\application\admin\view\public\head.html";i:1541778938;}*/ ?>
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
   
      

<form class="layui-form" action="" method="POST" >
  <div class="layui-form-item">
    <label class="layui-form-label"><span class="form-required">*</span>模型名称</label>
    <div class="layui-input-inline ">
      <input type="hidden" name="modelid" value="<?php echo htmlentities($info['modelid']); ?>">
      <input type="text" name="name" lay-verify="required"  placeholder="请输入模型名称" autocomplete="off" class="layui-input" value="<?php echo htmlentities($info['name']); ?>">
    </div>
  </div>
  <div class="layui-form-item">
      <label class="layui-form-label"><span class="form-required">*</span>类型</label>
      <div class="layui-input-inline" >
        <select name="type" lay-verify="required"  lay-filter="type" id="type" >
          <option value="">请选择类型</option>
          <option value="列表类型" <?php if($info['type'] == '列表类型'): ?>selected <?php endif; ?>>列表类型</option>
          <option value="单页类型" <?php if($info['type'] == '单页类型'): ?>selected <?php endif; ?>>单页类型</option>
            
        </select>   
      </div>
  </div>


  
  <!-- 单页模板列表 -->
  <div class="layui-form-item selectlist" id="templatepage" style="display:none;<?php if($info['type'] == '单页类型'): ?>display:block;<?php endif; ?>">
      <label class="layui-form-label">单页模板</label>
      <div class="layui-input-inline" >
        <select name="page" lay-verify="template">
          <option value="">请选择单页模板</option>
          <?php foreach($templates['page'] as $v): ?>
              <option value="<?php echo htmlentities($v); ?>" <?php if($v == $info['page']): ?>selected<?php endif; ?>><?php echo htmlentities($v); ?>.html</option>
          <?php endforeach; ?>
        </select>   
      </div>
  </div>

  <div class="layui-form-item selectlist"  id="templatelist" style="display:none;<?php if($info['type'] == '列表类型'): ?>display:block;<?php endif; ?>">
      <!-- <label class="layui-form-label">栏目页模板</label>
      <div class="layui-input-inline" >
        <select name="category" >
          <option value="">请选择栏目页模板</option>
          <?php foreach($templates['category'] as $v): ?>
              <option value="<?php echo htmlentities($v); ?>" <?php if($v == $info['category']): ?>selected<?php endif; ?>><?php echo htmlentities($v); ?>.html</option>
          <?php endforeach; ?>
        </select>   
      </div> -->
      <label class="layui-form-label">列表页模板</label>
      <div class="layui-input-inline" >
        <select name="list" lay-verify="template">
          <option value="">请选择列表页模板</option>
          <?php foreach($templates['list'] as $v): ?>
              <option value="<?php echo htmlentities($v); ?>" <?php if($v == $info['list']): ?>selected<?php endif; ?>><?php echo htmlentities($v); ?>.html</option>
          <?php endforeach; ?>
        </select>   
      </div>
      <label class="layui-form-label">内容页模板</label>
      <div class="layui-input-inline" >
        <select name="content" lay-verify="template">
          <option value="">请选择内容页模板</option>
          <?php foreach($templates['content'] as $v): ?>
              <option value="<?php echo htmlentities($v); ?>" <?php if($v == $info['content']): ?>selected<?php endif; ?>><?php echo htmlentities($v); ?>.html</option>
          <?php endforeach; ?>
        </select>   
      </div>
  </div>
  <div class="layui-form-item">
      <label class="layui-form-label">作者</label>
      <div class="layui-input-inline" >
        <select name="authorid">
          <option value="">请选择默认作者</option>
          <?php foreach($authorlist as $v): ?>
            <option value="<?php echo htmlentities($v['authorid']); ?>" <?php if($v['authorid'] == $info['authorid']): ?>selected<?php endif; ?>><?php echo htmlentities($v['name']); ?></option>
          <?php endforeach; ?>
        </select>   
      </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">排序</label>
    <div class="layui-input-inline">
      <input type="number" name="px"  placeholder="请输入数字排序" autocomplete="off" class="layui-input" value="<?php echo htmlentities($info['px']); ?>">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">评论</label>
    <div class="layui-input-block">
      <input type="radio" name="iscomment" value="1" title="开启" <?php if($info['iscomment'] != '0'): ?>checked<?php endif; ?>>
      <input type="radio" name="iscomment" value="0" title="关闭" <?php if($info['iscomment'] == '0'): ?>checked<?php endif; ?>>
    </div>
  </div>
  <?php if(!(empty($info['modelid']) || (($info['modelid'] instanceof \think\Collection || $info['modelid'] instanceof \think\Paginator ) && $info['modelid']->isEmpty()))): ?>
  <div class="layui-form-item">
    <label class="layui-form-label">更新</label>
    <div class="layui-input-inline">
      <input type="checkbox" name="up" title="同时更新所有页面模板" lay-skin="primary" checked value="1">
    </div>
  </div>
  <?php endif; ?>
  <!-- <div class="layui-form-item">
    <label class="layui-form-label">状态</label>
    <div class="layui-input-block">
      <input type="checkbox" name="status" lay-skin="switch" lay-text="启用|禁用" lay-filter="switchTest" value="1" <?php if(($info['status'] == '1') OR ($info['status'] != '0')): ?>checked=''<?php endif; ?>>
      <div class="layui-unselect layui-form-switch" lay-skin="_switch">
        <em>OFF</em><i></i>
      </div>
    </div>
  </div> -->

  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="submit">立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>

<script type="text/javascript">
	layui.use(['form'], function(){
	  var form = layui.form;

    form.on('select(type)', function(data){

      $(".selectlist").hide();
      if(data.value=='单页类型'){
        $("#templatepage").show();  
      }else if(data.value=='列表类型'){
        $("#templatelist").show();
      }
     
    });  

    form.on('submit(submit)', function(data){
      
      return FormAjax(location.href,data.field);

    });

    layer.photos({
      photos: 'div'
      ,anim: 5 
    }); 

	  form.verify({
	    template: function(value,item){
        var type=$("select[name='type']").val();  
        if(type=='单页类型'){
          
          if($("select[name='page']").val()==''){
            return "请选择单页模板！";
          }
        }else if(type=='列表类型'){
          
          /*if($("select[name='category']").val()==''){
            return "请选择栏目页模板";
          }*/
          if($("select[name='list']").val()==''){
            return "请选择列表页模板";
          }
          if($("select[name='content']").val()==''){
            return "请选择内容页模板";
          }
        }
	      
	    }
	  });
	});
</script>


       
  </div>
</div> 


<script type="text/javascript" src="/static/admin/js/admin.js"></script>
</body>
</html>