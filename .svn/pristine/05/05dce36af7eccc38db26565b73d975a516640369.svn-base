<?php
namespace app\admin\model;

use think\Model;
use think\Db;
use think\facade\Session;
use think\facade\Cookie;
use think\helper\Time;

class IndexModel extends Model{

  #天数数据统计#
  #
  #@#time number 天数#
  public static function Statistics($day="",$start="",$end="",$num="1"){
    
     
      if(!empty($day)){

        $firsttime=Time::daysAgo($day-1);
        //echo date('Y-m-d H:i:s',$firsttime);exit;
        $lasttime=strtotime(date('Y-m-d',strtotime('+1 day')))-1; //明天凌晨时间戳
        //echo date('Y-m-d H:i:s',$lasttime);exit;
      }else if(!empty($start) && !empty($end)){ //只有开始时间

        $firsttime=strtotime($start);
        $lasttime=strtotime($end)+60*60*24;


      }

      $data['day']=$data['user']=$data['order']=$data['money']=$data['book']=array();
      

      $time=$firsttime+60*60*24*($num-1);

      while ($time < $lasttime) {
        
        $start=date('Y-m-d 00:00:00',$time); 
        
        $end=date('Y-m-d 23:59:59',$time); 

        
        array_push($data['day'],date('m-d',$time));

          //用户统计
          
          $user_map=array(
            ['addtime', 'between time', [$start,$end] ],
          );

          $user=Db::name('user_list')->where($user_map)->count('userid');
          //echo Db::getLastSql();

          array_push($data['user'], $user);

          //订单统计
          $order=Db::name('order_list')->where($order_map)->count('orderid');

          array_push($data['order'], $order);

          
          //课程收入统计
          $money=Db::name('order_list')->where($order_map)->sum('money');

          array_push($data['money'], $money);

          //今日上课统计
          //$book=Db::name('book_log')->where('addtime', 'between time', [$start,$end])->group('userid')->count('logid');

          array_push($data['book'], "0");

          $num++;

          $time=$firsttime+60*60*24*($num-1);
  
        }
        

        $data['sum']=array(array_sum($data['user']),array_sum($data['order']),array_sum($data['money']),array_sum($data['book']));
        ;
        return  json_encode($data);
        //收到作业
        
        exit;


    }

    
    
}
