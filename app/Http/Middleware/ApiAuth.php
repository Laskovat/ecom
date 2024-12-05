<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header("remember_Token");
        if($token != null){
            $user = User::where("remember_token",$token)->first();
            if($user){

                return $next($request);

            }else{
                return response()->json([
                "msg"=>"access not found"
            ],404);}

        }else{
            return response()->json([
                "msg"=>"access not found"
            ],404);
        }
    }
}
