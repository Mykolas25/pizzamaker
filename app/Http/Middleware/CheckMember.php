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
        $config = [];
        $config['memberCheck'] = DTUsersRolesConnections::pluck('users_id','roles_id' );

        dd();

        if (in_array((auth()->user()->id), $config)) {
            return $next($request);
        } else {
            abort(403);
        }
    }
}
