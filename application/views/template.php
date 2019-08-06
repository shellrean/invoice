<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CV Bisma | Invoice Apps</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css">
        <!-- Jquery UI -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/jQueryUI/jquery-ui.css">
        <!-- Autocomplete -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/autocomplete/jquery.autocomplete.css">
        <!-- Font Awesome -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
        <link rel="stylesheet" href="<?= base_url() ?>assets/font-awesome-4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
        <link rel="stylesheet" href="<?= base_url() ?>assets/ionicons-2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css">
        <!-- jvectormap -->
        <link href="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Datepicker -->
        <link href="<?= base_url() ?>assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap - wysihtml5 -->
        <link href="<?= base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Select2 -->
        <link href="<?= base_url() ?>assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
        
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">

        <style type="text/css">
            input.add {
                -moz-border-radius: 4px;
                border-radius: 4px;
                background-color:#6FFF5C;
                -moz-box-shadow: 0 0 4px rgba(0, 0, 0, .75);
                box-shadow: 0 0 4px rgba(0, 0, 0, .75);
            }
            input.add:hover {
                background-color:#1EFF00;
                -moz-border-radius: 4px;
                border-radius: 4px;
            }
            input.removeRow {
                -moz-border-radius: 4px;
                border-radius: 4px;
                background-color:#FFBBBB;
                -moz-box-shadow: 0 0 4px rgba(0, 0, 0, .75);
                box-shadow: 0 0 4px rgba(0, 0, 0, .75);
            }
            input.removeRow:hover {
                background-color:#FF0000;
                -moz-border-radius: 4px;
                border-radius: 4px;
            }
        </style>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <?php $user = $this->db->get_where('user',['username' => $this->session->userdata('username')])->row(); ?>
    <body class="hold-transition skin-blue-light">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>B</b>CS</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">CV Bisma </span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">



                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url()?>assets/dist/img/default.png" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?= $user->name ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url()?>assets/dist/img/default.png" class="img-circle" alt="User Image">
                                        <p>
                                            <?= $user->name ?>
                                            <small>Administrator</small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?= base_url('panel/profile') ?>" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <?php
                                            echo anchor('auth/logout','Sign out',array('class'=>'btn btn-default btn-flat'));
                                            ?>

                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-th-large"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url()?>assets/dist/img/default.png" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?= $user->name ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <ul class="sidebar-menu">
                        <li>
                            <a href="<?php echo base_url() ?>panel">
                                <i class="fa fa-laptop"></i> <span>DASHBOARD</span>
                                <small class="label pull-right bg-red"></small>
                            </a>
                        </li>
                        <li class="header">MAIN NAVIGATION</li>
                        <?php
                        $menu = $this->db->get_where('menu', array('is_parent' => 0,'is_active'=>1));
                        foreach ($menu->result() as $m) {
                            // chek ada sub menu
                            $submenu = $this->db->get_where('menu',array('is_parent'=>$m->id,'is_active'=>1));
                            if($submenu->num_rows()>0){
                                // tampilkan submenu
                                echo "<li class='treeview'>
                                    ".anchor('#',  "<i class='$m->icon'></i>".strtoupper($m->name).' <i class="fa fa-angle-left pull-right"></i>')."
                                        <ul class='treeview-menu'>";
                                foreach ($submenu->result() as $s){
                                     echo "<li>" . anchor($s->link, "<i class='$s->icon'></i> <span>" . strtoupper($s->name)) . "</span></li>";
                                }
                                   echo"</ul>
                                    </li>";
                            }else{
                                echo "<li>" . anchor($m->link, "<i class='$m->icon'></i> <span>" . strtoupper($m->name)) . "</span></li>";
                            }

                        }
                        ?>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?= $content_view; ?>
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0
                </div>
                <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">CV Bisma Cipta Solution</a>.</strong> All rights reserved.
            </footer>

            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->
        <div class="modal fade" id="modal_content" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               
            </div>
        </div>
        <!-- jQuery 2.1.4 -->
        <script src="<?= base_url() ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- jQuery UI -->
        <script src="<?= base_url() ?>assets/plugins/jQueryUI/jquery-ui.js"></script>
        <!-- Autocomplete -->
        <script src="<?= base_url() ?>assets/plugins/autocomplete/jquery.autocomplete.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="<?= base_url() ?>assets/plugins/input-mask/jquery.mask.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- Sparkline -->
        <script src="<?= base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="<?= base_url() ?>assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap wysihtml5 -->
        <script src="<?= base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- select2 -->
        <script src="<?= base_url() ?>assets/plugins/select2/select2.full.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?= base_url() ?>assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- SlimScroll -->
        <script src="<?= base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?= base_url() ?>assets/plugins/fastclick/fastclick.min.js"></script>
        <!-- ChartJS 1.0.1 -->
        <script src="<?= base_url() ?>assets/plugins/chartjs/Chart.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url() ?>assets/dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
      <!--   <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
        <script src="<?= base_url() ?>assets/dist/js/pages/dashboard2.js" type="text/javascript"></script> -->

        <script src="<?= base_Url() ?>assets/dist/js/scripts.js"></script>
       
    </body>
</html>
