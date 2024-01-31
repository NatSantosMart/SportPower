<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libs\ResultResponse;
use Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class AddedToCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(AddedToCart $addedToCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AddedToCart $addedToCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AddedToCart $addedToCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AddedToCart $addedToCart)
    {
        //
    }

    public function indexFromClient($dni){

        try{

            $products = AddedToCart::where('client_dni', $dni)->get(); 

            $resultResponse = new ResultResponse(); 

            $resultResponse->setData($products); 
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        } catch(\Exception $e){
            $resultResponse->setStatusCode(ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE);
        }
        
        return response()->json($resultResponse); 
    }
}
