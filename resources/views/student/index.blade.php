@extends('layouts.app')
@section('page_title', 'Students')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Students</span>
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
                            <th scope="col">Phone No.</th>
                            <th scope="col">Form Filled</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
        
                        <tbody class="table-light">
                        @forelse ($students as $student)
                          <tr>
                              <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->address }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->isFilled() ? "Yes" : "No" }}</td>
                                <td class='text-right'>
                                    <a href="{{ route('profile.view',$student->id) }}" class="btn btn-primary">
                                        View
                                    </a>
                                    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'staff')
                                        <a href="{{ route('profile.edit',$student->id) }}" class="btn btn-warning">
                                            Edit
                                        </a>
                                        <a href="{{ route('profile.delete',['from' => 'students', 'id' => $student->id]) }}" class="btn btn-danger">
                                            Delete
                                        </a>
                                    @endif
                          </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-muted text-center">
                                    No Student registered
                                </td>
                            </tr>
                        @endforelse
                            <tr class="text-center">
                                <td colspan="8">
                                    + <a href="{{ route('students.create') }}" class="link-dark">Create Student</a>
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