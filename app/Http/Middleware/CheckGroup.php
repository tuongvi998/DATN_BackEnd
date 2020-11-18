<?php

namespace App\Http\Middleware;

use App\Group;
use Closure;

class CheckGroup
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
        if($request->bearerToken() == null){
            return response('you are not login');
        }else{
            $id = auth()->user()->id;
            $group = Group::where('user_id', '=', $id)->first();
            if($group == null){
                return response('Unauthorized');
            }else{
                return $next($request);
            }
        }
    }
}
