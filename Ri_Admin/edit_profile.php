<?php
define('login','2');
if(login == 1) {
echo'
    <div class="page-header">
        <h3>ملفي الشخصي</h3>
    </div>
    <form action="profile.php?action=edit" method="post" class="form-horizontal" role="form">
        <section id="personal_info">
            <h4>إعدادات شخصية</h4>
            <div class="form-group">
                <label class="control-label col-sm-2" for="USer_name">اسم المستخدم</label>
                <div class="col-sm-10">
                    <input type="text" name="user_login" value="'.user_login.'" class="profile_inputs form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="Full_name">الإسم الكامل</label>
                <div class="col-sm-10">
                    <input type="text" name="Full_name" value="'.Full_name.'" class="profile_inputs form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="img">الصورة العلنيةل</label>
                <div class="col-sm-10">
                    <input type="url"  name="user_img" value="'.user_img.'" class="profile_inputs form-control">
                </div>
            </div>
        </section>
        <hr>
        <section id="contact_info">
            <h4>معلومات الإتصال</h4>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">البريد الإلكتروني (مطلوب)</label>
                <div class="col-sm-10">
                    <input type="email" name="user_email" value="'.user_email.'" class="profile_inputs form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="site_web">الموقع الإلكتروني</label>
                <div class="col-sm-10">
                    <input type="url"  name="user_site_web" value="'.user_site_web.'" class="profile_inputs form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="g_url">Google+ URL</label>
                <div class="col-sm-10">
                    <input type="url" value="" class="profile_inputs form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="t_url">Twitter URL</label>
                <div class="col-sm-10">
                    <input type="url" value="" class="profile_inputs form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="y_url">Youtube UR</label>
                <div class="col-sm-10">
                    <input type="url" value="" class="profile_inputs form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="F_url">Facebook UR</label>
                <div class="col-sm-10">
                    <input type="url" value="" class="profile_inputs form-control">
                </div>
            </div>
        </section>
        <hr>
        <section id="about_info">
            <h4>نبذة عن نفسك</h4>
            <div class="form-group">
                <label class="control-label col-sm-2" for="about">سيرة ذاتية</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="user_about" id="" rows="7">'.user_about.'</textarea><small>شارك بنبذة بسيطة عنك. هذه النبذة قد تعرض علناً.</small>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="site_web">كلمة المرور الجديدة</label>
                <div class="col-sm-10">
                    <input type="password" value=""  name="user_pass1" class="profile_inputs form-control"><small>إذا أردت تغيير كلمة المرور فاكتب واحدة جديدة، وإلا فاترك المربعين فارغين</small>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="g_url">تكرار كلمة المرور الجديدة</label>
                <div class="col-sm-10">
                    <input type="password" value="" name="user_pass2" class="profile_inputs form-control"><small>اكتب كلمة المرور الجديدة مرة أخرى</small>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button name="edit_post" type="submit" class="btn btn-sm btn-danger">تحديث الحساب</button>
                </div>
            </div>

        </section>
    </form>
';
    //إستقبالمعلومات ال post
    $P_user_login    = security($_POST['user_login'])   ;
    $P_Full_name     = security($_POST['Full_name'])    ;
    $P_user_img      = security($_POST['user_img'])     ;
    $P_user_email    = security($_POST['user_email'])   ;
    $P_user_site_web = security($_POST['user_site_web']);
    $P_user_about    = security($_POST['usr_about'])    ;

    $P_user_pass1   = md5(md5(sha1($_POST['user_pass1'])));
    $P_user_pass2   = md5(md5(sha1($_POST['user_pass2'])));
    //تحذيت حساب المستخدم
    if(isset($_POST['edit_post'])){
        if(empty($P_user_login) or empty($P_Full_name) or empty($P_user_img) or empty($P_user_email) or empty($P_user_site_web) or                     empty($P_user_about))
        {
            echo'false';
        }
        else
        {
            
        }