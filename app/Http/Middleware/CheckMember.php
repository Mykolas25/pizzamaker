<?php
/**
 * Created by PhpStorm.
 * User: Mykolas
 * Date: 5/17/2017
 * Time: 3:11 PM
 */

namespace App\Http\Middleware;

use App\models\DTRoles;
use App\models\DTUsersRolesConnections;

use Closure;

class CheckMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

//       $config['memberCheck'] = DTUsersRolesConnections::where("users_id", "=",auth()->user()->id )->pluck('users_id')->toArray();
//        dd(auth()->user());

        if (in_array('member', auth()->user()->RolesConnections->pluck('roles_id')->toArray())) {
            return $next($request);
        } else {
            abort(403);
        }
    }
}
