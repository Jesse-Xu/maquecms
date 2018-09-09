<?php
// +----------------------------------------------------------------------
// | 麻雀cms [ 麻雀虽小，五脏俱全 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | 作者: 与光同尘
// +----------------------------------------------------------------------
// | 技术支持群：159360042 ， 欢迎加入交流，讨论
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
namespace think;

//检测是否安装，安装后可以注释掉本文件
if (!file_exists('./install/install.lock'))  header("location:install.php"); 

// 加载基础文件
require __DIR__ . '/../thinkphp/base.php';

// 支持事先使用静态方法设置Request对象和Config对象

// 执行应用并响应
Container::get('app')->run()->send();