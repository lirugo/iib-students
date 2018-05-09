{{--Check have a flash message--}}
@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        <strong>Well done!</strong> {{ Session::get('success') }}
    </div>
@endif
@if (Session::has('info'))
    <div class="alert alert-info" role="alert">
        <strong>Heads up!</strong> {{ Session::get('info') }}
    </div>
@endif
@if (Session::has('warning'))
    <div class="alert alert-warning" role="alert">
        <strong>Warning!</strong> {{ Session::get('warning') }}
    </div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            <strong>Oh snap!</strong>
            @foreach($errors as $error)
                <li> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif