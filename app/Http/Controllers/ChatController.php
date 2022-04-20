<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessagesHistoryRequest;
use App\Http\Requests\NewMessageRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index() {
        $chats = auth()->user()->allChats();
        return view('chat.index', compact('chats'));
    }
    public function show($id) {
        $authUser = auth()->user();
        $endUser = User::find($id);
        $chats = auth()->user()->allChats();
        $messages = $authUser->chatsWith($endUser->id)->orderBy('created_at', 'desc')->take(15)->get();
        return view('chat.show', compact('messages', 'chats', 'endUser'));
    }
    public function create(NewMessageRequest $request) {
        $authUser = auth()->user();
        $authUser->chatsSent()->create([
            'to_user_id' => $request->to_user_id,
            'message' => $request->message
        ]);
        return redirect()->back();
    }
}
