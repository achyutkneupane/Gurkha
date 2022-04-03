@extends('layouts.app')
@section('page_title', 'Edit News')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>{{ $update->title }}</span>
                        <div>
                            <a href="{{ route('news.index') }}" class='btn btn-warning'>All News</a>
                            @if(auth()->user()->role == 'admin' || auth()->user()->role == 'staff')
                            <a href="{{ route('news.edit',$update->id) }}" class='btn btn-success'>Edit</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h5 class='text-bold'>Title</h5>
                        <div>
                            {{ $update->title }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <h5 class='text-bold'>Content</h5>
                        <div>
                            {!! $update->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection