<?php /*a:1:{s:52:"G:\www2\cms2\application\admin\view\login\index.html";i:1535041498;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>登入 - 后台管理中心</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="/static/admin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="/static/admin/login/admin.css" media="all">
  <link rel="stylesheet" href="/static/admin/login/login.css" media="all">
  <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js?v=1"></script>
</head>
<body>

  <div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" style="display: none;">

    <div class="layadmin-user-login-main">
      <div class="layadmin-user-login-box layadmin-user-login-header">
        <h2>麻雀后台管理系统</h2>
      </div>
      <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
        <div class="layui-form-item">
          <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-username"></label>
          <input type="text" name="username" id="LAY-user-login-username" lay-verify="required" placeholder="用户名" class="layui-input">
        </div>
        <div class="layui-form-item">
          <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
          <input type="password" name="password" id="LAY-user-login-password" lay-verify="required" placeholder="密码" class="layui-input">
        </div>
        <div class="layui-form-item">
          <div class="layui-row">
            <div class="layui-col-xs7">
              <label class="layadmin-user-login-icon layui-icon layui-icon-vercode" for="LAY-user-login-vercode"></label>
              <input type="text" name="vercode" id="LAY-user-login-vercode" lay-verify="required" placeholder="图形验证码" class="layui-input" >
            </div>
            <div class="layui-col-xs5">
              <div style="margin-left: 10px;">
                <img src="<?php echo captcha_src(); ?>" class="layadmin-user-login-codeimg" id="vercode" onclick="this.src='/index.php/captcha.html?'+Math.random()">
              </div>
            </div>
          </div>
        </div>
        <div class="layui-form-item" style="margin-bottom: 20px;">
          <input type="checkbox" name="remember" lay-skin="primary" title="记住密码">
          <!-- <a href="forget.html" class="layadmin-user-jump-change layadmin-link" style="margin-top: 7px;">忘记密码？</a> -->
        </div>
        <div class="layui-form-item">
          <button class="layui-btn layui-btn-fluid" lay-submit lay-filter="login" >登 录</button>
        </div>
        
      </div>
    </div>
    
    <div class="layui-trans layadmin-user-login-footer">
      
      <p>© 2018 <a href="" target="_blank"></a></p>
    </div>
    
    
  </div>

  <script src="/static/admin/layui/layui.js"></script>  
  <script>
  //一般直接写在一个js文件中
  layui.use(['layer', 'form'], function(){
    var layer = layui.layer
    ,form = layui.form;

     //提交
    form.on('submit(login)', function(obj){

      $(obj.elem).attr("disabled",true);

      //请求登入接口
      $.post("<?php echo url('index'); ?>",obj.field,function(res){
   

          if(res.status=='0'){
              layer.msg(res.name);
              $("#vercode").click();
              $(obj.elem).attr("disabled",false);
          }else{
              //登入成功的提示与跳转
              layer.msg(res.name, {
                offset: '15px'
                ,icon: 1
                ,time: 1000
              }, function(){
                location.href = res.url; 
              });
          }      
 
      },"json");
      
    });

    }); 

  </script> 


  </script>
</body>
</html>