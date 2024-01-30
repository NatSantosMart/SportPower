<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libs\ResultResponse;
use Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


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
        $validation = $this->validateProduct($request);
        if ($validation->fails()) {
            return response()->json([
                'statusCode' => ResultResponse::ERROR_CODE,
                'message' => ResultResponse::TXT_ERROR_CODE,
                'data' => $validation->errors()
            ], 400);
        }
        $resultResponse = new ResultResponse(); 

        try{
            $newProduct = new Product ([
                'name' => $request->get('name'), 
                'price' => $request->get('price'), 
            ]); 

           // description and url_image pueden ser nulos 
            if($request->has('url_image')){
                $newProduct->url_image = $request->get('url_image'); 
            }
            if($request->has('description')){
                $newProduct->description = $request->get('description'); 
            }

            $newProduct->save(); 

            $resultResponse->setData($newProduct); 
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        } catch(\Exception $e){
            Log::debug($e); 
            dd($e); 
            $resultResponse->setStatusCode(ResultResponse::ERROR_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_CODE);
        }

        return response()->json($resultResponse); 
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
    public function update(Request $request, $id)
    {
        $validation = $this->validateProduct($request);
        if ($validation->fails()) {
            return response()->json([
                'statusCode' => ResultResponse::ERROR_CODE,
                'message' => ResultResponse::TXT_ERROR_CODE,
                'data' => $validation->errors()
            ], 400);
        }

        $resultResponse = new ResultResponse(); 

        try{
            $product = Product::findOrFail($id); 

            $product->name = $request->get('name'); 
            $product->price = $request->get('price'); 
            
            //description and url_image pueden ser nulos 
            if($request->has('url_image')){
                $product->url_image = $request->get('url_image'); 
            }
            if($request->has('description')){
                $product->description = $request->get('description'); 
            }

            $product->save(); 

            $resultResponse->setData($product); 
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        } catch(\Exception $e){
            $resultResponse->setStatusCode(ResultResponse::ERROR_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_CODE);
        }
        return response()->json($resultResponse); 
    }

    //En caso de no llegar todos los campos
    public function put(Request $request, $id)
    {

        $resultResponse = new ResultResponse(); 

        try{
            $product = Product::findOrFail($id); 

            $product->name = $request->get('name', $product->name); 
            $product->price = $request->get('price', $product->price); 

            $product->url_image = $request->get('url_image', $product->url_image); 
            $product->description = $request->get('description', $product->description); ; 

            $product->save(); 

            $resultResponse->setData($product); 
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        } catch(\Exception $e){
            $resultResponse->setStatusCode(ResultResponse::ERROR_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_CODE);
        }
        return response()->json($resultResponse); 
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $resultResponse = new ResultResponse(); 

        try{
            $product = Product::findOrFail($id); 

            $product->delete();

            $resultResponse->setData($product); 
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        } catch(\Exception $e){
            $resultResponse->setStatusCode(ResultResponse::ERROR_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_CODE);
        }
        return response()->json($resultResponse); 
    }

    private function validateProduct($request){

        $rules = []; 
        $messages = []; 

        //Campos obligatorios

        $rules['name'] = 'required'; 
        $messages['name.required'] = Lang::get('alerts.product_name_required'); 

        $rules['price'] = 'required'; 
        $messages['price.required'] = Lang::get('alerts.product_price_required'); 

        return Validator::make($request->all(), $rules, $messages); 
    }
}
