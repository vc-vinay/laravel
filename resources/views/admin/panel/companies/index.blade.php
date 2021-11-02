@extends('admin.panel.layouts.app')
@section('content')
@section('title')
All {{ Str::snake(Str::pluralStudly($title),' ') }}
@endsection
@component('admin.panel.layouts.components.datatable')@endcomponent
<h1 class="mt-4">Tables</h1>

@component('admin.panel.layouts.components.breadcrumb')
@slot('module_name')
All {{ $title }}
@endslot
@endcomponent

<div class="card mb-4">
    <div class="card-body">
        <a href="{{ route($path.'.create') }}" class="btn btn-primary font-weight-bolder float-right">
            <span class="svg-icon svg-icon-md">
                <i class="fas fa-plus"></i>
            </span>New {{ $title }}
        </a>
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        {{ $title }}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            {!! $dataTable->table(['class' => 'table table-bordered dataTable'],false) !!}
        </div>
    </div>
</div>
@endsection

@push('scripts')
{!! $dataTable->scripts() !!}
<script>
    $(document).on('click', '.deleteRecord', function(e) {
        id = $(this).attr('data-id');
        var url = "{{ route('companies.destroy','replaceid') }}";
        replaced = url.replace(/replaceid/g, id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            imageUrl: '/icon/trash-solid.svg',
            imageWidth: 70,
            imageHeight: 70,
            showCancelButton: true,
            confirmButtonText: "Yes Delete it!",
            cancelButtonText: "No, Keep it!",
            customClass: {
                confirmButton: 'btn btn-outline-danger',
                cancelButton: 'btn btn-outline-dark mr-2',
            },
            buttonsStyling: false,
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                })
                $.ajax({
                    url: replaced,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        _method: 'DELETE'
                    },
                    success: function(msg) {
                        if (msg.status == 'success') {
                            Toast.fire({
                                icon: 'success',
                                title: msg.message
                            })
                            window.LaravelDataTables["company-table"].ajax.reload(null, false);
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: msg.message
                            })
                        }
                    },
                    error: function(xhr, error) {
                        if (xhr.status == 403) {
                            Toast.fire({
                                icon: 'error',
                                title: "You don't have permission"
                            })
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Something went wrong'
                            })
                        }
                    }
                });
            }
        })
    });
</script>
@endpush