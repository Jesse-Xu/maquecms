<?php /*a:3:{s:51:"G:\www2\cms2\application\admin\view\site\water.html";i:1536061720;s:52:"G:\www2\cms2\application\admin\view\public\base.html";i:1543161944;s:52:"G:\www2\cms2\application\admin\view\public\head.html";i:1541778938;}*/ ?>
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
          <label class="layui-form-label">水印类型</label>
          <div class="layui-input-inline" style="width:350px;">
            <input type="radio" name="water" value="0" title="禁用" <?php if(($info['water'] == '0') OR ($info['water'] == '')): ?>checked<?php endif; ?>>
            <input type="radio" name="water" value="img" title="图片" <?php if($info['water'] == 'img'): ?>checked<?php endif; ?>>
            <input type="radio" name="water" value="text" title="文本" <?php if($info['water'] == 'text'): ?>checked<?php endif; ?>>
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">水印位置</label>
          <div class="layui-input-inline" style="width:350px;">
            <input type="radio" name="wate_position" value="1" title="左上角" <?php if($info['wate_position'] == '1'): ?>checked<?php endif; ?>>
            <input type="radio" name="wate_position" value="2" title="上居中" <?php if($info['wate_position'] == '2'): ?>checked<?php endif; ?>>
            <input type="radio" name="wate_position" value="3" title="右上角" <?php if($info['wate_position'] == '3'): ?>checked<?php endif; ?>>
            <br/>
            <input type="radio" name="wate_position" value="4" title="左居中" <?php if($info['wate_position'] == '4'): ?>checked<?php endif; ?> >
            <input type="radio" name="wate_position" value="5" title="正居中" <?php if($info['water'] == '5'): ?>checked<?php endif; ?> >
            <input type="radio" name="wate_position" value="6" title="右居中" <?php if($info['wate_position'] == '6'): ?>checked<?php endif; ?> >
            <br/>
            <input type="radio" name="wate_position" value="7" title="左下角" <?php if($info['wate_position'] == '7'): ?>checked<?php endif; ?> >
            <input type="radio" name="wate_position" value="8" title="下居中" <?php if($info['water'] == '8'): ?>checked<?php endif; ?> >
            <input type="radio" name="wate_position" value="9" title="右下角" <?php if(($info['wate_position'] == '9') OR ($info['wate_position'] == '')): ?>checked<?php endif; ?> >
            <br/>
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">水印图片</label>
          <div class="layui-input-inline" style="width:350px;">
            <input type="text" name="wate_path"  lay-verify="wate_path" placeholder="水印图片地址" autocomplete="off" class="layui-input"  value="<?php echo htmlentities($info['wate_path']); ?>">
          </div>
          <div class="layui-word-aux">
            <img src="<?php echo htmlentities($info['wate_path']); ?>" id="wate_path" style="width:35px;<?php if($info['wate_path'] == ''): ?>display:none;<?php endif; ?>">
            <button type="button" class="layui-btn layui-btn-small fileupload" lay-data="{data:{type:'image'},accept:'images'}" data-name="src">
              <i class="layui-icon">&#xe64a;</i>上传图片
            </button>
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">水印透明度</label>
          <div class="layui-input-inline" style="width:350px;margin-top: 17px;">
            <!-- <input type="text" name="wate_transparent"  placeholder="水印透明度" autocomplete="off" class="layui-input"  value="<?php echo htmlentities($info['px']); ?>"> -->
              <div id="wate_transparent" ></div>
              <input type="hidden" name="wate_transparent"  value="<?php echo htmlentities($info['wate_transparent']); ?>" />
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">水印文字</label>
          <div class="layui-input-inline" style="width:350px;">
            <input type="text" name="wate_text" lay-verify="wate_text" placeholder="请输入水印文字" autocomplete="off" class="layui-input"  value="<?php echo htmlentities($info['wate_text']); ?>">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">水印字体</label>
          <div class="layui-input-inline" style="width:350px;">
            <input type="text" name="text_font"  placeholder="请输入水印字体" autocomplete="off" class="layui-input"  value="<?php echo htmlentities($info['text_font']); ?>">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">字体颜色</label>
          <div class="layui-input-inline" style="width:350px;">

              <div class="layui-input-inline" style="width: 120px;">
                <input type="text" name="text_color" lay-verify="text_color"  placeholder="请输入字体颜色" class="layui-input" id="text_color" value="<?php echo htmlentities($info['text_color']); ?>" >
              </div>
              <div class="layui-inline" style="left: -11px;">
                <div id="test-form"></div>
              </div>
          </div>
          <!-- <div class="layui-word-aux layui-form-mid">
             <input type="color"  onchange='$("#color").val($(this)[0].value);' value=value="<?php echo htmlentities($info['text_color']); ?>" >
          </div> -->
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">字体大小</label>
          <div class="layui-input-inline" style="width:350px;">
            <input type="number" name="text_size" lay-verify="text_size"  placeholder="请输入字体大小" autocomplete="off" class="layui-input"  value="<?php echo htmlentities($info['text_size']); ?>">
          </div>
        </div>
        <div class="layui-form-item">
          <div class="layui-input-block">
            <button class="layui-btn" lay-submit="" lay-filter="formDemo">立即提交</button>
          </div>
        </div>
</form>

<script type="text/javascript">
	layui.use(['form','layedit','upload','slider','colorpicker'], function(){
	  var form = layui.form
    ,upload  = layui.upload,
    slider = layui.slider,
    colorpicker=layui.colorpicker;

     //上传
    upload.render({
      elem: '.fileupload' //绑定元素
      ,url: '<?php echo Url('common/fileupload',array('notwater'=>'1')); ?>' //上传接口
      ,before: function(obj){ //obj参数包含的信息，跟 choose回调完全一致，可参见上文。

        layer.load(); //上传loading
      }
      ,done: function(res,index){ 

          layer.closeAll('loading');

          if(res.status=='1'){ 
            alert("上传成功~"); 

              var item = this.item;
              layui.$("input[name='wate_path']").val(res.path);
              $("#wate_path").attr("src",res.path);
              $("#wate_path").show();

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

  slider.render({
    elem: '#wate_transparent'
    ,value: <?php echo empty($info['wate_transparent'])?"80":$info['wate_transparent']; ?> 
    ,input: true //输入框
    // ,setTips: function(value){ //自定义提示文本
    // return  '透明度'+value + '%';
    // }
    ,change: function(value){
      $("input[name='wate_transparent']").val(value);
    }
  });

  colorpicker.render({
    elem: '#test-form'
    ,color: '<?php echo htmlentities($info['text_color']); ?>'
    ,done: function(color){
      $('#text_color').val(color);
    }
  });

  form.verify({
    wate_path: function(value, item){ //value：表单的值、item：表单的DOM对象
      var type=$("input[name='water']:checked").val();
      if(type=='img' && value ==''){
        return "请上传水印图片";
      }
    },
    wate_text: function(value, item){ //value：表单的值、item：表单的DOM对象
      var type=$("input[name='water']:checked").val();
      if(type=='text' && value ==''){
        return "请输入水印文字";
      }
    },
    text_color: function(value, item){ //value：表单的值、item：表单的DOM对象
      var type=$("input[name='water']:checked").val();
      if(type=='text' && value ==''){
        return "请输入水印颜色";
      }
    },
    text_size: function(value, item){ //value：表单的值、item：表单的DOM对象
      var type=$("input[name='water']:checked").val();
      if(type=='text' && value ==''){
        return "请输入文字大小";
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