<?php require"admin-header.php";?>

<?php include "sidebar.php";?>

<?php
if(login == 1){
    setcookie("login","");
    setcookie("user_id","");
    echo"<h5 class='logout_true'>تم تسجيل خروج بنجاح</h5>";
    refresh("index.php",2);
}else{
    refresh("index.php",0);
}
?>

<?php require"admin-footer.php";?>