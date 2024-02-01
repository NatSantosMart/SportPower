<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libs\ResultResponse;
use Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class CartController extends Controller
{
    public function store(Request $request)
    {
        $resultResponse = new ResultResponse(); 

        try{
            $addProduct = new Cart ([
                'client_dni' => $request->get('client_dni'), 
                'product_id' => $request->get('product_id'), 
            ]); 

            if($request->has('quantity')){
                $addProduct->quantity = $request->get('quantity'); 
            }

            $addProduct->save(); 

            $resultResponse->setData($addProduct); 
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        } catch(\Exception $e){
            $resultResponse->setStatusCode(ResultResponse::ERROR_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_CODE);
        }

        return response()->json($resultResponse); 
    }

    public function put(Request $request, $id)
    {

        $resultResponse = new ResultResponse(); 

        try{
            $productInCart = Cart::findOrFail($id); 

            //Solo se puede modificar la quantity del productInCart
            $productInCart->quantity = $request->get('quantity', $productInCart->quantity); 

            $productInCart->save(); 

            $resultResponse->setData($productInCart); 
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
            $productInCart = Cart::findOrFail($id); 

            $productInCart->delete();

            $resultResponse->setData($productInCart); 
            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_SUCCESS_CODE);

        } catch(\Exception $e){
            $resultResponse->setStatusCode(ResultResponse::ERROR_CODE); 
            $resultResponse->setMessage(ResultResponse::TXT_ERROR_CODE);
        }
        return response()->json($resultResponse); 
    }

    public function indexFromClient($dni){

        try{

            $products = Cart::where('client_dni', $dni)->get(); 

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
}
