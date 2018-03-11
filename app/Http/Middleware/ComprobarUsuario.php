<?php

namespace App\Http\Middleware;

use Closure;
use Hash;
use App\User;


class ComprobarUsuario
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

        $usuario = User::where('username', $request['username'])->first();

        if($usuario && Hash::check($request['password'], $usuario->password)){
            return $next($request);
        }

        return response()->json([
            'status' => 'Las credenciales no son correctas'
        ]);



    }
}
