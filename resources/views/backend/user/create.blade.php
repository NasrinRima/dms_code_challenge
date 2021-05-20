{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

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
                            <h3 class="card-title"><i class="fa fa-plus"></i> User Create Form
                            </h3>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{url('/admin/user')}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Select Role</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="role_id" required id="role_id">
                                            <option value=''>Select One</option>
                                            @foreach($role as $r)
                                            <option value={{ $r->role_id }}>{{ $r->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Name</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Email</label>
                                    <div class="col-md-10">
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Password</label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control" name="password" value="{{ old('password') }}" required>
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Confirm Password</label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control" name="password" value="{{ old('password') }}" required>
                                        <small class="form-text text-muted"></small>
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
