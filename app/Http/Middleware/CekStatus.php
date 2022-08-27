<?php

namespace App\Http\Middleware;

use App\Models\User;


use Closure;
use Illuminate\Support\Facades\Auth;

class CekStatus
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
        /*dd($request->email);
        $user = User::where('email', $request->email)->first();
        if ($user->tipe_user == 'admin') {
            return redirect('dashboard');
        } elseif ($user->tipe_user == 'superadmin') {
            return redirect('l');
        }
        
        return $next($request);*/
        $roles = array_slice(func_get_args(), 2);

        foreach ($roles as $tipe_user) {
            $user = Auth::user()->tipe_user;
            if ($user == $tipe_user) {
                return $next($request);
            }
        }
        abort(403, 'Anda tidak memiliki hak mengakses laman tersebut!');
        return redirect()->route('home');
    }
}
