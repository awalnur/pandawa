<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Pedoma</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1" name="viewport">
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->


    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE')?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE')?>/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE')?>/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE')?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE')?>/bower_components/select2/dist/css/select2.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE')?>/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE')?>/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE')?>/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE')?>/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE')?>/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE')?>/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE')?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition fixed skin-red sidebar-mini">
<div class="wrapper">

    <header class="main-header fixed-top">
        <!-- Logo -->
        <a href="/admin" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>PDM</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>PEDOMA</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top navbar-fixed-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?= base_url('assets/adminLTE')?>/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?= session('nama');?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?= base_url('assets/adminLTE')?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    <?= session('nama');?> - Admin
                                </p>
                            </li>
                            <!-- Menu Body -->
                             <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?=base_url('/admin/auth/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
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
                    <img src="<?= base_url('assets/adminLTE')?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?= session('nama');?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active ">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                </li>


                <li class="header">DATA MASTER</li>

                <li class="treeview">
                    <a href="">
                        <i class="fa fa-users"></i>
                        <span>Dosen</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('admin/dosen/tambah')?>"><i class="fa fa-circle-o"></i> Tambah Dosen</a></li>
                        <li><a href="<?= base_url('admin/dosen')?>"><i class="fa fa-circle-o"></i> Data Dosen</a></li>
                      </ul>
                </li>
<!--                <li class="treeview">-->
<!--                    <a href="">-->
<!--                        <i class="fa fa-list"></i>-->
<!--                        <span>Prodi</span>-->
<!--                        <span class="pull-right-container">-->
<!--                          <i class="fa fa-angle-left pull-right"></i>-->
<!--                        </span>-->
<!--                    </a>-->
<!--                    <ul class="treeview-menu">-->
<!--                        <li><a href="--><?//= base_url('admin/dosen/tambah')?><!--"><i class="fa fa-circle-o"></i> Tambah Dosen</a></li>-->
<!--                        <li><a href="--><?//= base_url('admin/dosen')?><!--"><i class="fa fa-circle-o"></i> Data Dosen</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-graduation-cap"></i>
                        <span>Mahasiswa</span>
                        <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('admin/mahasiswa/tambahmhs')?>"><i class="fa fa-circle-o"></i> Tambah Mahasiswa</a></li>
                        <li><a href="<?= base_url('admin/mahasiswa')?>"><i class="fa fa-circle-o"></i> Data Mahasiswa</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-tasks"></i>
                        <span>Mata Kuliah</span>
                        <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('admin/matkul/tambah')?>"><i class="fa fa-circle-o"></i> Tambah Mata Kuliah</a></li>
                        <li><a href="<?= base_url('admin/matkul')?>"><i class="fa fa-circle-o"></i> Data Mata Kuliah</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-question-circle"></i>
                        <span>Pertanyaan</span>
                        <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('admin/pertanyaan/jenis')?>"><i class="fa fa-circle-o"></i> Jenis Pertanyaan</a></li>
                        <li><a href="<?= base_url('admin/pertanyaan')?>"><i class="fa fa-circle-o"></i> Pertanyaan</a></li>
                    </ul>
                </li>
                <li class="header">KELAS</li>
                <li class="">
                    <a href="<?= base_url('admin/kelas')?>">
                        <i class="fa fa-book"></i> <span>KELAS</span>
                    </a>
                </li>
                <li class="header">PENILAIAN</li>
                <li class="">
                    <a href="<?= base_url('admin/penilaian')?>">
                        <i class="fa fa-dashboard"></i> <span>Penilaian Dosen</span>
                    </a>
                </li>
                <li class="header">Pengaturan</li>
                <li class="">
                    <a href="<?= base_url('admin/pengaturan')?>">
                        <i class="fa fa-gear"></i> <span>Pengaturan</span>
                    </a>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->