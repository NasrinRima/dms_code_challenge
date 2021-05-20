<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BasicPart\KnowledgeToolkit;
use App\Models\BasicPart\KnowledgeToolkitTranslate;
use App\Models\BasicPart\Category;
use App\Models\BasicPart\CategoryTranslate;
use Validator;
use DB;
use Illuminate\Support\Facades\App;

class KnowledgeToolkitController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $query = KnowledgeToolkit::select();
            if ($request->q) {
                $query = $query->where('category_id', 'LIKE', "%{$request->q}%");
                $query = $query->orWhereHas('getKnowledheToolkitTranslate', function($q) use ($request) {
                    $q->where('title', 'LIKE', "%{$request->q}%");
                });
            }
            $rows = $query->orderBy('order', 'ASC')->paginate(30);
            return view('backend.knowledge_toolkit.index', compact('rows'));
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('type','=','knowledge_toolkit')->get();
        return view('backend.knowledge_toolkit.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'category_id' => 'required',
                'title' => 'required',
                'content' => 'required',
//                'image_file' => 'required | mimes:jpeg,jpg,png',
                'other_file' =>  'mimes:doc,docx,pdf',
                'order' =>  'required',
            ],
            [
                'category_id.required' => "Category is Required",
                'title.required' => "Title is Required",
                'content.required' => "Content is Required",
//                'image_file.required' => "Thumbnail is Required",
                'order.required' => "Order is Required",
            ]
        );

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();

        }

        try {

            DB::beginTransaction();
            $lang = App::getLocale();

            $last_knowledge_toolkit_id = KnowledgeToolkit::create([
                'category_id' => $request->category_id,
                'order' => $request->order,
                'status' => true,
                'created_by' => authID(),
                'updated_by' => authID()
            ]);

            if ($last_knowledge_toolkit_id) {
                $thubmnailImage = '';
                $coverImage = '';

                if($request->hasfile('image_file')){
                    $thubmnailImage = profilePhotoUploads($request, '/uploads/thumbnail_image/', 'image_file', 590, 708, 70);
                    $coverImage = profilePhotoUploads($request, '/uploads/cover_image/', 'image_file', 1200, 512, 70);
                }

                $url = $request->video;
                $yotubeLink[1] = '';
                if(!empty($url)){
                    if ( preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
                    {
                        $yotubeLink = $match[0];
                    }
                    else
                    {
                        return back()->with('error','Invalid Link Address!');

                    }
                    $yotubeLink = explode("?v=",$yotubeLink);
                }



                $audioFile='';
                if($request->hasfile('audio')) {
                    $audioFile=fileUploads($request,'/uploads/knowledge_toolkit/audio/','audio');
                }
                // return $audioFile;

                $otherFile='';
                if($request->hasfile('other_file')) {
                    $otherFile=fileUploads($request,'/uploads/knowledge_toolkit/others/','other_file');
                }

                $lang_keys = config('laravellocalization.supportedLocales');

                foreach ($lang_keys as $key => $value){
                    KnowledgeToolkitTranslate::create([
                        'ntkit_id' => $last_knowledge_toolkit_id->id,
                        'title' => $request->title,
                        'content' => $request->input('content'),
                        'thumb_image' => $thubmnailImage,
                        'cover_image' => $coverImage,
                        'video' => $yotubeLink[1],
                        'audio' => $audioFile,
                        'files' => $otherFile,
                        'lang_key' => $key
                    ]);
                }
            }
            DB::commit();
            return redirect("/{$lang}/admin/knowledge-toolkit")->with('success', 'New Faq has been created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }


    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if($request->active){
            $status=0;
            if($request->active=='true'){
                $status=1;
            }
            $user=KnowledgeToolkit::find($id);
            $user->update(['status'=>$status]);
            return back()->with('success','User status has been updated successfully!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where('type','=','knowledge_toolkit')->get();
        $row=KnowledgeToolkit::find($id);

        return view('backend.knowledge_toolkit.edit',compact('row','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
                'category_id' => 'required',
                'title' => 'required',
                'content' => 'required',
            ],
            [
                'category_id.required' => "Category is Required",
                'title.required' => "Title is Required",
                'content.required' => "Content is Required",
            ]
        );
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();

        }
        else {
            try {
                DB::beginTransaction();
                $lang = App::getLocale();
                KnowledgeToolkit::where('id', $id)->update([
                    'category_id' => $request->category_id,
                    'order' => $request->order,
                    'status' => true,
                    'updated_by' => authID()
                ]);

                if ($id) {
                    /*$row = KnowledgeToolkitTranslate::where('ntkit_id', $id)->where('lang_key', $lang)->first();
                    $row->title = $request->title;
                    $row->content = $request->input('content');*/

                    $params=[
                    "title" => $request->title,
                    "content" => $request->content,
                ];

                    if($request->image_file){
                        $thubmnailImage = profilePhotoUploads($request, '/uploads/thumbnail_image/', 'image_file', 590, 708, 70);
                        $coverImage = profilePhotoUploads($request, '/uploads/cover_image/', 'image_file', 1200, 512, 70);
                        /*$row->thumb_image = $thubmnailImage;
                        $row->cover_image = $coverImage;*/

                        $params['thumb_image']=$thubmnailImage;
                        $params['cover_image']=$coverImage;

                    }

                    $url = $request->video;
                    if(!empty($url)){
                        if ( preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
                        {
                            $yotubeLink = $match[0];
                        }
                        else
                        {
                            return back()->with('error','Invalid Link Address!');

                        }
                        $yotubeLink = explode("?v=",$yotubeLink);
                        // $row->video = $yotubeLink[1];

                        $params['video']=$yotubeLink[1];
                    }



                    if($request->audio) {
                        $audioFile=fileUploads($request,'/uploads/knowledge_toolkit/audio/','audio');
                        // $row->audio = $audioFile;
                        $params['audio']=$audioFile;



                    }

                    if($request->other_file) {
                        $otherFile=fileUploads($request,'/uploads/knowledge_toolkit/others/','other_file');
                        // $row->files = $otherFile;
                        $params['files']=$otherFile;
                    }

                    KnowledgeToolkitTranslate::where('ntkit_id', $id)
                                  ->update($params);
                    

//                    if($request->hasfile('audio')) {
//                        $fileName = time().'_'.$request->audio->getClientOriginalName();
//                        $filePath = $request->file('audio')->storeAs('uploads', $fileName, 'public');
//                        $audioFile = '/storage/' . $filePath;
//                        $row->audio = $audioFile;
//                    }

//                    if($request->hasfile('other_file')) {
//                        return "other File";
//                        $fileName = time().'_'.$request->other_file->getClientOriginalName();
//                        $filePath = $request->file('other_file')->storeAs('uploads', $fileName, 'public');
//                        $otherFile = '/storage/' . $filePath;
//                        $row->files = $otherFile;
//                    }
                    // $row->save();

                }
                DB::commit();
                return redirect("/{$lang}/admin/knowledge-toolkit")->with('success', 'New Faq has been created successfully!');
            } catch (\Exception $e) {
                DB::rollBack();
                echo 'Caught exception: ', $e->getMessage(), "\n";
            }
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $knowledgeTollKitObj=KnowledgeToolkit::find($id);
        $knowledgeTollKitObj->update(['status'=>0]);
        $knowledgeTollKitObj->getKnowledheToolkitTranslate()->delete();
        $knowledgeTollKitObj->delete();

        return back()->with('success','The item has been deleted successfully!');
    }

    function additional_file_uploads($request, $destinationPath) {
        try {

            if($request->hasFile('audio')){
                $file = $request->file('audio');
                $request->file('audio')->move($destinationPath, $file->getClientOriginalName());
                $image_path = $destinationPath . $file->getClientOriginalName();
                return $image_path;
            }
            else {
                return "else";
            }

        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

}
