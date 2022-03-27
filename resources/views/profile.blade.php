@extends('layouts.app')
@section('page_title', 'Profile')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>{{ $user->name }}</span>
                            <a href="{{ route('profile.edit') }}" class='btn btn-warning'>Edit Profile</a>
                        </div>
                    </div>
                    <div class="card-body container">
                        <div class="row align-items-center">
                            <div class="col-md-4 text-center">
                                <div class='overflow-hidden mx-auto ratio ratio-1x1 col-md-7 w-75'>
                                    <img src="{{ asset('dist/img/photo1.png') }}" class="img-thumbnail rounded-circle"
                                        style="object-fit:cover;" />
                                </div>
                                <h4 class='font-bold mt-2'>{{ $user->name }}</h4>
                                <span class='text-muted'>{{ $user->email }}</span>
                            </div>
                            <div class="col-md-8">
                                <dl class="row">
                                    <dt class="col-sm-3">Address</dt>
                                    <dd class="col-sm-9">{!! $user->address ?? "<span class='text-muted'>N/A</span>" !!}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3">Phone Number</dt>
                                    <dd class="col-sm-9">{!! $user->phone ?? "<span class='text-muted'>N/A</span>" !!}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3">Father Name</dt>
                                    <dd class="col-sm-9">{!! $user->father_name ?? "<span class='text-muted'>N/A</span>" !!}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3">Mother Name</dt>
                                    <dd class="col-sm-9">{!! $user->mother_name ?? "<span class='text-muted'>N/A</span>" !!}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3">Date of Birth</dt>
                                    <dd class="col-sm-9">{!! $user->dob ?? "<span class='text-muted'>N/A</span>" !!}</dd>
                                </dl>
                                @if ($user->see_school || $user->see_year || $user->see_gpa || $user->document_link)
                                    <h4 class='uppercase my-2'>Education Details</h4>
                                    <dl class="row">
                                        <dt class="col-sm-3">School Name</dt>
                                        <dd class="col-sm-9">{!! $user->see_school ?? "<span class='text-muted'>N/A</span>" !!}</dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-3">Passed Year</dt>
                                        <dd class="col-sm-9">{!! $user->see_year ?? "<span class='text-muted'>N/A</span>" !!}</dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-3">GPA</dt>
                                        <dd class="col-sm-9">{!! $user->see_gpa ?? "<span class='text-muted'>N/A</span>" !!}</dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-3">Document Link</dt>
                                        <dd class="col-sm-9">{!! $user->document_link ?? "<span class='text-muted'>N/A</span>" !!}</dd>
                                    </dl>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
