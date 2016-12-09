<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->level == 3) {
                return $next($request);
            } else {
                return redirect('admin')->with('message', 'Bạn không có quyền truy cập trang admin');
            }
        } else {
            return redirect('admin')->with('message', 'Bạn chưa đăng nhập');
        }
    }
}
