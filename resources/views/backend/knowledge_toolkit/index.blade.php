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
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">KnowledgeToolkit</li>
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
                            <h3 class="card-title"> <i class="fa fa-list"></i> Knowledge Toolkit List </h3>
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
                                <a class="btn btn-sm btn-primary" href="{{url('/admin/knowledge-toolkit/create')}}">Create New</a>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Content</th>
<!--                                    <th>ThumbNail</th>-->
                                    <th style="width:184px">Operation</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $index = 1;

                                ?>
                                @forelse($rows as $r)
                                <tr>
                                    <td>{{$index++}}.</td>
                                    <td>{{ $r->getCategoryName->CategoryTranslate->title??'' }}</td>
                                    <td>{{ $r->getKnowledheToolkitTranslate->title??'' }}</td>
                                    <td>{{ wordSummery($r->getKnowledheToolkitTranslate->content??'',100) }}</td>
<!--                                    <td><img src="{{ $r->getKnowledheToolkitTranslate->thumb_image??'' }}" height="30px" width="30px" /></td>-->
                                    <td >
                                        <form action="/admin/knowledge-toolkit/{{$r->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            @if($r->status)
                                            <a class="btn-sm btn-success" href="/{{app()->getLocale()}}/admin/knowledge-toolkit/{{$r->id}}?active=false">Active</a>
                                            @else
                                            <a class="btn-sm btn-warning" href="/{{app()->getLocale()}}/admin/knowledge-toolkit/{{$r->id}}?active=true">Inactive</a>
                                            @endif
                                            <a class="btn btn-sm btn-primary" href="/{{app()->getLocale()}}/admin/knowledge-toolkit/{{$r->id}}/edit"><i class="fa fa-edit "></i></a>
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
                        <div>{!! $rows->appends(\Request::except('page'))->render() !!}</div>
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
    });
</script>
@endsection

