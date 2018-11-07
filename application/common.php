<?php
// +----------------------------------------------------------------------
// | 麻雀cms [ 麻雀虽小，五脏俱全 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | 作者: 与光同尘
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

function JsonData($data,$status="1"){
	$arr=array(
		'data'=>$data,
		'status'=>$status
	);
	return json_encode($arr);
}
function JsonSuccess($msg='操作成功~',$data='',$url=''){
    
    $arr=array(
        'msg'=>$msg,
        'code'=>'1',
        'data'=>$data,
        'url'=>$url,
    );

    return json_encode($arr);
}
function JsonError($msg='操作失败~',$data='',$url=''){
    
    $arr=array(
        'msg'=>$msg,
        'code'=>'0',
        'data'=>$data,
        'url'=>$url,
    );

    return json_encode($arr);
}
function getDir($dir) {
    $dirArray[]=NULL;
    if (false != ($handle = opendir ( $dir ))) {
        $i=0;
        while ( false !== ($file = readdir ( $handle )) ) {
            //去掉"“.”、“..”以及带“.xxx”后缀的文件
            if ($file != "." && $file != ".."&&!strpos($file,".")) {
                $dirArray[$i]=$file;
                $i++;
            }
        }
        //关闭句柄
        closedir ( $handle );
    }
    return $dirArray;
}
#转换成星期#
function weekday($time,$type='') {
    if(is_numeric($time)) 
     {     
        if(isset($type)){
            $weekday = array('周日','周一','周二','周三','周四','周五','周六'); 
        }else{
            $weekday = array('星期日','星期一','星期二','星期三','星期四','星期五','星期六'); 
        }
        
         return $weekday[date('w', $time)]; 
     } 
     return false; 
} 
#是否是微信#
function is_weixin()
{ 
    if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
        return true;  //是微信
    }  
        return false;
}
#是否是手机号#
function is_tel($tel){

    if(preg_match("/^1[34578]{1}\d{9}$/",$tel)){  
        return true;  
    }else{  
        return false;
    }
}
#发送验证码#
#tel 手机号#
#sms 模板id#
#data 数据#
function send_dx($tel,$sms,$data='',$name="",$type="通知"){
 
    Loader::import('ali.TopSdk', EXTEND_PATH);
    $c = new \TopClient;
    $c->appkey = "";
    $c->secretKey = "";
    $req = new \AlibabaAliqinFcSmsNumSendRequest;
    $req->setExtend("");
    $req->setSmsType($type);
    $req->setSmsFreeSignName($name);
    $req->setSmsParam($data);
    $req->setRecNum($tel);
    $req->setSmsTemplateCode($sms);
    $resp = $c->execute($req);
    return $resp;

}

/**
 * 友好的时间显示
 *
 * @param int    $sTime 待显示的时间
 * @param string $type  类型. normal | mohu | full | ymd | other
 * @param string $alt   已失效
 * @return string
 */
 function friendlyDate($sTime,$type = 'normal',$alt = 'false') {
    if (!$sTime)
        return '';
    if(!is_numeric($sTime)) {
        $sTime=strtotime($sTime);
    }
    //sTime=源时间，cTime=当前时间，dTime=时间差
    $cTime      =   time();
    $dTime      =   $cTime - $sTime;
    $dDay       =   intval(date("z",$cTime)) - intval(date("z",$sTime));
    //$dDay     =   intval($dTime/3600/24);
    $dYear      =   intval(date("Y",$cTime)) - intval(date("Y",$sTime));
    //normal：n秒前，n分钟前，n小时前，日期
    if($type=='normal'){
        if( $dTime < 60 ){
            if($dTime < 10){
                return '刚刚';    //by yangjs
            }else{
                return intval(floor($dTime / 10) * 10)."秒前";
            }
        }elseif( $dTime < 3600 ){
            return intval($dTime/60)."分钟前";
        //今天的数据.年份相同.日期相同.
        }elseif( $dYear==0 && $dDay == 0  ){
            //return intval($dTime/3600)."小时前";
            return '今天'.date('H:i',$sTime);
        }elseif($dYear==0){
            return date("m月d日 H:i",$sTime);
        }else{
            return date("Y-m-d H:i",$sTime);
        }
    }elseif($type=='mohu'){
        if( $dTime < 60 ){
            return $dTime."秒前";
        }elseif( $dTime < 3600 ){
            return intval($dTime/60)."分钟前";
        }elseif( $dTime >= 3600 && $dDay == 0  ){
            return intval($dTime/3600)."小时前";
        }elseif( $dDay > 0 && $dDay<=7 ){
            return intval($dDay)."天前";
        }elseif( $dDay > 7 &&  $dDay <= 30 ){
            return intval($dDay/7) . '周前';
        }elseif( $dDay > 30 ){
            return intval($dDay/30) . '个月前';
        }
    //full: Y-m-d , H:i:s
    }elseif($type=='full'){
        return date("Y-m-d , H:i:s",$sTime);
    }elseif($type=='ymd'){
        return date("Y-m-d",$sTime);
    }else{
        if( $dTime < 60 ){
            return $dTime."秒前";
        }elseif( $dTime < 3600 ){
            return intval($dTime/60)."分钟前";
        }elseif( $dTime >= 3600 && $dDay == 0  ){
            return intval($dTime/3600)."小时前";
        }elseif($dYear==0){
            return date("Y-m-d H:i:s",$sTime);
        }else{
            return date("Y-m-d H:i:s",$sTime);
        }
    }
 }
 #判断是不是手机浏览器#
 function is_mobile(){

        // returns true if one of the specified mobile browsers is detected
        // 如果监测到是指定的浏览器之一则返回true
        
        $regex_match="/(nokia|iphone|android|motorola|^mot\-|softbank|foma|docomo|kddi|up\.browser|up\.link|";
        
       $regex_match.="htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|";
        
        $regex_match.="blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam\-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|";
        
        $regex_match.="symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte\-|longcos|pantech|gionee|^sie\-|portalmmm|";   
        
        $regex_match.="jig\s browser|hiptop|^ucweb|^benq|haier|^lct|opera\s*mobi|opera\*mini|320x320|240x320|176x220";
        
        $regex_match.=")/i";
        
        // preg_match()方法功能为匹配字符，既第二个参数所含字符是否包含第一个参数所含字符，包含则返回1既true
        return preg_match($regex_match, strtolower($_SERVER['HTTP_USER_AGENT']));
 }
 function emptydata($data,$msg="http://res2.esf.leju.com/esf_www/statics/images/default-img/detail.png"){
    if(empty($data)){
        echo $msg;
    }else{
        echo $msg;
    }
 }
 #返回城市ip#
 function get_ip_info($ip = '') {
    if (empty($ip)) {
        $ip = get_ip();
    }
 
    $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);
    if (empty($res)) {
        return false;
    }
 
    $jsonMatches = array();
    preg_match('#\{.+?\}#', $res, $jsonMatches);
    if (!isset($jsonMatches[0])) {
        return false;
    }
     
    $json = json_decode($jsonMatches[0], true);
    if (isset($json['ret']) && $json['ret'] == 1) {
        $json['ip'] = $ip;
        unset($json['ret']);
    } else {
        return false;
    }
     
    return $json;
}
//保留两位小数
function num2($num){
    return $num;
   return  sprintf("%.2f",substr(sprintf("%.3f", $num), 0, -2)); 
}

#当前列表#
function news_list(){

    $map=input('get.');

    return url('newlist',array('cateid'=>$map['cateid']),'html',true);

}


#操作判断#
function  isauto($action="",$controller=""){
    $map=array(
        'value'=>$action,
        'status'=>'1'
    );
    $actionid=db('admin_action')->where($map)->value('actionid');
    if(!isset($actionid) || !in_array($actionid,session('admin.auto'))){
        return "";
    }else{
        return $controller;
    }
}
#文件删除#
function filedel($file){
    if(is_file($file)){
        unlink($file);
    }

    return true;
}
#生成二维码#
function ercode($text){

    $Env=new \think\facade\Env;

    require_once $Env::get('ROOT_PATH').'/vendor/tsy/phpqrcode/lib/full/qrlib.php';

    \QRcode::png($text);
    
    exit;

}
#用户信息#
function userinfo($name=""){
    $data=session('user');
    if(!empty($data)){
        if(empty($name)){
            return $data;
        }else{
            return isset($data[$name])?$data[$name]:"";
        }
    }
    return "";
}
