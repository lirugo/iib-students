@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('app.Two factor authentication')}}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/auth/token') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="token" class="col-sm-4 col-form-label text-md-right">{{ __('app.Enter your token') }}</label>

                                <div class="col-md-6">
                                    <input id="token" type="number" class="form-control{{ $errors->has('token') ? ' is-invalid' : '' }}" name="token" value="{{ old('token') }}" required autofocus>
                                    @if ($errors->has('token'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('token') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Verify') }}
                                    </button>

                                    @if(request()->session()->get('authy.using_sms'))
                                        <hr>
                                        <p class="help-block">{{__('app.Token not arrived?')}} <a href="{{ url('/auth/token/resend') }}">{{__('app.Resend token')}}</a></p>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
