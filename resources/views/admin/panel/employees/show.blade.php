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
            <h3 class="card-label">View Company</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-xl-6">
                <label for="first_name">{{ trans('label.first_name') }}: {{ $employee->first_name }}</label>
            </div>
            <div class="col-xl-6">
                <label for="last_name">{{ trans('label.last_name') }}: {{ $employee->last_name }}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-xl-6">
                <label for="email">{{ trans('label.email') }}: {{ $employee->email }}</label>
                
            </div>
            <div class="col-xl-6">
                <label for="number">{{ trans('label.number') }}: {{ $employee->number }}</label>
                
            </div>
        </div>

        <div class="form-group row">
            <div class="col-xl-6">
                <label for="company_name">{{ trans('label.company_name') }}: {{ $employee->company->name }}</label>
                
            </div>
        </div>

    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-lg-12 ml-lg-auto">
                <a class="btn btn-light-primary" href={{route($path.'.index')}}>Back</a>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection