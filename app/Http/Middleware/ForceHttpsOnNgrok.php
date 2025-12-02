<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceHttpsOnNgrok
{
    public function handle(Request $request, Closure $next)
    {
        // If running via ngrok custom domain
        $ngrokUrl = config('app.ngrok_url');

        if ($ngrokUrl && str_contains($request->getHost(), parse_url($ngrokUrl, PHP_URL_HOST))) {
            // Force scheme to HTTPS
            if (!$request->isSecure()) {
                return redirect()->secure($request->getRequestUri());
            }
        }

        return $next($request);
    }
}
