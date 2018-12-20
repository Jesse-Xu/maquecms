<?php /*a:3:{s:54:"G:\www2\cms2\application\admin\view\auth\modifypd.html";i:1535029618;s:52:"G:\www2\cms2\application\admin\view\public\base.html";i:1543161944;s:52:"G:\www2\cms2\application\admin\view\public\head.html";i:1541778938;}*/ ?>
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
   
      

<form class="layui-form form" action="" method="POST" >
 
        <div class="layui-form-item">
          <label class="layui-form-label">新密码</label>
          <div class="layui-input-inline" >
            <input type="password" name="pass1" required lay-verify="required" placeholder="请输入新的密码" autocomplete="off" class="layui-input"> 
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">再次输入</label>
          <div class="layui-input-inline" >
            <input type="password" name="pass2" required lay-verify="required|pass" placeholder="再次输入密码" autocomplete="off" class="layui-input"> 
          </div>
        </div>
        <div class="layui-form-item">
          <div class="layui-input-block">
            <button class="layui-btn" lay-submit="" lay-filter="form">立即提交</button>
          </div>
        </div>

</form>

<script type="text/javascript">
  layui.use('form', function(){
    var form = layui.form;

      form.verify({
        pass: function(){ 
          var pass1=$("input[name='pass1']").val();
          var pass2=$("input[name='pass2']").val();
          if(pass1!=pass2){
            return "两次密码不一致，请重新输入！";
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