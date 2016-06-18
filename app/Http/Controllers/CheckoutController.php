<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkout;
use App\Http\Requests;

class CheckoutController extends Controller
{

  public function checkout(Request $request)
  {
    $input = $request->all();

    $checkout = Checkout::Create($input);

    return $checkout;
  }

  public function returnIn(Request $request, $book_id)
  {

    $checkout = Checkout::where('book_id',$book_id)->first();

    $checkout->returned = true;

    $checkout->save();

    return $checkout;
  }



}
