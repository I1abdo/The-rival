<?php
/*إستدعاء ملف  defines.php*/
include"Include-Files/Defines.php";
/**************************************************['نضام تسجيل الدخول']*******************************************************/

if(login == 1) {
    echo '
<div class="sidebar-1">
    <nav class="navbar-default sidebar" rol="navigation">
        <div class="navbar-collapse" id="sidebar-collapse">
            <ul class="nav navbar-nav ">
                <li class="active-home"><a href="admin.php"><span class="glyphicon glyphicon-dashboard"></span> الرئيسية <span class="sr-only">(current)</span></a></li>
                <li><a href="posts.php"><span class="glyphicon glyphicon-pushpin"></span> المقالات</a></li>
                <li><a href=""><span class="glyphicon glyphicon-download-alt"></span> ملفات الوسائط</a></li>
                <li><a href="pages.php"><span class="glyphicon glyphicon-file"></span> الصفحات</a></li>
                <li><a href="comments.php"><span class="glyphicon glyphicon-comment"></span> التعليقات</a></li>
                <li><a href="users.php"><span class="glyphicon glyphicon-user"></span> الأعضاء</a></li>
                <li><a style="padding-right: 31px;margin-right: 13px;" class="glyphicon-ads" href="#"> نضام الإعلانات</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-adjust"></span> إعدادات القالب</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-cog"></span> إعدادات </a></li>
            </ul>
        </div>
    </nav>
</div>

<div class="sidebar-2">
    <nav class="navbar-default sidebar" rol="navigation">
        <div class="navbar-collapse" id="sidebar-collapse">
            <ul class="nav navbar-nav ">
                <li class="active-home"><a href="admin.php"><span class="glyphicon glyphicon-dashboard"></span> <span class="sr-only">(current)</span></a></li>
                <li><a href="posts.php"><span class="glyphicon glyphicon-pushpin"></span></a></li>
                <li><a href=""><span class="glyphicon glyphicon-download-alt"></span> </a></li>
                <li><a href="pages.php"><span class="glyphicon glyphicon-file"></span> </a></li>
                <li><a href="comments.php"><span class="glyphicon glyphicon-comment"></span> </a></li>
                <li><a href="users.php"><span class="glyphicon glyphicon-user"></span> </a></li>
                <li><a style="padding-right: 31px;margin-right: 13px;  padding-bottom: 30px;" class="glyphicon-ads" href="#"></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-adjust"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-cog"></span></a></li>
            </ul>
        </div>
    </nav>
</div>

<!--wrapper-->
<div class="wrapper">
    <div class="container">
';
}