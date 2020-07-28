<?php

namespace App\Http\Middleware\Admin;

use Closure;
//use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;   // 捕获token 过期异常
use Tymon\JWTAuth\Exceptions\JWTException;            // 捕获token 失败异常
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
class Authenticate extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try{
            // 检查此次请求中是否带有 token，如果没有则抛出异常。
            if (! $this->auth->parser()->setRequest($request)->hasToken()) {
                throw new \Exception('token 参数缺失');
            }
            try{
                // 检测用户的登录状态，如果正常则通过
                // 使用 try 包裹，以捕捉 token 过期所抛出的 TokenExpiredException  异常
                if($user=$this->auth->parseToken()->authenticate()){
                    return $next($request);
                }
                throw new \Exception('token 验证失败，请重新登录');
            }catch(TokenExpiredException $exception){
                // 此处捕获到了 token 过期所抛出的 TokenExpiredException 异常，我们在这里需要做的是刷新该用户的 token 并将它添加到响应头中
                try {
                    // 刷新用户的 token
                    $token = $this->auth->refresh(true,true);
                    $request->headers->set('Authorization','Bearer '.$token); // 给当前的请求设置性的token,以备在本次请求中需要调用用户信息
                    // 使用一次性登录以保证此次请求的成功
                    //$this->auth->guard('api')->onceUsingId($this->auth->manager()->getPayloadFactory()->buildClaimsCollection()->toPlainArray()['sub']);
                    // 在响应头中返回新的 token
                    return $this->setAuthenticationHeader($next($request), $token);
                } catch (JWTException $exception) {
                    // 如果捕获到此异常，即代表 refresh 也过期了，用户无法刷新令牌，需要重新登录。
                    throw new \Exception('token 刷新失败，请重新登录');
                }
            }

        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }
}
