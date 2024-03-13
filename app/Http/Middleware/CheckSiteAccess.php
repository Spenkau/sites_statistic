<?php

namespace App\Http\Middleware;

use App\Models\Page;
use App\Models\Site;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSiteAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $siteId = $request->route('site');
        $site = Site::find($siteId);
        $userId = Auth::id();

        if ($site && ($siteId == $userId || $site->users->contains($userId))) {
            return $next($request);
        }
        return $next($request);
    }
}
