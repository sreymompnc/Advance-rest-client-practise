<?php

namespace App\Http\Middleware;

use Closure;
use config\constant;

class ConstantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     */


    public function handle($request, Closure $next)
    {
//        $header = getallheaders(); // get all header when request

        if ($request->header('apikey') != '123')
        {
            $message = array("status" => "error", "message" => "You don't have permission to access.");
            return response()->json($message);
        }
        return $next($request);
    }
}
