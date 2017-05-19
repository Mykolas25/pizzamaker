<?php

namespace App\models;

use App\models\CoreModel;
use Illuminate\Database\Eloquent\Model;

class DTUsersResourcesConnections extends CoreModel
{
    protected $table = 'dt_users_resources_connections';

    /**
     * @var tables fillables
     */
    protected $fillable = ['id','users_id','resources_id'];
}
