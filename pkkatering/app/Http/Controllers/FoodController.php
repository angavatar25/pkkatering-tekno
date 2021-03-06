<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Food;

class FoodController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            
            if(!$this->user->hasAnyRole(['seller', 'customer']))
            {
                return route('dashboard');
            }
            
            return $next($request);
        });
    }

    public function index()
    {
        if(Auth::user()->hasRole('seller'))
        {
            $foods = Auth::user()->restaurant()->first()->foods()->get();

            return view('seller.food.index', ['data' => $foods]);
        }
        else
        {
            $foods = Food::all();
            foreach($foods as $food)
            {
                $food->restaurant = $food->restaurant()->first()->name;
            }

            return view('customer.food.index', ['data' => $foods]);
        }
    }

    public function create()
    {
        $data = new \stdClass();
        $data->restaurant_id = Auth::user()->restaurant()->first()->id;
        return view('seller.food.create', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $food = new Food();
        $food->restaurant_id = $request->restaurant_id;
        $food->name = $request->name;
        $food->price = $request->price;
        $food->notes = $request->notes;

        if($request->file('image')->isValid())
        {
            $file = $request->file('image');
            $encrypted = uniqid();
            $file->move(public_path('foods'), $encrypted);
            $file = 'foods/' . $encrypted;
            $food->file = $file;
        }

        $food->save();

        return redirect()->route('food');
    }

    public function edit(Request $request)
    {
        $food = Food::find($request->id);
        
        return view('seller.food.edit', ['data' => $food]);
    }

    public function update(Request $request)
    {
        $food = Food::find($request->id);
        $food->name = $request->name;
        $food->price = $request->price;
        $food->notes = $request->notes;

        if($request->file('image')->isValid())
        {
            $file = $request->file('image');
            $encrypted = uniqid();
            $file->move(public_path('foods'), $encrypted);
            $file = 'foods/' . $encrypted;
            $food->file = $file;
        }

        $food->save();

        return redirect()->route('food');
    }

    public function delete(Request $request)
    {
        $food = Food::find($request->id);
        $food->delete();

        return redirect()->route('food');
    }
}
