<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FaqService;

class FaqController extends Controller
{
    public function getFaq(Request $request,FaqService $services){

        try{
            $data = $services->getCategoryWiseFaq($request);

            return response()->json([
                'success' => true,
                'message' => 'Faq datas as json array has been provided!',
                'responses' => $data
            ], 200);
        }catch (\Exception $e){

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!Please try again',
            ], 400);
        }
    }
}
