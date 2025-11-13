<?php

namespace App\Http\Middleware;

use Closure;
use Detection\MobileDetect;
use Illuminate\Http\Request;

class MobileOnly
{
    protected $detect;

    public function __construct()
    {
        $this->detect = new MobileDetect();
    }

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$this->detect->isMobile()) {
            // মোবাইল না হলে 403 Forbidden
            //abort(403, 'Access denied');
            return redirect('/')->with('error', 'Access denied');
        }

        return $next($request);
    }
}
