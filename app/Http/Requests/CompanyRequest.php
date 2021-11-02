<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $array = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'unique:companies'],
        ];

        if ($this->company) {
            $array['email'] = 'required|unique:companies,email,' . $this->company->id;
        }

        return $array;
    }
}
