<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Consolidates http/https and www/non-www variants onto the single
 * canonical host defined by APP_URL, fixing duplicate-content indexing
 * (the site was being crawled as 4 separate hosts).
 */
class ForceCanonicalDomain
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! app()->isProduction()) {
            return $next($request);
        }

        $canonicalHost = parse_url((string) config('app.url'), PHP_URL_HOST);

        if ($canonicalHost && ($request->getHost() !== $canonicalHost || ! $request->isSecure())) {
            return redirect()->to('https://'.$canonicalHost.$request->getRequestUri(), 301);
        }

        return $next($request);
    }
}
