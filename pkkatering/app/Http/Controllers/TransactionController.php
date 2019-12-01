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
        if(Auth::user()->hasRole('seller'))
        {
            $foods = Auth::user()->restaurant()->first()->foods()->get();
            $transactions = [];
            foreach ($foods as $food) {
                $transaction = Transaction::where('food_id', $food->id)->orderBy('created_at', 'DESC')->get();
                foreach ($transaction as $t) {
                    $t->user = $t->user()->first();
                    $t->food = $t->food()->first();
                    array_push($transactions, $t);
                }
            }

            usort($transactions, array($this, 'custom_sort'));

            return view('seller.transaction.index', ['data' => $transactions]);
        }
        else
        {
            $transactions = Auth::user()->transaction()->orderBy('created_at', 'DESC')->get();

            foreach ($transactions as $transaction) {
                $transaction->food = $transaction->food()->first();
            }

            return view('customer.transaction.index', ['data' => $transactions]);
        }
    }

    public function detail($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delivery_type = $this->delivery_type_translator($transaction->delivery_type);
        $transaction->payment_type = $this->payment_type_translator($transaction->payment_type);
        $transaction->status = $this->status_translator($transaction->status);
        $transaction->user = $transaction->user()->first();
        $transaction->food = $transaction->food()->first();
        if(Auth::user()->hasRole('seller'))
        {
            if($transaction->food()->first()->restaurant()->first()->user()->first()->id != Auth::user()->id)
            {
                return redirect()->route('dashboard');
            }

            return view('seller.transaction.detail', ['data' => $transaction]);
        }
        else
        {
            if($transaction->user_id != Auth::user()->id)
            {
                return redirect()->route('dashboard');
            }

            return view('customer.transaction.detail', ['data' => $transaction]);
        }
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

    public function proof(Request $request)
    {
        $transaction = Transaction::find($request->id);

        if($request->file('image')->isValid())
        {
            $file = $request->file('image');
            $encrypted = uniqid();
            $file->move(public_path('proofs'), $encrypted);
            $file = 'proofs/' . $encrypted;
            $transaction->proof = $file;
            $transaction->status = 1;
        }

        $transaction->save();

        return redirect()->back();
    }

    public function status(Request $request)
    {
        $transaction = Transaction::find($request->id);
        $transaction->status = $request->status;

        if($transaction->status == 0)
        {
            $transaction->proof = null;
        }

        $transaction->save();

        return redirect()->back();
    }

    public function custom_sort($a, $b)
    {
        return $a->created_at - $b_created_at;
    }

    private function delivery_type_translator($delivery_type)
    {
        $delivery_type = ($delivery_type == 1) ? 'GO-SEND' : $delivery_type;
        $delivery_type = ($delivery_type == 2) ? 'Grab Send' : $delivery_type;
        $delivery_type = ($delivery_type == 3) ? 'Ambil Sendiri' : $delivery_type;

        return $delivery_type;
    }

    private function payment_type_translator($payment_type)
    {
        $payment_type = ($payment_type == 1) ? 'Transfer Bank' : $payment_type;
        $payment_type = ($payment_type == 2) ? 'GO-PAY' : $payment_type;
        $payment_type = ($payment_type == 3) ? 'Tunai' : $payment_type;

        return $payment_type;
    }

    private function status_translator($status)
    {
        $status = ($status == 0) ? 'Menunggu Pembayaran' : $status;
        $status = ($status == 1) ? 'Menunggu Konfirmasi Restaurant' : $status;
        $status = ($status == 2) ? 'Pesanan Dikonfirmasi' : $status;
        $status = ($status == 3) ? 'Pesanan Siap Dikirim atau Diambil' : $status;
        $status = ($status == 4) ? 'Pesanan Selesai' : $status;

        return $status;
    }
}
