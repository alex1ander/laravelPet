<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserController extends Controller
{
    public function getAllUsers()
    {
        $this->checkRole();

        $users = User::all(); // Получаем всех пользователей
        $content = view('partials.userTable', compact('users'));
        return view('app', ['content' => $content]);
    }

    private function checkRole()
    {
        if (!auth()->check() || !auth()->user()->isAdmin) {
            return redirect()->route('dashboard')->send();
        }
    }
}
