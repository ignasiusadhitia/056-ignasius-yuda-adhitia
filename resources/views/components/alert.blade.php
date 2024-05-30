@if (session('success'))
    <div id="success-alert" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div id="error-alert" class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
