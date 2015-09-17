<?php require"admin-header.php";?>

<?php include "sidebar.php";?>

<?php

if(login == 1){
    if(action == add_post   ) {require_once"Include-Files/post_new.php";exit;}
    if(action == delete_post) {require_once"Include-Files/Delete/delete_post.php";}
    if(action == edit_post  ) {require_once"Include-Files/Edit/edit_post.php";exit;}
    /*********************************************************************************************************************************************/


// include your code to connect to DB.

    $tbl_name="ri_posts";        //my  table name
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
    $targetpage = "posts.php";     //your file name  (the name of this file)
    $limit = 1000;                                 //how many items to show per page
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
            $pagination.= "<a class=\"not_disabled\" href=\"$targetpage?page=$prev\">السابق </a>";
        else
            $pagination.= "<span class=\"disabled\">السابق </span>";

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
            $pagination.= "<a class=\"not_disabled\" href=\"$targetpage?page=$next\">التالي</a>";
        else
            $pagination.= "<span class=\"disabled\">التالي</span>";
        $pagination.= "</div>\n";
    }
    /*****************************************************************************************************************/
    echo'
<form action="posts.php" method="post">
    <div class="page-header">
        <div class="row">
            <h3 class="col-lg-1 col-md-1 col-sm-1">المقالات</h3>
            <a href="posts.php?action=add_post" style="margin-top: 15px;margin-right: 20px" class="btn btn-sm btn-success">أضف مقالة</a>
            <button type="submit" name="delete_group" class="btn btn-sm btn-primary" style="float: left;margin-left:15px;margin-top: 15px;">حذف</button>
        </div>
    </div>

<div class="table-responsive table-p">
      <table class="table">
        <thead>
          <tr>
            <th><input id="checkAll" type="checkbox"/></th>
            <th>العنوان</th>
            <th>الكاتب</th>
            <th>التصنيف</th>
            <th>التاريخ</th>
            <th><span class="glyphicon glyphicon-comment"></span></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        ';
        if($num > 0){
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
                /****[ إستحضار الكاتب ]****/
                $Select_author = mysqli_query($connect,"SELECT * FROM ri_users WHERE u_id = '".$row['post_author']."'");
                $Fetch_author  = mysqli_fetch_object($Select_author);
                /****[ إستحضار التصنيف لكل موضوع ]****/
                $Select_cat = mysqli_query($connect,"SELECT * FROM ri_category WHERE ID = '".$row['post_category']."'");
                $Fetch_cat  = mysqli_fetch_object($Select_cat);
                echo'
                  <tr>
                    <td style="width:4%"><input name="check_post[]" value="'.$row['ID'].'" type="checkbox"/></td>
                    <td style="width:43%">'.$row['post_title'].'</td>
                    <td style="width:15%">'.$Fetch_author->user_login.'</td>
                    <td style="width:15%">'.$Fetch_cat->cat_name.'</td>
                    <td style="width:10%">'.$row['post_date'].'</td>
                    <td><span class="badge">'.$row['post_comments'].'</span></td>
                    <td><a href="posts.php?action=edit_post&id='.$row['ID'].'"><span class="glyphicon glyphicon-pencil"></a></span></td>
                    <td><a href="#"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                    <td><a href="posts.php?action=delete_post&id='.$row['ID'].'"><span class="glyphicon glyphicon-trash"></span></a></td>
                  </tr>
                ';
            }
        }else{
            echo'
                <tr>
                    <td style="width:9%"><p style="font-family: tahoma">لا توجد مقالات</p></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            ';
        }

    echo'
</tbody>
        <tfoot>
          <tr>
            <th><input id="checkAll2" type="checkbox"/></th>
            <th>العنوان</th>
            <th>الكاتب</th>
            <th>التصنيف</th>
            <th>التاريخ</th>
            <th><span class="glyphicon glyphicon-comment"></span></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </tfoot>
      </table>
      </div>
</form>

        ';
    ?>
    <?=$pagination?>
    <?php
    if(isset($_POST['delete_group'])){
        $check = $_POST['check_post'];
        for($i=0;$i<$num;$i++){
            $del_id= $check[$i];
            $sql5 = "DELETE FROM ri_posts WHERE ID = '".$del_id."'";

            if(mysqli_query($connect,$sql5)){
                refresh('posts.php',0);
            }
        }
    }


}else{
    refresh("index.php",0);
}
?>
    <script>

        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
        $("#checkAll2").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

    </script>
<?php require"admin-footer.php";?>