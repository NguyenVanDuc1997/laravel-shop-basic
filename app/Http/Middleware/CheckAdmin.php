<?php

namespace App\Http\Middleware;

use App\Http\Controllers\RoleConstant;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        //thuc hien kiem tra thang dang login co quyen admin khong?
        $userLogined = Auth::user();
        if ($userLogined->role != RoleConstant::ADMIN) {
            abort(403);
        }

        return $next($request);
    }
}
