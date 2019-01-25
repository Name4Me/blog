<?php

namespace App\Http\Middleware;

use Closure;
use App\Visitor;

class VisitorsSave
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        function get_browser_name($user_agent)
        {
            if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
            elseif (strpos($user_agent, 'Edge')) return 'Edge';
            elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
            elseif (strpos($user_agent, 'Safari')) return 'Safari';
            elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
            elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';

            return ;
        }
        $browser = get_browser_name($request->header('User-Agent'));
        $ip = $request->ip();
        $token = $request->session()->getId();
        Visitor::updateOrCreate(['ip' => $ip , 'browser' => $browser, 'remember_token' => $token]);
        return $next($request);
    }
}
