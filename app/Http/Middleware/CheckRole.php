<?php

namespace App\Http\Middleware;

use App\Role;
use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {

$id=Role::getRoleId($role);

if(Role::hasRole($id)){
            return $next($request);
        }
        return redirect('/');

    }
}
