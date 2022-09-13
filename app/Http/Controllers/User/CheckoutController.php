<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Checkout;
use App\Models\Camp;

// Requests
use App\Http\Requests\User\Checkout\Store;

// Emails
use App\Mail\Checkout\AfterCheckout;

// Helper
use Auth;
use Mail;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Camp $camp, Request $request)
    {                   
        if($camp->isRegistered){
            // Reference: https://laravel.com/docs/8.x/session#flash-data
            $request->session()->flash('error', "You already register on {$camp->title} camp.");
            return redirect(route('user.dashboard'));
        }     
        return view('checkout.create', [
            "camp" => $camp
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request, Camp $camp)
    {
        
        // Mapping Request Data
        $data = $request->all();        
        $data['user_id'] = Auth::id();
        $data['camp_id'] = $camp->id;

        // Update user data
        $user = Auth::user();                
        $user->name = $data['name'];
        $user->occupation = $data['occupation'];
        $user->save();

        // Create Checkout
        $checkout = Checkout::create($data);

        // Sending Email Checkout
        Mail::to(Auth::user()->email)->send(new AfterCheckout($checkout));

        return redirect(route('checkout.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }


    public function success()
    {
        return view('checkout.success');
    }
}
