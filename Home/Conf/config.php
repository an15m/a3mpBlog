<?php
	return array(
		'SHOW_PAGE_TRACE'=>true,//开启页面Trace
		'TMPL_PARSE_STRING'=>array(           //添加自己的模板变量规则
			'__CSS__'=>__ROOT__.'/Public/Css',
			'__JS__'=>__ROOT__.'/Public/Js',
			'__IMAGES__'=>__ROOT__.'/Public/Images'
		),
		'DB_PREFIX'=>'myblog_',  //设置表前缀
		'DB_DSN'=>'mysql://root:123456@localhost:3306/myblog',//使用DSN方式配置数据库信息
		'URL_HTML_SUFFIX'=>'html|shtml|php',//限制伪静态的后缀
	);
?>