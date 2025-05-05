<?php

// app/Http/Middleware/CheckAge.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAge
{
    public function handle(Request $request, Closure $next, $age = 18)
    {
        if ($request->input('age') < $age) {
            return response("ممنوع أقل من $age سنة", 403);
        }
        return $next($request);
    }
}
