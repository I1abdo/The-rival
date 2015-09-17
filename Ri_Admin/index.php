<?php
require_once'Include-Files/config.inc.php';
/*إستدعاء ملف الوضائف*/
require_once"Include-Files/Functions.php";

require_once"Include-Files/Defines.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>تسجيل الدخول</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="fonts/Fonts.css" rel="stylesheet">
    <!-- Styles-->
    <link href="styles.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body style="background-color: #f1f1f1">

    <?php
if(action == 'forgre_pass'){
?>
                    <div class="container">
                        <div id="login-form">
                            <img class="logo" src="img/R-logo.png" alt="logo"/>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form action="index.php?action=forgre_pass" method="post" role="form">
                                        <div class="form-group">
                                            <label for="email">الإيميل</label>
                                            <input type="email" name="user_email" class="form-control" id="email" placeholder="أدخل الإيميل الخاص بعضويتك">
                                        </div>
                                        <button type="submit" name="send" class="btn btn-primary submit">إرسال</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
</div>       
<?php
    if(isset($_POST['send'])){
        $user_email = security($_POST['user_email']);
        if(user_email2 == $user_email){
            mail($user_email,"your password",user_pass);
        }else{
            echo'false';
        }
    }
    exit;
}
        if(login != 1){
            echo'
                    <div class="container">
                        <div id="login-form">
                            <img class="logo" src="img/R-logo.png" alt="logo"/>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form action="login.php" method="post" role="form">
                                        <div class="form-group">
                                            <label for="email">إسم المستحذم</label>
                                            <input type="text" name="user_login" class="form-control" id="email" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">كلمة المرور</label>
                                            <input type="password" name="user_pass" class="form-control" id="pwd" placeholder="Enter password">
                                        </div>
                                        <div class="checkbox">
                                            <label><input name="remember" value="1" type="checkbox">تذكرني</label>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary submit">دخول</button>
                                    </form>
                                </div>
                            </div>
                            <h5 style="margin-top: 25px;"><a class="forgre_pass" href="index.php?action=forgre_pass">هل فقدت كلمة مرورك؟</a></h5>
                            <h5 style="margin-top: 15px;"><a class="remember" href="#">→ الرجوع إلى المنافس</a></h5>
                        </div>
                    </div>
            ';
        }else{
            refresh("admin.php",0);
        }
    ?>

    <!-- Bootstrap jquery-->
    <script src="js/bootstrap.min.js"></script>
    <!-- Jquery Library--->
    <script src="js/jquery.js"></script>
</body>
</html>

