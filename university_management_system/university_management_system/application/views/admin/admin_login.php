<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Admin Login</title>
        <meta name="description" content="Bootstrap Metro Dashboard">
        <meta name="author" content="Dennis Ji">
        <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link id="bootstrap-style" href="admin_assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="admin_assets/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link id="base-style" href="admin_assets/css/style.css" rel="stylesheet">
        <link id="base-style-responsive" href="admin_assets/css/style-responsive.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="admin_assets/img/favicon_su.ico">
        <style type="text/css">
            body { background: url(admin_assets/img/bg-login.jpg) !important; }
        </style>
   </head>
    <body>
        <div class="container-fluid-full">
            <div class="row-fluid">
                <div class="row-fluid">
                    <div class="login-box">
                        <div class="icons">
                            <a href="index.html"><i class="halflings-icon home"></i></a>
                            <a href="#"><i class="halflings-icon cog"></i></a>
                        </div>
                          <h2>Login to your account</h2>
                          <?php
                    if (validation_errors() || $this->session->flashdata('loginerr')) {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <i class="fa fa-ban"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <b>Error!</b> <?php echo validation_errors(); ?>
                            <?php echo $this->session->flashdata('loginerr'); ?>

                        </div>
                    <?php } ?>
                        <form class="form-horizontal" action="<?php echo base_url();?>admin_login_check" method="post">
                            <fieldset>
                                <div class="input-prepend" title="Username">
                                    <span class="add-on"><i class="halflings-icon user"></i></span>
                                    <input class="input-large span10" name="email_address" id="username" type="email" placeholder="type your email"/>
                                </div>
                                <div class="clearfix"></div>

                                <div class="input-prepend" title="Password">
                                    <span class="add-on"><i class="halflings-icon lock"></i></span>
                                    <input class="input-large span10" name="password" id="password" type="password" placeholder="type password"/>
                                </div>
                                <div class="clearfix"></div>
                                <label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>
                                <div class="button-login">	
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                                <div class="clearfix"></div>
                            </fieldset>
                        </form>
                        <hr>
                        <h3>Forgot Password?</h3>
                        <p>
                            No problem, <a href="#">click here</a> to get a new password.
                        </p>	
                    </div><!--/span-->
                </div><!--/row-->


            </div><!--/.fluid-container-->

        </div><!--/fluid-row-->

        <!-- start: JavaScript-->

        <script src="admin_assets/js/jquery-1.9.1.min.js"></script>
        <script src="admin_assets/js/jquery-migrate-1.0.0.min.js"></script>

        <script src="admin_assets/js/jquery-ui-1.10.0.custom.min.js"></script>

        <script src="admin_assets/js/jquery.ui.touch-punch.js"></script>

        <script src="admin_assets/js/modernizr.js"></script>

        <script src="admin_assets/js/bootstrap.min.js"></script>

        <script src="admin_assets/js/jquery.cookie.js"></script>

        <script src='admin_assets/js/fullcalendar.min.js'></script>

        <script src='admin_assets/js/jquery.dataTables.min.js'></script>

        <script src="admin_assets/js/excanvas.js"></script>
        <script src="admin_assets/js/jquery.flot.js"></script>
        <script src="admin_assets/js/jquery.flot.pie.js"></script>
        <script src="admin_assets/js/jquery.flot.stack.js"></script>
        <script src="admin_assets/js/jquery.flot.resize.min.js"></script>

        <script src="admin_assets/js/jquery.chosen.min.js"></script>

        <script src="admin_assets/js/jquery.uniform.min.js"></script>

        <script src="admin_assets/js/jquery.cleditor.min.js"></script>

        <script src="admin_assets/js/jquery.noty.js"></script>

        <script src="admin_assets/js/jquery.elfinder.min.js"></script>

        <script src="admin_assets/js/jquery.raty.min.js"></script>

        <script src="admin_assets/js/jquery.iphone.toggle.js"></script>

        <script src="admin_assets/js/jquery.uploadify-3.1.min.js"></script>

        <script src="js/jquery.gritter.min.js"></script>

        <script src="admin_assets/js/jquery.imagesloaded.js"></script>

        <script src="admin_assets/js/jquery.masonry.min.js"></script>

        <script src="admin_assets/js/jquery.knob.modified.js"></script>

        <script src="admin_assets/js/jquery.sparkline.min.js"></script>

        <script src="admin_assets/js/counter.js"></script>

        <script src="admin_assets/js/retina.js"></script>

        <script src="admin_assets/js/custom.js"></script>
    </body>
</html>
