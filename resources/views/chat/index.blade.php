@extends('layouts.manage')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Chat with - John Doe
                        <span class="badge badge-secondary pull-right">@{{ usersInRoom.length }}</span>
                    </div>
                   <chat-log :messages="messages"></chat-log>
                   <chat-composer v-on:messagesent="addMessage" user="{{ Auth::user() }}"></chat-composer>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">User list</div>
                    <div class="card-body">
                        <img width="75px" style="position: relative; margin-right: 15px;"
                            src="https://cdn.iconscout.com/public/images/icon/free/png-512/avatar-user-hacker-3830b32ad9e0802c-512x512.png"/>
                        <span class="m-b-5"> John Doe</span>
                        <small class="pull-right">12-12-2018 10:33</small>
                    </div>
                     <div class="card-body" style="background: #ccc;">
                        <img width="75px" style="position: relative; margin-right: 15px;"
                            src="https://cdn.iconscout.com/public/images/icon/free/png-512/avatar-user-hacker-3830b32ad9e0802c-512x512.png"/>
                        <span class="m-b-5"> John Doe</span>
                        <small class="pull-right">12-12-2018 10:33</small>
                    </div>
                     <div class="card-body">
                        <img width="75px" style="position: relative; margin-right: 15px;"
                            src="https://cdn.iconscout.com/public/images/icon/free/png-512/avatar-user-hacker-3830b32ad9e0802c-512x512.png"/>
                        <span class="m-b-5"> John Doe</span>
                        <small class="pull-right">12-12-2018 10:33</small>
                    </div>
                     <div class="card-body" style="background: #ccc;">
                        <img width="75px" style="position: relative; margin-right: 15px;"
                            src="https://cdn.iconscout.com/public/images/icon/free/png-512/avatar-user-hacker-3830b32ad9e0802c-512x512.png"/>
                        <span class="m-b-5"> John Doe</span>
                        <small class="pull-right">12-12-2018 10:33</small>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
