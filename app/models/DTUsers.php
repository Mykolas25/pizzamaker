<?php

namespace App\models;

use App\Http\Controllers\DTRolesController;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DTUsers extends Authenticatable
{
    use Notifiable;

    public $incrementing = false;
    /**
     * @var table name
     */
    protected $table = 'dt_users';
    /**
     * @var tables fillables
     */
    protected $fillable = ['id', 'name', 'email', 'password','phone'];

    public function rolesSyncing() {
        return $this->belongsToMany(DTRoles::class, 'dt_users_roles_connections', 'users_id', 'roles_id');
    }

    public function memberRolesSyncing() {
        return $this->belongsToMany(DTRoles::class, 'dt_users_roles_connections', 'users_id', 'roles_id');
    }
}
