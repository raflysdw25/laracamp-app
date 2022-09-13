<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Checkout;

// Helper
use Mail;
use App\Mail\Checkout\Paid;

class CheckoutController extends Controller
{
    public function update(Request $request, Checkout $checkout)
    {
        $checkout->is_paid = true;
        $checkout->save();
        
        // Send Email Confirmation
        Mail::to($checkout->user->email)->send(new Paid($checkout));

        $request->session()->flash('success', "Checkout with ID {$checkout->id} has been updated");
        return redirect(route('admin.dashboard'));
    }
}
