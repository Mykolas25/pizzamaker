<?php
/**
 * Created by PhpStorm.
 * User: Mykolas
 * Date: 5/18/2017
 * Time: 10:46 AM
 */

namespace App\Http\Middleware;

use App\models\DTRoles;
use App\models\DTUsersRolesConnections;

use Closure;


class CheckAdmin
{
    public function handle($request, Closure $next)
    {

//        $config['adminCheck'] = DTUsersRolesConnections::where("users_id", "=", auth()->user()->id )->pluck('users_id')->toArray();

        //if(in_array('member', auth()->user()->DTUsersRolesConnections->pluck()->check())

        if (in_array('super-admin', auth()->user()->RolesConnections->pluck('roles_id')->toArray()))
        {
            return $next($request);
        } else {
            abort(403);
        }
    }
}