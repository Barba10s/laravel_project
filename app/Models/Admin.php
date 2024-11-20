<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use CrudTrait;
    use HasFactory;

    // Если необходимо, указываем таблицу, с которой будет работать эта модель
    protected $table = 'users';

    protected $fillable = ['name', 'email', 'password', 'username'];

}
