@extends('admin.panel.layouts.app')

@section('content')

@section('title')

Add {{ $title }}

@endsection

@component('admin.panel.layouts.components.breadcrumb')

@slot('module_name')

Add {{ $title }}

@endslot

@endcomponent

<div class="card card-custom gutter-b">
    <div class="card-header flex-wrap py-3">
        <div class="card-title">
            <h3 class="card-label">Add Company</h3>
        </div>
    </div>
    {!! Form::open(['route'=>$path.'.store', 'id'=>'employee-form', 'class'=>'form fv-plugins-bootstrap fv-plugins-framework needs-validation','novalidate','files'=>true]) !!}
    <div class="card-body">
        @include($view.'.form')

    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-lg-12 ml-lg-auto">
                <button class="btn btn-primary mr-2" type="submit">Save</button>
                <a class="btn btn-light-primary" href={{route($path.'.index')}}>Back</a>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection