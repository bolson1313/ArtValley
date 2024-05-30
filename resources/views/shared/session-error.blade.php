@if (session('error'))
<div class="row d-flex justify-content-center">
    <div class="alert alert-danger">xd{{ session('error') }}</div>
</div>
@endif
