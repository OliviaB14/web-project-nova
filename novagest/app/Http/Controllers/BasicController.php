<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        dd($user);
        Auth::logout();
        return redirect('login');
    }
}
