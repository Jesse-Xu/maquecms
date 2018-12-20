<?php /*a:3:{s:53:"G:\www2\cms2\application\admin\view\auth\menuadd.html";i:1543246550;s:52:"G:\www2\cms2\application\admin\view\public\base.html";i:1543161944;s:52:"G:\www2\cms2\application\admin\view\public\head.html";i:1541778938;}*/ ?>
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
      <label class="layui-form-label">上级菜单</label>
      <div class="layui-input-inline width-350"  >
         <select name="pid" lay-filter="select" >
          <option value="0">一级菜单</option>
            <?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): foreach($list as $k=>$v): ?>
            <option value="<?php echo htmlentities($v['menuid']); ?>" ><?php echo htmlentities($v['name']); ?></option>
            <?php endforeach; endif; ?>
        </select>  
      </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label"><span class="form-required">*</span>菜单名称</label>
    <div class="layui-input-inline  width-350">
      <input type="hidden" name="roleid" lay-verify="required"  value="<?php echo input('roleid'); ?>">
      <input type="text" name="name" lay-verify="required"  placeholder="请输入菜单名称" autocomplete="off" class="layui-input" value="">
    </div>
  </div>
  <div class="layui-form-item">
      <label class="layui-form-label">类型</label>
      <div class="layui-input-inline width-350"  >
         <select name="type" lay-filter="type">
          <option value="">请选择</option>
          <option value="href">自定义外链</option>
          <?php foreach($list as $k=>$v): ?>
            <optgroup label="<?php echo htmlentities($k); ?>">
              <?php foreach($v as $val): ?>
                <option value="<?php echo htmlentities($val); ?>"><?php echo htmlentities($val); ?></option>
              <?php endforeach; ?>
            </optgroup>
          <?php endforeach; ?>
          <optgroup label="站点设置">
            <option value="你工作的第一个城市">海报上传</option>
          </optgroup>
          <optgroup label="新闻管理">
            <option value="你的工号">新闻列表</option>
            <option value="你最喜欢的老师">添加新闻</option>
          </optgroup>
        </select> 
      </div>
      <div class="layui-input-inline width-350"  >
        <input type="text" name="data"  placeholder="外链地址" autocomplete="off" class="layui-input" value="" style="display: none;">
      </div>

  </div>

  <div class="layui-form-item">
     <label class="layui-form-label">缩略图</label>
     <div class="layui-input-inline  width-350" >
       <input type="text" name="thumb"  placeholder="图片地址" autocomplete="off" class="layui-input"  value="<?php echo htmlentities($info['thumb']); ?>">
       
     </div>
     <div class="layui-word-aux">
       
        <img src="" class="content-photos" >
        
       <button type="button" class="layui-btn layui-btn-small layui-btn-normal" id="fileupload">
         <i class="layui-icon">&#xe60d;</i>上传图片
       </button>
       <button type="button" class="layui-btn layui-btn-small layui-btn-normal" id="fileupload">
         <i class="layui-icon">&#xe60d;</i>自定义图标
       </button>
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
    <label class="layui-form-label">排序</label>
    <div class="layui-input-inline width-350">
      <input type="number" name="catepx"  placeholder="请输入数字排序" autocomplete="off" class="layui-input" value="">
    </div>
  </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="submit">立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>

<script type="text/javascript">
	layui.use(['form','upload'], function(){
	  form = layui.form;
    upload=layui.upload;

    //上传
    var uploadInst = upload.render({
        elem: '#fileupload' //绑定元素
        ,url: '<?php echo Url('common/fileupload',array('width'=>"60",'height'=>"60",'notwater'=>"1")); ?>' //上传接口
        ,done: function(res){
           if(res.status=='1'){
             layui.$("input[name='catethumb']").val(res.path);
             $(".content-photos").attr("src",res.path);
             alert("上传成功~");
           }else{
            alert("上传失败~");
           }
        }
        ,error: function(){
          alert("上传失败~");
        },accept: 'images'
        ,field:'file'
        ,data:{type:'image'}
    }); 

    form.on('select(select)', function(data){
      $("input[name='url']").val("");
    });  

    <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): ?>
      layui.$("select[name='modelid']").val(<?php echo htmlentities($info['modelid']); ?>);
      layui.form.render('select')
    <?php endif; ?>

    layer.photos({
      photos: '.layui-word-aux'
      ,anim: 5 
    }); 

    form.on('submit(submit)', function(data){
    
      return FormAjax(location.href,data.field);
     
    });

    form.on('select(type)', function(data){
 
      if(data.value == 'href'){
        $("input[name='data']").show();
        $("input[name='data']").val("");
      }else{
        $("input[name='data']").hide();
      }

    }); 
	  
	});
</script>


       
  </div>
</div> 


<script type="text/javascript" src="/static/admin/js/admin.js"></script>
</body>
</html>