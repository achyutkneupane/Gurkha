@extends('layouts.app')
@section('page_title', 'Edit Profile')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('profile.edit.submit',$user->id) }}" class="card" enctype="multipart/form-data">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>{{ $user->name }}</span>
                        <button class='btn btn-success'>Save</button>
                    </div>
                </div>
                <div class="card-body container">
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center">
                            <div class='overflow-hidden mx-auto ratio ratio-1x1 col-md-7 w-75'>
                                <img src="{{ $user->profile_picture ? $profile : 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png' }}" class="img-thumbnail rounded-circle" id="profilePicture"
                                        style="object-fit:cover;" />
                            </div>
                            <div class="mt-4">
                                <input type="file" hidden id="profile_picture" name="profile_picture" value="{{ old('profile_picture',$user->profile_picture) }}"
                                        class="form-control @error('profile_picture') is-invalid @enderror" 
                                        onchange="document.getElementById('profilePicture').src = window.URL.createObjectURL(this.files[0])" />
                                <input type="button" class='btn btn-primary' id="profile_picture_file" name="profile_picture_file" value="Change" onclick="document.getElementById('profile_picture').click()">
                                @error('profile_picture')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            {{ csrf_field() }}
                            <dl class="row align-items-center">
                                <dt class="col-sm-3">Full Name</dt>
                                <dd class="col-sm-9 row">
                                    <div class='col-md-12'>
                                        <input type="text" name="name" value="{{ old('name',$user->name) }}"
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
                                        <input type="text" name="address" value="{{ old('address',$user->address) }}"
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
                                        <input type="text" name="phone" value="{{ old('phone',$user->phone) }}"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="Phone Number" />
                                        @error('phone')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </dd>
                            </dl>
                            <dl class="row align-items-center">
                                <dt class="col-sm-3">Father's Name</dt>
                                <dd class="col-sm-9 row">
                                    <div class='col-md-12'>
                                        <input type="text" name="father_name" value="{{ old('father_name',$user->father_name) }}"
                                            class="form-control @error('father_name') is-invalid @enderror"
                                            placeholder="Father's Name" />
                                        @error('father_name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </dd>
                            </dl>
                            <dl class="row align-items-center">
                                <dt class="col-sm-3">Mother's Name</dt>
                                <dd class="col-sm-9 row">
                                    <div class='col-md-12'>
                                        <input type="text" name="mother_name" value="{{ old('mother_name',$user->mother_name) }}"
                                            class="form-control @error('mother_name') is-invalid @enderror"
                                            placeholder="Mother's Name" />
                                        @error('mother_name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </dd>
                            </dl>
                            <dl class="row align-items-center dob-form">
                                <dt class="col-sm-3">Date of Birth</dt>
                                <dd class="col-sm-9 row">
                                    <div class='col-md-12'>
                                        <input name='dob' id="datepicker" name="dob" value="{{ \Carbon\Carbon::parse(old('dob',$user->dob))->format('m/d/Y') }}"
                                            placeholder="MM/DD/YYY" type="date"
                                            class="form-control @error('dob') is-invalid @enderror" />
                                        @error('dob')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </dd>
                            </dl>
                            <h4 class='uppercase my-2'>Education Details</h4>
                            <dl class="row align-items-center">
                                <dt class="col-sm-3">School Name</dt>
                                <dd class="col-sm-9 row">
                                    <div class='col-md-12'>
                                        <input type="text" name="see_school" value="{{ old('see_school',$user->see_school) }}"
                                            class="form-control @error('see_school') is-invalid @enderror"
                                            placeholder="School Name" />
                                        @error('see_school')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </dd>
                            </dl>
                            <dl class="row align-items-center">
                                <dt class="col-sm-3">Passed Year</dt>
                                <dd class="col-sm-9 row">
                                    <div class='col-md-12'>
                                        <input type="text" name="see_year" value="{{ old('see_year',$user->see_year) }}"
                                            class="form-control @error('see_year') is-invalid @enderror"
                                            placeholder="Passed Year" />
                                        @error('see_year')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </dd>
                            </dl>
                            <dl class="row align-items-center">
                                <dt class="col-sm-3">GPA</dt>
                                <dd class="col-sm-9 row">
                                    <div class='col-md-12'>
                                        <input type="text" name="see_gpa" value="{{ old('see_gpa',$user->see_gpa) }}"
                                            class="form-control @error('see_gpa') is-invalid @enderror"
                                            placeholder="GPA" />
                                        @error('see_gpa')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </dd>
                            </dl>
                            <dl class="row align-items-center">
                                <dt class="col-sm-3">Document Link</dt>
                                <dd class="col-sm-9 row">
                                    @if($user->document_link)
                                    <div class="col-md-12">
                                        <a href="{{ $document }}" target="_blank"
                                            class="">View Document</a>
                                    </div>
                                    @endif
                                    <div class='col-md-12'>
                                        <input type="file" name="document_link" value="{{ $user->document_link }}"
                                            class="form-control @error('document_link') is-invalid @enderror" />
                                        @error('document_link')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection