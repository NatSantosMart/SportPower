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
        $clothings = Clothing::all();

        $resultResponse = new ResultResponse();

        $resultResponse->setData($clothings);
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
                'name' => $request->get('name'),
                'price' => $request->get('price'),
                'genero' => $request->get('genero'),
                'talla' => $request->get('talla'),
                'color' => $request->get('color'),
            ]);

            if ($request->has('url_image')) {
                $newClothing->url_image = $request->get('url_image');
            }
            if ($request->has('description')) {
                $newClothing->description = $request->get('description');
            }

            $newClothing->save();

            $resultResponse->setData($newClothing);
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
                $clothing = Clothing::findOrFail($id); 
    
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
            $clothing = Clothing::findOrFail($id); 

            $clothing->name = $request->get('name');
            $clothing->price = $request->get('price');
            $clothing->genero = $request->get('genero');
            $clothing->talla = $request->get('talla');
            $clothing->color = $request->get('color');
            
            
            if ($request->has('url_image')) {
                $clothing->url_image = $request->get('url_image');
            }
            if ($request->has('description')) {
                $clothing->description = $request->get('description');
            }

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

        // Campos obligatorios

        $rules['name'] = 'required';
        $messages['name.required'] = Lang::get('alerts.product_name_required');

        $rules['price'] = 'required';
        $messages['price.required'] = Lang::get('alerts.product_price_required');

        // Campos específicos de Clothing

        $rules['genero'] = 'required';
        $messages['genero.required'] = Lang::get('alerts.clothing_genero_required');

        $rules['talla'] = 'required';
        $messages['talla.required'] = Lang::get('alerts.clothing_talla_required');

        $rules['color'] = 'required';
        $messages['color.required'] = Lang::get('alerts.clothing_color_required');

        return Validator::make($request->all(), $rules, $messages);
    }
}
