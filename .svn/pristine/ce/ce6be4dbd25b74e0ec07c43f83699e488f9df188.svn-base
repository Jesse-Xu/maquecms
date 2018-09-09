<?php

// +----------------------------------------------------------------------
// | 麻雀cms [ 麻雀虽小，五脏俱全 ]
// +----------------------------------------------------------------------
// | gitee:https://gitee.com/32684028888/MaQuecms
// +----------------------------------------------------------------------
// | 作者: 与光同尘
// +----------------------------------------------------------------------
// | 技术支持群：159360042 ， 欢迎加入交流，讨论
// +----------------------------------------------------------------------

/**
 * 安装向导
 */
header('Content-type:text/html;charset=utf-8');
date_default_timezone_set("PRC"); 

// 检测是否安装过
if (file_exists('./install/install.lock')) {
    echo '你已经安装过该系统，重新安装需要先删除./install/install.lock 文件';
    die;
}

// 同意协议页面
if(@!isset($_GET['c']) || @$_GET['c']=='agreement'){
    require './install/agreement.html';
}
// 检测环境页面
if(@$_GET['c']=='test'){
    require './install/test.html';
}
// 创建数据库页面
if(@$_GET['c']=='create'){
    require './install/create.html';
}
// 安装成功页面
if(@$_GET['c']=='success'){
    // 判断是否为post
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $data=$_POST;
        // 连接数据库
        $link=@new mysqli("{$data['DB_HOST']}:{$data['DB_PORT']}",$data['DB_USER'],$data['DB_PWD']);
        // 获取错误信息
        $error=$link->connect_error;
        if (!is_null($error)) {
            // 转义防止和alert中的引号冲突
            $error=addslashes($error);
            die("<script>alert('数据库链接失败:$error');history.go(-1)</script>");
        }
        // 设置字符集
        $link->query("SET NAMES 'utf8'");
        $link->server_info>5.0 or die("<script>alert('请将您的mysql升级到5.0以上');history.go(-1)</script>");
        // 创建数据库并选中
        if(!$link->select_db($data['DB_NAME'])){
            $create_sql='CREATE DATABASE IF NOT EXISTS '.$data['DB_NAME'].' DEFAULT CHARACTER SET utf8;';
            $link->query($create_sql) or die('创建数据库失败');
            $link->select_db($data['DB_NAME']);
        }

        // 导入sql数据并创建表
        $bjyadmin_str=file_get_contents('./install/cms.sql');
        $sql_array=preg_split("/;[\r\n]+/", str_replace('cms_',$data['DB_PREFIX'],$bjyadmin_str));
        foreach ($sql_array as $k => $v) {
            if (!empty($v)) {
                $link->query($v);
            }
        }

        //默认账号
        $data['DB_USERNAME']=empty($data['DB_USERNAME'])?"admin":$data['DB_USERNAME'];
        //默认密码
        $data['DB_PASSWORD']=empty($data['DB_PASSWORD'])?"123456":$data['DB_PASSWORD'];

        $insert_sql='INSERT INTO '.$data['DB_PREFIX'].'admin_list (adminid,username,password,nickname,addtime) value ("1","'.$data['DB_USERNAME'].'","'.md5($data['DB_PASSWORD']).'","超级管理员","'.date("Y-m-d H:i:s",time()).'")';
       
        $link->query($insert_sql);
       
        $link->close();

/*$db_str=<<<php
<?php
return array(

//*************************************数据库设置*************************************
    'type'               =>  'mysql',                 // 数据库类型
    'hostname'               =>  '{$data['DB_HOST']}',     // 服务器地址
    'database'               =>  '{$data['DB_NAME']}',     // 数据库名
    'username'               =>  '{$data['DB_USER']}',     // 用户名
    'password'                =>  '{$data['DB_PWD']}',      // 密码
    'hostport'               =>  '{$data['DB_PORT']}',     // 端口
    'prefix'             =>  '{$data['DB_PREFIX']}',   // 数据库表前缀
);
php;*/
// 创建数据库链接配置文件


        $post=array(
            'type'=>'mysql',
            'hostname'=>$data['DB_HOST'],
            'database'=>$data['DB_NAME'],
            'username'=>$data['DB_USER'],
            'password'=>$data['DB_PWD'],
            'hostport'=>$data['DB_PORT'],
            'prefix'=>$data['DB_PREFIX']
        );

        $database=include('../config/database.php');

        $db_str=array_merge($database,$post);

        file_put_contents('../config/database.php', "<?php return ".var_export($db_str,true).";");
        
        @touch('./install/install.lock');

        file_put_contents('./install/install.lock', "安装时间:".date('Y-m-d H:i:s',time()));

        require './install/success.html';
    }

}

