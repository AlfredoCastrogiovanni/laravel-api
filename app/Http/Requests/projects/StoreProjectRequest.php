<?php

namespace App\Http\Requests\projects;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:40'],
            'type_id' => 'required',
            'description' => 'required',
            'day_to_make' => ['required', 'numeric'],
            'main_languages' => ['required', 'max:50'],
            'repo_url' => ['required','url: http,https', 'max:200'],
        ];
    }
}
