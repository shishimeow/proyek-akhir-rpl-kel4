@if(session()->has('updateCom'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('updateCom') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session()->has('deleteCom'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('deleteCom') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif