<?php /*a:3:{s:54:"G:\www2\cms2\application\admin\view\news\catetree.html";i:1542381776;s:52:"G:\www2\cms2\application\admin\view\public\base.html";i:1541603122;s:52:"G:\www2\cms2\application\admin\view\public\head.html";i:1541778938;}*/ ?>
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
   
      

<script type="text/javascript" src="http://www.jq22.com/demo/bootstrap-ztree3201708300202/js/jquery.ztree.core.js"></script>
<script type="text/javascript" src="http://www.jq22.com/demo/bootstrap-ztree3201708300202/js/jquery.ztree.excheck.js"></script>
<script type="text/javascript" src="http://www.jq22.com/demo/bootstrap-ztree3201708300202/js/jquery.ztree.exedit.js"></script>

<link rel="stylesheet" href="http://www.jq22.com/demo/bootstrap-ztree3201708300202/css/bootstrapStyle/bootstrapStyle.css" type="text/css">



  <ul id="treeDemo" class="ztree"></ul>
 




<SCRIPT type="text/javascript">
   
        var setting = {
            view: {
                addHoverDom: false, //addHoverDom,
                removeHoverDom: false,// removeHoverDom,
                selectedMulti: false
            },
            check: {
                enable: true
            },
            data: {
                simpleData: {
                    enable: true
                }
            },
            edit: {
                enable: false //true
            }
        };

    
        $.fn.zTree.init($("#treeDemo"), setting, <?php echo $info; ?>);
        

        var newCount = 1;
        //添加时间
        function addHoverDom(treeId, treeNode) {
          console.log('asd');
            var sObj = $("#" + treeNode.tId + "_span");
            if (treeNode.editNameFlag || $("#addBtn_"+treeNode.tId).length>0) return;
            var addStr = "<span class='button add' id='addBtn_" + treeNode.tId
                + "' title='add node' onfocus='this.blur();'></span>";
            sObj.after(addStr);
            var btn = $("#addBtn_"+treeNode.tId);
            if (btn) btn.bind("click", function(){
                var zTree = $.fn.zTree.getZTreeObj("treeDemo");
                zTree.addNodes(treeNode, {id:(100 + newCount), pId:treeNode.id, name:"new node" + (newCount++)});
                return false;
            });
        };
        //删除时间
        function removeHoverDom(treeId, treeNode) {

            $("#addBtn_"+treeNode.tId).unbind().remove();
        };
       
    </SCRIPT>



       
  </div>
</div> 


<script type="text/javascript" src="/static/admin/js/admin.js"></script>
</body>
</html>