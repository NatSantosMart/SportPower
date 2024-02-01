<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libs\ResultResponse;
use Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ratings = Rating::all(); 

        $resultResponse = new ResultResponse(); 

        $resultResponse->setData($ratings); 
        $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
        $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
        
        return response()->json($resultResponse); 
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $this->validateRating($request);
        if ($validation->fails()) {
            return response()->json([
                'statusCode' => ResultResponse::ERROR_CODE,
                'message' => ResultResponse::TXT_ERROR_CODE,
                'data' => $validation->errors()
            ], 400);
        }
        $resultResponse = new ResultResponse(); 

        try{
            $newRating = new Rating ([
                'score' => $request->get('score'), 
                'product_id' => $request->get('product_id'), 
                'comment_id' => $request->get('comment_id'), 
            ]); 

            $newRating->save(); 

            $resultResponse->setData($newRating); 
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
            $rating = Rating::where('comment_id', $id)->firstOrFail();

            $resultResponse->setData($rating); 
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
            
        } catch(\Exception $e){
            Log::debug($e); 
            dd($e); 
            $resultResponse->setStatusCode(ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE);
        }
        return response()->json($resultResponse); 
    }

    public function put(Request $request, $comment_id)
    {
        $resultResponse = new ResultResponse(); 

        try{
            $rating = Rating::where('comment_id', $comment_id)->firstOrFail();
            
            $rating->score = $request->get('score', $rating->score); 

            $rating->save(); 

            $resultResponse->setData($rating); 
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
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $resultResponse = new ResultResponse(); 

        try{
                $rating = Rating::where('comment_id', $id)->firstOrFail();
            
                $rating->delete();

                $resultResponse->setData($rating); 
                $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
                $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        } catch(\Exception $e){
            $resultResponse->setStatusCode(ResultResponse::ERROR_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_CODE);
        }
        return response()->json($resultResponse); 
    }

    private function validateRating($request){

        $rules = []; 
        $messages = []; 

        $rules['score'] = 'required'; 
        $messages['name.score'] = Lang::get('alerts.product_score_required'); 

        $rules['comment_id'] = 'required'; 
        $messages['price.comment_id'] = Lang::get('alerts.product_comment_id_required'); 

        return Validator::make($request->all(), $rules, $messages); 
    }
}