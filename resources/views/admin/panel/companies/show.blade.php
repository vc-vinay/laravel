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
                <label for="name">{{ trans('label.name') }}: {{ $company->name }}</label>
            </div>
            <div class="col-xl-6">
                <label for="email">{{ trans('label.email') }}: {{ $company->email }}</label>
            </div>
        </div>

        <div class="form-group row">
        <div class="col-xl-6">
                <label for="email">{{ trans('label.website') }}: {{ $company->website }}</label>
            </div>
            <div class="col-xl-6">
                <label for="logo">{{ trans('label.logo') }}:</label>
                @if(!empty($company->logo))
                    <img src="{{ Illuminate\Support\Facades\Storage::disk('public')->url('company/logo/'.$company->logo) }}"/>
                @endif
                
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