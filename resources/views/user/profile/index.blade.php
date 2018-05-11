@extends('layouts.manage')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User profile</div>
                    <div class="card-body">
                        <div class="col-md-4">
                            {!! Form::open(['route' => 'user.profile.update']) !!}
                            {!! Form::text('name', Auth::user()->name, ['class' => 'form-control', 'readonly']) !!}
                            @if(Auth::user()->hasPhoneNumber())
                            {!! Form::text('phone', '+'.Auth::user()->phoneNumber->diallingCode->dialling_code.Auth::user()->phoneNumber->phone_number, ['class' => 'form-control', 'readonly']) !!}
                            @endif
                            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
