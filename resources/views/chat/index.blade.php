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
                <div class="card card-primary">
                    <div class="card-header">User list</div>
                </div>
                <users-list :users="users"></users-list>
            </div>
        </div>
    </div>
@endsection
