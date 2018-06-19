<?php
return array(
	//'配置项'=>'配置值'
	'DEFAULT_MODULE'=>'Admin',
//	'DEFAULT_CONTROLLER'    =>  'Article', // 默认控制器名称
//    'URL_MODEL' => 2,

    'TMPL_PARSE_STRING' => array(
        '__PUBLIC__' => __ROOT__ . '/Public',
        '__JS__' => __ROOT__ . '/Public/js',
        '__CSS__' => __ROOT__ . '/Public/style',
        '__IMAGE__' => __ROOT__ . '/Public/img',
        '__FONT__' => __ROOT__ . '/Public/font',
        '__UPLOAD__' => __ROOT__ . '/Uploads/',
    ),
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'demo',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'tp_',
);

define('AUTH_ID',  '2bqToMzKpqKTP8DE');

define('AUTH_KEY', 'y@dta8@AgrXe4)%+jpc;S(+NCzV1S(lE');
