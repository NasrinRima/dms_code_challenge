<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\KnoledgeToolkitService;

class KnowledgeToolkitController extends Controller
{
    public function getKnowledgeToolkit(Request $request,KnoledgeToolkitService $services){
        try{
            $data = $services->getKnowledgeToolkit($request);
            return json_encode([
                'success' => true,
                'message' => 'Knowledge Toolkit data as json array has been provided!',
                'responses' => $data
            ]);
        }catch (\Exception $e){

            return json_encode([
                'success' => false,
                'message' => 'Something went wrong!Please try again',
            ]);
        }
    }
}
