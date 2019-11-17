<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Restaurant;

class RestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('isRole:seller');
    }

    public function index()
    {
        $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();
        if(!$restaurant)
        {
            return redirect()->route('restaurant.create');
        }
        return view('seller.restaurant.index', ['data' => $restaurant]);
    }

    public function create()
    {
        if(Restaurant::where('user_id', Auth::user()->id)->first())
        {
            return redirect()->route('restaurant');
        }
        $data = new \stdClass();
        $data->user_id = Auth::user()->id;
        $data->owner = Auth::user()->name;
        return view('seller.restaurant.create', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $restaurant = new Restaurant();
        $restaurant->user_id = $request->user_id;
        $restaurant->name = $request->name;
        $restaurant->address = $request->address;
        $restaurant->ownerName = $request->owner;
        $restaurant->contact = $request->contact;
        $restaurant->email = $request->email;
        $restaurant->save();

        return redirect()->route('restaurant');
    }

    public function edit(Request $request)
    {
        $restaurant = Restaurant::find($request->id);
        return view('seller.restaurant.edit', ['data' => $restaurant]);
    }

    public function update(Request $request)
    {
        $restaurant = Restaurant::find($request->id);
        $restaurant->name = $request->name;
        $restaurant->address = $request->address;
        $restaurant->ownerName = $request->owner;
        $restaurant->contact = $request->contact;
        $restaurant->email = $request->email;
        $restaurant->save();

        return redirect()->route('restaurant');
    }

    public function delete(Request $request)
    {
        $restaurant = Restaurant::find($request->id);
        $restaurant->foods()->delete();
        $restaurant->delete();

        return redirect()->route('restaurant');
    }
}
