<?php
define('login','2');
if(login == 1) {
    //`post_type`, `post_Cm_Statu`, `post_AuthorB_Stau`, `post_Share_Statu`, `post_Related_Statu`
    ?>

    <form action="posts.php?action=edit_post&id=<?=post_id ?>" method="post">
        <div class="row">
            <div class="col-lg-9 col-sm-12">
                <div class="form_add">
                    <form class="form-horizontal" action="post_new.php" method="post">
                        <input class="form-control" value="<?= post_title ?>" placeholder="ضع العنوان هنا..."
                               type="text" name="post_title"/>
                        <textarea name="post_content" placeholder="">value="<?= post_content ?></textarea>
                        <script>
                            CKEDITOR.replace('post_content');
                        </script>
                    </form>
                </div>
            </div>
            <div class="panel-group panels">
                <div class="col-lg-3 col-sm-12">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">بنية المقالة</h5>
                            </div>
                            <div class="panel-body">
                                <label><input name="post_type"
                                        <?php
                                        if (post_type == 1) {
                                            echo 'checked';
                                        }
                                        ?>
                                              value="1" type="checkbox"/> <span
                                        class="glyphicon glyphicon-pushpin"></span> مقالة</label><br/>
                                <label><input
                                        <?php
                                        if (post_type == 2) {
                                            echo 'checked';
                                        }
                                        ?>
                                        name="post_type" value="2" type="checkbox"/> <span
                                        class="glyphicon glyphicon-picture"></span> صورة</label><br/>
                                <label><input
                                        <?php
                                        if (post_type == 3) {
                                            echo 'checked';
                                        }
                                        ?>
                                        name="post_type" value="3" type="checkbox"/> <span
                                        class="glyphicon glyphicon-film"></span> فيديو</label><br/>
                                <label><input
                                        <?php
                                        if (post_type == 4) {
                                            echo 'checked';
                                        }
                                        ?>
                                        name="post_type" value="4" type="checkbox"/> <span
                                        class="glyphicon glyphicon-music"></span> صوت</label><br/>
                                <label><input
                                        <?php
                                        if (post_type == 5) {
                                            echo 'checked';
                                        }
                                        ?>
                                        name="post_type" value="5" type="checkbox"/> <span
                                        class="glyphicon glyphicon-comment"></span> محادثة</label><br/>
                            </div>
                            <div class="panel-footer">
                                <button type="submit" name="edit_post" class="btn btn-sm btn-danger add">نشر</button>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">التصنيفات
                                    <small>إختر تصنيف...</small>
                                </h5>
                            </div>
                            <div class="panel-body">
                                <?php
                                //جلب التصنيفات
                                $select_c = mysqli_query($connect, "select * from ri_category");
                                while ($row = mysqli_fetch_array($select_c, MYSQL_ASSOC)) {
                                    echo '
                                            <label><input name="post_category"
                                             ';
                                    if (post_category == $row['ID']) {
                                        echo '
                                            checked
                                            ';
                                    }
                                    echo '
                                             value="' . $row['ID'] . '" type="checkbox">  ' . $row['cat_name'] . ' </label><br/>
                                        ';
                                }
                                ?>
                                <a href="#">أضف تصنيف جديد</a>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">الصورة البارزة
                                    <small>ضع رابط الصورة هنا...</small>
                                </h5>
                            </div>
                            <div class="panel-body">
                                <input name="post_img" class="form-control" value="<?= post_img ?>" type="url"/>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">إعدادات المقالة</h5>
                            </div>

                            <!-- List group -->
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <label class="control-label">إضهار/إخفاء فورم التعليقات</label><br/><br/>
                                    <label class="switch switch-green">
                                        <input value="1"
                                            <?php
                                            if (post_Cm_Statu == 1) {
                                                echo 'checked';
                                            }
                                            ?>
                                               name="post_Cm_Statu" type="checkbox" class="switch-input">
                                        <span class="switch-label" data-on="On" data-off="Off"></span>
                                        <span class="switch-handle"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    <label class="control-label">إضهار/إخفاء box author</label><br/><br/>
                                    <label class="switch switch-green">
                                        <input value="1"
                                            <?php
                                            if (post_AuthorB_Stau == 1) {
                                                echo 'checked';
                                            }
                                            ?>
                                               name="post_AuthorB_Stau" type="checkbox" class="switch-input">
                                        <span class="switch-label" data-on="On" data-off="Off"></span>
                                        <span class="switch-handle"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    <label class="control-label">إضهار/إخفاء فورم مشاركة المقالة</label><br/><br/>
                                    <label class="switch switch-green">
                                        <input value="1"
                                            <?php
                                            if (post_Share_Statu == 1) {
                                                echo 'checked';
                                            }
                                            ?>
                                               name="post_Share_Statu" type="checkbox" class="switch-input">
                                        <span class="switch-label" data-on="On" data-off="Off"></span>
                                        <span class="switch-handle"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    <label class="control-label">إضهار/إخفاء المقالات المعلقة</label><br/><br/>
                                    <label class="switch switch-green">
                                        <input value="1"
                                            <?php
                                            if (post_Related_Statu == 1) {
                                                echo 'checked';
                                            }
                                            ?>
                                               name="post_Related_Statu" type="checkbox" class="switch-input">
                                        <span class="switch-label" data-on="On" data-off="Off"></span>
                                        <span class="switch-handle"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php
//include Post Values
    $Post_title = security($_POST['post_title']);
    $Post_content = $_POST['post_content'];
    $Post_type = security($_POST['post_type']);
    $Post_category = security($_POST['post_category']);
    $Post_img = security($_POST['post_img']);
    $post_Cm_Statu = security($_POST['post_Cm_Statu']);
    $post_AuthorB_Stau = security($_POST['post_AuthorB_Stau']);
    $post_Share_Statu = security($_POST['post_Share_Statu']);
    $post_Related_Statu = security($_POST['post_Related_Statu']);
//php code for add a post

    if (isset($_POST['edit_post'])) {
        $edit_post = "UPDATE ri_posts SET
           post_title         = '".$Post_title."',
           post_content       = '".$Post_content."',
           post_img           = '".$Post_img."',
           post_author        = '".user_id."',
           post_category      = '".$Post_category."',
           post_date          = '".date('d/m/y')."',
           post_type          = '".$Post_type."',
           post_Cm_Statu      = '".$post_Cm_Statu."',
           post_AuthorB_Stau  = '".$post_AuthorB_Stau."',
           post_Share_Statu   = '".$post_Share_Statu."',
           post_Related_Statu = '".$post_Related_Statu."'
		    WHERE id = '".post_id."'
	    ";
        if (mysqli_query($connect, $edit_post)) {
            refresh('posts.php',0);
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }
    }

    mysqli_close($connect);

    ?>

<?php
}else{
    echo'false';
}