<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    // Разрешаем массовое присвоение для этих полей
    protected $fillable = ['domain', 'user_id'];

    // Связь с пользователем
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
