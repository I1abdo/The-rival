<?php

//إستحضار الكوكيز الخاصة بتسجيل الدخول
define("login",$_COOKIE['login']);
define("user_id",$_COOKIE['user_id']);
define("user_ulv",$_COOKIE['user_ulv']);
//إستقبال الروابط بدالة get
define("action",security($_GET['action']));
define("post_id",security($_GET['id']));
define("page_id",security($_GET['id']));
define("Comment_id",security($_GET['c_id']));

//جلب معلومات العضوية التي سجلت الدخول
$Select_User = mysqli_query($connect,"SELECT * FROM ri_users WHERE u_id = '".user_id."' ");
$Fetch_User  = mysqli_fetch_array($Select_User,MYSQL_ASSOC);

define('user_login',$Fetch_User['user_login']);
define('Full_name',$Fetch_User['user_fullname']);
define('user_img',$Fetch_User['user_img']);
define('user_email',$Fetch_User['user_email']);
define('user_site_web',$Fetch_User['user_site_web']);
define('user_about',$Fetch_User['user_about']);

//جلب معلومات العضويةل
$Select_User2 = mysqli_query($connect,"SELECT * FROM ri_users");
$Fetch_User2  = mysqli_fetch_array($Select_User2,MYSQL_ASSOC);

define('user_login2',$Fetch_User2['user_login']);
define('Full_name2',$Fetch_User2['user_fullname']);
define('user_pass',$Fetch_User2['user_pass']);
define('user_img2',$Fetch_User2['user_img']);
define('user_email2',$Fetch_User2['user_email']);
define('user_site_web2',$Fetch_User2['user_site_web']);
define('user_about2',$Fetch_User2['user_about']);

//جلب معلومات المقالة
$Select_Post = mysqli_query($connect,"SELECT * FROM ri_posts WHERE ID = '".post_id."'");
$Fetch_Post  = mysqli_fetch_array($Select_Post,MYSQL_ASSOC);

define('post_title',$Fetch_Post['post_title']);
define('post_content',$Fetch_Post['post_content']);
define('post_img',$Fetch_Post['post_img']);
define('post_category',$Fetch_Post['post_category']);
define('post_type',$Fetch_Post['post_type']);
define('post_comments',$Fetch_Post['post_comments']);
define('post_Cm_Statu',$Fetch_Post['post_Cm_Statu']);
define('post_AuthorB_Stau',$Fetch_Post['post_AuthorB_Stau']);
define('post_Share_Statu',$Fetch_Post['post_Share_Statu']);
define('post_Related_Statu',$Fetch_Post['post_Related_Statu']);

//جلب معلومات التعليق
$Select_comment = mysqli_query($connect,"SELECT * FROM ri_comments WHERE comment_statu = 0");
$Num_c = mysqli_num_rows($Select_comment);