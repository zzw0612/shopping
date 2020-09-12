<?php
namespace App\Http\Middleware;
use Closure;
class AdminMiddleware 
{
  
    public function handle($request,Closure $next)
    {
        if (!session('admin')) {
            return redirect('/admin/login');
        }
        return $next($request);
    }
}