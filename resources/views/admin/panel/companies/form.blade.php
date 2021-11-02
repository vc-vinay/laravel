<div class="form-group row">
    <div class="col-xl-6">
        <label for="name">{{ trans('label.name') }}<span class="require_field">*</span></label>
        {{Form::text('name', null, ['id' => 'name','class'=>'form-control', 'required', 'placeholder'=>trans('label.name'), 'maxlength' => 50])}}
        <div class="text-danger">
            {{$errors->first('name')}}
        </div>
    </div>
    <div class="col-xl-6">
        <label for="email">{{ trans('label.email') }}<span class="require_field">*</span></label>
        {{Form::email('email', null, ['id' => 'email','class'=>'form-control', 'required', 'placeholder'=>trans('label.email'), 'maxlength' => 200])}}
        <div class="text-danger">
            {{$errors->first('email')}}
        </div>
    </div>
</div>

<div class="form-group row">
<div class="col-xl-6">
        <label for="website">{{ trans('label.website') }}<span class="require_field">*</span></label>
        {{Form::text('website', null, ['id' => 'website','class'=>'form-control', 'required', 'placeholder'=>trans('label.website'), 'maxlength' => 200])}}
        <div class="text-danger">
            {{$errors->first('website')}}
        </div>
    </div>
    <div class="col-xl-6">
        <label for="logo">{{ trans('label.logo') }}</label>
        {{Form::file('logo', null, ['id' => 'logo','class'=>'form-control', 'required', 'placeholder'=>trans('label.logo')])}}
        <div class="text-danger">
            {{$errors->first('logo')}}
        </div>
    </div>
</div>

@component('admin.panel.layouts.components.validation')@endcomponent
@push('scripts')
<script>
    $(document).ready(function() {
        let val = "{{ empty($company) ? true : false }}"
        $("#company-form").validate({
            errorClass: 'text-danger',
            errorElement: 'span',
            normalizer: function(value) {
                return $.trim(value);
            },
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                logo: {
                    required: Boolean(val),
                },
                website: {
                    required: true,
                    url: true,
                }
            },
            messages: {
                name: {
                    required: 'Please enter first name.',
                },
                email: {
                    required: "Please enter your email address.",
                    email: "Please enter a valid email address.",
                },
                logo: {
                    required: "Please select logo for company.",
                }
            },
            onfocusout: function(element) {
                this.element(element);
            }
        });
    });
</script>
@endpush