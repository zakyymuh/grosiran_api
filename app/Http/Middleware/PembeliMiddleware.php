<?php

namespace App\Http\Middleware;

use App\Pembeli;
use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class PembeliMiddleware
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($request->input('token')) {
            $check =  Pembeli::where('token', $request->input('token'))->first();

            if (!$check) {
                return response()->json([
                    'status' => '01',
                    'msg' => 'Token not valid',
                ], 401);
            } else {
                return $next($request);
            }
        } else {
            return response()->json([
                'status' => '03',
                'msg' => 'Token not found',
            ], 401);
        }
    }
}
