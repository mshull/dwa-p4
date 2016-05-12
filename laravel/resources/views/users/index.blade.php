@extends('layouts.master')

@section('title', 'CRM Tool')
@section('username', '')
@section('hblock')

@endsection
@section('breadcrumbs')

    <li>
        <a href="/">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Users</span>
    </li>

@endsection
@section('header', '<h3 class="page-title">Users</h3>')
@include('partials.sidebar', array('selected'=>'users'))
@section('content')

@endsection
@section('fblock')

@endsection