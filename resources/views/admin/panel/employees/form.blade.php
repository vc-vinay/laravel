<div class="form-group row">
    <div class="col-xl-6">
        <label for="first_name">{{ trans('label.first_name') }}<span class="require_field">*</span></label>
        {{Form::text('first_name', null, ['id' => 'first_name','class'=>'form-control', 'required', 'placeholder'=>'First Name', 'maxlength' => 50])}}
        <div class="text-danger">
            {{$errors->first('first_name')}}
        </div>
    </div>

    <div class="col-xl-6">
        <label for="last_name">{{ trans('label.last_name') }}<span class="require_field">*</span></label>
        {{Form::text('last_name', null, ['id' => 'last_name','class'=>'form-control', 'required', 'placeholder'=>'Last Name', 'maxlength' => 50])}}
        <div class="text-danger">
            {{$errors->first('last_name')}}
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-xl-6">
        <label for="email">{{ trans('label.email') }}<span class="require_field">*</span></label>
        {{Form::email('email', null, ['id' => 'email','class'=>'form-control', 'required', 'placeholder'=>'Email', 'maxlength' => 200])}}
        <div class="text-danger">
            {{$errors->first('email')}}
        </div>
    </div>

    <div class="col-xl-6">
        <label for="number">{{ trans('label.number') }}<span class="require_field">*</span></label>
        {{Form::text('number', null, ['id' => 'number','class'=>'form-control', 'required', 'placeholder'=>'Number'])}}
        <div class="text-danger">
            {{$errors->first('number')}}
        </div>
    </div>

    <div class="col-xl-6">
            <label class="">{{ trans('label.company_name') }}<span class="require_field">*</span></label>
            {{Form::select("company_id", !empty($companies) ? $companies : [], isset($employee['company_id']) ?  $employee['company_id']  : null , ['id' => 'company_id','class'=>'form-control changeevent'])}}
            <div class="text-danger">
                {{$errors->first('company_id')}}
            </div>
    </div>

</div>

@component('admin.panel.layouts.components.validation')@endcomponent
@push('scripts')
<script>
    $(document).ready(function() {
        let val = "{{ empty($user) ? true : false }}"
        $("#employee-form").validate({
            errorClass: 'text-danger',
            errorElement: 'span',
            normalizer: function(value) {
                return $.trim(value);
            },
            rules: {
                first_name: {
                    required: true,
                },
                last_name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                number: {
                    required: true,
                    number: true,
                },
                company_id: {
                    required: true,
                }
            },
            messages: {
                first_name: {
                    required: 'Please enter first name.',
                },
                last_name: {
                    required: 'Please enter last name.',
                },
                company_id: {
                    required: 'Please select company.',
                },
                email: {
                    required: "Please enter your email address.",
                    email: "Please enter a valid email address.",
                }
            },
            onfocusout: function(element) {
                // "eager" validation
                this.element(element);
            }
        });
    });
</script>
@endpush