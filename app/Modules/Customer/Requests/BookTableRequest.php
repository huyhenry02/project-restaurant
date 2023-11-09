<?php

namespace App\Modules\Customer\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BookTableRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
//            'email'=>'required|string|max:255',
//            'phone'=>'required|numeric',
//            'number_of_guests' =>'required|numeric',
//            'table_id' =>'required|numeric',
//            'reservation_date' =>'required|date',
//            'time' =>'required',
//            'note' =>'required|string|max:255',
        ];
    }
    public function messages(): array
    {
        return [
//            'email.required' => 'Vui lòng nhập email.',
//            'phone.required' => 'Vui lòng nhập số điện thoại.',
//            'number_of_guests.required' => 'Vui lòng nhập số người.',
//            'table_id.required' => 'Vui lòng chọn bàn',
//            'reservation_date.required' => 'Vui lòng nhập ngày ăn.',
//            'time.required' => 'Vui lòng nhập giờ.',
//            'note.required' => 'Vui lòng nhập giờ.',
        ];
    }
}
