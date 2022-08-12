<?php

namespace App\Http\Middleware;

use App\Traits\GeneralTrait;
use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AssignGuard
{
    use GeneralTrait;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param null $guard
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {
        if($guard !== null){
            auth()->shouldUse($guard);               //shoud you user guard / table
            $token = $request->header('api_token');
            $request->headers->set('api_token', (string) $token, true);
            $request->headers->set('Authorization', 'Bearer '.$token, true);
            try {
//                  $user = $this->auth->authenticate($request);  //check authenticted user
                $user = JWTAuth::parseToken()->authenticate();
            } catch (TokenExpiredException $e) {
                return  $this -> returnError('Unauthenticated user','401');
            } catch (JWTException $e) {
                return  $this -> returnError('token_invalid' .$e->getMessage(),'');
            }

        }
        return $next($request);
    }
}
