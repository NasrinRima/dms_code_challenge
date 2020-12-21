<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';
        return view('backend.dashboard.index',compact('page_title', 'page_description'));
    }

    public function create(){

        return view('backend.dashboard.index');
    }
}
