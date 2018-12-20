<?php /*a:3:{s:53:"G:\www2\cms2\application\admin\view\news\newsadd.html";i:1542901458;s:52:"G:\www2\cms2\application\admin\view\public\base.html";i:1541603122;s:52:"G:\www2\cms2\application\admin\view\public\head.html";i:1541778938;}*/ ?>
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
   
      
<style type="text/css">
  .width-250{width:250px !important; }

</style>
<div class="layui-row">

    <form class="layui-form" action="" method="POST">
      
        <div class="layui-tab layui-tab-brief">
          <ul class="layui-tab-title">
            <li class="layui-this">基本信息</li>
            <li>SEO</li>
            <li>附件管理</li>
            <li>状态设置</li>
          </ul>
          <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <div class="layui-form-item">
                      <label class="layui-form-label"><span class="form-required">*</span>选择分类</label>
                      <div class="layui-input-inline"  >
                         <select name="cateid" lay-verify="required" lay-filter="select">
                          <option value="">请选择分类</option>
                            <?php if(!(empty($catelist) || (($catelist instanceof \think\Collection || $catelist instanceof \think\Paginator ) && $catelist->isEmpty()))): foreach($catelist as $v): ?>
                            <option value="<?php echo htmlentities($v['cateid']); ?>" <?php if($info['cateid'] == $v['cateid']): ?>selected="selected"<?php endif; ?>><?php echo htmlentities($v['catename']); ?></option>
                            <?php endforeach; endif; ?>
                        </select>  
                      </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label"><span class="form-required">*</span>文章标题</label>
                    <div class="layui-input-block">
                      <input type="hidden" name="newsid" value="<?php echo htmlentities($info['newsid']); ?>">
                      <input type="text" name="title" required lay-verify="required" placeholder="请输入标题"  class="layui-input" value="<?php echo htmlentities($info['title']); ?>">
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label">封面图片</label>
                    <div class="layui-input-inline" >
                      <input type="text" name="thumb"  placeholder="图片地址" autocomplete="off" class="layui-input"  value="<?php echo htmlentities($info['thumb']); ?>">
                    </div>
                    <div class="layui-form-mid layui-word-aux" style="padding-top: 0px !important; ">
                      <button type="button" class="layui-btn layui-btn-small layui-btn-normal thumbupload" lay-data="{data:{type:'image'},accept:'images'}" data-name="thumb" style="margin-left:10px;">
                        <i class="layui-icon">&#xe64a;</i>上传图片
                      </button>
                    </div>
                  </div>
                  <div class="layui-form-item layui-form-text">
                      <label class="layui-form-label">文章摘要</label>
                      <div class="layui-input-block">
                          <textarea name="abstract" placeholder="请输入文章摘要" class="layui-textarea"></textarea>
                      </div>
                  </div>
                  <div class="layui-form-item layui-form-text">
                      <label class="layui-form-label">文章内容</label>
                      <div class="layui-input-block" style="max-width:100%;">
                        <?php echo "<link href=\"/static/admin/com/uedit/themes/default/css/umeditor.css\" type=\"text/css\" rel=\"stylesheet\">";echo "<script type=\"text/javascript\" charset=\"utf-8\" src=\"/static/admin/com/uedit/umeditor.config.js\"></script>";echo "<script type=\"text/javascript\" charset=\"utf-8\" src=\"/static/admin/com/uedit/umeditor.js\"></script>";echo "<script type=\"text/javascript\">var um = UM.getEditor('myEditors',{imageUrl:'/admin.php/common/fileupload.html'});</script>";echo "<script type=\"text/plain\" id=\"myEditors\" name=\"content\" style=\"height:240px;width:100%;\">".$data."</script>"; ?> 
                      <p><input type="checkbox"  title="设定内容第一张图片为封面" lay-skin="primary" lay-filter="gethumb"></p>
                      </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label">跳转链接</label>
                    <div class="layui-input-block">
                      <input type="text" name="url" requplaceholder="请输入跳转链接" autocomplete="off" class="layui-input" value="" placeholder="请输入跳转链接">
                    </div>
                  </div>
            </div>
            <div class="layui-tab-item">
                <div class="layui-form-item">
                    <label class="layui-form-label">seo关键字</label>
                    <div class="layui-input-block">
                      <textarea name="abstract"  placeholder="请输入文章关键字" autocomplete="off" class="layui-textarea"  ></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">seo文章描述</label>
                    <div class="layui-input-block">
                      <textarea name="description"  placeholder="请输入文章描述" autocomplete="off" class="layui-textarea"  ></textarea>
                    </div>
                </div>
            </div>
            <div class="layui-tab-item">
                <div class="layui-form-item">
                    <label class="layui-form-label">相册</label>
                    <div class="layui-form-mid layui-word-aux" style="padding-top: 0px !important; ">
                      <button type="button" class="layui-btn layui-btn-small layui-btn-normal photosload" lay-data="{data:{type:'image'},accept:'images'}" data-name="photos">
                        <i class="layui-icon">&#xe60d;</i>上传相册
                      </button>
                    </div>
                  </div>
                  <div class="layui-form-item" id="PhotosDom">
  
                  </div>
                
                  <div class="layui-form-item">
                    <label class="layui-form-label">附件</label>
                    <div class="layui-form-mid layui-word-aux" style="padding-top: 0px !important; ">
                      <button  type="button" class="layui-btn layui-btn-small layui-btn-normal filesupload" lay-data="{data:{type:'file'},accept:'file'}" data-name="file">
                        <i class="layui-icon">&#xe61d;</i>上传附件
                      </button>
                      
                    </div>
                    <div class="layui-form-item" id="filedata" >
                        
                    </div>
                  </div>

            </div>
            <div class="layui-tab-item">
                <div class="layui-form-item">
                        <label class="layui-form-label">选择作者</label>
                        <div class="layui-input-inline"   lay-filter="author">
                           <select name="authorid" id="author">
                           <option value="">请选择作者</option>
                           <?php if($info['authorid'] == ''): if(!(empty($authorlist) || (($authorlist instanceof \think\Collection || $authorlist instanceof \think\Paginator ) && $authorlist->isEmpty()))): foreach($authorlist as $v): ?>
                              <option value="<?php echo htmlentities($v['authorid']); ?>" <?php if($modelinfo['authorid'] == $v['authorid']): ?>selected="selected"<?php endif; ?>><?php echo htmlentities($v['name']); ?></option>
                              <?php endforeach; endif; else: if(!(empty($authorlist) || (($authorlist instanceof \think\Collection || $authorlist instanceof \think\Paginator ) && $authorlist->isEmpty()))): foreach($authorlist as $v): ?>
                              <option value="<?php echo htmlentities($v['authorid']); ?>" <?php if($info['authorid'] == $v['authorid']): ?>selected="selected"<?php endif; ?>><?php echo htmlentities($v['name']); ?></option>
                              <?php endforeach; endif; endif; ?>
                          </select>  
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">选择模板</label>
                        <div class="layui-input-inline"  >
                           <select name="template" id="template" lay-filter="template" >
                           <option value="">请选择模板</option>
                            
                            <?php if(!(empty($pages) || (($pages instanceof \think\Collection || $pages instanceof \think\Paginator ) && $pages->isEmpty()))): foreach($pages as $v): ?>
                              <option value="<?php echo htmlentities($v); ?>" <?php if($info['template'] == $v): ?>selected="selected"<?php endif; ?>><?php echo htmlentities($v); ?>.html</option>
                              <?php endforeach; endif; ?>
                           
                          </select>  
                        </div>
                    </div>
                    <div class="layui-form-item">
                      <label class="layui-form-label">发布时间</label>
                      <div class="layui-input-inline">
                        <input type="text" name="pushtime"  placeholder="定时发布时间"  class="layui-input" value="<?php echo htmlentities($info['pushtime']); ?>" id="pushtime">
                      </div>
                    </div>
                    <div class="layui-form-item">
                      <label class="layui-form-label">状态</label>
                      <div class="layui-input-block">
                        <input type="radio" name="status" value="1" title="上架" checked >
                        <input type="radio" name="status" value="0" title="下架" >
                        <input type="radio" name="status" value="-1" title="草稿" >
                      </div>
                    </div>
                    <div class="layui-form-item">
                      <label class="layui-form-label">评论</label>
                      <div class="layui-input-block" lay-filter="iscomment">
                        
                          <input type="radio" name="iscomment" value="1" title="启用" checked>
                          <input type="radio" name="iscomment" value="0" title="禁用" >
                       
                      </div>
                    </div>
                    <div class="layui-form-item">
                      <label class="layui-form-label">其他</label>
                      <div class="layui-input-block">
                        <input type="checkbox" name="hot" title="推荐" >
                        <input type="checkbox" name="top" title="置顶" >
                      </div>
                    </div>

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
</div>
<script type="text/javascript">
	layui.use(['form','layedit','upload','laydate','element'], function(){
	  var form = layui.form
	  ,layedit = layui.layedit
    ,upload  = layui.upload
    ,laydate = layui.laydate
    ,element = layui.element;
	  

    laydate.render({
      elem: '#pushtime',
      type: 'datetime'
    });

    /*缩略图上传*/
    upload.render({
      elem: '.thumbupload' //绑定元素
      ,url: '<?php echo Url('common/fileupload',array('other'=>'newinfo')); ?>' //上传接口
      ,before: function(obj){ //obj参数包含的信息，跟 choose回调完全一致，可参见上文。

        layer.load(); //上传loading
      }
      ,done: function(res,index){ 

          layer.closeAll('loading');

          if(res.status=='1'){ 

              $("#thumb").remove();

              var item = this.item;

              var dom=item.attr('data-name');
              $("input[name='"+dom+"']").val(res.path);
              $(item).before('<img src="'+res.path+'" id="thumb" class="content-photos">');

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
    /*相册*/
    upload.render({
      elem: '.photosload' //绑定元素
      ,url: '<?php echo Url('common/fileupload',array('other'=>'newinfo')); ?>' //上传接口
      ,multiple: true  //多文件上传
      ,before: function(obj){ //obj参数包含的信息，跟 choose回调完全一致，可参见上文。
        //console.log(obj);
        layer.load(); //上传loading
      }
      ,done: function(res,index){ 

          layer.closeAll('loading');

          if(res.status=='1'){
            
              var item = this.item;

             /* var html="<div class='layui-inline'><label class='layui-form-label'></label><div class='layui-input-inline' style='width: 100px;'><input type='text' name='photos[name][]' lay-verify='required' placeholder='图片名称' autocomplete='off' class='layui-input' placeholder='文件名称' value="'+res.filename+'"><input type='hidden' name='photos[file][]' value="'+res.path+'" placeholder='图片地址'></div><img src="'+res.path+'" class='content-photos'><button type='button' class='layui-btn layui-btn-danger layui-btn-xs' onclick='deldom(this)'>删除</button></div><br/>";*/

              var html='<div class="layui-form-item"><label class="layui-form-label"></label><div class="layui-input-inline" style="width: 100px;"><input type="text" name="photos[name][]" lay-verify="required" placeholder="图片名称" autocomplete="off" class="layui-input" placeholder="文件名称" value="'+res.filename+'"><input type="hidden" name="photos[path][]" value="'+res.path+'" placeholder="图片地址"></div><img src="'+res.path+'" class="content-photos"><button type="button" class="layui-btn layui-btn-danger layui-btn-xs" onclick="deldom(this)">删除</button></div>';

              $("#PhotosDom").append(html);

              /*var dom=item.attr('data-name');
              layui.$("input[name='"+dom+"']").val(res.path);*/

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

    /*附件*/
    upload.render({
      elem: '.filesupload' //绑定元素
      ,url: '<?php echo Url('common/fileupload'); ?>' //上传接口
      ,multiple: false  //多文件上传
      ,before: function(obj){ //obj参数包含的信息，跟 choose回调完全一致，可参见上文。
        //console.log(obj);
        layer.load(); //上传loading
      }
      ,done: function(res,index){ 

          layer.closeAll('loading');

          if(res.status=='1'){

              var html='<input type="hidden" name="files[src][]" value="'+res.path+'"><input type="hidden" name="files[name][]" value="'+res.filename+'"><a href="'+res.path+'" target="_blank">'+res.filename+'</a>&nbsp;&nbsp;<a href="javascript:deldom(this);">删除</a>';

              $("#filedata").append(html);


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


    <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): ?>
    
      layui.$("select[name='cateid']").val(<?php echo htmlentities($info['cateid']); ?>);
      layui.form.render('select')
    <?php endif; ?>


    form.on('checkbox(gethumb)', function(data){
      if(data.elem.checked==true){
          var text=UM.getEditor('myEditors').getPlainTxt();
        
          var src=(text.match('src="(.*?)"')[1]);
          if(src){
            $("input[name='thumb']").val(src);
            $("#thumb").remove();
            $("input[name='thumb']").parents(".layui-form-item").prepend('<img src="'+src+'" id="thumb" class="content-photos">');
          }
      }
    }); 


    form.on('select(select)', function(data){
      $("input[name='url']").val("");
      
      $.get(location.href,{cateid:data.value},function(data){
        if(data.code=='0'){
          alert(data.msg);
        }else{
            $("#template").html("<option value=''>请选择模板</option>");
            $.each(data.msg.pages,function(k,v){
              $("#template").append("<option value='"+v+"'>"+v+".html</option>");
            });

            $("#template").val(data.msg.modelinfo.content);
            $("#author").val(data.msg.modelinfo.authorid);

            $(":radio[name='iscomment'][value='"+data.msg.modelinfo.iscomment+"']").attr("checked","checked");  

            form.render('select'); 
            form.render('radio'); 

        }
      },'json');

    }); 

    form.on('submit(submit)', function(data){
      
      return FormAjax(location.href,data.field);

    });

    
    

	});

  function deldom($this,type){
      layer.confirm('确定清除这个图片吗？', function(index){
        var sthis=$($this).parent(".layui-form-item");
        
        <?php if(config('site.file_del' == '1')): ?>
        var src=sthis.find("img").attr("src");
        $.post("<?php echo url('common/removefile'); ?>",{"file":src},function(){});
        <?php endif; ?>
        
        //清除img dom
        sthis.remove();
        
        layer.close(index);
      });  
  }


</script>




       
  </div>
</div> 


<script type="text/javascript" src="/static/admin/js/admin.js"></script>
</body>
</html>