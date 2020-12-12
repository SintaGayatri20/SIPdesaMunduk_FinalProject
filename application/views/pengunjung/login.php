<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">
                    <a href="<?= base_url('pengunjung') ?>" class="btn btn-primary">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
                <div class="text-center m-b-md custom-login">
                    <h3>LOGIN PAGE</h3>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <?= $this->session->flashdata('message'); ?>
                        <form action="<?= base_url('auth') ?>" id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="username">Email</label>
                                <input type="text" placeholder="example@gmail.com" value="<?= set_value('email'); ?>" name="email" id="email" class="form-control">
                                <?= form_error('email', '<small class="text-danger pl-3>', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" placeholder="******" name="password" id="password" class="form-control">
                                <?= form_error('password', '<small class="text-danger pl-3>', '</small>'); ?>
                            </div>
                            <button class="btn btn-success btn-block loginbtn" type="submit">Login</button>
                            <a class="btn btn-default btn-block" href="<?= base_url('auth/registration'); ?>">Register</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
    </div>