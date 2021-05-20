<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\NotificationService;


class NotificationController extends Controller
{
    public function notify(NotificationService $service){
        $service->notify();
        return 'Success';
    }
}
