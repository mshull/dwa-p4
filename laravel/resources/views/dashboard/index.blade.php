@extends('layouts.master')

@section('title', 'CRM Tool')
@section('username', '')
@section('hblock')

        <link href="/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />

        <link href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />

@endsection
@section('breadcrumbs')

    <li>
        <span>Home</span>
    </li>

@endsection
@section('header', '<h3 class="page-title">Dashboard</h3>')
@include('partials.sidebar', array('selected'=>'dashboard'))
@section('content')

    <div class="row">

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat red">
                <div class="visual"><i class="fa fa-briefcase"></i></div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ \App\LegalCase::all()->where('legal_case_status_id', 1)->count() }}">0</span>
                    </div>
                    <div class="desc">Pre Correspondence Cases</div>
                </div>
                <a class="more" href="/cases">View more <i class="m-icon-swapright m-icon-white"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat green">
                <div class="visual"><i class="fa fa-briefcase"></i></div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ \App\LegalCase::where('legal_case_status_id', '>', 2)->where('legal_case_status_id', '<', 5)->count() }}">0</span>
                    </div>
                    <div class="desc">Cases In-Progess</div>
                </div>
                <a class="more" href="/cases">View more <i class="m-icon-swapright m-icon-white"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat purple">
                <div class="visual"><i class="fa fa-briefcase"></i></div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ \App\LegalCase::where('legal_case_status_id', 5)->count() }}">0</span>
                    </div>
                    <div class="desc">Resolved Cases</div>
                </div>
                <a class="more" href="/cases">View more <i class="m-icon-swapright m-icon-white"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue">
                <div class="visual"><i class="fa fa-users"></i></div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ \App\LegalCase::all()->count() }}">0</span>
                    </div>
                    <div class="desc">Total Cases</div>
                </div>
                <a class="more" href="/cases">View more <i class="m-icon-swapright m-icon-white"></i></a>
            </div>
        </div>

    </div>
    <div class="clearfix"></div>

    <div class="row">

		<div class="col-md-6 col-sm-6">
		    <div class="portlet light bordered">
		        <div class="portlet-title">
		            <div class="caption">
		                <i class="icon-wrench font-blue"></i>
		                <span class="caption-subject font-blue bold uppercase">Latest Action Deadlines</span>
		            </div>
		            <div class="actions"></div>
		        </div>
		        <div class="portlet-body">
		        	<?php $legal_case_actions = \App\LegalCaseAction::all()->sortByDesc("deadline")->take(20); ?>
		        	@if($legal_case_actions->count())
		                <ul class="feeds">
		                	@foreach ($legal_case_actions as $legal_case_action)
		                    <li>
		                        <div class="col1">
		                            <div class="cont">
		                                <div class="cont-col1">
		                                    <div class="label label-sm label-info"><i class="fa fa-info"></i></div>
		                                </div>
		                                <div class="cont-col2">
		                                    <div class="desc">{{ $legal_case_action->heading }}</div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="col2">
		                            <div class="date">{{ ($legal_case_action->deadline) ? date('m/d/Y', strtotime($legal_case_action->deadline)) : "&nbsp;" }}</div>
		                        </div>
		                    </li>
		                    @endforeach
		                </ul>
		            @else
		            	<p>There are no actions in the system yet.</p>
		            @endif
		        </div>
		    </div>
		</div>

		<div class="col-md-6 col-sm-6">

		</div>


    </div>

@endsection
@section('fblock')

        <script src="/assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>

@endsection