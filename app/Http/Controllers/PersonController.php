<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libs\ResultResponse;
use Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $people = Person::all(); 

        $resultResponse = new ResultResponse(); 

        $resultResponse->setData($people); 
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
            $newProduct = new Person ([
                'dni' => $request->get('dni'), 
                'email' => $request->get('email'), 
                'password' => $request->get('password'), 
                'name' => $request->get('name'), 
                'surnames' => $request->get('surnames'), 
            ]); 

            $newProduct->save(); 

            $resultResponse->setData($newProduct); 
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
            $person = Person::findOrFail($id); 

            $resultResponse->setData($person); 
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
    public function edit(Person $person)
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
            $person = Person::findOrFail($id); 

            $person->dni = $request->get('dni'); 
            $person->email = $request->get('email'); 
            $person->password = $request->get('password'); 
            $person->name = $request->get('name'); 
            $person->surnames = $request->get('surnames'); 

            $person->save(); 

            $resultResponse->setData($person); 
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
            $person = Person::findOrFail($id); 

            $person->dni = $request->get('dni', $person->dni); 
            $person->email = $request->get('email', $person->email); 
            $person->password = $request->get('password', $person->password); ; 
            $person->name = $request->get('name', $person->name); 
            $person->surnames = $request->get('surnames', $person->surnames); ; 

            $person->save(); 

            $resultResponse->setData($person); 
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
            $person = Person::findOrFail($id); 

            $person->delete();

            $resultResponse->setData($person); 
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

        $rules['dni'] = 'required'; 
        $messages['dni.required'] = Lang::get('alerts.person_dni_required'); 

        $rules['email'] = 'required'; 
        $messages['email.required'] = Lang::get('alerts.person_email_required'); 

        $rules['password'] = 'required'; 
        $messages['password.required'] = Lang::get('alerts.person_password_required'); 

        $rules['name'] = 'required'; 
        $messages['name.required'] = Lang::get('alerts.person_name_required'); 

        $rules['surnames'] = 'required'; 
        $messages['surnames.required'] = Lang::get('alerts.person_surnames_required'); 

        return Validator::make($request->all(), $rules, $messages); 
    }
}
