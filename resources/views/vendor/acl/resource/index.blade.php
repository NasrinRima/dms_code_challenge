{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

{{-- Dashboard 1 --}}
@parent
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!--                <h1>DataTables</h1>-->
                    @include('common.msg')
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User List </h3>
<!--                            <span class="float-right btn-default">-->
<!--                                <a href="{{url('/role/create')}}">-->
<!--                                    <i class="nav-icon">Resource Create</i>-->
<!--                                </a>-->
<!--                            </span>-->
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
                                <a class="btn btn-sm btn-primary" href="{{url('/resource/create')}}">Create New</a>
                                <a class="btn btn-sm btn-success" href="/rearrange-resource">Re-Generate Resource</a>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Controller</th>
                            <th>Action</th>
                            <th style="width:130px">Operation</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $index = 1;

                        ?>
                        @forelse($rows as $r)
                            <tr>
                                <td>{{$index++}}.</td>
                                <td>{{ $r->name }}</td>
                                <td>{{ $r->controller }}</td>
                                <td>{{ $r->action }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{url('/resource/edit',['id' => $r->resource_id ])}}">Edit</a>
                                    <a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')" href="{{url('/resource/destroy',['id' => $r->resource_id ])}}">Delete</a>
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
@section('script')
@parent
<!-- jQuery 3 -->

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!--<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>-->

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false
        });
//        $('#example2').DataTable({
//            "paging": true,
//            "lengthChange": false,
//            "searching": false,
//            "ordering": true,
//            "info": true,
//            "autoWidth": false,
//            "responsive": true,
//        });
    });
</script>
@endsection

