<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Domain;

class DashboardController extends Controller
{
    // Отображение страницы с доменами и формой
    public function index()
    {
        // Получаем ID текущего авторизованного пользователя
        $userId = Auth::id();

        // Фильтруем домены по user_id
        $domains = Domain::where('user_id', $userId)->get();

        // Передаем данные в представление
        $content = view('partials.domains', compact('domains'));

        // Возвращаем основной шаблон с контентом
        return view('app', ['content' => $content]);
    }

    // Сохранение нового домена
    public function save(Request $request)
    {
        $request->validate([
            'domain' => 'required|url',
        ]);
    
        // Получаем только доменное имя из URL
        $domain = parse_url($request->domain, PHP_URL_HOST);
        $domain = str_replace('www.', '', $domain);
    
        // Проверяем, существует ли такой домен уже для текущего пользователя
        $exists = Domain::where('domain', $domain)
            ->where('user_id', Auth::id())
            ->exists();
    
        if ($exists) {
            return redirect()->route('dashboard')->with('error', 'Домен Уже существует!');
        }
    
        // Создаем домен
        Domain::create([
            'domain' => $domain,
            'user_id' => Auth::id(),
        ]);
    
        return redirect()->route('dashboard')->with('success', 'Домен добавлен!');;
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'domain' => 'required|url',
        ]);

        // Находим домен по ID
        $domain = Domain::findOrFail($id);

        // Обновляем домен
        $domain->domain = parse_url($request->domain, PHP_URL_HOST); // Извлекаем только домен
        $domain->save();

        // Перенаправляем обратно на страницу с сообщением об успешном обновлении
        return redirect()->route('dashboard')->with('success', 'Домен успешно обновлен!');
    }

    // Удаление домена
    public function delete($id)
    {
        $domain = Domain::findOrFail($id);
        $domain->delete();

        return redirect()->route('dashboard')->with('success', 'Домен удален!');
    }

}
