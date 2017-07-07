<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;

class APIController extends Controller
{
    public function __construct()
    {
        $this->middleware('configApi'); // call middleware name configApi that set in Kernel.php
    }


    public function index(Request $request)
    {
        $products = Product::paginate(5);
        return response()->json($products);
        return response(array(
            'success' => true,
            'products' =>$products->toArray(),
        ),200);
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return response(array(
            'success' => true,
            'message' =>'Product created successfully',
        ),200);
    }

    public function show($id)
    {
        $product = Product::find($id);
        return response(array(
            'success' => true,
            'product' =>$product,
        ),200);
    }

    public function update(Request $request, $id)
    {
        Product::where('Id',$id)->update($request->all());
        return response(array(
            'success' => true,
            'message' =>'Product updated successfully',
        ),200);
    }

    public function destroy($id)
    {
        // $success = Product::find($id)->delete();
       Product::where('Id', $id)->delete();
        return response(array(
                'success' => true,
                'message' =>'Product deleted successfully',
         ),200);

    }

}
