@extends('layouts.app')
@section('page_title', "Messages")

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    {{ $endUser->name }}
                </div>
                <div class="card-body container">
                    <div class="d-flex flex-column gap-2">
                        @forelse($chats as $chat)
                            <a class="@if($endUser->id == $chat->id) bg-primary text-white @else bg-light border border-2 border-black text-black @endif p-2 rounded-3" href="{{ route('chats.show',$chat->id) }}">
                                <div class="h5">
                                    {{ $chat->name }}
                                </div>
                            </a>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    {{ $endUser->name }}
                </div>
                <div class="card-body container">
                    <div class="d-flex flex-column gap-2">
                        <div class="container mb-4">
                            <form action="{{ route('chats.create') }}" method="POST" class="row">
                                @csrf
                                <div class="col-md-10">
                                    <input type="hidden" name="to_user_id" value="{{ $endUser->id }}">
                                    <textarea name="message" id="message" rows="2" class="form-control" placeholder="Enter Message"></textarea>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary w-100 h-100">
                                        Send
                                    </button>
                                </div>
                            </form>
                        </div>
                        @forelse ($messages as $message)
                            @if($message->sender == $endUser)
                            <div class="d-flex flex-row justify-content-start">
                                <div class="bg-primary text-white p-2 rounded-3 w-75">
                                    <div class="h6">
                                        {{ $message->message }}
                                    </div>
                                    <div class="text-light">
                                        {{ $message->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="d-flex flex-row justify-content-end">
                                <div class="bg-light border border-2 border-black text-black p-2 rounded-3 w-75">
                                    <div class="h6">
                                        {{ $message->message }}
                                    </div>
                                    <div class="text-muted">
                                        {{ $message->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                            @endif
                        @empty
                            
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection