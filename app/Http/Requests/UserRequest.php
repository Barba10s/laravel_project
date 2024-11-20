<?php

namespace App\Http\Requests;
use App\Models\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            //
        ];
    }

    public function findUser()
    {
        $userId = $this->header('User-Id');

        if (!$userId) {
            abort(response()->json(['error' => 'Требуется User-ID'], 400));
        }

        $user = User::find($userId);

        if (!$user) {
            abort(response()->json(['error' => 'Пользователь не найден'], 404));
        }

        return $user;
    }
}
