<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'color'=>'required',
            'is_active' => 'boolean',
            'duration_hours' => 'min:0|required_if:duration_minutes,0',
            'duration_minutes' => 'min:0|required_if:duration_hours,0'
        ];
    }

    public function durationHoursAndMinutesAreBothZero($hours,$minutes){
        return ($hours == 0 && $minutes == 0); 
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $data = $validator->getData();
            if ($this->durationHoursAndMinutesAreBothZero($data['duration_hours'],$data['duration_minutes'])) {
                $validator->errors()->add('duration_hours', 'Duration is required');
                $validator->errors()->add('duration_minutes', 'Duration is required');
            }
        });
    }
}
