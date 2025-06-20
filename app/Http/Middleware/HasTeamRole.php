<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasTeamRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $teamParam, ...$allowedRole): Response
    {

        $user = Auth::user();
        $team = $request->routes($teamParam);

        if (!$team || !$user) {
            abort(403, 'Unauthorized');
        }

        $member = $team->members()->where('user_id', $user->id)->first();

        if (!$member) {
            abort(403, 'You are not a member of this team.');
        }

        if (empty($allowedRoles)) {
            // No specific role required, just needs to be a member
            return $next($request);
        }

        if (in_array($member->pivot->role, $allowedRoles)) {
            return $next($request);
        }

        abort(403, 'You do not have the required role.');
    }
}
