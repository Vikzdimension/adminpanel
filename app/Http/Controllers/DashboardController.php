<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laratrust\Models\LaratrustRole;

class DashboardController extends Controller
{
	public function index(){
		if (Auth::user()->hasRole('user')) {
			return view('userdashboard');
		}else{
			return view('admindashboard');
		}
	}

	public function users(){
		$users = User::whereRoleIs('user')->get();
		return view('users', compact('users'));
	}
}
