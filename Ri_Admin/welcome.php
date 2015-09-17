<?php
/*إستدعاء ملف الإتصال بقاعدة البيانات*/
require_once'Include-Files/config.inc.php';
/*إستدعاء ملف الوضائف*/
include"Include-Files/Functions.php";
/*إستدعاء ملف  defines.php*/
include"Include-Files/Defines.php";
?>
              <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>مرحبا بك، <?=Full_name?></title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="fonts/Fonts.css" rel="stylesheet">
        <!-- Styles-->
        <link href="styles.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    </head>
    <body style="background-color: #f1f1f1">
                    <div class="container">
                        <div id="login-form">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <img style="margin:0 auto; border:4px solid #cacaca; width:100px; height:100px" class="img-responsive img-circle" src="<?=user_img?>" alt=""/>
                                    <h4 class="text-center">مرحبا بك، <?=Full_name?></h4>
                                    <div class="text-center btn-group login_links">
                                        <a href="admin.php" class="btn btn btn-success">الرئيسية</a>
                                        <a href="<?=user_site_web?>" class="btn btn btn-primary">زيارة الموقع</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


    <!-- Bootstrap jquery-->
    <script src="js/bootstrap.min.js"></script>
    <!-- Jquery Library--->
    <script src="js/jquery.js"></script>
    </body>
    </html>