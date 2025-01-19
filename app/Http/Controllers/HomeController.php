<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
    public function showPaymentPage(Request $request)
    {
        $amount = $request->query('amount', 0); 
        return view('buy', compact('amount'));
    }
    public function paymentSuccess()
    {
        return view('success'); // Create this view
    }

}
