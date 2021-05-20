<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\HotlineService;


class HotlineController extends Controller
{
    public function getHotline(Request $request,HotlineService $services){

        try{
            $data = $services->getCategoryWiseHotLine($request);

            return response()->json([
                'success' => true,
                'message' => 'Hotline data as json array has been provided!',
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
