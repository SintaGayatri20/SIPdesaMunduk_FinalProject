<body>


    <div class="color-line"></div>
    <br><br><br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                <div class="text-center custom-login">
                    <h3>REGISTRATION</h3>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form method="post" action="<?= base_url('auth/registration'); ?>" id="loginForm">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Full Name</label>
                                    <input type="text" id="name" name="name" class="form-control" value="<?= set_value('name'); ?>">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Email</label>
                                    <input type="text" id="email" name="email" placeholder="example@gmail.com" class="form-control" value="<?= set_value('name'); ?>">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Password</label>
                                    <input type="password" id="password1" name="password1" placeholder="*******" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Repeat Password</label>
                                    <input type="password2" id="password2" name="password2" placeholder="*******" class="form-control">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success loginbtn">Register</button>
                            </div>

                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
        </div>