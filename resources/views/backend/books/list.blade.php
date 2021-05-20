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
                            <h3 class="card-title"> <i class="fa fa-list"></i>List of Books </h3>
                            <div class="float-right">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <select class="form-control" name="type" required id="type">
                                            <option value=''>Select Category</option>                                       
                                            <option value='Children'>Children</option>
                                            <option value='Fiction'>Fiction</option>
                                        </select>
                                       
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th style="width:184px">Add to Cart</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $index = 1;

                                ?>
                                @forelse($books as $book)
                                <tr>
                                    <td>{{$index++}}.</td>
                                    <td>{{ $book->category??'' }}</td>
                                    <td>{{$book->name??'' }}</td>
                                    <td>{{ $book->price??''  }}</td>
                                    <td><a class="btn btn-sm btn-primary" href="/{{app()->getLocale()}}/admin"><i class="fa fa-plus "></i></a></td>                                    
                                </tr>
                                @empty
                                <tr><td colspan="5">No data found!</td></tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
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

