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
        //Client
        if($route == "client")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',14)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //Status
        if($route == "status")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',18)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //Ville
        if($route == "ville")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',19)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //Droit
        if($route == "droit")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',20)->exists())
            {
                return $next($request);
            }
            return back();
        } 
        //autorisations
        if($route == "autorisations")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',21)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //histovehi
        if($route == "histovehi")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',22)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //piecevehicule
        if($route == "piecevehicule")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',23)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //typeclient
        if($route == "typeclient")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',24)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //typeetatpiece
        if($route == "typeetatpiece")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',25)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //typehistoriqueevenement
        if($route == "typehistoriqueevenement")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',26)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //typepiecevehicule
        if($route == "typepiecevehicule")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',27)->exists())
            {
                return $next($request);
            }
            return back();
        }
        
        return back();
    }
}
