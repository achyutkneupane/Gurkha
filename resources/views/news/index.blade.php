@extends('layouts.app')
@section('page_title', 'News')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-light table-bordered">
                <thead class='table-dark'>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>

                <tbody class="table-light">
                @forelse ($updates as $update)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <a href="{{ route('news.show',$update->id) }}" class="link-dark">
                            {{ $update->title }}
                        </a>
                    </td>
                    <td>{{ \Illuminate\Support\Str::words(strip_tags($update->content),6,'...') }}</td>
                    <td class='text-right'>
                        <a href="{{ route('news.show',$update->id) }}" class="btn btn-primary">
                            View
                        </a>
                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'staff')
                            <a href="{{ route('news.edit',$update->id) }}" class="btn btn-warning">
                                Edit
                            </a>
                            <a href="{{ route('news.delete',$update->id) }}" class="btn btn-danger">
                                Delete
                            </a>
                        @endif
                    </td>
                  </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-muted text-center">
                            No News here
                        </td>
                    </tr>
                @endforelse
                    <tr class="text-center">
                        <td colspan="4">
                            + <a href="{{ route('news.create') }}" class="link-dark">Create News</a>
                        </td>
                    </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection