@extends('layouts.app')

@section('content')
    <div class="row justify-content-center m-t-50">
        <div class="col-md-5">
            <div class="card"  style="
            height:500px;
            z-index: 1;
        ">
                <div class="card-body" style="
                    padding: 0;
                    margin: 0;
                ">
                        <div id="carousel" class="carousel slide carousel-fade d-inline-block" data-ride="carousel">
                            <!-- Индикаторы -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel" data-slide-to="1"></li>
                                <li data-target="#carousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="img-fluid" src="https://az616578.vo.msecnd.net/files/2017/03/19/636255628733469277-1251803614_Mortar-boards-cloud-education-600x600.jpg" alt="...">
                                    <div class="carousel-caption">
                                        <h3>Los Angelesdas</h3>
                                        <p>LA is always so much fun!</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="img-fluid" src="http://www.avatarmovie.com/assets/backgrounds/avtr-he-bg-03.jpg" alt="...">
                                    <div class="carousel-caption">
                                        <h3>Los Angeles</h3>
                                        <p>LA is always so much fun!</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="img-fluid" src="http://www.avatarmovie.com/assets/backgrounds/avtr-he-bg-03.jpg" alt="...">
                                    <div class="carousel-caption">
                                        <h3>Los Angeles</h3>
                                        <p>LA is always so much fun!</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Элементы управления -->
                            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Предыдущий</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Следующий</span>
                            </a>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="
            height:400px;
            margin-top:50px;
            margin-left:-50px;
        ">
                <div class="card-body m-l-50 m-r-30">
                    <img src="/img/icon/incognito.png" class="center"/>
                    <p class="text-center">{{__('app.Who are you?')}}</p>
                    {!! Form::open() !!}
                    {!! Form::text('email', null, ['class' => 'form-control m-t-35', 'placeholder' => 'Enter your E-mail' ]) !!}
                    {!! Form::password('password', ['class' => 'form-control m-t-15', 'placeholder' => 'Enter your password' ]) !!}
                    {!! Form::submit('login', ['class' => 'btn btn-default pull-right m-t-15']) !!}
                    {!! Form::close() !!}

                    <div style="position:absolute; bottom: 15px; width: auto" class="pull-right">
                        <small>
                        {{__('app.Forgot Your Password?')}}
                        <br/>
                        {{__('app.Contact your manager.')}}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')


@endsection
