<?php

namespace App\Http\Controllers\Customers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->courier);
        $user = Auth::user()->id;
        $cart = session()->get('cart');
        // return dd($cart);
        return view('customer.checkout',  compact('cart'));
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        $cart = session()->get('cart');
        $orders = new Order();
        $orders->date = Carbon::now();
        $orders->total = $request->grandTotal;
        $orders->user_id = $user->id;
        $orders->status = 'Sedang Diproses';
        $saved =  $orders->save();
        foreach ($cart as $item) {
            $details = new OrderDetail();
            $details->product_id = $item['id'];
            $details->order_id = $orders->id;
            $details->name = $user->name;
            $details->alamat = $user->address;
            $details->phone = $user->phone;
            $details->quantity = $item['quantity'];
            $details->price = $item['price'] * $item['quantity'];
            $details->save();
            $product = Product::find($item['id']);
            $product::where('id', $item['id'])
                ->update(
                    [
                        'stock' => $product["stock"] - $item["quantity"],
                    ]
                );
            $user = User::find($item['user_id']);
            $user::where('id', $item['user_id'])
                ->update(
                    [
                        'point' => $user["point"] + 1,
                        'membership' => 'Active'
                    ]
                );
        }

        if (!$saved) {
            return redirect('/')->with('warning', 'Silahkan Menyelesaikan Pembayaran');
        } else {
            session()->forget('cart');
            return redirect('/shop')->with('success', 'Produk berhasil di order');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
