@if (session()->has('message') || session()->has('status'))
    <div class="alert alert-success">{{ session()->get('message') }}</div>
@endif

@if ($errors->count() > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
@endif

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show text-success mt-2" role="alert">
    <span class="text-msg" style="color: #ffffff !important">
    <strong><i class="icon fa fa-check"></i> Congratulations!</strong> {{session('success')}}</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session('warning'))
<div class="alert alert-warning alert-dismissible fade show text-warning mt-2" role="alert">
    <strong><i class="icon fa fa-warning"></i> Warning! </strong> {{session('warning')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show text-danger mt-2" role="alert">
    <strong><i class="icon fa fa-ban"></i> Error! </strong> {{session('error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

