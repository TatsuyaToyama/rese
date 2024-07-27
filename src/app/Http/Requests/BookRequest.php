<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'booking_date' => 'required|date|after:today'
        ];
    }

    public function messages()
    {
        return [
            'booking_date.after' => '明日以降の日にちを指定してください。当日予約はお店に直接ご連絡ください。',
        ];
    }
}
