<?php

namespace App\Http\Middleware;

use Closure;

//use App\User;

class test
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



       $ip = $request->ip();

        if($ip == '127.1.0.1')

        {
         //   echo "sfs";

            return redirect('/');
        }


        /*$user  = User::find(2);
         if($name !=$user->name)

        {
            echo "must be john";

        }*/




     return $next($request);
    }
}
