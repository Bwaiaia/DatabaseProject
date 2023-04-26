<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('employee_edit');
    }

    public function rules()
    {
        return [
            'full_name' => [
                'string',
                'required',
            ],
            'title' => [
                'string',
                'nullable',
            ],
            'dob' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'email' => [
                'required',
                'unique:employees,email,' . request()->route('employee')->id,
            ],
            'training_name' => [
                'string',
                'required',
            ],
            'training_type' => [
                'string',
                'required',
            ],
            'training_provid' => [
                'string',
                'required',
            ],
            'training_ini' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'training_end' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'training_dur' => [
                'string',
                'required',
            ],
        ];
    }
}
