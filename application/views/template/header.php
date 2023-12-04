<!DOCTYPE html>
<!--
This is a Kredit Motor template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem | Rental Mobil</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
    <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('');?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('');?>assets/font-awesome-4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url('');?>assets/font-awesome-4.6.3/css/font-awesome.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('');?>assets/ionicons-2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('');?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url('');?>assets/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url('');?>assets/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url('');?>assets/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url('');?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('');?>assets/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('');?>assets/dist/css/AdminLTE.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('');?>assets/plugins/datatables/dataTables.bootstrap.css">
    <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url('');?>assets/plugins/datepicker/datepicker3.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('');?>assets/dist/css/skins/_all-skins.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url();?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sistem</b> Rental Mobil</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="<?php echo base_url('/upload/avatars/');?>" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo base_url('/upload/avatars/'.$this->session->userdata('PHOTO'));?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $this->session->userdata("NAMA");?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo base_url('/upload/avatars/'.$this->session->userdata('PHOTO'));?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata("NAMA");?> - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url("Login/logout");?>" class="btn btn-default btn-flat">Sign out</a>
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

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('/upload/avatars/'.$this->session->userdata('PHOTO'));?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata("NAMA");?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
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

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="<?php echo site_url('mobil');?>"><i class="fa fa-area-chart"></i> <span>Mobil</span></a></li>
        <li><a href="<?php echo site_url('fasilitas');?>"><i class="fa fa-area-chart"></i> <span>Fasilitas Mobil</span></a></li>  
        <li><a href="<?php echo site_url('transaksi');?>"><i class="fa fa-area-chart"></i> <span>Transaksi</span></a></li>
        <li><a href="<?php echo site_url('users');?>"><i class="fa fa-area-chart"></i> <span>Denda</span></a></li>               
        <li><a href="<?php echo site_url('users');?>"><i class="fa fa-area-chart"></i> <span>Users</span></a></li>               
<!--         <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Coustomers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('pembeli');?>"><i class="fa fa-angle-double-right"></i>Form Data Coustomers</a></li>
            <li><a href="<?php echo site_url('pembeli/view_pembeli');?>"><i class="fa fa-angle-double-right"></i>List Coustomers</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#"><i class="fa fa-motorcycle"></i> <span>Motor</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('motor');?>"><i class="fa fa-angle-double-right"></i>Form Detail Motor</a></li>
            <li><a href="<?php echo site_url('motor/view_list_motor');?>"><i class="fa fa-angle-double-right"></i>List Motor</a></li>
            <li><a href="<?php echo site_url('motor/merk');?>"><i class="fa fa-angle-double-right"></i>Merk Motor</a></li>
            <li><a href="<?php echo site_url('motor/tipe');?>"><i class="fa fa-angle-double-right"></i>Tipe Motor</a></li>
            <li><a href="<?php echo site_url('motor/warna');?>"><i class="fa fa-angle-double-right"></i>Warna Motor</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-gear"></i> <span>Order Cash</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('pembeli_cash');?>"><i class="fa fa-angle-double-right"></i>Form Order Cash</a></li>
            <li><a href="#"><i class="fa fa-angle-double-right"></i>List Order Cash</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-check"></i> <span>Order Kredit</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('pembeli_cash');?>"><i class="fa fa-angle-double-right"></i>Form Order Cash</a></li>
            <li><a href="#"><i class="fa fa-angle-double-right"></i>List Order Cash</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-building"></i> <span>Paket Kredit</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('paket_kredit');?>"><i class="fa fa-angle-double-right"></i>Form Paket Kredit</a></li>
            <li><a href="#"><i class="fa fa-angle-double-right"></i>List Paket Kredit</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-money"></i> <span>Bayar Cicilan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('pembeli_cash');?>"><i class="fa fa-angle-double-right"></i>Form Order Cash</a></li>
            <li><a href="#"><i class="fa fa-angle-double-right"></i>List Order Cash</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-user-plus"></i> <span>Karyawan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('karyawan');?>"><i class="fa fa-angle-double-right"></i>Form Detail Karyawan</a></li>
            <li><a href="<?php echo site_url('karyawan/view_karyawan');?>"><i class="fa fa-angle-double-right"></i>List Karyawan</a></li>
            <li><a href="<?php echo site_url('karyawan/posisi');?>"><i class="fa fa-angle-double-right"></i>Posisi Karyawan</a></li>
          </ul>
        </li> -->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>