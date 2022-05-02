<?php

namespace App\Http\Requests\Servers;

use Illuminate\Foundation\Http\FormRequest;

class StoreServerRequest extends FormRequest
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
            'ip_address' => ['required', 'string', 'unique:servers,ip_address'],
            'server_name' => ['nullable', 'string'],
            'username' => ['required', 'string'],
            'password' => ['required', 'string']
        ];
    }
}
