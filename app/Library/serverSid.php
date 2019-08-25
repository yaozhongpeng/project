<?php
	//载入ucpaas类 
	require_once('lib/Ucpaas.class.php'); 
	//初始化必填 
	//填写在开发者控制台首页上的Account Sid 
	$options['accountsid']='962fb1fba7cd97a2bf90c6d45745c9e0'; 
	//填写在开发者控制台首页上的Auth Token 
	$options['token']='fb92ccd383d3d4af2015e90703a7e852'; 
	//初始化 $options必填 
	$ucpass = new Ucpaas($options);
?>