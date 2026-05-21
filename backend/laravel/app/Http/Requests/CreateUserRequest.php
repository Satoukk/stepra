<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
            'icon' => ['nullable', 'string', 'max:255'],
            'profile_text' => ['nullable', 'string', 'max:255'],
            'notification_enabled' => ['nullable', 'boolean'],
            'theme_color' => ['nullable', 'string', 'size:7', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'level' => ['nullable', 'integer', 'min:1'],
            'xp' => ['nullable', 'integer', 'min:0'],
            'streak' => ['nullable', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => '名前は必須です。',
            'email.required' => 'メールは必須です。',
            'email.email' => 'メール形式が正しくありません。',
            'email.unique' => 'このメールは既に使われています。',
            'password.required' => 'パスワードは必須です。',
            'password.min' => 'パスワードは8文字以上にしてください。',
            'theme_color.regex' => 'テーマカラーは#RRGGBB形式で指定してください。',
        ];
    }
}
