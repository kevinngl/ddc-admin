<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        
        // dd(session('user')->user->role->name === 'supervisor');
        return view('pages.dashboard.main');
    }
    
}
