<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libs\ResultResponse;
use Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all(); 

        $resultResponse = new ResultResponse(); 

        $resultResponse->setData($orders); 
        $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
        $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
        
        return response()->json($resultResponse); 
    }

    public function indexFromClient($dni){
        try{
            $products = Order::where('client_dni', $dni)->get(); 

            $resultResponse = new ResultResponse(); 

            $resultResponse->setData($products); 
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $resultResponse = new ResultResponse(); 

        try{
            $order= new Order ([
                'status' => $request->get('status'), 
                'delivery_date' => $request->get('delivery_date'), 
                'request_date' => $request->get('request_date'), 
                'total_price' => $request->get('total_price'), 
                'client_dni' => $request->get('client_dni'), 
            ]); 

            $order->save(); 

            $resultResponse->setData($order); 
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
            $order = Order::findOrFail($id); 

            $resultResponse->setData($order); 
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);
            
        } catch(\Exception $e){
            $resultResponse->setStatusCode(ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE);
        }
        return response()->json($resultResponse); 
    }

    public function destroy($id)
    {
        $resultResponse = new ResultResponse(); 

        try{
            $order = Order::findOrFail($id); 

            $order->delete();

            $resultResponse->setData($order); 
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        } catch(\Exception $e){
            $resultResponse->setStatusCode(ResultResponse::ERROR_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_CODE);
        }
        return response()->json($resultResponse); 
    }
}
