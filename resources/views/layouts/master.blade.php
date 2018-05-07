<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	 <!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
  <title>HapoERP | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
	   folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('/css/skins/_all-skins.min.css') }}">
  <!--  -->
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/gg.css') }}"/>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
	<!-- Logo -->
	<a href="index2.html" class="logo">
	  <!-- mini logo for sidebar mini 50x50 pixels -->
	  <span class="logo-mini"><b>Hapo</b></span>
	  <!-- logo for regular state and mobile devices -->
	  <span class="logo-lg" id="logo"><img src="{{ asset('/img/hapoERP.png') }}"></span>
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top">
	  <!-- Sidebar toggle button-->
	  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
		<span class="sr-only">Toggle navigation</span>
	  </a>

	  <div class="navbar-custom-menu">
		<ul class="nav navbar-nav">
		  <!-- User Account: style can be found in dropdown.less -->
		  <li class="dropdown user user-menu">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			  <img src="{{ asset('/img/'.Auth::user()->avatar) }}" class="user-image" alt="User Image">
			  <span class="hidden-xs">{{ Auth::user()->name }}</span>
			</a>
			<ul class="dropdown-menu">
			  <!-- User image -->
			  <li class="user-header">
				<img src="{{ asset('/img/'.Auth::user()->avatar) }}" class="img-circle" alt="User Image">

				<p>
				  {{ Auth::user()->name }} - {{ Auth::user()->department }}
				</p>
			  </li>
			  <!-- Menu Footer-->
			  <li class="user-footer">
				<div class="pull-left">
				  <a href="{{ route('profile.index') }}" class="btn btn-default btn-flat">Profile</a>
				</div>
				<div class="pull-right">
				  <form action="{{ route('logout') }}" method="POST">
                	{{ csrf_field() }}
                		<button type="submit" class="btn btn-default btn-flat">Sign out</button>
           		  </form>
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
		  <img src="{{ asset('/img/'.Auth::user()->avatar) }}" class="img-circle" alt="User Image">
		</div>
		<div class="pull-left info">
		  <p>{{ Auth::user()->name }}</p>
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
		<li class="treeview">
		  <a href="#">
			<i class="fa fa-pie-chart"></i>
			<span>Statistics</span>
			<span class="pull-right-container">
			  <i class="fa fa-angle-left pull-right"></i>
			</span>
		  </a>
		  <ul class="treeview-menu">
			<li><a href="{{ route('attendsion.statistical') }}"><i class="fa fa-circle-o"></i> Attendsion</a></li>
			<li><a href="{{ route('overtime.statistical') }}"><i class="fa fa-circle-o"></i> OverTime</a></li>
			<li><a href="{{ route('report.index') }}"><i class="fa fa-circle-o"></i> Report</a></li>
			<li><a href="{{ route('vacationfulltime.index') }}"><i class="fa fa-circle-o"></i> Vacation FullTime</a></li>
			<li><a href="{{ route('vacationparttime.index') }}"><i class="fa fa-circle-o"></i> Vacation PartTime</a></li>
			<li><a href="{{  route('employs.index') }}"><i class="fa fa-circle-o"></i> Employee</a></li>
		  </ul>
		</li>
		<li class="active treeview">
		  <a href="#">
			<i class="fa fa-dashboard"></i> <span>Vacation</span>
			<span class="pull-right-container">
			  <span class="label label-primary pull-right">2</span>
			</span>
		  </a>
		  <ul class="treeview-menu">
			<li class="active"><a href="{{ route('vacationfulltime.create') }}"><i class="fa fa-circle-o"></i> Vacation FullTime</a></li>
			<li><a href="{{ route('vacationparttime.create') }}"><i class="fa fa-circle-o"></i> Vacation PartTime</a></li>
		  </ul>
		</li>
		<li class="treeview">
		  <a href="#">
			<i class="fa fa-files-o"></i>
			<span>Attendsion</span>
			<span class="pull-right-container">
			  <i class="fa fa-angle-left pull-right"></i>
			</span>
		  </a>
		  <ul class="treeview-menu">
			<li><a href="{{ route('attendsion.index') }}"><i class="fa fa-circle-o"></i> Create</a></li>
		  </ul>
		</li>
		<li class="treeview">
		  <a href="#">
			<i class="fa fa-laptop"></i>
			<span>OverTime</span>
			<span class="pull-right-container">
			  <i class="fa fa-angle-left pull-right"></i>
			</span>
		  </a>
		  <ul class="treeview-menu">
			<li><a href="{{ route('overtime.create') }}"><i class="fa fa-circle-o"></i> Create</a></li>
			<li><a href="{{ route('overtime.index') }}"><i class="fa fa-circle-o"></i> Show</a></li>
		  </ul>
		</li>
		<li class="treeview">
		  <a href="#">
			<i class="fa fa-edit"></i> <span>Report</span>
			<span class="pull-right-container">
			  <i class="fa fa-angle-left pull-right"></i>
			</span>
		  </a>
		  <ul class="treeview-menu">
			<li><a href="{{ route('report.create') }}"><i class="fa fa-circle-o"></i> Create</a></li>
			<li><a href="{{ route('report.index') }}"><i class="fa fa-circle-o"></i> Show</a></li>
		  </ul>
		</li>
	  </ul>
	</section>
	<!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  @yield('title_head')
	</section>

	<!-- Main content -->
	<section class="content">
	  <div class="container">

				@yield('content')

			</div>    
	</section>

	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
	<div class="pull-right hidden-xs">
	  <b>Version</b> 1.0.0
	</div>
	<strong>Copyright &copy; @php echo date('Y') @endphp <a href="#">HapoERP</a>.</strong> All rights
	reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
	<!-- Create the tabs -->
	<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
	  <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
	  <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
	</ul>
	<!-- Tab panes -->
	<div class="tab-content">
	  <!-- Home tab content -->
	  <div class="tab-pane" id="control-sidebar-home-tab">
		<h3 class="control-sidebar-heading">Recent Activity</h3>
		<ul class="control-sidebar-menu">
		  <li>
			<a href="javascript:void(0)">
			  <i class="menu-icon fa fa-birthday-cake bg-red"></i>

			  <div class="menu-info">
				<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

				<p>Will be 23 on April 24th</p>
			  </div>
			</a>
		  </li>
		  <li>
			<a href="javascript:void(0)">
			  <i class="menu-icon fa fa-user bg-yellow"></i>

			  <div class="menu-info">
				<h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

				<p>New phone +1(800)555-1234</p>
			  </div>
			</a>
		  </li>
		  <li>
			<a href="javascript:void(0)">
			  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

			  <div class="menu-info">
				<h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

				<p>nora@example.com</p>
			  </div>
			</a>
		  </li>
		  <li>
			<a href="javascript:void(0)">
			  <i class="menu-icon fa fa-file-code-o bg-green"></i>

			  <div class="menu-info">
				<h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

				<p>Execution time 5 seconds</p>
			  </div>
			</a>
		  </li>
		</ul>
		<!-- /.control-sidebar-menu -->

		<h3 class="control-sidebar-heading">Tasks Progress</h3>
		<ul class="control-sidebar-menu">
		  <li>
			<a href="javascript:void(0)">
			  <h4 class="control-sidebar-subheading">
				Custom Template Design
				<span class="label label-danger pull-right">70%</span>
			  </h4>

			  <div class="progress progress-xxs">
				<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
			  </div>
			</a>
		  </li>
		  <li>
			<a href="javascript:void(0)">
			  <h4 class="control-sidebar-subheading">
				Update Resume
				<span class="label label-success pull-right">95%</span>
			  </h4>

			  <div class="progress progress-xxs">
				<div class="progress-bar progress-bar-success" style="width: 95%"></div>
			  </div>
			</a>
		  </li>
		  <li>
			<a href="javascript:void(0)">
			  <h4 class="control-sidebar-subheading">
				Laravel Integration
				<span class="label label-warning pull-right">50%</span>
			  </h4>

			  <div class="progress progress-xxs">
				<div class="progress-bar progress-bar-warning" style="width: 50%"></div>
			  </div>
			</a>
		  </li>
		  <li>
			<a href="javascript:void(0)">
			  <h4 class="control-sidebar-subheading">
				Back End Framework
				<span class="label label-primary pull-right">68%</span>
			  </h4>

			  <div class="progress progress-xxs">
				<div class="progress-bar progress-bar-primary" style="width: 68%"></div>
			  </div>
			</a>
		  </li>
		</ul>
		<!-- /.control-sidebar-menu -->

	  </div>
	  <!-- /.tab-pane -->
	  <!-- Stats tab content -->
	  <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
	  <!-- /.tab-pane -->
	  <!-- Settings tab content -->
	  <div class="tab-pane" id="control-sidebar-settings-tab">
		<form method="post">
		  <h3 class="control-sidebar-heading">General Settings</h3>

		  <div class="form-group">
			<label class="control-sidebar-subheading">
			  Report panel usage
			  <input type="checkbox" class="pull-right" checked>
			</label>

			<p>
			  Some information about this general settings option
			</p>
		  </div>
		  <!-- /.form-group -->

		  <div class="form-group">
			<label class="control-sidebar-subheading">
			  Allow mail redirect
			  <input type="checkbox" class="pull-right" checked>
			</label>

			<p>
			  Other sets of options are available
			</p>
		  </div>
		  <!-- /.form-group -->

		  <div class="form-group">
			<label class="control-sidebar-subheading">
			  Expose author name in posts
			  <input type="checkbox" class="pull-right" checked>
			</label>

			<p>
			  Allow the user to show his name in blog posts
			</p>
		  </div>
		  <!-- /.form-group -->

		  <h3 class="control-sidebar-heading">Chat Settings</h3>

		  <div class="form-group">
			<label class="control-sidebar-subheading">
			  Show me as online
			  <input type="checkbox" class="pull-right" checked>
			</label>
		  </div>
		  <!-- /.form-group -->

		  <div class="form-group">
			<label class="control-sidebar-subheading">
			  Turn off notifications
			  <input type="checkbox" class="pull-right">
			</label>
		  </div>
		  <!-- /.form-group -->

		  <div class="form-group">
			<label class="control-sidebar-subheading">
			  Delete chat history
			  <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
			</label>
		  </div>
		  <!-- /.form-group -->
		</form>
	  </div>
	  <!-- /.tab-pane -->
	</div>
  </aside>
  <!-- /.control-sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('/bootstrap-3.3.7-dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap-notify.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function () {
		 @if(Session::has('success'))
			$.notify(
			{
				icon: "notifications",
				message: '{{ Session('success') }}',
			}, {
				type: 'success',
				timer: 1000,
				placement: {
					from: 'bottom',
					align: 'right'
				}
			});
		@endif
	});
</script>
@yield('script')
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/js/demo.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('/js/pages/dashboard.js') }}"></script>
<!-- <script src="{{ asset('/js/app.js') }}"></script> -->
</body>
</html>
