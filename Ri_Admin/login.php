<?php
/*إستدعاء ملف الإتصال بقاعدة البيانات*/
require_once'Include-Files/config.inc.php';
/*إستدعاء ملف الوضائف*/
include"Include-Files/Functions.php";
/*إستدعاء ملف  defines.php*/
include"Include-Files/Defines.php";
/*************[' خيارات ']*****************/
?>

<?php
/**************************************************['نضام تسجيل الدخول']*******************************************************/
$user_login = security($_POST['user_login']);
$user_pass = $_POST['user_pass'];
$remember = $_POST['remember'];

if(isset($_POST['login'])){
    //التحقق من أن الحقول غير فارغة
    if(empty($user_login) or empty($user_pass)){
        echo'<h5 class="login_error">البيانات خاطئة المرجوا إعادة المحاولة</h5>';
    }else{
        $Select_user = mysqli_query($connect,"SELECT * FROM ri_users WHERE user_login = '".$user_login."' AND user_pass ='".$user_pass."'");
        if(mysqli_num_rows($Select_user) > 0){
            $fetch_user = mysqli_fetch_object($Select_user);
            $user_id = $fetch_user->u_id;
            $username = $fetch_user->user_login;
            $password = $fetch_user->user_pass;
            $user_ulv = $fetch_user->user_ulv;

            if($username != $user_login or $password != $user_pass){
                echo'<h5 class="login_error">البيانات خاطئة المرجوا إعادة المحاولة</h5>';
            }else{
                if($remember == 1){
                    setcookie("login",1,time()+60*24*3600);
                    setcookie("user_id",$user_id,time()+60*24*3600);
                    setcookie("user_ulv",$user_ulv);
                }else{
                    setcookie("login",1);
                    setcookie("user_id",$user_id);
                    setcookie("user_ulv",$user_ulv);
                }
                refresh("welcome.php",1);
            }
        }else{
            echo'<h5 class="login_error">البيانات خاطئة المرجوا إعادة المحاولة</h5>';
            refresh('index.php',2);
        }
    }
}else{}