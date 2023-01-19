<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPostReq extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => "required|min:3|regex:/^[a-zA-ZÑñ\s]+$/",
            "content" => 'required|min:20',
            "author" => "required|exists:users,id",
            'image' => 'image|mimes:jpg,png,webp|max:2048'
        ];
    }
}
