<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<form action="posts.php?action=add_post" method="post">
    <div class="row">
        <div class="col-lg-9 col-sm-12">
            <div class="form_add">
                <form class="form-horizontal" action="post_new.php" method="post">
                    <input class="form-control" placeholder="ضع العنوان هنا..." type="text" name="post_title"/>
                    <textarea name="post_content"  placeholder=""></textarea>
                    <script>
                        CKEDITOR.replace( 'post_content' );
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
                            <label><input name="post_type" value="1" checked type="checkbox"/>  <span class="glyphicon glyphicon-pushpin"></span> مقالة</label><br/>
                            <label><input name="post_type" value="2" checked type="checkbox"/>  <span class="glyphicon glyphicon-picture"></span> صورة</label><br/>
                            <label><input name="post_type" value="3" checked type="checkbox"/>  <span class="glyphicon glyphicon-film"></span> فيديو</label><br/>
                            <label><input name="post_type" value="4" checked type="checkbox"/>  <span class="glyphicon glyphicon-music"></span> صوت</label><br/>
                            <label><input name="post_type" value="5" checked type="checkbox"/>  <span class="glyphicon glyphicon-comment"></span> محادثة</label><br/>
                            <script>
                                $("input:radio").change(function() {
                                    var inputs = $("input:radio").not(this);
                                    this.checked ? inputs.prop({checked: false})
                                        : inputs.prop("checked", false);
                                }).change();
                            </script>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" name="addpost" class="btn btn-sm btn-danger add">نشر</button>
                        </div>
                        </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">التصنيفات <small>إختر تصنيف...</small></h5>
                        </div>
                            <div class="panel-body">
                                <?php
                                    //جلب التصنيفات
                                    $select_c = mysqli_query($connect,"select * from ri_category");
                                     while($row = mysqli_fetch_array($select_c,MYSQL_ASSOC)){
                                        echo'
                                            <label><input name="post_category" checked value="'.$row['ID'].'" type="checkbox">  '.$row['cat_name'].' </label><br/>
                                        ';
                                    }
                                ?>
                                <script>
                                    $("input:checkbox").change(function() {
                                        var inputs = $("input:checkbox").not(this);
                                        this.checked ? inputs.prop({checked: false})
                                            : inputs.prop("checked", false);
                                    }).change();
                                </script>
                                <a href="#">أضف تصنيف جديد</a>
                            </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">الصورة البارزة <small>ضع رابط الصورة هنا...</small></h5>
                        </div>
                        <div class="panel-body">
                            <input name="post_img" class="form-control" type="url"/>
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
                                    <input value="1" name="post_Cm_Statu" type="checkbox" class="switch-input">
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </li>
                            <li class="list-group-item">
                                <label class="control-label">إضهار/إخفاء box author</label><br/><br/>
                                <label class="switch switch-green">
                                    <input value="1" name="post_AuthorB_Stau" type="checkbox" class="switch-input">
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </li>
                            <li class="list-group-item">
                                <label class="control-label">إضهار/إخفاء فورم مشاركة المقالة</label><br/><br/>
                                <label class="switch switch-green">
                                    <input value="1" name="post_Share_Statu" type="checkbox" class="switch-input">
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </li>
                            <li class="list-group-item">
                                <label class="control-label">إضهار/إخفاء المقالات المعلقة</label><br/><br/>
                                <label class="switch switch-green">
                                    <input value="1" name="post_Related_Statu" type="checkbox" class="switch-input">
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
$post_title = security($_POST['post_title']);
$post_content = $_POST['post_content'];
$post_img = security($_POST['post_img']);
$post_category = security($_POST['post_category']);
$post_Cm_Statu = security($_POST['post_Cm_Statu']);
$post_AuthorB_Stau = security($_POST['post_AuthorB_Stau']);
$post_Share_Statu = security($_POST['post_Share_Statu']);
$post_Related_Statu = security($_POST['post_Related_Statu']);
//php code for add a post

if(isset($_POST['addpost'])){
    $new_post = new_post($connect,$post_title,$post_content,$post_img,$post_category,'1',$post_Cm_Statu,$post_AuthorB_Stau,$post_Share_Statu,$post_Related_Statu);
};
?>


