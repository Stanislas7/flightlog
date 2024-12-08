<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Flight;
use Symfony\Component\HttpFoundation\Response;

class CheckFlightOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $flight
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $flight = $request->route('flight');
        if ($flight->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
