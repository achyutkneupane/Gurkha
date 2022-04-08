@extends('layouts.app')
@section('page_title', 'Notifications')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>@yield('page_title')</span>
                        <span class='badge badge-danger bg-danger'>{{ auth()->user()->unreadNotificationsCount() }} unread notification(s)</span>
                    </div>
                </div>
                <div class="card-body">
                    @foreach($notifications as $notification)
                    <div href="{{ $notification->link }}" class="alert {{ $notification->seen_at ? 'alert-secondary' : 'alert-danger' }}" role="alert">
                        <div class="d-flex flex-column">
                            <div>{{ $notification->message }}</div>
                            <div class="d-flex flex-row gap-1 justify-content-start fw-light text-muted">
                                <span><a href="{{ $notification->link }}">Click Here</a></span>
                                <span> | </span>
                                <span>{{ $notification->created_at->diffForHumans() }}</span>
                                <span> | </span>
                                @if(!$notification->seen_at)
                                <span>
                                    <a href="{{ route('notifications.seen',$notification->id) }}">Mark as read</a>
                                </span>
                                @else
                                <span>
                                    Seen {{ \Carbon\Carbon::parse($notification->seen_at)->diffForHumans() }}
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection