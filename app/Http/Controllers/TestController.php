<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

//     	\Cart::add(array(
//   array(
//       'id' => 1,
//       'name' => 'Sample Item 1',
//       'price' => 100,
//       'quantity' => 3,
//       'attributes' => array(),
//       'associatedModel' => 'Product'
//   ),
//   array(
//       'id' => 2,
//       'name' => 'Sample Item 2',
//       'price' => 200,
//       'quantity' => 2,
//       'attributes' => array(
//         'size' => 'L',
//         'color' => 'blue'
//       ),
//       'associatedModel' => 'Product'
//   ),
// ));

    	// \Cart::clear();

        $cartItems = \Cart::getContent();

        return view('cart.index', compact('cartItems'));
    }

    public function remove($itemId)
    {
        \Cart::remove($itemId);

        return back();
    }

    public function update(Request $request)
    {
        foreach($request->quant as $key => $value){
            \Cart::update($key,[
                'quantity' => array(
                    'relative' => false,
                    'value' => $value
                )
            ]);
        }

        return back();
    }
}
