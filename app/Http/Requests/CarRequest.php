<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Auth::check() && Auth::user()->is_admin == true) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'model' => 'required | max:255',
            'max_speed' => 'required | numeric | decimal:0,3',
            'horse_power' => 'required | numeric| max_digits:5',
            'engine_volume' => 'required | numeric | decimal:0,1' ,
            'year_of_manufacture' => 'required | numeric | max_digits:4',
        ];
    }
}
