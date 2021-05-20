<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Services\SendMailService;

class ContactController extends Controller
{
    public function index(){
        $activeClass='contact';
        return view('frontend.contact',compact('activeClass'));
    }

    public function postMessage(Request $request,SendMailService $sendMailService){

        $result=Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile_no'=>$request->mobile_no,
            'message'=>$request->message,
        ]);
        if($result){
            $sendMailService->SendMailToConatcPerson($request);
            return back()->with('success','Thanks you for your interest.We will contact you soon! ');
        }

    }
}
