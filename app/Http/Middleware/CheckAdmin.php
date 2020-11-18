<?php

namespace App\Http\Middleware;

use App\Admin;
use Closure;

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
        if ($request->bearerToken() == null){
            return response('You are not login');
        }
        else{
            $id = auth()->user()->id;
            $admin = Admin::where('user_id', '=', $id)->first();
            if($admin == null){
                return  response('Unauthorized');
            }else{
                return $next($request);
            }
        }
    }
}
