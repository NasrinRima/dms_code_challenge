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
                            <h3 class="card-title">Role Create Form</h3>
                        </div>
                        <div class="card-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/resource/store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group row">
                    <label class="col-md-2 control-label">Name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                        <small class="form-text text-muted">Example: Create Resource.</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 control-label">Controller</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="controller" value="{{ old('controller') }}" required>
                        <small class="form-text text-muted">Example: Resource.</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 control-label">Action</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="action" value="{{ old('action') }}" required>
                        <small class="form-text text-muted">Example: App\Http\Controllers\ResourceController@create.</small>
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
