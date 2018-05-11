@extends('layouts.manage')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class="tile"> Manage Users</a>
                        <a href="{{route('users.create')}}" class="btn btn-success btn-sm pull-right"><i class="fa fa-user"></i> Create user</a>
                   </div>
                </div>
            </div>
        </div>
        <div class="row m-t-10">
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="https://www.w3schools.com/bootstrap4/img_avatar1.png" width="100px">
                    <div class="card-body">
                        <h4 class="card-title">Benjamin Franklin</h4>
                        <p class="card-text">
                            Benjamin Franklin FRS FRSE (January 17, 1706 [O.S. January 6, 1705][1] – April 17, 1790)
                            was an American polymath and one of the Founding Fathers of the United States...
                        </p>
                        <a href="#" class="btn btn-primary btn-sm pull-right">See Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="https://www.w3schools.com/bootstrap4/img_avatar5.png" width="100px">
                    <div class="card-body">
                        <h4 class="card-title">Benjamin Franklin</h4>
                        <p class="card-text">
                            Benjamin Franklin FRS FRSE (January 17, 1706 [O.S. January 6, 1705][1] – April 17, 1790)
                            was an American polymath and one of the Founding Fathers of the United States...
                        </p>
                        <a href="#" class="btn btn-primary btn-sm pull-right">See Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="https://www.w3schools.com/bootstrap4/img_avatar2.png" width="100px">
                    <div class="card-body">
                        <h4 class="card-title">Benjamin Franklin</h4>
                        <p class="card-text">
                            Benjamin Franklin FRS FRSE (January 17, 1706 [O.S. January 6, 1705][1] – April 17, 1790)
                            was an American polymath and one of the Founding Fathers of the United States...
                        </p>
                        <a href="#" class="btn btn-primary btn-sm pull-right">See Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
