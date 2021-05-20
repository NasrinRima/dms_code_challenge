<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\KnowledgeToolkitController;
use App\Http\Controllers\API\QuizController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\HotlineController;
use App\Http\Controllers\API\AboutAppController;
use App\Http\Controllers\API\TrainingModuleAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('register', [RegisterController::class ,'register']);
Route::post('login', [RegisterController::class ,'login']);
Route::middleware('switchLang')->group( function () {
    Route::get('/get-category',[CategoryController::class,'getCategory']);
    Route::get('/get-knowledge-tool-kit',[KnowledgeToolkitController::class,'getKnowledgeToolkit']);
    Route::get('/get-category-quiz',[QuizController::class,'getCategoryWiseQuiz']);
    Route::get('/get-faq',[FaqController::class,'getFaq']);
    Route::get('/get-hotline',[HotlineController::class,'getHotline']);
    Route::post('/store-quiz-player-data',[QuizController::class,'storeQuizPlayerData']);
    Route::get('/user-name-checking',[QuizController::class,'userNameChecker']);
    Route::get('/get-about-app',[AboutAppController::class,'index']);
    Route::get('/get-training-module',[TrainingModuleAPIController::class,'index']);
    Route::get('/get-all-scores',[QuizController::class,'allScore']);
    Route::get('/get-individual-scores',[QuizController::class,'individualScore']);
});



