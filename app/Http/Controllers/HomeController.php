<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
        );
        $productos = $stripe->products->all(['limit' => 3]);
        return view('home', compact("productos"));
    }
}
