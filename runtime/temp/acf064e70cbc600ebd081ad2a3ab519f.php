<?php /*a:3:{s:54:"G:\www2\cms2\application\admin\view\news\cateedit.html";i:1541910624;s:52:"G:\www2\cms2\application\admin\view\public\base.html";i:1541603122;s:52:"G:\www2\cms2\application\admin\view\public\head.html";i:1541778938;}*/ ?>
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
            <?php if(!(empty($catelist) || (($catelist instanceof \think\Collection || $catelist instanceof \think\Paginator ) && $catelist->isEmpty()))): foreach($catelist as $k=>$v): ?>
            <option value="<?php echo htmlentities($v['cateid']); ?>" <?php if($info['pid'] == $v['cateid']): ?>selected="selected"<?php endif; ?>><?php echo htmlentities($v['catename']); ?></option>
            <?php endforeach; endif; ?>
        </select>  
      </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label"><span class="form-required">*</span>分类名称</label>
    <div class="layui-input-inline  width-350">
      <input type="hidden" name="cateid" value="<?php echo htmlentities($info['cateid']); ?>">
      <input type="text" name="catename" lay-verify="required"  placeholder="请输入分类名称" autocomplete="off" class="layui-input" value="<?php echo htmlentities($info['catename']); ?>">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">seo关键字</label>
    <div class="layui-input-block  width-350">
      <input type="text" name="keyword"  placeholder="请输入分类关键字" autocomplete="off" class="layui-input" value="<?php echo htmlentities($info['keyword']); ?>">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">seo描述</label>
    <div class="layui-input-block  width-350">
      <input type="text" name="description"  placeholder="请输入分类描述" autocomplete="off" class="layui-input" value="<?php echo htmlentities($info['description']); ?>">
    </div>
  </div>
  <div class="layui-form-item">
      <label class="layui-form-label"><span class="form-required">*</span>模型</label>
      <div class="layui-input-inline width-350" >
        <select name="modelid" lay-verify="required" lay-filter="modelid" id="catetype" >
         
          <option value="">请选择一个模型</option>
          <?php foreach($modellist as $v): ?>
          <option value="<?php echo htmlentities($v['modelid']); ?>" <?php if($v['modelid'] == ''): ?>selected <?php endif; ?>><?php echo htmlentities($v['name']); ?></option>
          <?php endforeach; ?>
            
        </select>   
      </div>
  </div>
  
  <div class="layui-form-item">
     <label class="layui-form-label">缩略图</label>
     <div class="layui-input-inline  width-350" >
       <input type="text" name="catethumb"  placeholder="图片地址" autocomplete="off" class="layui-input"  value="<?php echo htmlentities($info['catethumb']); ?>">
       
     </div>
     <div class="layui-word-aux">
        <?php if(!(empty($info['catethumb']) || (($info['catethumb'] instanceof \think\Collection || $info['catethumb'] instanceof \think\Paginator ) && $info['catethumb']->isEmpty()))): ?>
        <img src="<?php echo htmlentities($info['catethumb']); ?>" class="content-photos">
        <?php else: ?>
        <img src="" class="content-photos" >
        <?php endif; ?>
        
       <button type="button" class="layui-btn layui-btn-small layui-btn-normal" id="fileupload">
         <i class="layui-icon">&#xe60d;</i>上传图片
       </button>
     </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">跳转链接</label>
    <div class="layui-input-block width-350">
      <input type="text" name="url" requplaceholder="请输入跳转链接" autocomplete="off" class="layui-input" value="<?php echo htmlentities($info['url']); ?>">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">备注</label>
    <div class="layui-input-inline">
      <input type="text" name="other" requplaceholder="请输入分类备注名称" autocomplete="off" class="layui-input" value="<?php echo htmlentities($info['other']); ?>">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">导航栏</label>
    <div class="layui-input-block">
      <input type="checkbox" name="isnav" lay-skin="switch" lay-text="显示|隐藏" lay-filter="switchTest" value="1" <?php if(($info['isnav'] == '1') OR ($info['isnav'] == '')): ?>checked=''<?php endif; ?>>
      <div class="layui-unselect layui-form-switch" lay-skin="_switch">
        <em>OFF</em><i></i>
      </div>
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">状态</label>
    <div class="layui-input-block">
      <input type="checkbox" name="status" lay-skin="switch" lay-text="启用|禁用" lay-filter="switchTest" value="1" <?php if(($info['status'] == '1') OR ($info['status'] != '0')): ?>checked=''<?php endif; ?>>
      <div class="layui-unselect layui-form-switch" lay-skin="_switch">
        <em>OFF</em><i></i>
      </div>
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">排序</label>
    <div class="layui-input-inline width-350">
      <input type="number" name="catepx"  placeholder="请输入数字排序" autocomplete="off" class="layui-input" value="<?php echo htmlentities($info['catepx']); ?>">
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

	  
	});
</script>


       
  </div>
</div> 


<script type="text/javascript" src="/static/admin/js/admin.js"></script>
</body>
</html>