@extends('layouts.app')
@section('page_title', 'Create News')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('news.create.submit') }}" class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Create News</span>
                        <div>
                            <a href="{{ route('news.index') }}" class='btn btn-warning'>Back</a>
                            <button class='btn btn-success'>Save</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" aria-describedby="titleHelp">
                        @error('title')
                        <div id="titleHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea type="text" class="form-control @error('content') is-invalid @enderror" name="content" id="content" aria-describedby="contentHelp" rows="5"></textarea>
                        @error('content')
                        <div id="contentHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection