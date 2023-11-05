<?php

namespace App\Modules\Role\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên quyền.',
            'description.required' => 'Vui lòng nhập mô tả quyền.',
        ];
    }
}
