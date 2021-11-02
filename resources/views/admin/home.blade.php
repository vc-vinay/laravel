@extends('admin.panel.layouts.app')

@section('content')
@section('title')
Dashboard
@endsection

@component('admin.panel.layouts.components.breadcrumb')
@slot('module_name')
Dashboard
@endslot
@endcomponent

<!--begin::Dashboard-->
<!--begin::Row-->
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

@endsection