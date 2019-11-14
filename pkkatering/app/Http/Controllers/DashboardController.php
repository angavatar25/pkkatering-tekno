<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
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

    public function index(Request $request)
    {
        if($request->user()->hasRole('admin'))
        {
            return redirect()->route('dashboard.admin');
        }

        if($request->user()->hasRole('seller'))
        {
            return redirect()->route('dashboard.seller');
        }

        if($request->user()->hasRole('customer'))
        {
            return redirect()->route('dashboard.seller');
        }
    }

    public function admin()
    {
        return view('dashboard.admin');
    }

    public function seller()
    {
        return view('dashboard.seller');
    }

    public function customer()
    {
        return view('dashboard.customer');
    }
}
