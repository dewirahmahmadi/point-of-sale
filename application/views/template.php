<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Point Of Sale | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTable style -->
  <link rel="stylesheet" href="<?=base_url()?>assets//bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url()?>assets/index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>POS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Point Of Sale</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=ucfirst($this->fungsi->user_login()->username) ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?=$this->fungsi->user_login()->name ?>
                  <small><?=$this->fungsi->user_login()->address ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?=site_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=ucfirst($this->fungsi->user_login()->username) ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Navigation</li>
        <li class='<?= $this->uri->segment(1) == "dashboard" || $this->uri->segment(1) == "" ? "active" : "" ?>' >
          <a href="<?=site_url('dashboard')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) { ?>
          <li class='<?= $this->uri->segment(1) == "supplier"? "active" : "" ?>'>
            <a href="<?=site_url('supplier')?>">
              <i class="fa fa-dashboard"></i> <span>Supplier</span>
            </a>
          </li>
        <?php } ?>
        <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) { ?>
          <li class='<?= $this->uri->segment(1) == "customer" ? "active" : "" ?>'>
            <a href="<?=site_url('customer')?>">
              <i class="fa fa-th"></i> <span>Customer</span>
            </a>
          </li>
        <?php } ?>
        <li class='treeview <?= $this->uri->segment(1) == "category" || $this->uri->segment(1) == "unit" | $this->uri->segment(1) == "item" ? "active" : "" ?>'>
          <a href="<?=site_url('products')?>">
            <i class="fa fa-pie-chart"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class='<?= $this->uri->segment(1) == "category" ? "active" : "" ?>'><a href="<?=site_url('category')?>"><i class="fa fa-circle-o"></i> Categories</a></li>
            <li class='<?= $this->uri->segment(1) == "unit" ? "active" : "" ?>'><a href="<?=site_url('unit')?>"><i class="fa fa-circle-o"></i> Units</a></li>
            <li class='<?= $this->uri->segment(1) == "item" ? "active" : "" ?>'><a href="<?=site_url('item')?>"><i class="fa fa-circle-o"></i> Product</a></li>
          </ul>
        </li>
        <li class='treeview <?= $this->uri->segment(1) == "sale" || $this->uri->segment(2) == "in" || $this->uri->segment(2) == "out" ? "active" : "" ?>'>
          <a href="<?=site_url('transaction')?>">
            <i class="fa fa-laptop"></i>
            <span>Transaction</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class='<?= $this->uri->segment(1) == "sale"? "active" : "" ?>'>
				<a href="<?=site_url('sale')?>"><i class="fa fa-circle-o"></i> Sales</a>
			</li>
      <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) { ?>
        <li class='<?= $this->uri->segment(2) == "in"? "active" : "" ?>'>
          <a href="<?=site_url('stock/in')?>"><i class="fa fa-circle-o"></i> Stock In</a>
        </li>
        <li class='<?= $this->uri->segment(2) == "out"? "active" : "" ?>'>
          <a href="<?=site_url('stock/out')?>"><i class="fa fa-circle-o"></i> Stock Out</a>
        </li>
        <?php } ?>
          </ul>
        </li>
        <li class="treeview">
          <a href="<?=site_url('report')?>">
            <i class="fa fa-edit"></i> <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= site_url('report/sale_report'); ?>"><i class="fa fa-circle-o"></i> Sales</a></li>
          </ul>
        </li>
        <?php if ($this->session->userdata('level') == 1) { ?>}
          <li class="header">Settings</li>
          <li>
            <a href="<?=site_url('user')?>">
              <i class="fa fa-th"></i> <span>Users</span>
            </a>
          </li>
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php echo $contents ?>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="https://adminlte.io">Point Of Sale</a>.</strong> All rights
    reserved.
  </footer>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- DataTables -->
<script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Mustache -->
<script src="<?=base_url()?>assets/custom/mustache.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets/dist/js/demo.js"></script>
<!-- Custom Js -->
<script src="<?=base_url()?>assets/custom/custom.js"></script>
</body>
</html>
