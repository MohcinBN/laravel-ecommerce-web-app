<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        try {
            $products = Product::all();
            return view('backend.products.index', compact('products'));
        } catch (\Throwable $e) {
            report($e);
        }
    }


    public function create()
    {
        $product = new Product();
        return view('backend.products.create', compact('product'));
    }

    public function store(StoreProductRequest $request)
    {

        try {
            // taking the user inputs and storing it into database
            if ($request->isMethod('POST')) {

                $product = new Product();
                $product->name = $request->name;
                $product->price = $request->price;
                $product->description = $request->description;
                // image upload
                if ($request->file('image')) {
                    $file = $request->file('image');
                    $fileName = date('Ymd') . '_' . rand(1, 888) . $file->getClientOriginalName();
                    $file->move(public_path('uplaods'), $fileName);
                    $product->image = $fileName;
                }

                //dd($product);
                $product->save();
                return redirect('/create')->with('status', 'Product Added Successfully');
            }
        } catch (Throwable $e) {
            report($e);

            return false;
        }
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $productToBeEdited = Product::FindOrfail($id);
        return view('backend.products.edit', compact('productToBeEdited'));
    }


    public function update(Request $request, $id)
    {
        try {
            // Find the product
            $productToBeUpdated = Product::FindorFail($id);

            // get all new fields
            $productToBeUpdated->name = $request->name;
            $productToBeUpdated->price = $request->price;
            $productToBeUpdated->description = $request->description;

            // check if there is image, if no try to update it
            if ($request->hasFile('image')) {
                if (file_exists('uplaods/') . $productToBeUpdated->image) {
                    unlink(public_path('uplaods/') . $productToBeUpdated->image);
                }

                // image the new upload
                if ($request->file('image')) {
                    $file = $request->file('image');
                    $fileName = date('Ymd') . '_' . rand(1, 888) . $file->getClientOriginalName();
                    $file->move(public_path('uplaods'), $fileName);
                    $productToBeUpdated->image = $fileName;
                }
            }

            //dd($productToBeUpdated);
            $productToBeUpdated->save();
            return redirect('/pdoucts-list')->with('status', 'Product Updated Successfully');
        } catch (\Throwable $e) {
            report($e);
        }
    }


    public function destroy($id)
    {
        try {
            // Select the id that to delete
            $productToBeDeleted = Product::FindOrfail($id);
            $productToBeDeleted->delete();
            return redirect('/pdoucts-list')->with('status', 'Product Deleted Successfully');
        } catch (\Throwable $e) {
            report($e);
            return true;
        }
    }
}
