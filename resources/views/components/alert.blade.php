@if($errors->any())
<div class="alert alert-danger">
 <i class="fas fa-exclamation-circle fa-fw mr-2"></i> {{ $errors->first() }}
</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        <i class="fas fa-exclamation-circle fa-fw mr-2"></i> {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle fa-fw mr-2"></i> {{ session('success') }}
    </div>
@endif
