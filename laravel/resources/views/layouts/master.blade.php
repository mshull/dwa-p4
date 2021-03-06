<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>@yield('title')</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
	<link href="/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
	<link href="/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
	<link href="/assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
	<link href="/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
	<link href="/assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
	<link href="/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
	<link href="/assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css">

	@yield('hblock')

	<link href="/assets/custom/css/tables.css?v=1" rel="stylesheet" type="text/css" />
	<link href="/assets/custom/css/main.css?v=1" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">

	<!-- header -->
	<div class="page-header navbar navbar-fixed-top">
		<div class="page-header-inner">
			<div class="page-logo">
				<a href="/"><img src="/assets/custom/img/p4.png" style="margin-top:7px;height:35px;" alt="logo" class="logo-default" /></a>
				<div class="menu-toggler sidebar-toggler"></div>
			</div>
            <!--form class="search-form search-form-expanded" action="/search" method="post">
            	{{ csrf_field() }}
                <div class="input-group">
                    <input id="searchall" type="text" class="form-control" placeholder="Search..." name="query">
                    <span class="input-group-btn">
                        <a href="javascript:;" class="btn submit">
                            <i class="icon-magnifier"></i>
                        </a>
                    </span>
                </div>
            </form-->
			<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"></a>
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="/assets/custom/orgs/p4/img/avatar.jpg" />
                            <span class="username username-hide-on-mobile">{{ Auth::user()->fullName() }}</span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="/profile"><i class="icon-user"></i> My Profile</a>
                            </li>
                            <!--li>
                                <a href="/calendar"><i class="icon-calendar"></i> My Calendar</a>
                            </li>
                            <li>
                                <a href="/actions"><i class="icon-list"></i> My Action Items <span class="badge badge-success"> 7 </span></a>
                            </li-->
                            <li class="divider"></li>
                            <li><a href="/logout"><i class="icon-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-quick-sidebar-toggler">
                        <a href="/logout" class="dropdown-toggle"><i class="icon-logout"></i></a>
                    </li>
				</ul>
			</div>
		</div>
	</div>

	<!-- clear -->
	<div class="clearfix"></div>

	<!-- page -->
	<div class="page-container">
		<!-- sidebar -->
		<div class="page-sidebar-wrapper">
			<div class="page-sidebar navbar-collapse collapse">
				<ul class="page-sidebar-menu page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                    <li class="sidebar-toggler-wrapper hide">
                        <div class="sidebar-toggler"></div>
                    </li>
                    @yield('sidebar')
				</ul>
			</div>
		</div>
		<!-- content -->
		<div class="page-content-wrapper">
			<div class="page-content">
				<div class="page-bar">
                    <ul class="page-breadcrumb">
                        @yield('breadcrumbs')
                    </ul>
                    <div class="page-toolbar"></div>
				</div>
				@yield('header')
				@yield('content')
			</div>
		</div>
	</div>

	<!-- footer -->
    <div class="page-footer">
        <div class="page-footer-inner"> 
        	Copyright &copy; P4.ShullWorks.com <?php echo Date('Y'); ?>
            <a href="mailto:mshull@g.harvard.com" title="Email Us">Contact Us</a>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>

	<!-- scripts -->
	<script src="/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
	<script src="/assets/global/scripts/app.min.js" type="text/javascript"></script>
	<script src="/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
	<script src="/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
    <script src="/assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
    <script src="/assets/pages/scripts/ui-toastr.min.js" type="text/javascript"></script>
    <script src="/assets/custom/js/main.js" type="text/javascript"></script>

    @yield('fblock')
	
	@if(Session::get('notify-success'))
	<script type="text/javascript">
		$(function() {
			toastr.success("{{ Session::get('notify-success') }}", "Success");
		});
	</script>
	@endif

	@if(Session::get('notify-failure'))
	<script type="text/javascript">
		$(function() {
			toastr.error("{{ Session::get('notify-failure') }}", "Warning");
		});
	</script>
	@endif

	@if(Session::get('notify-info'))
	<script type="text/javascript">
		$(function() {
			toastr.info("{{ Session::get('notify-info') }}", "Update");
		});
	</script>
	@endif

</body>
</html>
