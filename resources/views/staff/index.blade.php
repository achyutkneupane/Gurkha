@extends('layouts.app')
@section('page_title', 'Staffs')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Staffs</span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-light table-bordered">
                        <thead class='table-dark'>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
        
                        <tbody class="table-light">
                        @forelse ($staffs as $staff)
                          <tr>
                              <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $staff->name }}</td>
                                <td>{{ $staff->email }}</td>
                                <td>{{ $staff->address }}</td>
                                <td class='text-right'>
                                    <a href="{{ route('profile.view',$staff->id) }}" class="btn btn-primary">
                                        View
                                    </a>
                                    @if (Auth::user()->role == 'admin')
                                        <a href="{{ route('staffs.edit',$staff->id) }}" class="btn btn-warning">
                                            Edit
                                        </a>
                                        <a href="{{ route('staffs.delete',$staff->id) }}" class="btn btn-danger">
                                            Delete
                                        </a>
                                    @endif
                          </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-muted text-center">
                                    No Staffs registered
                                </td>
                            </tr>
                        @endforelse
                            <tr class="text-center">
                                <td colspan="5">
                                    + <a href="{{ route('staffs.create') }}" class="link-dark">Create Staff</a>
                                </td>
                            </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection