<?php
define('login','2');
if(login == 1){
    $delete_post = delete_post($connect,post_id);
}else{
    echo'false';
}