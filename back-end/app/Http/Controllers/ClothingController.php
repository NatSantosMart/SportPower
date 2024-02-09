<?php

namespace App\Http\Controllers;

use App\Models\Clothing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libs\ResultResponse;
use Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ClothingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clothingsProducts = Clothing::with('product')->get();
        
        $resultResponse = new ResultResponse();

        $resultResponse->setData($clothingsProducts);
        $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE);
        $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        return response()->json($resultResponse);
    }

    public function indexGender($gender)
    {

        $clothing = Clothing::where('gender', $gender)->with('product')->get();

        $resultResponse = new ResultResponse();

        $resultResponse->setData($clothing);
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
        $validation = $this->validateClothing($request);
        if ($validation->fails()) {
            return response()->json([
                'statusCode' => ResultResponse::ERROR_CODE,
                'message' => ResultResponse::TXT_ERROR_CODE,
                'data' => $validation->errors()
            ], 400);
        }

        $resultResponse = new ResultResponse();

        try {
            $newClothing = new Clothing([
                'gender' => $request->get('gender'),
                'size' => $request->get('size'),
                'color' => $request->get('color'),
                'product_id' => $request->get('product_id'),
            ]);

            $newClothing->save();

            $resultResponse->setData($newClothing);
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
    public function showByIdClothing($id)
    {
        {
            $resultResponse = new ResultResponse(); 
    
            try{
                
                $clothing = Clothing::with('product')->findOrFail($id); 
    
                $resultResponse->setData($clothing); 
                $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
                $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
                
            } catch(\Exception $e){
                $resultResponse->setStatusCode(ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE); 
                $resultResponse->setMessage(ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE);
            }
            return response()->json($resultResponse); 
        }
    }

    public function showByIdProduct($id)
    {
        {
            $resultResponse = new ResultResponse(); 
    
            try{
                
                $clothing = Clothing::where('product_id', $id)->with('product')->firstOrFail(); 
    
                $resultResponse->setData($clothing); 
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
    public function edit(Clothing $clothing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validation = $this->validateClothing($request);
        if ($validation->fails()) {
            return response()->json([
                'statusCode' => ResultResponse::ERROR_CODE,
                'message' => ResultResponse::TXT_ERROR_CODE,
                'data' => $validation->errors()
            ], 400);
        }

        $resultResponse = new ResultResponse(); 

        try{
            $clothing = Clothing::where('product_id', $id)->firstOrFail(); 

            $clothing->gender = $request->get('gender');
            $clothing->size = $request->get('size');
            $clothing->color = $request->get('color');

            $clothing->save(); 

            $resultResponse->setData($clothing); 
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        } catch(\Exception $e){
            dd($e);
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
            $clothing = Clothing::where('product_id', $id)->firstOrFail(); 

            $clothing->delete();

            $resultResponse->setData($clothing); 
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        } catch(\Exception $e){
            $resultResponse->setStatusCode(ResultResponse::ERROR_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_CODE);
        }
        return response()->json($resultResponse); 
    }

    private function validateClothing($request)
    {
        $rules = [];
        $messages = [];

        $rules['color'] = 'required';
        $messages['color.required'] = Lang::get('alerts.clothing_color_required');

        $rules['gender'] = 'required';
        $messages['gender.required'] = Lang::get('alerts.clothing_gender_required');

        $rules['size'] = 'required';
        $messages['size.required'] = Lang::get('alerts.clothing_size_required');

        $rules['product_id'] = 'required';
        $messages['product_id.required'] = Lang::get('alerts.clothing_product_idrequired');


        return Validator::make($request->all(), $rules, $messages);
    }
}
