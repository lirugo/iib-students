<?php

namespace App\Http\Controllers\Chat;

use App\Events\MessagePosted;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * ChatController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('chat.index');
    }

    public function create(Request $request){
        $user = Auth::user();
        // Persist to db
        $message = $user->messages()->create([
            'message' => $request->message
        ]);
        // Announce new message
        broadcast(new MessagePosted($message, $user))->toOthers();
        // Return
        return ['status' => 'OK'];
    }

    public function getMessages(){
        return Message::with('user')->get();
    }

    public function getUsers(){
        //Get users
        $users = User::all();

        //Add to user last message
        foreach($users as $user)
            $user->lastMessage = $user->lastMessage();

        //Return users
        return $users;
    }
}
