<?php
ob_start();
/*إستدعاء ملف الإتصال بقاعدة البيانات*/
require_once'Include-Files/config.inc.php';
/*إستدعاء ملف الوضائف*/
include"Include-Files/Functions.php";
/*إستدعاء ملف  defines.php*/
include"Include-Files/Defines.php";
/**************************************************['نضام تسجيل الدخول']*******************************************************/

if(login == 1){
    echo'
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>لوحة تحكم الموقع</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="fonts/Fonts.css" rel="stylesheet">
        <!-- Styles-->
        <link href="styles.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
        <script src="js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.js"></script>
        <script src="js/plugin.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-default navbar-fixed-top" id="navbar" role="navigation">
        <div class="collapse navbar-collapse navbar-right" id="navbar-collapse">
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle btn_down" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                    <span class="glyphicon glyphicon-home"></span>
                    <h8>المنافس</h8>
                </button>
                <ul class="dropdown-menu dropdown-menu-left btn_dropdowns" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">زيارة الموقع</a></li>
                </ul>
            </div>
            <a href="comments.php" class="btn_down "><span class="glyphicon glyphicon-comment"></span><span class="badge">
            ';
    if($Num_c > 0)
    {
        echo $Num_c;
    }else
    {
        echo '0';
    }    
            echo'
            </span></a>
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle btn_down" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true">
                    <span class="glyphicon glyphicon-plus"></span>
                    جديد
                </button>
                <ul class="dropdown-menu dropdown-menu-left btn_dropdowns" role="menu" aria-labelledby="dropdownMenu2">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="posts.php?action=add_post">مقالة</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"> إعلان</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">عضو</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="pages.php?action=add_page">صفحة </a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">ملاحضة</a></li>
                </ul>
            </div>
        </div>
        <div style="float: left;" class="navbar-left">
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle btn_down" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-expanded="true">
                    <span class="glyphicon glyphicon-user"></span>
                    '.Full_name.'
                </button>
                <ul style="margin-left: -1px ; min-width: 260px" class="dropdown-menu dropdown-menu-right btn_dropdowns" role="menu" aria-labelledby="dropdownMenu3">
                    <img src="'.user_img.'" class="img-circle img-responsive" id="user_img" alt=""/>
                    <div class="user_tools">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="profile.php">'.user_login.'</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="profile.php?action=edit"> تحرير ملفي الشخصي</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">تسجيل الخروج</a></li>
                    </div>
                </ul>
            </div>
        </div>
    </nav><!--end nav-->
    ';
    }else{
    refresh("index.php",0);
}


