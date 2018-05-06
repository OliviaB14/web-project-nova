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
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',48)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //vehicule
        if($route == "vehicule")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',49)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //Utilisateur
        if($route == "utilisateur")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',50)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //Client
        if($route == "client")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',51)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //Status
        if($route == "status")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',52)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //Ville
        if($route == "ville")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',53)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //Droit
        if($route == "droit")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',54)->exists())
            {
                return $next($request);
            }
            return back();
        } 
        //autorisations
        if($route == "autorisations")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',47)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //histovehi
        if($route == "histovehi")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',55)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //piecevehicule
        if($route == "piecevehicule")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',56)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //typeclient
        if($route == "typeclient")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',57)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //typeetatpiece
        if($route == "typeetatpiece")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',58)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //typehistoriqueevenement
        if($route == "typehistoriqueevenement")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',59)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //typepiecevehicule
        if($route == "typepiecevehicule")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',62)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //typeutilisateur
        if($route == "typeutilisateur")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',60)->exists())
            {
                return $next($request);
            }
            return back();
        }
        //typevehicule
        if($route == "typevehicule")
        {
            if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',61)->exists())
            {
                return $next($request);
            }
            return back();
        }
        
        return back();
    }
}
