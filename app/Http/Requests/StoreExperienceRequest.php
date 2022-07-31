<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExperienceRequest extends FormRequest
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
        return [
            'job_title' => ['required', 'max:255'],
            'company_name' => ['required', 'max:255'],
            'city' => ['required', 'max:255'],
            'country' => ['required', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['date', 'after:start_date'],
        ];
    }
}
