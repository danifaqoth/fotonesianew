<?php

namespace App\Http\Middleware;

use Closure;

class VendorMiddleware
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
        $user = auth()->user();

        if ($user->role !== 'vendor') {
            return redirect()->back()->withErrors('Kamu tidak boleh brooh!!');
        }

        return $next($request);
    }
}
