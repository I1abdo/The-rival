<?php
define('login','2');
if(login == 1){
    $delete_page = delete_page($connect,page_id);
}else{
    echo'false';
}
?>