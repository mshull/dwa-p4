@extends('layouts.master')

@section('title')Case #{{ $legal_case->id }} {{ $legal_case->contact->first_name }} {{ $legal_case->contact->last_name }}@endsection
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
        <a href="/cases">Cases</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>View Case</span>
    </li>

@endsection
@section('header')

    <h3 class="page-title">Case: {{ $legal_case->contact->first_name }} {{ $legal_case->contact->last_name }}</h3>

    <ul class="nav nav-tabs tabs-reversed" style="margin-top: -50px;">
        <li class="active">
            <a href="#tab_reversed_1_1" data-toggle="tab" aria-expanded="true"> Case File </a>
        </li>
        <li class="">
            <a href="#tab_reversed_1_2" data-toggle="tab" aria-expanded="false"> Additonal Info </a>
        </li>
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> Options <i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu" role="menu">
                <!--li>
                    <a href="#tab_reversed_1_3" tabindex="-1" data-toggle="tab"> Archive this Case </a>
                </li-->
                <li>
                    <a href="/case/{{ $legal_case->id }}/delete" tabindex="-1"> Delete this Case </a>
                </li>
            </ul>
        </li>
    </ul>

@endsection
@include('partials.sidebar', array('selected'=>'cases'))
@section('content')
    
    <!-- Modals -->
    <div id="actionstack" class="modal fade" tabindex="-1" data-width="400">
        <div class="modal-dialog">
            <form id="action-form" action="/case/{{ $legal_case->id }}/action" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add an Action Item</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4"><p>Type of Action:</p></div>
                            <div class="col-md-8"><p>Deadline Date &amp; Time:</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <select id="action-type" class="form-control input-sm">
                                    <option value="task">Task</option>
                                    <option value="reminder">Reminder</option>
                                </select>                                
                            </div>
                            <div class="col-md-8">
                                <div class="input-group date form_meridian_datetime" data-date="{{ date("Y-m-d") }}T01:00:00Z">
                                    <input id="action-deadline" type="text" size="16" class="form-control">
                                    <span class="input-group-btn">
                                        <button class="btn default date-reset" type="button">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        <button class="btn default date-set" type="button">
                                            <i class="fa fa-calendar"></i>
                                        </button>
                                    </span>
                                </div>                              
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <input id="action-title" type="text" class="col-md-12 form-control margin-bottom-20" placeholder="Title for Action ...">
                                </p>
                                <p>
                                    <textarea id="action-body" class="col-md-12 form-control" rows="7" placeholder="Optional Action Description ..."></textarea>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><p>Assign Action To:</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <select id="action-type" class="form-control input-sm margin-bottom-20">
                                    <option value="{{ Auth::user()->id }}">{{ Auth::user()->fullName() }}</option>
                                    @foreach($users as $user)
                                        @if($user->id != Auth::user()->id)
                                        <option value="{{ $user->id }}">{{ $user->fullName() }}</option>
                                        @endif
                                    @endforeach
                                </select>                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                        <button id="submit-action" type="button" class="btn red">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="notestack" class="modal fade" tabindex="-1" data-width="400">
        <div class="modal-dialog">
            <form id="note-form" action="/case/{{ $legal_case->id }}/note" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add a Case Note</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p><input id="note-title" type="text" class="col-md-12 form-control margin-bottom-10" placeholder="Title for Note (Optional) ..."></p>
                                <p><textarea id="note-body" class="col-md-12 form-control" rows="7" placeholder="Type note contents here ..."></textarea></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                        <button id="submit-note" type="button" class="btn red">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="filestack" class="modal fade" tabindex="-1" data-width="400">
        <div class="modal-dialog">
            <form id="file-form" action="/case/{{ $legal_case->id }}/file" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Upload a Document</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p><input id="file-doc" name="doc" type="file" class="col-md-12 form-control margin-top-10 margin-bottom-10"></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                        <input type="submit" id="submit-note" class="btn red" value="Upload Document">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tab Content -->
    <div class="tab-content">
        <div class="tab-pane fade active in" id="tab_reversed_1_1">


            <!-- CASE FILE TAB -->
            <div class="row">
                <div class="col-md-6">

                    <!-- Case Tools -->
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-wrench font-dark"></i>
                                <span class="caption-subject font-dark bold uppercase">Case Tools</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="btn-group margin-bottom-10">
                                <a class="btn btn-default dropdown-toggle tooltips" data-container="body" data-placement="top" data-original-title="Change Case Status" data-toggle="dropdown" href="javascript:;"> Change Status <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    @foreach ($legal_case_statuses as $status)
                                        <li><a href="/case/{{ $legal_case->id }}/status/{{ $status->id }}">{{ $status->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <a href="javascript:;" class="btn green margin-bottom-10 tooltips" data-tooltip="true" data-container="body" data-placement="top" data-original-title="Add Action (Reminder or Task)" data-target="#actionstack" data-toggle="modal"><i class="fa fa-plus"></i> Action</a>
                            <a href="javascript:;" class="btn green-meadow margin-bottom-10 tooltips" data-tooltip="true" data-container="body" data-placement="top" data-original-title="Add Case Note" data-target="#notestack" data-toggle="modal"><i class="fa fa-plus"></i> Note</a>
                            <a href="javascript:;" class="btn green-meadow margin-bottom-10 tooltips" data-tooltip="true" data-container="body" data-placement="top" data-original-title="Add Case Document" data-target="#filestack" data-toggle="modal"><i class="fa fa-plus"></i> <i class="fa fa-file"></i></a>
                        </div>
                    </div>

                    <!-- Case Information -->
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-briefcase font-dark"></i>
                                <span class="caption-subject font-dark bold uppercase">Case Information</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th class="col-md-6">Status:</th>
                                            <th class="col-md-6"># Calls:</th>
                                        </tr>
                                        <tr>
                                            <td><span class="label label-sm {{ $legal_case->statusToColorLabel($legal_case->legal_case_status->id) }}">{{ $legal_case->legal_case_status->name }}</span></td>
                                            <td id="edit-case-calls" data-name="calls" data-type="text" data-pk="{{ $legal_case->id }}" data-placement="top" class="editable editable-click">{{ ($legal_case->calls) ? $legal_case->calls : "&nbsp;" }}</td>
                                        </tr>
                                        <tr>
                                            <th>CRM ID:</th>
                                            <th>Source ID:</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $legal_case->id }}</td>
                                            <td>{{ $legal_case->external_id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Defendant:</th>
                                            <th>Case Type:</th>
                                        </tr>
                                        <tr>
                                            <td id="edit-case-defendant" data-name="defendant" data-type="text" data-pk="{{ $legal_case->id }}" data-placement="top" class="editable editable-click">{{ ($legal_case->defendant) ? $legal_case->defendant : "&nbsp;" }}</td>
                                            <td id="edit-case-type" data-name="case-type" data-type="text" data-pk="{{ $legal_case->id }}" data-placement="top" class="editable editable-click">{{ ($legal_case->legal_case_type->name) ? $legal_case->legal_case_type->name : "&nbsp;" }}</td>
                                        </tr>
                                        </tr>
                                            <th>Last Updated:</th>
                                            <th>Added On:</th>
                                        </tr>
                                        <tr>
                                            <td>{{ ($legal_case->updated_at) ? date('m/d/Y', strtotime($legal_case->updated_at)) : "&nbsp;" }}</td>
                                            <td>{{ ($legal_case->created_at) ? date('m/d/Y', strtotime($legal_case->created_at)) : "&nbsp;" }}</td>
                                        </tr>
                                        </tr>
                                            <th>Next Deadline:</th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td>{{ ($legal_case->next_deadline) ? date('m/d/Y', strtotime($legal_case->next_deadline)) : "&nbsp;" }}</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    @include('partials.contact', array('contact'=>$legal_case->contact))
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <!-- Case Action Items -->
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-action-redo font-dark"></i>
                                <span class="caption-subject font-dark bold uppercase">Case Actions (Reminders / Tasks)</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            @if($legal_case->legal_case_actions->count())
                                @foreach ($legal_case->legal_case_actions->sortByDesc("deadline")->take(20) as $legal_case_action)
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        @if($legal_case_action->deadline)
                                            <b>{{ date("m/d/Y, g:i A", strtotime($legal_case_action->deadline)) }}:</b> 
                                        @endif
                                        {{ $legal_case_action->heading }}
                                    </div>
                                    @if($legal_case_action->heading)
                                        <div class="panel-body">
                                            <p>{!! nl2br(e($legal_case_action->value)) !!}</p>
                                            <p class="text-small">Posted on {{ date("m.d.Y, g:i A", strtotime($legal_case_action->created_at)) }}</p>
                                        </div>
                                    @endif
                                </div>
                                @endforeach
                            @else
                                <p>This case currently has no action items.</p>
                            @endif
                       </div>
                    </div>

                </div>
                <div class="col-md-6">

                    <!-- Case Documents -->
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-doc font-dark"></i>
                                <span class="caption-subject font-dark bold uppercase">Case Files</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            @if($legal_case->legal_case_files->count())
                                <ul>
                                @foreach ($legal_case->legal_case_files->sortByDesc("created_at") as $legal_case_file)
                                    <li class="margin-bottom-10">
                                        <a href="/file/{{ $legal_case_file->id }}">{{ $legal_case_file->name }}</a><br>
                                        <small>Added {{ date("m.d.Y, g:i A", strtotime($legal_case_file->created_at)) }} - <a href="/case/{{ $legal_case->id }}/file/delete/{{ $legal_case_file->id }}" class="red-mint">Delete</a></small>
                                    </li>
                                @endforeach
                                </ul>
                            @else
                                <p>This case currently has no documents attached to it.</p>
                            @endif
                       </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <!-- Case Notes -->
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-note font-dark"></i>
                                <span class="caption-subject font-dark bold uppercase">Case Notes</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            @if($legal_case->legal_case_notes->count())
                                @foreach ($legal_case->legal_case_notes->sortByDesc("created_at")->take(20) as $legal_case_note)
                                <div class="panel panel-info">
                                    @if($legal_case_note->heading)<div class="panel-heading">{{ $legal_case_note->heading }}</div>@endif
                                    <div class="panel-body">
                                        <p>{!! nl2br(e($legal_case_note->value)) !!}</p>
                                        <p class="text-small">Posted on {{ date("m.d.Y, g:i A", strtotime($legal_case_note->created_at)) }}</p>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <p>This case currently has no notes.</p>
                            @endif
                       </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <!-- Case Activities -->
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-book-open font-dark"></i>
                                <span class="caption-subject font-dark bold uppercase">Activity Log</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            @foreach ($legal_case->legal_case_logs->sortByDesc("created_at")->take(20) as $legal_case_note)
                            <div class="note note-{{ $legal_case_note->type }} margin-bottom-10">
                                <p><b>{{ date("m.d.Y, g:i A", strtotime($legal_case_note->created_at)) }} :</b> {!! $legal_case_note->value !!}</p>
                            </div>
                            @endforeach
                       </div>
                    </div>

                </div>
            </div>


        </div>
        <div class="tab-pane fade" id="tab_reversed_1_2">


            <!-- ADDITIONAL INFO TAB -->
            <div class="row">
                <div class="col-md-12">

                    <!-- Additional Information -->
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject font-dark bold uppercase">Additional Information</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-bordered">
                                    <tbody>
                                        @foreach ($legal_case->legal_case_fields as $legal_case_field)
                                        <tr>
                                            <th>{{ $legal_case_field->legal_case_field_name->name }}</th>
                                        </tr>
                                        <tr>
                                            <td>{!! ($legal_case_field->value) ? nl2br(e($legal_case_field->value)) : "&nbsp;" !!}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                       </div>
                    </div>

                </div>
            </div>


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