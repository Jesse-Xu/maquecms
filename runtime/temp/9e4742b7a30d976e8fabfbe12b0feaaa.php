<?php /*a:3:{s:56:"G:\www2\cms2\application\admin\view\index\ecscharts.html";i:1541607972;s:52:"G:\www2\cms2\application\admin\view\public\base.html";i:1541603122;s:52:"G:\www2\cms2\application\admin\view\public\head.html";i:1541608406;}*/ ?>
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
   
      


<?php 
    dddd22
 ?>

<div class="layui-row">
    <div class="layui-col-md6 layui-col-md-offset6 layui-btn-group-list">
   
      <div class="layui-btn-group">
        <button class="layui-btn layui-btn-primary layui-btn-sm count-menu-set" data-day="0">
          今日
        </button>
        <button class="layui-btn layui-btn-primary layui-btn-sm" data-day="7">
          7日
        </button>
        <button class="layui-btn layui-btn-primary layui-btn-sm" data-day="30">
          30日
        </button>
        <!-- <button class="layui-btn layui-btn-primary layui-btn-sm" data-day="all">
          全部
        </button> -->
      </div>
       <div class="layui-inline" style="width:100px;"> 
          <input type="text" class="layui-input" id="start" placeholder="开始" style="height: 31px;">
        </div>
        <div class="layui-inline" style="width:100px;"> 
          <input type="text" class="layui-input" id="end" placeholder="结束" style="height: 31px;">
        </div>
        <div class="layui-inline" style="width:100px;"> 
          
          <button class="layui-btn layui-btn-sm layui-btn-primary" id="time">
             <i class="layui-icon">&#xe615;</i>
          </button>
        </div>
    </div>
</div>
<div class="layui-row">
    <table class="layui-table table-count">
    
        <tbody>
          <tr>
            <td>
              <p>新增用户</p>
              <b></b>
            </td>
            <td>
              <p>新增留言</p>
              <b></b>
            </td>
            <td>
              <p>订单统计</p>
              <b></b>
            </td>
            <td>
              <p>访客统计</p>
              <b></b>
            </td>
          </tr>

        </tbody>
    </table>
</div>
<div class="layui-row">
    <div style="height:450px;" id="user">
    </div>

</div>

<div class="layui-row">
    <div style="height:450px;" id="msg">
    </div>

</div>

<div class="layui-row">
    <div style="height:450px;" id="order">
    </div>
   
</div>

<div class="layui-row">
    <div style="height:450px;" id="money">
    </div>

</div>


<script type="text/javascript">
$(function(){
   $(".layui-btn-group button").eq(1).click();
});

//echarts3 load动画只有default,无默认动画
$(".layui-btn-group button").click(function(){
    let user = echarts.init(document.getElementById('user'));
    user.showLoading({
        text: '正在努力的读取数据中...'
    });
    let msg = echarts.init(document.getElementById('msg'));
    msg.showLoading({
        text: '正在努力的读取数据中...' 
    });
    let order = echarts.init(document.getElementById('order'));
    order.showLoading({
        text: '正在努力的读取数据中...'
    });
    let money = echarts.init(document.getElementById('money'));
    money.showLoading({
        text: '正在努力的读取数据中...'
    });


    $(".layui-btn-group button").removeClass("count-menu-set");
    $(this).addClass("count-menu-set");

   $.post(location.href,{"type":$(this).attr('data-day')},function(data){

      $(".table-count td b").each(function(k){
        $(this).text(data.sum[k]);
      }); 

      SetChart(user,'用户',data.user,data.day);
      SetChart(msg,'留言',data.order,data.day);
      SetChart(order,'订单',data.book,data.day);
      SetChart(money,'收入',data.money,data.day);

   },'json');


   

});

//时间范围选择
$("#time").click(function(){
   var start=$("#start").val();
   var end=$("#end").val();
   if(start=='' || end==''){
    alert("请选择一个时间范围");
   }else{

      $(".layui-btn-group button").removeClass("count-menu-set");
      $(this).addClass("count-menu-set");

      let user = echarts.init(document.getElementById('user'));
      user.showLoading({
          text: '正在努力的读取数据中...',
      });
      let msg = echarts.init(document.getElementById('msg'));
      msg.showLoading({
          text: '正在努力的读取数据中...', 
      });
      let order = echarts.init(document.getElementById('order'));
      order.showLoading({
          text: '正在努力的读取数据中...',
      });
      let money = echarts.init(document.getElementById('money'));
      money.showLoading({
          text: '正在努力的读取数据中...',
      });

      $.post(location.href,{"start":start,"end":end},function(data){
        
        $(".table-count td b").each(function(k){
          $(this).text(data.sum[k]);
        }); 
        
        SetChart(user,'用户',data.user,data.day);
        SetChart(msg,'留言',data.order,data.day);
        SetChart(order,'订单',data.book,data.day);
        SetChart(money,'收入',data.money,data.day);

     },'json');
   }
});


</script>

<script>
layui.use(['laydate', 'layer'], function(){
  var laydate = layui.laydate;

  
  //执行一个laydate实例
  laydate.render({
    elem: '#start' 
  });
  laydate.render({
    elem: '#end' 
  });
});
</script>
<script type="text/javascript" src="/static/admin/js/echarts.common.min.js"></script>

<script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
       

    function SetChart(myChart,text,num,time){
  
        option = {
            title : {
                text: text+'增长统计',
                subtext: '日增'+text
            },
            tooltip : {
                trigger: 'axis'
            },
            legend: {
                data:[text+'统计']
            },
            toolbox: {
                show : true,
                feature : {
                    mark : {show: true},
                    magicType : {show: true, type: ['line', 'bar']},
                    restore : {show: true},
                    saveAsImage : {show: true}
                }
            },
            calculable : true,
            xAxis : [
                {
                    type : 'category',
                    boundaryGap : false,
                    data : time
                }
            ],
            yAxis : [
                {
                    type : 'value'
                }
            ],
            series : [
                {
                    name:text+'统计',
                    type:'line',
                    smooth:true,
                    itemStyle: {normal: {areaStyle: {type: 'default'}}},
                    data:num
                }
            ]
        };
        
         myChart.hideLoading();
        
        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);


    }
</script>


       
  </div>
</div> 


<script type="text/javascript" src="/static/admin/js/admin.js"></script>
</body>
</html>