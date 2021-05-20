{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

{{-- Dashboard 1 --}}
@parent

<div class="content-wrapper">
<!--    <section class="content-header">-->
<!--        <div class="container-fluid">-->
<!--            <div class="row mb-2">-->
<!--                <div class="col-sm-12">-->
<!--                    @include('common.msg')-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-edit"></i> Category Update Form
                                <span class="pr-2 float-right">
                                     <a class="btn btn-sm btn-primary" href="{{url('/admin/categories')}}">Category List</a>
                                </span>
                            </h3>

                        </div>

                        <div class="card-body">
                            <form class="form-horizontal" role="form" method="POST" action="/{{app()->getLocale()}}/admin/categories/{{$row->id}}" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                {{ method_field('PUT') }}
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Type</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="type" required id="type">
                                            <option value=''>Select One</option>
                                            <option value='knowledge_toolkit' @if($row->type=='knowledge_toolkit') selected @endif>Knowledge ToolKit</option>
                                            <option value='faq' @if($row->type=='faq') selected @endif>FAQ</option>
                                            <option value='quiz' @if($row->type=='quiz') selected @endif>Quiz</option>
                                            <option value='hotline' @if($row->type=='hotline') selected @endif>Hotline</option>
                                        </select>
                                        @error('type')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Title</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="title" value="{{ old('title',$row->CategoryTranslate->title??'') }}" required>
                                        <small class="form-text text-muted"></small>
                                        @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Brand Logo</label>
                                    <div class="col-md-10">
                                        <input type="file" name="logo"  id="logo" accept="image/*" />
                                        @if($row->CategoryTranslate->logo??'')<img src="{{ $row->CategoryTranslate->logo??'' }}" height="80px" width="80px" /> @endif
                                        <small class="form-text text-muted"></small>
                                        @error('logo')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Icon</label>
                                    <div class="col-md-10">
                                        <input type="file" name="icon"  id="icon" accept="image/*" />
                                        @if($row->CategoryTranslate->icon??'')<img src="{{ $row->CategoryTranslate->icon??'' }}" height="80px" width="80px" /> @endif
                                        <small class="form-text text-muted"></small>
                                        @error('icon')
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
@endsection
