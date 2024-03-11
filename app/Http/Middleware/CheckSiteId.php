<?php

namespace App\Http\Middleware;

use App\Models\Page;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSiteId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $site = $request->route('site');
        $page = $request->route('page');

        if (isset($page)) {
            if ($page && $page->site_id != $site->id) {
                return redirect('dashboard')->with('error', 'Unauthorized action.');
            }

            return $next($request);
        } else {
            return $next($request);
        }
    }
}
