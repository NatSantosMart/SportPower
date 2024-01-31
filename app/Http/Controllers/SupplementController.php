<?php

namespace App\Http\Controllers;

use App\Models\Supplement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libs\ResultResponse;
use Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SupplementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplements = Supplement::all();

        $resultResponse = new ResultResponse();

        $resultResponse->setData($supplements);
        $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE);
        $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        return response()->json($resultResponse);
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
        $validation = $this->validateSupplement($request);
        if ($validation->fails()) {
            return response()->json([
                'statusCode' => ResultResponse::ERROR_CODE,
                'message' => ResultResponse::TXT_ERROR_CODE,
                'data' => $validation->errors()
            ], 400);
        }

        $resultResponse = new ResultResponse();

        try {
            $newSupplement = new Supplement([
                'name' => $request->get('name'),
                'price' => $request->get('price'),
                'cantidad' => $request->get('cantidad'),
            ]);

            if ($request->has('url_image')) {
                $newSupplement->url_image = $request->get('url_image');
            }
            if ($request->has('description')) {
                $newSupplement->description = $request->get('description');
            }

            $newSupplement->save();

            $resultResponse->setData($newSupplement);
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        } catch (\Exception $e) {
            Log::debug($e);
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
        {
            $resultResponse = new ResultResponse(); 
    
            try{
                $supplement = Supplement::findOrFail($id); 
    
                $resultResponse->setData($supplement); 
                $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
                $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
                
            } catch(\Exception $e){
                $resultResponse->setStatusCode(ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE); 
                $resultResponse->setMessage(ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE);
            }
            return response()->json($resultResponse); 
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplement $supplement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validation = $this->validateSupplement($request);
    if ($validation->fails()) {
        return response()->json([
            'statusCode' => ResultResponse::ERROR_CODE,
            'message' => ResultResponse::TXT_ERROR_CODE,
            'data' => $validation->errors()
        ], 400);
    }

    $resultResponse = new ResultResponse();

    try {
        $supplement = Supplement::findOrFail($id);

        $supplement->name = $request->get('name');
        $supplement->price = $request->get('price');
        $supplement->cantidad = $request->get('cantidad');

        if ($request->has('url_image')) {
            $supplement->url_image = $request->get('url_image');
        }
        if ($request->has('description')) {
            $supplement->description = $request->get('description');
        }

        $supplement->save();

        $resultResponse->setData($supplement);
        $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE);
        $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

    } catch (\Exception $e) {
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
            $supplement = Supplement::findOrFail($id); 

            $supplement->delete();

            $resultResponse->setData($supplement); 
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        } catch(\Exception $e){
            $resultResponse->setStatusCode(ResultResponse::ERROR_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_CODE);
        }
        return response()->json($resultResponse); 
    }

    private function validateSupplement($request)
    {
        $rules = [];
        $messages = [];

        // Campos obligatorios

        $rules['name'] = 'required';
        $messages['name.required'] = Lang::get('alerts.product_name_required');

        $rules['price'] = 'required';
        $messages['price.required'] = Lang::get('alerts.product_price_required');

        // Campos específicos de Supplement

        $rules['cantidad'] = 'required';
        $messages['cantidad.required'] = Lang::get('alerts.supplement_cantidad_required');

        return Validator::make($request->all(), $rules, $messages);
    }
}
