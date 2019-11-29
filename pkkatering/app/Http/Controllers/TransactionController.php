<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Food;
use App\Transaction;

class TransactionController extends Controller
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
        function custom_sort($a, $b)
        {
            return $a->created_at - $b_created_at;
        }

        if(Auth::user()->hasRole('seller'))
        {
            $foods = Auth::user()->restaurant()->first()->foods()->get();
            $transactions = [];
            foreach ($foods as $food) {
                $transaction = Transaction::where('food_id'. $food->id)->orderBy('created_at', 'DESC')->get();
                $transactions = array_merge($transactions, $transaction);
            }

            usort($transactions, 'custom_sort');

            return view('seller.transaction.index', ['data' => $transactions]);
        }
        else
        {
            $transactions = Transaction::where('user_id', Auth::user()->id)->get();

            return view('customer.transaction.index', ['data' => $transactions]);
        }
    }

    public function detail($id)
    {
        $transaction = Transaction::find($id);
        if
        if($transaction->user_id != Auth::user()->id)
        {
            return redirect()->route('dashboard');
        }

        return view()
    }

    public function create(Request $request)
    {
        $data = new \stdClass();
        $data->food = Food::find($request->id);
        return view('customer.transaction.create', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->food_id = $request->food_id;
        $transaction->name = $request->name;
        $transaction->address = $request->address;
        $transaction->phone = $request->phone;
        $transaction->amount = $request->amount;
        $transaction->total_payment_amount = $request->price * $transaction->amount;
        $transaction->delivery_type = $request->delivery_type;
        $transaction->payment_type = $request->payment_type;

        $transaction->save();

        return redirect()->route('transaction.detail', $transaction->id);
    }
}
