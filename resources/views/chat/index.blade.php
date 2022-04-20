@extends('layouts.app')
@section('page_title', 'All Chats')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    @yield('page_title')
                </div>
                <div class="card-body container">
                    <div class="d-flex flex-column gap-2">
                        @forelse($chats as $chat)
                            <a class="bg-primary text-white p-2 rounded-3" href="{{ route('chats.show',$chat->id) }}">
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
    </div>
</div>
@endsection