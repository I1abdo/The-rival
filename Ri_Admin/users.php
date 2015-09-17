<?php require"admin-header.php";?>
<?php include "sidebar.php";?>

<?php
    if(login == 1){

        
        if(action == add_user){include"Include-Files/add_user.php";exit;}

// include your code to connect to DB.

    $tbl_name="ri_users";        //my  table name
    // How many adjacent pages should be shown on each side?
    $adjacents = 100;

    /*
       First get total number of rows in data table.
       If you have a WHERE clause in your query, make sure you mirror it here.
    */
    $query = "SELECT COUNT(*) as num FROM $tbl_name";
    $total_pages = mysqli_fetch_array(mysqli_query($connect,$query));
    $total_pages = $total_pages[num];

    /* Setup vars for query. */
    $targetpage = "pages.php";     //your file name  (the name of this file)
    $limit = 20;                                 //how many items to show per page
    $page = $_GET['page'];
    if($page)
        $start = ($page - 1) * $limit;             //first item to display on this page
    else
        $start = 0;                                //if no page var is given, set start to 0

    /* Get data. */
    $sql = "SELECT * FROM $tbl_name LIMIT $start, $limit";
    $result = mysqli_query($connect,$sql);
    $num = mysqli_num_rows($result);


    /* Setup page vars for display. */
    if ($page == 0) $page = 1;                    //if no page var is given, default to 1.
    $prev = $page - 1;                            //previous page is page - 1
    $next = $page + 1;                            //next page is page + 1
    $lastpage = ceil($total_pages/$limit);        //lastpage is = total pages / items per page, rounded up.
    $lpm1 = $lastpage - 1;                        //last page minus 1

    /*
        Now we apply our rules and draw the pagination object.
        We're actually saving the code to a variable in case we want to draw it more than once.
    */
    $pagination = "";
    if($lastpage > 1)
    {
        $pagination .= "<div class=\"pagination\">";
        //previous button
        if ($page > 1)
            $pagination.= "<a class=\"not_disabled1\" href=\"$targetpage?page=$prev\"><span class='glyphicon glyphicon-chevron-right'></span></a>";
        else
            $pagination.= "<span class=\"disabled\"><span class='glyphicon glyphicon-chevron-right'></span></span>";

        //pages
        if ($lastpage < 7 + ($adjacents * 2))    //not enough pages to bother breaking it up
        {
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class=\"current\">$counter</span>";
                else
                    $pagination.= "<a class=\"current_yes\" href=\"$targetpage?page=$counter\">$counter</a>";
            }
        }
        elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
        {
            //close to beginning; only hide later pages
            if($page < 1 + ($adjacents * 2))
            {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a class=\"current_yes\" href=\"$targetpage?page=$counter\">$counter</a>";
                }
                $pagination.= "...";
                $pagination.= "<a class=\"current_yes\" href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                $pagination.= "<a class=\"current_yes\" href=\"$targetpage?page=$lastpage\">$lastpage</a>";
            }
            //in middle; hide some front and some back
            elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
            {
                $pagination.= "<a class=\"current_yes\" href=\"$targetpage?page=1\">1</a>";
                $pagination.= "<a class=\"current_yes\" href=\"$targetpage?page=2\">2</a>";
                $pagination.= "...";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a class=\"current_yes\" href=\"$targetpage?page=$counter\">$counter</a>";
                }
                $pagination.= "...";
                $pagination.= "<a class=\"current_yes\" href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                $pagination.= "<a class=\"current_yes\" href=\"$targetpage?page=$lastpage\">$lastpage</a>";
            }
            //close to end; only hide early pages
            else
            {
                $pagination.= "<a class=\"current_yes\" href=\"$targetpage?page=1\">1</a>";
                $pagination.= "<a class=\"current_yes\" href=\"$targetpage?page=2\">2</a>";
                $pagination.= "...";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a class=\"current_yes\" href=\"$targetpage?page=$counter\">$counter</a>";
                }
            }
        }

        //next button
        if ($page < $counter - 1)
            $pagination.= "<a class=\"not_disabled\" href=\"$targetpage?page=$next\"> <span class='glyphicon glyphicon-chevron-left'></span></a>";
        else
            $pagination.= "<span class=\"disabled\"><span class='glyphicon glyphicon-chevron-left'></span></span>";
        $pagination.= "</div>\n";
    }
    /*****************************************************************************************************************/
?>
<form action="pages.php" method="post">
    <div class="page-header">
        <div class="row">
            <h3 class="col-lg-1 col-md-1 col-sm-1">الأعضاء </h3>
            <?php
        if(user_ulv == 6){echo'<a href="users.php?action=add_user" style="margin-top: 15px;margin-right: 20px" class="btn btn-sm btn-success">أضف عضو </a>';}
            ?>
            <button type="submit" name="delete_group" class="delete btn btn-sm btn-primary" style="float: left;margin-left:15px;margin-top: 15px;display:none" href="#">حذف</button>
        </div>
    </div>

<div class="table-responsive table-p">
      <table class="table">
        <thead>
          <tr>
            <th><input id="checkAll" type="checkbox"/></th>
            <th>إسم المستخدم</th>
            <th>الإسم الكامل</th>
            <th>الإيميل</th>
            <th>الموقع الخاص</th>
            <th>رتبة العضو</th>
            <?php
            if(user_ulv == 6 ){echo'<th></th>';} 
            ?>
            <th></th>
            <?php
            if(user_ulv == 6 ){echo'<th></th>';} 
            ?>
            <?php
            if(user_ulv == 5 ){echo'<th></th>';} 
            ?>
          </tr>
        </thead>
        <tbody>
        <?php
        while($rowU = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            echo'
              <tr>
                <td style="width:0%"><input class="chck_box" name="check_post[]" value="'.$rowU['u_id'].'" type="checkbox"/></td>
                <td style="width:24%">'.$rowU['user_login'].'</td>
                <td style="width:21%">'.$rowU['user_fullname'].'</td>
                <td style="width:18%">'.$rowU['user_email'].'</td>
                <td style="width:15%">'.$rowU['user_site_web'].'</td>
                <td style="width:15%">
                ';
                    if($rowU['user_ulv'] == 1){echo'عضو';}            
                    if($rowU['user_ulv'] == 2){echo'عضو متميز';}            
                    if($rowU['user_ulv'] == 3){echo'كاتب';}            
                    if($rowU['user_ulv'] == 4){echo'مراقب';}            
                    if($rowU['user_ulv'] == 5){echo'مشرف';}            
                    if($rowU['user_ulv'] == 6){echo'المدير';}            
                ?>
                </td>
                <?php
                if(user_ulv == 6){echo'<td><a href="#"><span class="glyphicon glyphicon-pencil"></a></span></td>';}  
                ?>
                <td><a href="#"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                <?php
                if(user_ulv == 6 ){echo'<td><a href="pages.php?action=Delete_page&id="><span class="glyphicon glyphicon-trash"></span></a></td>';}  
                if(user_ulv == 5 ){echo'<td><a href="pages.php?action=Delete_page&id="><span class="glyphicon glyphicon-trash"></span></a></td>';}  
                ?>                
              </tr>            
        <?php
        }
        ?>
        </tbody>
        <tfoot>
          <tr>
            <th><input id="checkAll" type="checkbox"/></th>
            <th>إسم المستخدم</th>
            <th>الإسم الكامل</th>
            <th>الإيميل</th>
            <th>الموقع الخاص</th>
            <th>رتبة العضو</th>
            <?php
            if(user_ulv == 6 ){echo'<th></th>';} 
            ?>
            <th></th>
            <?php
            if(user_ulv == 6 ){echo'<th></th>';} 
            ?>
            <?php
            if(user_ulv == 5 ){echo'<th></th>';} 
            ?>
          </tr>
        </tfoot>
      </table>
      </div>
    </form>
    
    <?=$pagination?>
    <?php
    if(isset($_POST['delete_group'])){
        $check = $_POST['check_post'];
        for($i=0;$i<$num;$i++){
            $del_id= $check[$i];
            $sql5 = "DELETE FROM ri_comments WHERE ID = '".$del_id."'";

            if(mysqli_query($connect,$sql5)){
                refresh('comments.php',0);
            }
        }
    }
    }else{
        refresh("index.php",0);
    }
?>

<?php require"admin-footer.php";?>
