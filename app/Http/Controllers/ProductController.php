<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libs\ResultResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all(); 

        $resultResponse = new ResultResponse(); 

        $resultResponse->setData($products); 
        $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
        $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
        
        return response()->json($resultResponse); 
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $resultResponse = new ResultResponse(); 

        try{
            $product = Product::findOrFail($id); 

            $resultResponse->setData($product); 
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
            
        } catch(\Exception $e){
            $resultResponse->setStatusCode(ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE);
        }
        return response()->json($resultResponse); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
