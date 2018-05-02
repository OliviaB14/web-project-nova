<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Utilisateur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class BasicController extends Controller
{
    protected function sendResponse($success, $message, $data)
    {
        return response()->json([
            "success" => $success,
            "message" => $message,
            "data" => $data,
        ]);
    }

    protected function populateData($model, $request)
    {
        $model->fill($request->all());
    }

    protected function Logout()
    {
        $user = Auth::user();
        Auth::logout();
        return redirect('login');
    }

    protected function Login(Request $request)
    {
        
        $user = DB::table('utilisateur')->where('username', $request["username"])->first();
        $user = Utilisateur::find($user->id);
        if($request["username"] == $user->username && $request["password"] == $user->password)
        {
            Auth::login($user,false);
            
            return redirect('/');
        }
        return redirect('login');
    }

    protected function whoami()
    {
        $user = Auth::user();
        dd($user->id);
    }
}
