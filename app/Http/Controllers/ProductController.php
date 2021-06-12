<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function product()
    {
        return view('product');
    }
    public function AllProduct()
    {
        $products = Product::latest()->paginate(5);
        $trashCat = Product::onlyTrashed()->latest()->paginate(3);
        return view('admin.product.index', compact('products', 'trashCat'));
    }

    public function AddProduct(Request $request)
    {

        $request->validate([
            'product_name' => 'required|max:255',
        ],

            [

                'product_name.required' => 'please input Productname',
                'product_name.max' => 'Product less than 255 chars',

            ]);

        Product::insert([
            'product_name' => $request->product_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);

        return Redirect()->back()->with('success', 'Product inserted');

        // return response()->json($product);

    }
    // Edit
    public function Edit($id)
    {
        $products = Product::find($id);
        return view('admin.product.edit', compact('products'));

    }
    // update

    public function update(Request $request, $id)
    {
        $update = Product::find($id)->update([

            'product_name' => $request->product_name,
            'user_id' => Auth::user()->id,

        ]);

        return Redirect()->route('all.product')->with('success', 'Product Updated');
    }

    //soft delete
    public function SoftDelete($id)
    {
        $delete = Product::find($id)->delete();
        return Redirect()->back()->with('success', 'Product Deleted');
    }
    // Restore
    public function Restore($id)
    {
        $delete = Product::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success', 'Product Restore');
    }

    //permanentdelete
    public function pdelete($id)
    {
        $delete = Product::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success', 'Product permanently deleted');
    }

}
