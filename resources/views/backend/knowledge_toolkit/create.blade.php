{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

{{-- Dashboard 1 --}}
@parent

<div class="content-wrapper">
{{--    <section class="content-header">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row mb-2">--}}
{{--                <div class="col-sm-12">--}}
{{--                    @include('common.msg')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-plus"></i> Knowledge ToolKit Create Form
                                <span class="pr-2 float-right">
                                     <a class="btn btn-sm btn-primary" href="{{url('/admin/knowledge-toolkit')}}">Knowledge ToolKit List</a>
                                </span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ url('/admin/knowledge-toolkit') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Select Category <span style="color: red">*</span></label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="category_id" required id="category_id">
                                            <option value=''>Select One</option>
                                            @foreach($categories as $cat)
                                            <option value={{ $cat->id }}>{{ $cat->CategoryTranslate->title??'' }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Title <span style="color: red">*</span></label>
                                    <div class="col-md-10">
                                        <textarea type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required></textarea>
                                        <small class="form-text text-muted"></small>
                                        @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Content <span style="color: red">*</span></label>
                                    <div class="col-md-10">
                                        <textarea  type="text" class="form-control rich_editor" name="content" id="content" value="{{ old('content') }}"></textarea>
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>
                                <!--<div class="form-group row">
                                    <label class="col-md-2 control-label">Thumbnail Image <span style="color: red">*</span></label>
                                    <div class="col-md-10">
                                        <input type="file" name="image_file"  id="image_file" accept="image/*" />
                                        <small class="form-text text-muted"></small>
                                        @error('image_file')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>-->
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Audio</label>
                                    <div class="col-md-10">
                                        <input type="file" name="audio" id="audio" accept="audio/mp3,audio/*;capture=microphone" />
                                        <small class="form-text text-muted"></small>
                                        @error('audio')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Video Link</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="video" id="video" value="{{ old('video') }}" >
                                        @error('video')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Others File</label>
                                    <div class="col-md-10">
                                        <input type="file" name="other_file" id="other_file" accept=".pdf,.doc,.docx" />
                                        <small class="form-text text-muted"></small>
                                        @error('other_file')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Order <span style="color: red">*</span></label>
                                    <div class="col-md-10">
                                        <input type="number" name="order" id="order"  required/>
                                        <small class="form-text text-muted"></small>
                                        @error('order')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-10 offset-md-2">
                                        <button type="submit" class="btn btn-primary">
                                            Create
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
@endsection
