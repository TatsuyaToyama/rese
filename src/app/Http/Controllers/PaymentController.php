<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\StripeClient;
use App\Models\Book;

class PaymentController extends Controller
{
    protected $stripe;

    public function __construct(StripeClient $stripe)
    {
        $this->stripe = $stripe;
    }

    public function charge(Request $request)
    {
        $amount = 1000; // 金額（セント単位）

        $this->stripe->charges->create([
            'amount' => $amount,
            'currency' => 'jpy',
            'source' => $request->input('stripeToken'),
            'description' => 'Example charge',
        ]);

        return view('modify_paied');
    }

    public function amount(Request $request)
    {
        $amount = $request -> only(['amount']);
        $book = $request -> only(['book']);
        $bookData = json_decode($book['book'], true); 
        $book_id['id'] = $bookData['id'];

        Book::find($book_id['id'])->update($amount);

        return view('shop_manage_amount');
    }


}
