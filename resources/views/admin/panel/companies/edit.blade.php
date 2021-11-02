@extends('admin.panel.layouts.app')
@section('title')
{{ $title }}
@endsection

@component('admin.panel.layouts.components.breadcrumb')

@slot('module_name')

Edit {{ $title }}

@endslot
@endcomponent

@section('content')
<div class="card card-custom gutter-b">
  <div class="card-header flex-wrap py-3">
    <div class="card-title">
      <h3 class="card-label">Edit Company</h3>
    </div>
  </div>
  {!! Form::model($company,['route' => [$path.'.update', $company->id], 'id'=>'company-form', 'class'=>'form fv-plugins-bootstrap fv-plugins-framework needs-validation','novalidate','files'=>true]) !!}
  <div class="card-body">
    @method('PATCH')
    @include($view.'.form')
  </div>
  <div class="card-footer">
    <div class="row">
      <div class="col-lg-12 ml-lg-auto">
        <button class="btn btn-primary mr-2" type="submit">Update</button>
        <a class="btn btn-light-primary" href={{route($path.'.index')}}>Back</a>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection