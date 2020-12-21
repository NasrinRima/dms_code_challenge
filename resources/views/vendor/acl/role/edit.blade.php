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
                            <h3 class="card-title">Edit Role</h3>
                        </div>
        <div class="card-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/role/update', ['id' => $id]) }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Role name..." name="name" value="{{ ($old = old('name'))?$old:$role->name }}">
                    </div>
                </div>

                @foreach($resources as $k=>$actions)
                    <div class="form-group row">
                        <label class="col-sm-3 control-label">{{ $k }}</label>
                        <div class="col-sm-9">
                            @foreach($actions as $act)
                                <div class="checkbox">
                                    <label>
                                        <input name="resource[]" value="{{ $act['id'] }}" type="checkbox" {{ (in_array($act['id'], $permissions))?'checked="checked"':'' }}> {{ $act['name'] }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-sm btn-primary">
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
