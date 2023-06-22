<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('staff.products.data-product', compact('product'));
    }
    // Add products

    public function create()
    {
        return view('staff.products.create');
    }
    public function store(Request $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'image' => $request->image,
            'description' => $request->description,
            'stock' => $request->stock,
            'price' => $request->price,
        ]);
        return redirect('/dashboard');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('staff.products.edit', compact('product'));
    }
    public function update(Request $request, $id)
    {
        Product::where('id', $id)
            ->update(
                [
                    'name' => $request->name,
                    'image' => $request->image,
                    'description' => $request->description,
                    'price' => $request->price,
                    'stock' => $request->stock,
                ]
            );
        return redirect('/dashboard');
    }
    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->back();
    }
}
