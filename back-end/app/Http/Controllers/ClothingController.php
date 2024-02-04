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
        $clothes = Clothing::all();

        $resultResponse = new ResultResponse();

        $resultResponse->setData($clothes);
        $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE);
        $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        return response()->json($resultResponse);
    }

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
                'clothing_id' => $request->get('clothing_id'),
                'gender' => $request->get('gender'),
                'size' => $request->get('size'),
                'color' => $request->get('color'),
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
    public function show($id)
    {
        {
            $resultResponse = new ResultResponse(); 
    
            try{
                $clothing = Clothing::findOrFail($id); 
    
                $resultResponse->setData($clothing); 
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
            $clothing = Clothing::findOrFail($id); 

            $clothing->gender = $request->get('gender', $clothing->gender); 
            $clothing->size = $request->get('size', $clothing->size); 
            $clothing->color = $request->get('color', $clothing->color); 

            $clothing->save(); 

            $resultResponse->setData($clothing); 
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        } catch(\Exception $e){
            $resultResponse->setStatusCode(ResultResponse::ERROR_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_CODE);
        }
        return response()->json($resultResponse); 
    }
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
            $clothing = Clothing::findOrFail($id); 

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
            $clothing = Clothing::findOrFail($id); 

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

        $rules['clothing_id'] = 'required';
        $messages['clothing_id.required'] = Lang::get('alerts.clothing_clothing_id_required');

        $rules['gender'] = 'required';
        $messages['gender.required'] = Lang::get('alerts.clothing_gender_required');

        $rules['size'] = 'required';
        $messages['size.required'] = Lang::get('alerts.clothing_size_required');

        $rules['color'] = 'required';
        $messages['color.required'] = Lang::get('alerts.clothing_color_required');

        return Validator::make($request->all(), $rules, $messages);
    }
}
