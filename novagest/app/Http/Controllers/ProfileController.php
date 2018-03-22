<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Utilisateur;
use Input;


class ProfileController extends Controller
{
	public function index()
    {
        $user = Auth::user();

        return view('profile', [
        	'user' => $user
        ]);
    }
}