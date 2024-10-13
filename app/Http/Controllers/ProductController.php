<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(5);
        return view('products.product', compact('products'));
    }

    public function create(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:products',
                'price' => 'required|numeric|min:0'
            ],
            [
                'name.required' => 'Name is required',
                'name.unique' => 'Product is Already Exists',
                'price.required' => 'Price is Required'
            ]
        );
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'up_name' => 'required|unique:products,name,' . $request->up_id,
            'up_price' => 'required|numeric|min:0', // added numeric validation and minimum value of 0
        ], [
            'up_name.required' => 'Name is required',
            'up_name.unique' => 'Product already exists',
            'up_price.required' => 'Price is required',
            'up_price.numeric' => 'Price must be a number',
            'up_price.min' => 'Price must be greater than or equal to 0',
        ]);

        Product::where('id', $request->up_id)->update([
            'name' => $request->up_name,
            'price' => $request->up_price,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }
    public function delete(Request $request)
    {
        Product::find($request->product_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function pagination(Request $request)
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('products.pagination', compact('products'))->render();
    }

    public function search(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->search_string . '%')
            ->orWhere('price', 'like', '%' . $request->search_string . '%')
            ->orderBy('id', 'desc')
            ->paginate(5);
        if ($products->count() >= 1) {
            return view('products.pagination', compact('products'))->render();
        } else {
            return response()->json([
                'status' => 'not_found'
            ]);
        }
    }
}
