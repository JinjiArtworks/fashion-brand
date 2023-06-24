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
        $user = Auth::user()->id;
        // return dd($request->all());
        $cart = session()->get('cart');
        // return dd($cart[$id]['total_after_disc']);
        // jika misal customers yang sama melakukan transaksi kembali, harusnya pointnya ini bertambah tidak hanya satu saja (next)
        //    if .......
        // CUSTOMER DIUBAH, JADI PADA SAAT REGISTER AKUN, DATA CUSTOMER DIGABUNG
        $customers = new Customer();
        $customers->user_id = $user;
        $customers->name = $request->name;
        // if total > 100rb , dapet point 1 (next)
        $customers->membership = 'Active';
        // foreach $total > 100{point}
        $customers->point = '1';
        $saved =  $customers->save();

        $orders = new Order();
        $orders->date = Carbon::now();
        $orders->total = 40000; // blum benar
        $orders->customer_id = $user;
        $orders->status = 'Sedang Diproses';
        $saved =  $orders->save();
        foreach ($cart as $item) {
            $details = new OrderDetail();
            $details->product_id = $item['id'];
            $details->order_id = $orders->id;
            $details->name = $request['name'];
            $details->alamat = $request['address'];
            $details->phone = $request['phone'];
            $details->quantity = $item['quantity'];
            $details->price = $item['price'];
            $details->save();
            $product = Product::find($item['id']);
            $product::where('id', $item['id'])
                ->update(
                    [
                        'stock' => $product["stock"] - $item["quantity"],
                    ]
                );
            // coba update customer pointnya nembak id
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
