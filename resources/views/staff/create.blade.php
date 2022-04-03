@extends('layouts.app')
@section('page_title', 'Staffs')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form method="POST" action="{{ route('staffs.create.submit') }}" class="card" enctype="multipart/form-data">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Add Staff</span>
                        <button class='btn btn-success'>Add</button>
                    </div>
                </div>
                <div class="card-body row justify-content-center">
                    <div class="col-md-8">
                        {{ csrf_field() }}
                        <dl class="row align-items-center">
                            <dt class="col-sm-3">Full Name</dt>
                            <dd class="col-sm-9 row">
                                <div class='col-md-12'>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Full Name" />
                                    @error('name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </dd>
                        </dl>
                        <dl class="row align-items-center">
                            <dt class="col-sm-3">Address</dt>
                            <dd class="col-sm-9 row">
                                <div class='col-md-12'>
                                    <input type="text" name="address" value="{{ old('address') }}"
                                        class="form-control @error('address') is-invalid @enderror"
                                        placeholder="Full Address" />
                                    @error('address')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </dd>
                        </dl>
                        <dl class="row align-items-center">
                            <dt class="col-sm-3">Phone Number</dt>
                            <dd class="col-sm-9 row">
                                <div class='col-md-12'>
                                    <input type="text" name="phone" value="{{ old('phone') }}"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        placeholder="Phone Number" />
                                    @error('phone')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </dd>
                        </dl>
                        <dl class="row align-items-center">
                            <dt class="col-sm-3">Email Address</dt>
                            <dd class="col-sm-9 row">
                                <div class='col-md-12'>
                                    <input type="text" name="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Email Address" />
                                    @error('email')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </dd>
                        </dl>
                        <dl class="row align-items-center">
                            <dt class="col-sm-3">Password</dt>
                            <dd class="col-sm-9 row">
                                <div class='col-md-12'>
                                    <input type="password" name="password" value="{{ old('password','Password123') }}"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Password" />
                                    <small class="form-text text-muted">Default: Password123</small>
                                    @error('password')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection