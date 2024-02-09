<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libs\ResultResponse;
use Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all(); 
    
        $resultResponse = new ResultResponse(); 
    
        $resultResponse->setData($clients); 
        $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
        $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
        
        return response()->json($resultResponse); 
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $this->validateClient($request);
        if ($validation->fails()) {
            return response()->json([
                'statusCode' => ResultResponse::ERROR_CODE,
                'message' => ResultResponse::TXT_ERROR_CODE,
                'data' => $validation->errors()
            ], 400);
        }
        $resultResponse = new ResultResponse(); 

        try{
            $newClient = new Client ([
                'dni' => $request->get('dni'), 
                'email' => $request->get('email'), 
                'password' => $request->get('password'), 
                'name' => $request->get('name'), 
                'surnames' => $request->get('surnames'), 
                'country' => $request->get('country'), 
                'postal_code' => $request->get('postal_code'), 
                'city' => $request->get('city'), 
                'address' => $request->get('address'), 
            ]); 

            if($request->has('phone')){
                $newClient->phone = $request->get('phone'); 
            }

            $newClient->save(); 

            $resultResponse->setData($newClient); 
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        } catch(\Exception $e){
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
            $client = Client::findOrFail($id); 

            $resultResponse->setData($client); 
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
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validation = $this->validateClient($request);
        if ($validation->fails()) {
            return response()->json([
                'statusCode' => ResultResponse::ERROR_CODE,
                'message' => ResultResponse::TXT_ERROR_CODE,
                'data' => $validation->errors()
            ], 400);
        }

        $resultResponse = new ResultResponse(); 

        try{
            $client = Client::findOrFail($id); 

            $client->dni = $request->get('dni'); 
            $client->email = $request->get('email'); 
            $client->password = $request->get('password'); 
            $client->name = $request->get('name'); 
            $client->surnames = $request->get('surnames'); 
            $client->country = $request->get('country'); 
            $client->postal_code = $request->get('postal_code'); 
            $client->city = $request->get('city'); 
            $client->address = $request->get('address'); 

            if($request->has('phone')){
                $client->phone = $request->get('phone'); 
            }

            $client->save(); 

            $resultResponse->setData($client); 
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
            $client = Client::findOrFail($id); 

            $client->dni = $request->get('dni', $client->dni); 
            $client->email = $request->get('email', $client->email); 
            $client->password = $request->get('password', $client->password); 
            $client->name = $request->get('name', $client->name); 
            $client->surnames = $request->get('surnames', $client->surnames);  
            $client->phone = $request->get('phone', $client->phone); 
            $client->country = $request->get('country', $client->country); 
            $client->postal_code = $request->get('postal_code', $client->password); 
            $client->city = $request->get('city', $client->city); 
            $client->address = $request->get('address', $client->address); 

            $client->save(); 

            $resultResponse->setData($client); 
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
            $client = Client::findOrFail($id); 

            $client->delete();

            $resultResponse->setData($client); 
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        } catch(\Exception $e){
            $resultResponse->setStatusCode(ResultResponse::ERROR_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_CODE);
        }
        return response()->json($resultResponse); 
    }

    private function validateClient($request){

        $rules = []; 
        $messages = []; 

        $rules['dni'] = 'required'; 
        $messages['dni.required'] = Lang::get('alerts.client_dni_required'); 

        $rules['email'] = 'required'; 
        $messages['email.required'] = Lang::get('alerts.client_email_required'); 

        $rules['password'] = 'required'; 
        $messages['password.required'] = Lang::get('alerts.client_password_required'); 

        $rules['name'] = 'required'; 
        $messages['name.required'] = Lang::get('alerts.client_name_required'); 

        $rules['surnames'] = 'required'; 
        $messages['surnames.required'] = Lang::get('alerts.client_surnames_required'); 

        $rules['country'] = 'required'; 
        $messages['country.required'] = Lang::get('alerts.client_country_required'); 

        $rules['postal_code'] = 'required'; 
        $messages['name.postal_code'] = Lang::get('alerts.client_postal_code_required'); 

        $rules['city'] = 'required'; 
        $messages['city.required'] = Lang::get('alerts.client_city_required'); 

        $rules['address'] = 'required'; 
        $messages['address.required'] = Lang::get('alerts.client_address_required'); 

        return Validator::make($request->all(), $rules, $messages); 
    }
}
