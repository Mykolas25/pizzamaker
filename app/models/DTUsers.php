<?php

namespace App\models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DTUsers extends Authenticatable
{
    use Notifiable;
    /**
     * @var table name
     */
    protected $table = 'users';

    /**
     * @var tables fillables
     */
    protected $fillable = ['id', 'name', 'email', 'password'];
}
