@extends('layouts.app')
@section('page_title', 'All Users')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>@yield('page_title')</span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-light table-bordered">
                        <thead class='table-dark'>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Phone No.</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
        
                        <tbody class="table-light">
                        @forelse ($users as $user)
                          <tr>
                              <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ ucwords($user->role) }}</td>
                                <td>{{ $user->phone }}</td>
                                <td class='text-right'>
                                    <a href="{{ route('profile.view',$user->id) }}" class="btn btn-primary">
                                        View
                                    </a>
                                    @if($user->id != 1)
                                    @if($user->role == 'staff' || $user->role == 'user')
                                    <a href="{{ route('users.change.role',['id'=>$user->id,'role'=>'admin']) }}" class="btn btn-primary">
                                        Change to Admin
                                    </a>
                                    @endif
                                    @if ($user->role == 'admin' || $user->role == 'user')
                                    <a href="{{ route('users.change.role',['id'=>$user->id,'role'=>'staff']) }}" class="btn btn-primary">
                                        Change to Staff
                                    </a>
                                    @endif
                                    @if($user->role == 'admin' || $user->role == 'staff')
                                    <a href="{{ route('users.change.role',['id'=>$user->id,'role'=>'user']) }}" class="btn btn-primary">
                                        Change to User
                                    </a>
                                    @endif
                                    @endif
                                    
                          </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-muted text-center">
                                    No Users registered
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection