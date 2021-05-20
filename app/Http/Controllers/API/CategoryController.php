<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    public function getCategory(Request $request,CategoryService $services){

        try{
            $data = $services->getCategory($request);

            // return $data;
            return response()->json([
                'success' => true,
                'message' => 'Category data as json array has been provided!',
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
