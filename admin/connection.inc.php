<?php
session_start();
$con=mysqli_connect("sql113.infinityfree.com","if0_35572792","1c0ZcgWg6Zd9Z","if0_35572792_ecom10");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/php/ecom/');
define('SITE_PATH','http://alnafeh.wuaze.com/php/ecom/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');
?>