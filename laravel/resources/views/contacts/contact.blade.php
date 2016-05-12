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
        <a href="/contacts">Contacts</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Contact</span>
    </li>

@endsection
@section('header', '<h3 class="page-title">Contact</h3>')
@include('partials.sidebar', array('selected'=>'contacts'))
@section('content')

@endsection
@section('fblock')

@endsection