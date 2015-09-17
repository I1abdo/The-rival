<?php require"admin-header.php";?>

<?php include "sidebar.php";?>

<?php
if(login == 1){
    if(action == edit){require'edit_profile.php';exit;}
    echo'
    <div class="page-header">
        <h3>ملفي الشخصي</h3>
    </div>
    <form class="form-horizontal" role="form">
        <section id="personal_info">
            <h4>إعدادات شخصية</h4>
            <div class="form-group">
              <label class="control-label col-sm-2" for="USer_name">اسم المستخدم</label>
              <div class="col-sm-10">
                <input type="text" value="'.user_login.'" disabled class="profile_inputs form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="Full_name">الإسم الكامل</label>
              <div class="col-sm-10">
                <input type="text" value="'.Full_name.'" disabled class="profile_inputs form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="img">الصورة العلنيةل</label>
              <div class="col-sm-10">
                <input type="url" value="'.user_img.'" disabled class="profile_inputs form-control">
              </div>
            </div>
        </section>
        <hr>
        <section id="contact_info">
            <h4>معلومات الإتصال</h4>
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">البريد الإلكتروني (مطلوب)</label>
              <div class="col-sm-10">
                <input type="email" value="'.user_email.'" disabled class="profile_inputs form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="site_web">الموقع الإلكتروني</label>
              <div class="col-sm-10">
                <input type="url" value="'.user_site_web.'" disabled class="profile_inputs form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="g_url">Google+ URL</label>
              <div class="col-sm-10">
                <input type="url" value="" disabled class="profile_inputs form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="t_url">Twitter URL</label>
              <div class="col-sm-10">
                <input type="url" value="" disabled class="profile_inputs form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="y_url">Youtube UR</label>
              <div class="col-sm-10">
                <input type="url" value="" disabled class="profile_inputs form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="F_url">Facebook UR</label>
              <div class="col-sm-10">
                <input type="url" value="" disabled class="profile_inputs form-control">
              </div>
            </div>
        </section>
        <hr>
        <section id="about_info">
            <h4>نبذة عن نفسك</h4>
            <div class="form-group">
              <label class="control-label col-sm-2" for="about">سيرة ذاتية</label>
              <div class="col-sm-10">
                <textarea disabled class="form-control" name="" id="" rows="7">'.user_about.'</textarea><small>شارك بنبذة بسيطة عنك. هذه النبذة قد تعرض علناً.</small>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="site_web">كلمة المرور الجديدة</label>
              <div class="col-sm-10">
                <input type="url" value="" disabled class="profile_inputs form-control"><small>إذا أردت تغيير كلمة المرور فاكتب واحدة جديدة، وإلا فاترك المربعين فارغين</small>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="g_url">تكرار كلمة المرور الجديدة</label>
              <div class="col-sm-10">
                <input type="url" value="" disabled class="profile_inputs form-control"><small>اكتب كلمة المرور الجديدة مرة أخرى</small>
              </div>
            </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <a href="profile.php?action=edit" class="btn btn-sm btn-danger">تعديل الحساب</a>
            </div>
          </div>

        </section>
    </form>
        ';
}else{
    refresh("index.php",0);
}
?>

<?php require"admin-footer.php";?>