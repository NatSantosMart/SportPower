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
        $supplements = Supplement::with('product')->get();

        $resultResponse = new ResultResponse();

        $resultResponse->setData($supplements);
        $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE);
        $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        return response()->json($resultResponse);
    }
    public function indexType($type)
    {
        $supplements = Supplement::where('type', $type)->with('product')->get();

        $resultResponse = new ResultResponse();

        $resultResponse->setData($supplements);
        $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE);
        $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        return response()->json($resultResponse);
    }

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
                'quantity' => $request->get('quantity'),
                'product_id' => $request->get('product_id'),
                'type' => $request->get('type'),
                'flavor' => $request->get('flavor'),
            ]);

            if ($request->has('flavor')) {
                $newSupplement->flavor = $request->get('flavor');
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

        $supplement->type = $request->get('type');
        $supplement->quantity = $request->get('quantity');

        if ($request->has('flavor')) {
            $supplement->flavor = $request->get('flavor');
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

        $rules['quantity'] = 'required';
        $messages['quantity.required'] = Lang::get('alerts.supplement_quantity_required');

        $rules['type'] = 'required';
        $messages['type.required'] = Lang::get('alerts.supplement_type_required');


        return Validator::make($request->all(), $rules, $messages);
    }
}
