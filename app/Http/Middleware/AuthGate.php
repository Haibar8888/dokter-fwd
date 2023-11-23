<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\ManagementAccess\Role;

class AuthGate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // get all uaser by session user
        $user = Auth::user();

        // pengecekan jika system tidak jalan
        if (!app()->runningInConsole() && $user) {
            $roles = Role::with('permision')->get();
            $permisionArray = [];

            foreach ($roles as $role) {
                foreach ($role->permision as $permisions) {
                    $permisionArray[$permisions->title][] = $role->id;
                }
            }

            foreach ($permisionArray as $title => $roles) {
                Gate::define($title, function (\App\Models\User $user) use ($roles) {
                    return count(array_intersect($user->role->pluck('id')->toArray(), $roles)) > 0;
                });
            }
        }



        return $next($request);
    }
}
