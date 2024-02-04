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
                'product_id' => $request->get('product_id'),
                'quantity' => $request->get('quantity'),
            ]);

            $newSupplement->save();

            $resultResponse->setData($newSupplement);
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE);
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        } catch (\Exception $e) {
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
        {
            $resultResponse = new ResultResponse(); 
    
            try{
                $supplement = Supplement::findOrFail($id); 
    
                $resultResponse->setData($supplement); 
                $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
                $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
                
            } catch(\Exception $e){
                dd($e);
                $resultResponse->setStatusCode(ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE); 
                $resultResponse->setMessage(ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE);
            }
            return response()->json($resultResponse); 
        }
    }

    public function put(Request $request, $id)
    {

        $resultResponse = new ResultResponse(); 

        try{
            $supplement = Supplement::findOrFail($id); 

            $supplement->quantity = $request->get('quantity', $supplement->quantity); 

            $supplement->save(); 

            $resultResponse->setData($supplement); 
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        } catch(\Exception $e){
            $resultResponse->setStatusCode(ResultResponse::ERROR_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_CODE);
        }
        return response()->json($resultResponse); 
    }

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

        $rules['product_id'] = 'required';
        $messages['product_id.required'] = Lang::get('alerts.supplement_product_id_required');

        $rules['quantity'] = 'required';
        $messages['quantity.required'] = Lang::get('alerts.supplement_quantity_required');

        return Validator::make($request->all(), $rules, $messages);
    }
}
