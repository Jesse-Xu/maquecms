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

Route::rule('content-:newsid','index/index/content');
Route::rule('cate-[:cateid]-[:keyword]-[:pid]','index/index/lists');
Route::rule('sitemap','index/index/sitemap');
//Route::rule('userapi','api/user.index/');