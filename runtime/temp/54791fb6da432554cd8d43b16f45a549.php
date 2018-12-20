<?php /*a:3:{s:54:"G:\www2\cms2\application\admin\view\auth\adminadd.html";i:1542725660;s:52:"G:\www2\cms2\application\admin\view\public\base.html";i:1543161944;s:52:"G:\www2\cms2\application\admin\view\public\head.html";i:1541778938;}*/ ?>
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

          <label class="layui-form-label"><span class="form-required">*</span>管理员名称</label>

          <div class="layui-input-inline" style="width:350px;">

            <input type="text" name="nickname" required lay-verify="required" placeholder="名称" autocomplete="off" class="layui-input"  value="">

          </div>

        </div>

        <div class="layui-form-item">

          <label class="layui-form-label"><span class="form-required">*</span>账号</label>

          <div class="layui-input-inline" style="width:350px;">

            <input type="text" name="username" required lay-verify="required" placeholder="排序" autocomplete="off" class="layui-input"  value="">

          </div>

        </div>

        <div class="layui-form-item">

          <label class="layui-form-label"><span class="form-required">*</span>密码</label>

          <div class="layui-input-inline" style="width:350px;">

            <?php if(!(empty($info['adminid']) || (($info['adminid'] instanceof \think\Collection || $info['adminid'] instanceof \think\Paginator ) && $info['adminid']->isEmpty()))): ?>

              <input type="password" name="password" required lay-verify="required"  placeholder="留空不修改密码" autocomplete="off" class="layui-input"  value="">

            <?php else: ?>

              <input type="password" name="password"  placeholder="请输入密码" autocomplete="off" class="layui-input"  value="">

            <?php endif; ?>

          </div>

        </div>

        <div class="layui-form-item">

          <label class="layui-form-label"><span class="form-required">*</span>所属角色</label>

          <div class="layui-input-inline" style="width:350px;">

            <select name="roleid" lay-verify="required" >

              <option value="">请选择角色</option>


                <?php foreach($rolelist as $v): ?>

                  <option value="<?php echo htmlentities($v['roleid']); ?>"><?php echo htmlentities($v['name']); ?></option>

                <?php endforeach; ?>
                

            </select>     

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