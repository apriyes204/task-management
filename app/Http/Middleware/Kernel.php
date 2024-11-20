<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class Kernel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // mengambil durasi timeout dari konfigurasi session (dalam menit)
            $timeout = config('session.lifetime')*60;
            // menghitung waktu sekarang atau waktu aktivitas terakhir dari session
            $lastActivity = session('lastActivityTime');
            // Jika waktu aktivitas terakhir ada dan sudah melewati durasi timeout, maka logout
            if ($lastActivity && (time() - $lastActivity > $timeout)) {
                Auth::logout();
                // hapus semua session data
                session()->flush();
                return redirect()->route('login')->with('status', 'Session expired due to inactivity.');
            }
            session([ 'lastActivityTime' => time() ]);
        }
        return $next($request);

        // $guards = empty($guards) ? [null] : $guards;
        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect('/home');
        //     }
        // }
        // return $next($request);

    }

    protected $routeMiddleware  = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \Illuminate\Auth\Middleware\RedirectIfAuthenticated::class,
        // 'guest' => \App\Http\Middleware\RedirectAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \App\Http\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

    ];
}
