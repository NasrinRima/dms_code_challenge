<style type="text/css">
    .card-style {
   background: rgba(255,255,255,0.9);
    box-shadow: 0 2px 8px rgba(32, 49, 45, 0.3);
    border-radius: 8px;
    padding: 10px;
    font-weight: bold;
}
.card-text{
    text-align: center;
    color: #FBFCFC;
    font-size: 17px;

}
.card-number{
    text-align: center;
    color: #FBFCFC;
    font-size: 30px;
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
                            <h3 class="card-title"> <i class="fa fa-list"></i>My Cart </h3>                            
                           
                                                      
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body row">
                            <table id="example1" class="table table-bordered table-striped col-8">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $index = 1;

                                ?>
                                @forelse($myCarts as $myCart)
                                <tr>
                                    <td>{{$index++}}.</td>
                                    <td>{{ $myCart->category??'' }}</td>
                                    <td>{{$myCart->name??'' }}</td>
                                    <td>{{ $myCart->price??''  }}</td>                                   

                                </tr>
                                @empty
                                <tr><td colspan="5">No data found!</td></tr>
                                @endforelse
                                </tbody>
                            </table>
                            <div class="col-3" style="margin-left: 20px;">
                                   <div class="card-style" style="height: 55%; background-color:#5499C7" >

                                    <p class="card-text" style="color:#0D0D0D ;">Checkout Summary</p>
                                    <p class="card-text">Total no. of Books<h2 class="card-number">{{ $noOfBooks??'' }}</h2></p>
                                     <p class="card-text">Total Price<h2 class="card-number">{{ $totalPrice??'' }}</h2></p>
                                </div>
                                
                            </div>
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

