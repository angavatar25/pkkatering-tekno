<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Restaurant;

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

        return redirect('/');
    }

    public function admin()
    {
        if(!Auth::user()->hasRole('admin'))
        {
            return redirect()->route('dashboard');
        }

        return view('admin.dashboard');
    }

    public function seller()
    {
        if(!Auth::user()->hasRole('seller'))
        {
            return redirect()->route('dashboard');
        }

        $data = Restaurant::where('user_id', Auth::user()->id)->first();
        if(!$data)
        {
            return redirect()->route('restaurant.create');
        }
        return view('seller.dashboard');
    }

    public function customer()
    {
        if(!Auth::user()->hasRole('customer'))
        {
            return redirect()->route('dashboard');
        }

        return view('customer.dashboard');
    }
}
