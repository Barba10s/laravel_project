<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Валидируем данные
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'username' => 'required|regex:/^[a-zA-Z]+$/|unique:users,username',
            'password' => 'min:8',
            'name' =>'nullable|string|max:20'
        ]);

        
        $user = User::create($validated);

        
        return response()->json(['message' => 'Пользователь зарегестрирован', 'user' => $user], 201);
    }

    public function getUser(\App\Http\Requests\UserRequest $request)
    {
        $user = $request->findUser();

        // Возвращаем данные пользователя
        return response()->json([
            'id' => $user->id,
            'email' => $user->email,
            'username' => $user->username,
            'name' => $user->name,
        ]);
    }

    public function updateUser(\App\Http\Requests\UserRequest $request)
    {
        $user = $request->findUser();

        $validated = $request->validate([
            'username' => 'required|alpha|unique:users,username,' . $user->id,
            'name' => 'nullable|string|max:30',
        ]);

        $user->update($validated);

        return response()->json(['message' => 'Данные пользователя обновлены', 'user' => $user],200);
    }

    public function deleteUser(\App\Http\Requests\UserRequest $request)
    {
        $user = $request->findUser();

        $user->delete();
        
        return response()->json(['message'=> 'Пользователь удален','user'=> $user],200);
    }

}
