@extends('layouts.master')

@section('title', 'CRM Tool')
@section('username', '')
@section('breadcrumbs')

    <li>
        <a href="/">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Cases</span>
    </li>

@endsection
@section('header', '<h3 class="page-title">List of Cases</h3>')
@include('partials.sidebar', array('selected'=>'cases'))
@section('content')

    <?php $ci=0; ?>
    @if ($legal_cases)

        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="cases_table">
            <thead>
                <tr>
                    <!--th><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th-->
                    <th>ID</th>
                    <th>Plaintiff</th>
                    <th>Defendant</th>
                    <th># Calls</th>
                    <th>Offense Type</th>
                    <th>Status</th>
                    <th>Last Activity</th>
                    <th>Next Deadline</th>
                    <th>Added On</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($legal_cases as $legal_case)
                    <tr class="odd gradeX">
                        <!--td><input type="checkbox" class="checkboxes" value="{{ $legal_case->id }}" /></td-->
                        <td><a href="/case/{{ $legal_case->id }}">{{ $legal_case->id }}</a></td>
                        <td><a href="/case/{{ $legal_case->id }}">{{ $legal_case->contact->first_name }} {{ $legal_case->contact->last_name }}</a></a></td>
                        <td>{{ $legal_case->defendant }}</td>
                        <td class="text-center">{{ ($legal_case->calls) ? $legal_case->calls : '-' }}</td>
                        <td>{{ $legal_case->legal_case_type->name }}</td>
                        <td><span class="label label-sm {{ $legal_case->statusToColorLabel($legal_case->legal_case_status->id) }}">{{ $legal_case->legal_case_status->name }}</span></td>
                        <td>{{ date('m/d/Y', strtotime($legal_case->updated_at)) }}</td>
                        <td>{{ ($legal_case->next_deadline) ? date('m/d/Y', strtotime($legal_case->next_deadline)) : '-' }}</td>
                        <td>{{ date('m/d/Y', strtotime($legal_case->created_at)) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <?php /*
        <!--div class="table-scrollable">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Plaintiff</th>
                        <th>Defendant</th>
                        <th class="text-center"># Calls</th>
                        <th>Offense Type</th>
                        <th>Last Activity</th>
                        <th>Next Deadline</th>
                        <th>Added On</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($legal_cases as $legal_case)
                    <tr>
                        <td><a href="/case/{{ $legal_case->id }}">{{ $legal_case->id }}</a></td>
                        <td><a href="/case/{{ $legal_case->id }}">{{ $legal_case->contact->first_name }} {{ $legal_case->contact->last_name }}</a></a></td>
                        <td>{{ $legal_case->defendant }}</td>
                        <td class="text-center">{{ ($legal_case->calls) ? $legal_case->calls : '-' }}</td>
                        <td>{{ $legal_case->legal_case_type->name }}</td>
                        <td>{{ date('m/d/Y', strtotime($legal_case->updated_at)) }}</td>
                        <td>{{ ($legal_case->next_deadline) ? date('m/d/Y', strtotime($legal_case->next_deadline)) : '-' }}</td>
                        <td>{{ date('m/d/Y', strtotime($legal_case->created_at)) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div-->
        */ ?>

    @endif

@endsection
@section('fblock')

    <script src="/assets/custom/js/cases.js?v=3" type="text/javascript"></script>

@endsection