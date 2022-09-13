<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use Auth;

class HomeController extends Controller
{
    public function dashboard()
    {
        switch (Auth::user()->is_admin) {
            case true:
                return redirect(route('admin.dashboard'));
                break;
            
            default:
                return redirect(route('user.dashboard'));
                break;
        }
    }
}
