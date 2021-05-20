{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

{{-- Dashboard 1 --}}
@parent
<div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <section class="content-header">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                            @include('common.msg')
                                        </div>
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                                                <li class="breadcrumb-item active">User</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div><!-- /.container-fluid -->
                            </section>
                            <h3 class="card-title"> <i class="fa fa-list"></i> User List </h3>
                            <div class="float-right">
                                <form action="" method="get">
                                    <div class="input-group pr-2 col-sm-12">
                                        <input type="text" name="q" value="{{old('q', request('q'))}}" class="form-control form-control-sm" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-primary" type="submit">Find</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="pr-2 float-right">
                                <a class="btn btn-sm btn-primary" href="{{url('/admin/user/create')}}">Create New</a>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="kt_datatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th style="width:184px">Operation</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $index = 1;

                                ?>
                                @forelse($rows as $r)
                                <tr>
                                    <td>{{$index++}}.</td>
                                    <td>{{ $r->name }}</td>
                                    <td>{{ $r->email }}</td>
                                    <td>{{ $r->role_id }}</td>
                                    <td>
                                        <form action="/admin/user/{{$r->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            @if($r->is_active)
                                            <a class="btn-sm btn-success" href="/{{app()->getLocale()}}/admin/user/{{$r->id}}?active=false">Active</a>
                                            @else
                                            <a class="btn-sm btn-warning" href="/{{app()->getLocale()}}/admin/user/{{$r->id}}?active=true">Inactive</a>
                                            @endif
                                            <a class="btn btn-sm btn-primary" href="/{{app()->getLocale()}}/admin/user/{{$r->id}}/edit"><i class="fa fa-edit "></i></a>
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="confirm('Do you want to delete the item?')"><i class="fa fa-trash "></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="5">No data found!</td></tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div>{!! $rows->render() !!}</div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

{{-- Styles Section --}}
@section('styles')
<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection


{{-- Scripts Section --}}
@section('scripts')
{{-- vendors --}}
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

{{-- page scripts --}}
<script src="{{ asset('js/pages/crud/datatables/basic/basic.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
@endsection

