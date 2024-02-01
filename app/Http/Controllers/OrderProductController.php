<?php


namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libs\ResultResponse;
use Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class OrderProductController extends Controller
{

    //Listado de productos que contiene un pedido
    public function indexFromOrder($id){

        try{
            $products = OrderProduct::where('order_id', $id)->get(); 

            $resultResponse = new ResultResponse(); 

            $resultResponse->setData($products); 
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        } catch(\Exception $e){
            $resultResponse->setStatusCode(ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE);
        }
        
        return response()->json($resultResponse); 
    }

    //Añadir un producto a un pedido
    public function store(Request $request)
    {
        $resultResponse = new ResultResponse(); 

        try{
            $newOrderProduct = new OrderProduct ([
                'order_id' => $request->get('order_id'), 
                'product_id' => $request->get('product_id'), 
            ]); 

            $newOrderProduct->save(); 

            $resultResponse->setData($newOrderProduct); 
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

}
