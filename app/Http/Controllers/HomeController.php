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
            'sk_test_51LaLNQH8JH9FXFko4Sr8rIQPAHFZmQeiSWusLNMwu8aAEsLdeTLbUFhT4IoHuJlCnst79Jg4AwXm3SOa4Ow1uj1D00p5fi5MTG'
        );
        $productos = $stripe->products->all(['limit' => 3]);
        return view('home', compact("productos"));
    }
}
