<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        App::setLocale('pl');
        session(['locale' => 'pl']);
        return $next($request);
    }
}
