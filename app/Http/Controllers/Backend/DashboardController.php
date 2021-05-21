<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use DB;


class DashboardController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
        return redirect('/user/books');       
    }

    public function create(){

        return view('backend.dashboard.index');
    }
    private function __getUserName($userID){
        $user=QuizPlayer::find($userID);
        return $user->full_name??'--';
    }
    private function __getLevelName($userID){
        $levels = QuizLeaderBoard::select('category_id')->where('user_id',$userID)->distinct()->get();
//        $levels = QuizLeaderBoard::select('category_id')->where('user_id',$userID)->distinct()->latest()->first();

        $levelArr=array();
        foreach($levels as $level){
            if((int)$level->category_id==0){
                array_push($levelArr,'Level 5');
                continue;
            }
            array_push($levelArr,$level->getCategory->CategoryTranslateBangla->title??'--');
        }

        return implode(', ', $levelArr);
//        return $levels->getCategory->CategoryTranslateBangla->title??'--';
    }
    public function getIndividualScore($id){

        $rows = QuizLeaderBoard::leftJoin('quiz_player', 'quiz_player.id', '=', 'quiz_leaderboards.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'quiz_leaderboards.category_id')
            ->select(['quiz_leaderboards.user_id', 'quiz_player.full_name','quiz_leaderboards.created_at','quiz_leaderboards.updated_at', DB::raw('MAX(quiz_leaderboards.score) AS maxscore'),'quiz_leaderboards.category_id as level_id'])
            ->where('quiz_leaderboards.user_id',$id)
            ->groupBy('quiz_leaderboards.category_id')
            ->get();

        $data=array();
        $dataArray=array();
        if($rows && count($rows)>0){
            foreach($rows as $key=> $row){

                $dataArray['user_id']=$row->user_id;
                $dataArray['full_name']=$row->full_name;
                $dataArray['level_id']=$row->level_id;
                $dataArray['level_name']=$this->__getIndividualLevelName($row->level_id);
                $dataArray['total_score']=$row->maxscore;
                array_push($data,$dataArray);
            }
        }
        $data = json_decode(json_encode($data));
        return view('backend.leaderboard.details',compact('data'));
    }
    private function __getIndividualLevelName($levelId){

        $levelName = CategoryTranslate::select('title')
            ->where('category_id',$levelId)
            ->where('lang_key','bn')
            ->first();
        return $levelName->title??'--';

    }
    public function getLeaderBoard(Request $request){
        $page_title = 'Quiz LeaderBoard';
        $page_description = 'Quiz LeaderBoard of Event 2021';
        $categories = Category::where('type','=','quiz')->where('status',1)->get();

        $sql = "SELECT
              subq.user_id,subq.category_id,subq.created_at, SUM(subq.maxscore) AS total_score,qp.full_name,sum(subq.playedTimes) as totalPlayedTimes
                FROM
                (
                    SELECT user_id,category_id,
                       score AS maxscore,COUNT(score) AS playedTimes,MIN(created_at) AS created_at
                    FROM
                       quiz_leaderboards
                    GROUP BY
                       user_id,category_id
                       ORDER BY created_at ASC
                    ) subq join quiz_player qp ON qp.id=subq.user_id where user_id is not null";

        if($request->search) {

            if($request->name){
                $sql .=" and qp.full_name like '%$request->name%'";
            }
            if($request->category_id){
                $sql .=" and subq.category_id=$request->category_id";
            }
            if($request->start_date && $request->end_date){
                $sql .=" and subq.created_at>='$request->start_date'";
                $sql .=" and subq.created_at<='$request->end_date'";

            }

        }
        $sql .=" GROUP BY
                   user_id ORDER BY total_score DESC,totalPlayedTimes ASC";

        $rows = DB::select($sql);
        //    return $rows;

        $data=array();
        $dataArray=array();
        if($rows && count($rows)>0){
            $position=1;
            foreach($rows as $key=> $row){

                $dataArray['position']=$position;
                $dataArray['user_id']=$row->user_id;
                $dataArray['full_name']=$this->__getUserName($row->user_id);
                $dataArray['level']=$this->__getLevelName($row->user_id);
                $dataArray['total_score']=$row->total_score;
                $dataArray['total_score']=$row->total_score;
                $dataArray['total_played_times']=$row->totalPlayedTimes;
                array_push($data,$dataArray);
                $position++;
            }
        }

        $data = json_decode(json_encode($data));

        return view('backend.dashboard.leaderboard',compact('page_title', 'page_description','data','categories'));
    }
}
