<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/* Controllers */
use App\Http\Controllers\Auth;

/* Models */
use App\Models\User;

class ValidateUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $data = session()->get('user');

        if($data === null){
            return redirect('/auth/login');
        }

        $user = User::where(
                [
                    ['username', $data->username],
                    ['password', $data->password]
                ]
            )
            ->first();

        if ($user === null) {
            return Auth::logout();
        }

        return $next($request);
    }
}
