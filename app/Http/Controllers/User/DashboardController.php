<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Checkout;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $checkouts = Checkout::with(['Camp'])->whereUserId(Auth::id())->get();
        // return $checkouts;
        return view('user.dashboard', [
            'checkouts' => $checkouts
        ]);
    }
}
