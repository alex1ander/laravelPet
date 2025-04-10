<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();

        foreach ($plans as $plan) {
            $plan->features = json_decode($plan->features, true); // Преобразуем в массив
        }

        $content = view('partials.plans', compact('plans'));
        return view('app', ['content' => $content]);
    }

    public function buyPlan($planId)
    {
        // Получаем текущего пользователя
        $user = Auth::user();

        // Находим выбранный план по его ID
        $plan = Plan::findOrFail($planId);

        // Обновляем поле 'planId' у пользователя
        $user->planId = $plan->id;
        $user->save();

      
        // return redirect()->route('dashboard')->with('success', 'Домен удален!');
        return redirect()->route('plans')->with('success', 'Вы успешно купили план!');
    }
}
