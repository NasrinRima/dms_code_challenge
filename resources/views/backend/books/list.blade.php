<style type="text/css">
    .p-style {
        color:#25A5F6;
        font-size: 15px;
    }
</style>
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

                            <p class="p-style" id="success-msg"></p>
                           
                            <div class="float-right">
                                <form action="" method="get">
                                    <div class="input-group pr-2 col-sm-12">
                                         <select class="form-control" name="type"  id="type" >
                                            <option value=''>All Categories</option>                                       
                                            <option value='Children' <?php echo (app('request')->input('type') == 'Children') ? 'selected' : ''?>>Children</option>
                                            <option value='Fiction' <?php echo (app('request')->input('type') == 'Fiction') ? 'selected' : ''?>>Fiction</option>
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-primary" type="submit">Find</button>
                                        </div>
                                    </div>
                                </form>
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
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <td><a class="btn btn-sm btn-primary" href="#" onclick="addToCart({{ $book->id }})"><i class="fa fa-plus "></i></a></td>

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
<script type="text/javascript">
    function addToCart(bookId) {
            $.ajax({
                url: "/user/add-to-cart",
                type: 'get',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "bookId": bookId
                },
                success: function (response) {
                document.getElementById('success-msg').innerHTML = "This Book is added to your cart list!!";

                   location.reload();

                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }
</script>

@endsection

