@if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
@endif

@if(session('wrong'))
    <div class="alert alert-danger">{{session('success')}}</div>
@endif