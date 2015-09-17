<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<form action="pages.php?action=add_page" method="post">
    <div class="row">
        <div class="col-lg-9 col-sm-12">
            <div class="form_add">
                <form class="form-horizontal">
                    <input class="form-control" placeholder="ضع العنوان هنا..." type="text" name="page_title"/>
                    <textarea name="page_content"  placeholder=""></textarea>
                    <script>
                        CKEDITOR.replace( 'page_content' );
                    </script>
                </form>
            </div>
        </div>
        <div class="panel-group panels">
            <div class="col-lg-3 col-sm-12">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">خصائص الصفحة</h5>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="dad" class="controle-label dad">الأب</label>
                                <select name="dad" class="form-control">
                                    <option value="1">قفل الشبك</option>
                                    <option value="2">قفل الشبكة</option>
                                    <option value="3">ق578فل الشبكة</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dad" class="controle-label dad">ترتيب</label>
                                <input type="text" class="form-control" name="order" class="fom-control">
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" name="addpage" class="btn btn-sm btn-danger add">نشر</button>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">الصورة البارزة <small>ضع رابط الصورة هنا...</small></h5>
                        </div>
                        <div class="panel-body">
                            <input name="page_img" class="form-control" type="url"/>
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
                                    <input value="1" name="page_Cm_Statu" type="checkbox" class="switch-input">
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </li>
                            <li class="list-group-item">
                                <label class="control-label">إضهار/إخفاء box author</label><br/><br/>
                                <label class="switch switch-green">
                                    <input value="1" name="page_AuthorB_Stau" type="checkbox" class="switch-input">
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </li>
                            <li class="list-group-item">
                                <label class="control-label">إضهار/إخفاء فورم مشاركة المقالة</label><br/><br/>
                                <label class="switch switch-green">
                                    <input value="1" name="page_Share_Statu" type="checkbox" class="switch-input">
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
//Include Post Values
$Page_title        = security($_POST['page_title']);
$Page_content      = $_POST['page_content'];
$Page_img          = security($_POST['page_img']);
$Page_order        = security($_POST['order']);
$Page_Cm_Statu     = security($_POST['page_Cm_Statu']);
$Page_AuthorB_Stau = security($_POST['page_AuthorB_Stau']);
$Page_Share_Statu  = security($_POST['page_Share_Statu']);
//Insert Data With The Function
if(isset($_POST['addpage'])){
    $new_page = new_page($connect,$Page_title,$Page_content,$Page_img,$Page_order,$Page_Cm_Statu,$Page_AuthorB_Stau,$Page_Share_Statu);
}
?>


