<?php
function refresh($page,$sec){
echo'
	<meta http-equiv="refresh" content="'.$sec.',url='.$page.'" /> 
';	
}
/*Function To protect the enter*/
function security($string) 
{ 
	global $connect;
    $string = strip_tags($string);
    $string = htmlspecialchars($string);
    $string = trim($string);
    $string = stripslashes($string);
    $string = mysqli_real_escape_string($connect,$string);
    return $string;
}
/*
*Function Edit Admin acount
*/
//`user_login`, `user_pass`, `user_fullname`, `user_email`, `user_site_web`, `user_about`, `user_ulv`, `user_statu`, `user_posts`
function Edit_Admin_acount ()
{
    //Attampt Update Query execution
}

/*
*Function To Add Pages
*/



function new_post
    ($con,$post_title,$post_content,$post_img,$post_category,$post_type,$post_Cm_Statu,$post_AuthorB_Stau,$post_Share_Statu,$post_Related_Statu)
{
    // Attempt insert query execution
    $sql1 = "INSERT INTO `ri_posts`(`post_title`, `post_content`, `post_img`, `post_author`, `post_category`, `post_date`, `post_statu`,             `post_comments`, `post_Cm_Statu`, `post_AuthorB_Stau`, `post_Share_Statu`, `post_Related_Statu`)
    VALUES 
    ('".$post_title."','".$post_content."','".$post_img."','".user_id."','".$post_category."','".date('D/M/Y')."','". 1 .       "','". 0 ."','".$post_Cm_Statu."','".$post_AuthorB_Stau."','".$post_Share_Statu."','".$post_Related_Statu."')";
    if(mysqli_query($con, $sql1)){
        echo'<h5 class="login_true">Records Add successfully</h5>';
        refresh('pages.php',1);
    } else{
        echo "ERROR: Could not able to execute $sql1. " . mysqli_error($con);
    }
    return $sql1;
}

/*
*Function To Delete Post
*/

function delete_post($con,$Post_id)
{
    //Attempt Delete Query Execution
    $Delete_post = "DELETE FROM ri_posts WHERE ID = '".$Post_id."'";
    if(mysqli_query($con, $Delete_post)){
        echo'<h5 class="login_true">Records Delete successfully</h5>';
        refresh('posts.php',1);
    }
    return $Delete_post;
}

/*
*Function To Add Pages
*/

function new_page
    ($con,$page_title,$page_author,$page_content,$page_order,$page_Cm_Statu,$page_AuthorB_Stau,$page_Share_Statu)
{
    // Attempt insert query execution
    $sql = "INSERT INTO ri_pages
    (page_title, page_author, page_date, page_content ,page_order, page_Cm_Statu, page_AuthorB_Stau,page_Share_Statu)
    VALUES 
('".$page_title."','".$page_author."','".date("d/m/y")."','".$page_content."','".$page_order."','".$page_Cm_Statu."','".$page_AuthorB_Stau."','".$page_Share_Statu."')";
    if(mysqli_query($con, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
    return $sql;
}

/*
*Function To Delete Pages
*/

function delete_page($con,$Page_id)
{
    //Attempt Delete Query Execution
    $Delete_page = "DELETE FROM ri_pages WHERE ID = '".$Page_id."'";
    if(mysqli_query($con, $Delete_page)){
        echo'<h5 class="login_true">Records Delete successfully</h5>';
        refresh('pages.php',1);
    }
    return $Delete_page;
}

/*
*Function Query While
*/

function Select_Data($con,$table,$where,$start,$limit)
{
    $S_d = mysqli_query($con,"SELECT * FROM $table WHERE $where LIMIT $start,$limit");
    $DR_array = array();
    
    while($row = mysqli_fetch_array($S_d,MYSQLI_ASSOC)){
    
        $DR_array[] = $row;
    }
    return $DR_array;
}

/*
*Functions To Get Template Quater 
*/

    // Function Get Header
function get_header(){
    $Get_header= require_once"header.php";
    return $Get_header;
}
   // Function Get Sidebar
function get_sidebar(){
    $Get_sidebar = require_once"sidebar.php";
    return $Get_sidebar;
}
   // Function Get Footer
function get_footer(){
    $Get_footer = require_once"footer.php";
    return $Get_footer;
}


/***********************[' Functions To Ubdate Infos ']**********************/

/*
*Function To Ubdate Pofile Infos
*/























?>