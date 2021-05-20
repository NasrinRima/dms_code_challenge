{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

{{-- Dashboard 1 --}}
@parent

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    @include('common.msg')
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-edit"></i> Knowledge Toolkit Update Form
                                <span class="pr-2 float-right">
                                     <a class="btn btn-sm btn-primary" href="{{url('/admin/knowledge-toolkit')}}">Knowledge Toolkit List</a>
                                </span>
                            </h3>

                        </div>

                        <div class="card-body">
                            <form class="form-horizontal" role="form" method="POST" action="/{{app()->getLocale()}}/admin/knowledge-toolkit/{{$row->id}}" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                {{ method_field('PUT') }}
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Type</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="category_id" required id="category_id">
                                            <option value=''>Select One</option>
                                            @foreach($categories as $cat)
                                            <option value={{ $cat->id }} <?php echo ($cat->id == $row->category_id) ? 'selected' : '' ?>> {{ $cat->CategoryTranslate->title??'' }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Title</label>
                                    <div class="col-md-10">
                                        <textarea type="text" class="form-control" name="title"  required>{{ old('title',$row->getKnowledheToolkitTranslate->title??'') }}</textarea>
                                        @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Content</label>
                                    <div class="col-md-10">
                                        <textarea type="text" class="form-control rich_editor" name="content">{{ old('content',$row->getKnowledheToolkitTranslate->content??'') }}</textarea>
                                        @error('content')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>
                               <!-- <div class="form-group row">
                                    <label class="col-md-2 control-label">Thumbnail Image</label>
                                    <div class="col-md-10">
                                        <input type="file" name="image_file"  id="image_file" accept="image/*" />
                                        @error('image_file')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        @if($row->getKnowledheToolkitTranslate->thumb_image??'')<img src="{{ $row->getKnowledheToolkitTranslate->thumb_image??'' }}" height="80px" width="80px" /> @endif
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>-->
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Audio</label>
                                    <div class="col-md-10">
                                        <input type="file" name="audio" id="audio" accept="audio/mp3,audio/*;capture=microphone" />

                                        @error('audio')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        @if($row->getKnowledheToolkitTranslate->audio??'')
                                        <audio controls>
                                            <source src="{{$row->getKnowledheToolkitTranslate->audio??''}}" type="audio/ogg">
                                            Your browser does not support the audio element.
                                        </audio>
                                        @endif
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Video Link</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="video" id="video" value="{{ old('video',$row->getKnowledheToolkitTranslate->video??'') }}" >
                                        @error('video')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        @if($row->getKnowledheToolkitTranslate->video??'')
                                        <a class="video" video-url="https://www.youtube.com/watch?v={{$row->getKnowledheToolkitTranslate->video}}">
                                            <img width="20%" height="120" src="http://img.youtube.com/vi/{{$row->getKnowledheToolkitTranslate->video}}/hqdefault.jpg">
                                          <div class="play-icon">
                                                <img src="/frontend/new_logo/video_icon.png" alt="play image" />
                                            </div>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Others File</label>
                                    <div class="col-md-10">
                                        <input type="file" name="other_file" id="other_file" accept=".pdf,.doc,.docx" />
                                        @if($row->getKnowledheToolkitTranslate->files??'')
                                        <a target="_blank" href="{{ $row->getKnowledheToolkitTranslate->files}}" download="{{$row->getKnowledheToolkitTranslate->title??''}}"><strong class="fas fa-paperclip" style="font-size:22px;color:red"></strong> Download File</a>
                                        @endif
                                        @error('other_file')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Order <span style="color: red">*</span></label>
                                    <div class="col-md-10">
                                        <input type="number" name="order" id="order"  value="{{ old('order',$row->order??'') }}" required/>
                                        <small class="form-text text-muted"></small>
                                        @error('order')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-10 offset-md-2">
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="/frontend/vimeo/src/video.popup.css">

<script src="/frontend/vimeo/src/video.popup.js"></script>

<script>
    $(".video").videoPopup({
        autoplay:false,
        showControls:true,
        controlsColor:null,
        loopVideo:false,
        showVideoInformations:true,
        width:null,
        customOptions: {
            rel: 0,
            end: 60,
        }

    });
</script>
@endsection
