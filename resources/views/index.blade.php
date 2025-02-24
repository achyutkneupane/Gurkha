@extends('layouts.app')
@section('page_title', 'Home Page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Welcome to {{ env('APP_NAME') }}
                </div>
                <div class="card-body">
                    <p>
                        You are logged in as <b>{{ Str::upper($user->role) }}</b>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection