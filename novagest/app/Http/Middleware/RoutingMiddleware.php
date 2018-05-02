<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Auth;
use DB;

class RoutingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $route)
    {
        $user = Auth::user();
  
        //agence
        if($route == "agence")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',12)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //vehicule
        if($route == "vehicule")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',17)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //Utilisateur
        if($route == "utilisateur")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',16)->exists())
            {
                return $next($request);
            }
            return back();
        }
        
        return back();
    }
}