<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvailabilityRequest extends FormRequest
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
            'event_id'=>'required',
            'availability_type' =>'required',
            'rolling_days'=>'required_if:availability_type,D',
            'date_range_start'=>'date|required_if:availability_type,R',
            'date_range_end'=>'date|date|after_or_equal:date_range_start|required_if:availability_type,R',
        ];
    }

    public function messages()
    {
        return [
            'rolling_days.required_if'  => 'Rolling Days is required.',
            'date_range_start.required_if' => 'Start Date is required.',
            'date_range_end.required_if'  => 'End Date is required.',
            'date_range_end.after_or_equal'  => 'End Date must be same or before start date.',
            'date_range_start.date' => 'Start Date is required.',
            'date_range_end.date'  => 'End Date is required.',
        ];
    }
}
