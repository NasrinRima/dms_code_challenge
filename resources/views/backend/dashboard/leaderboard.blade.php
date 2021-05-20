<!--<link href="{{ asset('/css/select2.min.css') }}" rel="stylesheet">-->
<style>
   ul li {
        color: black !important;
    }
    ul li:hover {
        color: black;
    }
</style>
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
                <div class="col-sm-6">
                    @include('common.msg')
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Leaderboard Analysis</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> <i class="fa fa-list"></i> Quiz Leaderboard </h3>
                            <form action="" class="form-horizontal" role="form" method="get">
                                <input type="hidden" name="search" value="1">
                                @if(app('request')->input('q'))
                                <input type="hidden" name="q" value="{{app('request')->input('q')}}">
                                @endif
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Write your name here" value="{{ old('name',request()->get('name')) }}" >

                                    </div>
                                    <div class="col-md-6 category">
                                        <select class="form-control" name="category_id"  id="cat_id">
                                            <option value="">Select Level</option>
                                            @foreach($categories as $cat)
                                            <option value="{{ $cat->id}}"  @if(request()->get('category_id')==$cat->id) selected @endif>{{ $cat->CategoryTranslate->title??'' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- <label class="col-1 control-label">Start Date </label> -->
                                    <div class="col-6">
                                        <input id="start_date" type="" class="form-control {{ $errors->has('start_date') ? ' is-invalid' : '' }}" name="start_date" value="{{ old('start_date',request()->get('start_date')) }}" placeholder="Start Date"   autocomplete="off">
                                    </div>
                                    <!-- <label class="col-1">End Date </label> -->
                                    <div class="col-5">
                                        <input id="end_date" type="" class="form-control {{ $errors->has('end_date') ? ' is-invalid' : '' }}" name="end_date" value="{{ old('end_date',request()->get('end_date')) }}" placeholder="End Date"   autocomplete="off">
                                    </div>

                                    <div class="col-md-1" style="float: right;">
                                        <button type="submit" class="btn btn-primary">
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Level Name</th>
                                    <th>Total Score</th>
                                    <th>Total Played Times</th>
                                    <th>Position</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $index = 1;

                                ?>
                                @foreach($data as $d)
                                <tr class="clickable" style="cursor: pointer;" data-toggle="tooltip" title="Click For Details" onclick="window.location='/admin/get-individual-score/{{ $d->user_id }}'">
                                    <td>{{ $d->full_name??'' }}</td>
                                    <td>{{ $d->level??'' }}</td>
                                    <td>{{ $d->total_score??'' }}</td>
                                    <td>{{ $d->total_played_times??'' }}</td>
                                    <td>{{ $d->position??'' }}</td>
                                </tr>
                                @endforeach
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
@section('scripts')
@parent
<!-- jQuery 3 -->

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/js/select2.js') }}"></script>

<!--<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>-->

<script>
    $(function () {


        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false
        });
    });
</script>
<script>
    $('#start_date').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yy-mm-dd'
    });
    $('#end_date').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yy-mm-dd'

    });
    $(document).ready(function(){
        $("#cat_id").select2();
    });
</script>
@endsection

