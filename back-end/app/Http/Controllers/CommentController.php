<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libs\ResultResponse;
use Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all(); 

        $resultResponse = new ResultResponse(); 

        $resultResponse->setData($comments); 
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
            $newComment = new Comment ([
                'date' => $request->get('date'), 
                'description' => $request->get('description'), 
                'client_dni' => $request->get('client_dni'), 
            ]); 

            if($request->has('url_image')){
                $newComment->url_image = $request->get('url_image'); 
            }

            $newComment->save(); 

            $resultResponse->setData($newComment); 
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
            $comment = Comment::findOrFail($id); 

            $resultResponse->setData($comment); 
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
            
        } catch(\Exception $e){
            $resultResponse->setStatusCode(ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE);
        }
        return response()->json($resultResponse); 
    }


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
            $comment = Comment::findOrFail($id); 

            //Para actualizar debes ser el que creó el comentario   
            if($comment->client_dni == $request->get('client_dni')){
                             
                $comment->date = $request->get('date'); 
                $comment->description = $request->get('description'); 
                
                if($request->has('url_image')){
                    $comment->url_image = $request->get('url_image'); 
                }

                $comment->save(); 

                $resultResponse->setData($comment); 
                $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
                $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
            }

        } catch(\Exception $e){
            Log::debug($e); 
            dd($e); 
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
            $comment = Comment::findOrFail($id); 

            //Para actualizar debes ser el que creó el comentario 
            if($comment->client_dni == $request->get('client_dni')){
      
                $comment->date = $request->get('date', $comment->date); 
                $comment->description = $request->get('description', $comment->description); 
                $comment->client_dni = $request->get('client_dni', $comment->client_dni); 
                $comment->url_image = $request->get('url_image', $comment->url_image); 

                $comment->save(); 

                $resultResponse->setData($comment); 
                $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
                $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
            }

        } catch(\Exception $e){
            Log::debug($e); 
            dd($e); 
            $resultResponse->setStatusCode(ResultResponse::ERROR_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_CODE);
        }
        return response()->json($resultResponse); 
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Request $request,)
    {
        $resultResponse = new ResultResponse(); 

        try{
            $comment = Comment::findOrFail($id); 

            //Para actualizar debes ser el que creó el comentario 
            if($comment->client_dni == $request->get('client_dni')){

                $comment->delete();

                $resultResponse->setData($comment); 
                $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
                $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

            }

        } catch(\Exception $e){
            $resultResponse->setStatusCode(ResultResponse::ERROR_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_CODE);
        }
        return response()->json($resultResponse); 
    }

    private function validateProduct($request){

        $rules = []; 
        $messages = []; 

        $rules['date'] = 'required'; 
        $messages['name.date'] = Lang::get('alerts.product_date_required'); 

        $rules['description'] = 'required'; 
        $messages['price.description'] = Lang::get('alerts.product_description_required'); 

        $rules['client_dni'] = 'required'; 
        $messages['price.client_dni'] = Lang::get('alerts.product_client_dni_required'); 

        return Validator::make($request->all(), $rules, $messages); 
    }
}
