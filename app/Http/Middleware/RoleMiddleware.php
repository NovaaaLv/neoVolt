<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next, $role): Response
  {
    // Admin bisa mengakses semua halaman
    if ($request->user()->role === 'admin') {
      return $next($request);
    }

    // Jika role pengguna tidak sesuai, tolak akses
    if ($request->user()->role !== $role) {
      abort(403, 'Unauthorized access');
    }

    return $next($request);
  }
}
