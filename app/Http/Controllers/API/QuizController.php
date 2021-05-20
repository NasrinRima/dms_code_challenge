<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\QuizService;
use App\Models\QuizLeaderBoard;
use App\Models\QuizPlayer;
use League\Flysystem\Exception;
use Validator;
use DB;
use Illuminate\Support\Facades\App;
use App\Models\BasicPart\CategoryTranslate;

class QuizController extends Controller
{
    public function getCategoryWiseQuiz(Request $request,QuizService $services){

        try{
            $data= $services->getCategoryWizeQuiz($request);
            return response()->json([
                'success' => true,
                'message' => 'Quiz data as json array has been provided!',
                'responses' => $data
            ], 200);
        }catch (\Exception $e){
            echo '<pre>';
            print_r($e->getMessage());
            die;

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!Please try again',
            ], 400);
        }
    }
    public function storeQuizPlayerData(Request $request){

        $validator = Validator::make($request->all(), [
                'full_name' => 'required',
                'user_name' => 'required',
                'mobile_no' => 'required',

            ],
            [
                'full_name.required' => "Full Name is Required",
                'user_name.required' => "User Name is Required",
                'mobile_no.required' => "Mobile Number is Required"
            ]
        );

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 200);
        }

        if(invalidMobileNumber($request->mobile_no)){
            return response()->json([
                'success' => false,
                'message' => 'Invalid mobile no.Please input valid mobile no ',
            ], 200);
        }

        DB::beginTransaction();

        try{
            $isExist = QuizPlayer::where('mobile_no',$request->mobile_no)
                ->first();

            if($isExist){

                if($request->referal_code){
                    $playerInfo = QuizPlayer::where('referal_code',$request->referal_code)->first();

                    if($playerInfo){
                        if($playerInfo->mobile_no==$request->mobile_no ){
                            return response()->json([
                                'success' => false,
                                'message' => 'You have been submitted invalid referal code.Please try again!',
                            ], 200);
                        }
                        $playerInfo->update(['refer_count',$playerInfo->refer_count++]);
                    }else{
                        return response()->json([
                            'success' => false,
                            'message' => 'You have been submitted invalid referal code.Please try again!',
                        ], 200);
                    }
                }

                $referal_code=$isExist->referal_code;

                $updateParams=[
                    'full_name' => $request->full_name,
                    'user_name' => $request->user_name,
                    'mobile_no' => $request->mobile_no,

                ];
                if(!$referal_code){
                    $referal_code = $this->getReferalCode();
                    $updateParams['referal_code']= $referal_code;
                }

                $this->generateRereralCode(6);
                $lastQuizPlayer = tap(QuizPlayer::where('id',$isExist->id))
                    ->update($updateParams)->first();
            }
            else {
                $validator = Validator::make($request->all(), [
                        'user_name' => 'unique:quiz_player,user_name'
                    ],
                    [
                        'user_name.unique' => "User Name Already Exist"
                    ]
                );

                if($validator->fails()){
                    return response()->json([
                        'success' => false,
                        'message' => $validator->errors(),
                    ], 200);

                }

                if($request->referal_code){
                    $playerInfo = QuizPlayer::where('referal_code',$request->referal_code)->first();

                    if($playerInfo){
                        if($playerInfo->mobile_no==$request->mobile_no ){
                            return response()->json([
                                'success' => false,
                                'message' => 'You have been submitted invalid referal code.Please try again!',
                            ], 200);
                        }
                        $playerInfo->update(['refer_count',$playerInfo->refer_count++]);
                    }else{
                        return response()->json([
                            'success' => false,
                            'message' => 'You have been submitted invalid referal code.Please try again!',
                        ], 200);
                    }
                }
                $referal_code = $this->getReferalCode();

                $lastQuizPlayer = QuizPlayer::create([
                    'full_name' => $request->full_name,
                    'user_name' => $request->user_name,
                    'mobile_no' => $request->mobile_no,
                    'referal_code' => $referal_code,

                ]);

            }

            $lastQuiz =  QuizLeaderBoard::create([
                'user_id' => $lastQuizPlayer->id,
                'category_id' => $request->category_id,
                'level_id' => $request->level_id,
                'score' => $request->score,

            ]);


            $allUsersScore=QuizLeaderBoard::with('getUser')
                ->select('user_id','category_id','level_id',DB::raw('MAX(score) AS score'))
                ->where('category_id', $request->category_id)
                ->where('level_id', $request->level_id)
                ->groupBy('category_id')
                ->groupBy('level_id')
                ->groupBy('user_id')
                ->get();


            $yourScore = $lastQuiz->score;


            $result = [
                'allScore' => $allUsersScore,
                'yourScore' => $yourScore,
                'referal_code' => $referal_code,
            ];

            if(sizeof($allUsersScore) > 0 ){
                return response()->json([
                    'success' => true,
                    'message' => 'Quiz LeaderBoard data as json array has been provided!',
                    'responses' => $result
                ], 200);
            }

            else {
                return response()->json([
                    'success' => false,
                    'message' => 'Something went wrong!Please try again',
                ], 400);
            }

            DB::commit();
        }catch(Exception $e){
            return $e->getMessage();
        }




    }
    public function userNameChecker(Request $request){

        $isExist = QuizPlayer::where('mobile_no',$request->mobile_no)
//                ->orWhere('email',$request->email)
                ->first();

        $existedUsername = QuizPlayer::where('user_name',$request->user_name)
                        ->where('mobile_no','!=',$request->mobile_no)
//                        ->where('email','!=',$request->email)
                        ->first();


        if($isExist){

                if($existedUsername){

                    return response()->json([
                        'success' => true,
                        'message' => 'User name Not Available',
                    ], 200);
            }

                return response()->json([
                    'success' => true,
                    'message' => "User name Available",
                ], 200);


        }


        $existedUsername = QuizPlayer::where('user_name',$request->user_name)->first();

        if($existedUsername){
            return response()->json([
                'success' => true,
                'message' => 'User name Not Available',
            ], 200);
        }
            return response()->json([
                'success' => true,
                'message' => "User name Available",
            ], 200);

    }
    public function allScore(Request $request){

    $sql = "SELECT
              subq.user_id,subq.category_id, SUM(subq.maxscore) AS total_score
                FROM
                (
                    SELECT user_id,category_id,
                       MAX(score) AS maxscore
                    FROM
                       quiz_leaderboards
                    GROUP BY
                       user_id,category_id
                    ) subq
                GROUP BY
                   user_id ORDER BY total_score DESC";
        $rows = DB::select($sql);

        $data=array();
        $dataArray=array();
        if($rows && count($rows)>0){
            $position=1;
            foreach($rows as $key=> $row){
                /*if($key==0){
                    continue;
                }*/
                $dataArray['position']=$position;
                $dataArray['user_id']=$row->user_id;
                $dataArray['full_name']=$this->__getUserName($row->user_id);
                $dataArray['level']=$this->__getLevelName($row->user_id);
                $dataArray['total_score']=$row->total_score;
                array_push($data,$dataArray);
                $position++;
            }
            return response()->json([
                'success' => true,
                'message' => 'Quiz Leaderboard data as json array has been provided!',
                'responses' => $data
            ],200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Something went wrong!Please try again',
        ],400);


    }

    private function __getUserName($userID){
        $user=QuizPlayer::find($userID);
        return $user->full_name??'--';
    }
    private function __getLevelName($userID){
        $levels = QuizLeaderBoard::select('category_id')->where('user_id',$userID)->distinct()->latest()->first();
        return $levels->getCategory->CategoryTranslateBangla->title??'--';
    }
    private function __getIndividualLevelName($levelId){
        if((int)$levelId==0){
          return 'Level 5';
        }
         $levelName = CategoryTranslate::select('title')
                            ->where('category_id',$levelId)
                            ->where('lang_key','bn')
                            ->first();
        return $levelName->title??'--';

    }

    public function individualScore(Request $request){
        $useId = trim($request->get('user_id'));

        $rows = QuizLeaderBoard::leftJoin('quiz_player', 'quiz_player.id', '=', 'quiz_leaderboards.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'quiz_leaderboards.category_id')
            ->select(['quiz_leaderboards.user_id', 'quiz_player.full_name','quiz_leaderboards.created_at','quiz_leaderboards.updated_at', DB::raw('MAX(quiz_leaderboards.score) AS maxscore'),'quiz_leaderboards.category_id as category_id'])
            ->groupBy('quiz_leaderboards.user_id','quiz_leaderboards.category_id');

        if($useId != ''){
            $rows = $rows->where('quiz_leaderboards.user_id',$useId);
        }
          $rows = $rows->get();

        $data=array();
        $dataArray=array();
        if($rows && count($rows)>0){
            foreach($rows as $key=> $row){

                $dataArray['user_id']=$row->user_id;
                $dataArray['full_name']=$row->full_name;
                $dataArray['level_id']=$row->category_id;
                $dataArray['level_name']=$this->__getIndividualLevelName($row->category_id);
                $dataArray['total_score']=$row->maxscore;
                array_push($data,$dataArray);
            }
            return response()->json([
                'success' => true,
                'message' => 'Quiz Leaderboard data as json array has been provided!',
                'responses' => $data
            ],200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Something went wrong!Please try again',
        ],400);


    }

    private function getReferalCode(){
        $referal_code = $this->generateRereralCode(6);
        $isReferalCode = QuizPlayer::where('referal_code',$referal_code)
            ->first();
        if($isReferalCode){
            $referal_code =  $this->getReferalCode();
        }
        return $referal_code;
    }

    private function generateRereralCode($length_of_string=5)
    {
        $str_result = '19283746519283746519283567890495839482948417283';
        return substr(str_shuffle($str_result), 0, $length_of_string);
    }

}
