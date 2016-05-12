@extends('layouts.master')

@section('title', 'CRM Tool')
@section('username', '')
@section('hblock')

    <link href="/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/bootstrap-editable/inputs-ext/address/address.css" rel="stylesheet" type="text/css" />

    <link href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />

@endsection
@section('breadcrumbs')

    <li>
        <a href="/">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>My Profile</span>
    </li>

@endsection
@section('header', '<h3 class="page-title">My Profile</h3>')
@include('partials.sidebar', array('selected'=>'profile'))
@section('content')

    <!-- PROFILE ROW -->
    <div class="row">
        <div class="col-md-6">

		    <!-- Profile Information -->
		    <div class="portlet">
		        <div class="portlet-title">
		            <div class="caption">
		                <i class="icon-briefcase font-dark"></i>
		                <span class="caption-subject font-dark bold uppercase">My Profile Information</span>
		            </div>
		        </div>
		        <div class="portlet-body">
		            <div class="table-scrollable">
		                <table class="table table-bordered">
		                    <tbody>
		                        <tr>
		                            <th class="col-md-4">First Name:</th>
		                            <td id="edit-user-first-name" data-name="first_name" data-url="/user/update" data-type="text" data-pk="{{ $user->id }}" data-placement="top" class="col-md-8 editable editable-click">{{ $user->first_name }}</td>
		                        </tr>
		                        <tr>
		                            <th class="col-md-4">Last Name:</th>
		                            <td id="edit-user-last-name" data-name="last_name" data-url="/user/update" data-type="text" data-pk="{{ $user->id }}" data-placement="top" class="col-md-8 editable editable-click">{{ $user->last_name }}</td>
		                        </tr>
		                        <tr>
		                            <th class="col-md-4">Email Address:</th>
		                            <td id="edit-user-email" data-name="email" data-url="/user/update" data-type="text" data-pk="{{ $user->id }}" data-placement="top" class="col-md-8 editable editable-click">{{ $user->email }}</td>
		                        </tr>
		                    </tbody>
		                </table>
		            </div>
		        </div>
		    </div>

        </div>
        <div class="col-md-6">
        	

        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            
		    <!-- Change Password -->
		    <div class="portlet">
		        <div class="portlet-title">
		            <div class="caption">
		                <i class="icon-briefcase font-dark"></i>
		                <span class="caption-subject font-dark bold uppercase">Change Password</span>
		            </div>
		        </div>
		        <div class="portlet-body">
	            	<form action="/user/changepass" method="post">
	            		{{ csrf_field() }}
	            		<div class="table-scrollable">
			                <table class="table table-bordered">
			                    <tbody>
			                        <tr>
			                            <th class="col-md-6">New Password:</th>
			                            <td class="col-md-6"><input name="password" type="password" size="16" class="form-control" placeholder="Type new password ..."></td>
			                        </tr>
			                        <tr>
			                            <th class="col-md-6">Confirm New Password:</th>
			                            <td class="col-md-6"><input name="confirm" type="password" size="16" class="form-control" placeholder="Type again to confirm ..."></td>
			                        </tr>
			                    </tbody>
			                </table>
		                </div>
	            		<input type="submit" class="btn red margin-bottom-10" value="Update Password">
	            	</form>
		        </div>
		    </div>

        </div>
        <div class="col-md-6">
            


        </div>
    </div>

@endsection
@section('fblock')

    <script src="/assets/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>

    <script src="/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/jquery.mockjax.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-editable/inputs-ext/address/address.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js" type="text/javascript"></script>

    <script src="/assets/custom/js/case.js?v=1" type="text/javascript"></script>

@endsection