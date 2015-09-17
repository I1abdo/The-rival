<?php require"admin-header.php";?>
<?php include "sidebar.php";?>

<?php
    if(login == 1){
        

        echo'
                <div class="page-header">
                    <h3>الرئيسية</h3>
                </div>

                <!---section #first-tabs--->
                <section id="first-taps">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">مرحبا بك في النافس <small>يمكنك البدء إعتمادا على الخطوات التالية.</small></h3>
                                </div>
                                <div class="panel-body">
                                        <div class="col-lg-4 col-md-12">
                                            <h4>يمنك البدء في ...</h4><br/>
                                            <a href="#" class="btn btn-lg btn-success">التعديل على القالب</a>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <h4>الخطوات التالية</h4><br/>
                                            <ul class="taps-links">
                                                <li><a href="posts.php?action=add_post"><span class="glyphicon glyphicon-pencil"></span>كتابة أول مقالة </a></li>
                                                <li><a href="#"><span class="glyphicon glyphicon-plus"></span> إضافة صفحة</a></li>
                                                <li><a href="#"><span class="glyphicon glyphicon-eye-open"></span> شاهد موقعك</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <h4>المزيد من الإجراءات</h4><br/>
                                            <ul class="taps-links">
                                                <li><span class="glyphicon glyphicon-tasks"></span><bs>إدارة      <a href="#">الودجات </a> أو <a href="#"> القوائم</a></bs></li>
                                                <li><a href="#"><span class="glyphicon glyphicon-comment"></span> إتاحة أو منع التعليقات</a></li>
                                                <li><a href="#"><span class="glyphicon glyphicon-pushpin"></span>إتاحة أو منع المقالات</a></li>
                                            </ul>
                                        </div>
                                    </div>
                            </div><!--end panel-->
                        </div>
                    </div><!--end row-->
                </section><!--end section #first-taps-->

                <!---section #first-tabs--->

                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <section id="last-comments">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">أخر التعليقات <small>من هنا يمكنك التحكم في أخر التعليقات</small></h3>
                                </div>
                                <table class="table">
                                    ';
        $select_comments = Select_Data($connect,'ri_comments','comment_statu = 0','0','5');
        
        foreach($select_comments as $R)
        {
            echo'
                                    <tr>
                                        <td><p>'.$R['comment_content'].'</p></td>
                                        <td><a class="success" href="admin.php?action=change_value&c_id="'.$R['ID'].'"">موافقة</a></td>
                                        <td><a href="#"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                        <td><a href="#"><span class="glyphicon glyphicon-trash"></span></a></td>
                                    </tr>                
            ';
        }
                                    echo'
                                </table>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <section id="quick message">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">رسالة سريعة  <small>من هنا يمكنك إرسال رسالة سريعة إلى عضو</small></h3>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="text">عنوان الرسالة :</label>
                                            <div class="col-sm-9">
                                                <input name="Email_title" type="text" class="form-control"  placeholder="أكتب هنا عنوان الرسالة">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="text">بريد المرسل إليه :</label>
                                            <div class="col-sm-9">
                                                <input name="Email" type="email" class="form-control" id="pwd" placeholder="أكتب هنا بريد المرسل إليه">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="text">بالرسالة :</label>
                                            <div class="col-sm-9">
                                                <textarea name="Email_content" style="height: 150px" class="form-control"  placeholder="أكتب هنا رسالتك"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button name="send_Email" type="submit" class="btn btn-success">إرسال</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
        ';
        if(action == Change_C_Value)
        {
            $Change_C_Value = mysqli_query($connect,'UPDATE ri_comments SET
                comment_statu = 1
                WHERE ID = "'.Comment_id.'"
            ');
        }  ;
        //Require Email 
        $Subject = security($_POST['Email_title']);
        $to      = security($_POST['Email']);
        $Text    = security($_POST['Email_content']);
        $Headers = user_email;
        if(isset($_POST['send_Email']))
        {
            mail($to,$subject,$txt,$headers);    
        }        
    }else{
        refresh("index.php",0);
    }
?>

<?php require"admin-footer.php";?>
