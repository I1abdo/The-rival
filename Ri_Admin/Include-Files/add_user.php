<form action="users.php?action=add_user" method="post">
    <div style="margin-top:10px;" class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">معلومات ضرورية</h2>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <!--Username-->
                        <div class="col-sm-3">
                            <label style="margin-top: 8px;" class="control-label" for="Username">إسم المستخدم</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" name="Username" type="text">
                        </div>
                        <!--Fullname-->
                        <div class="col-sm-3">
                            <label style="margin-top: 8px;" class="control-label" for="Fullname">الإسم الشخصي</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" name="Fullname" type="text">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">معلومات إختيارية</h2>
                </div>
                <div class="panel-body"></div>
            </div>
        </div>
        <button style="width:97.5%;margin-right:15px" class="btn btn-primary">أضف عضو</button>
    </div>
</form>