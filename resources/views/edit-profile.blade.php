@extends('layouts.app')
@section('page_title', 'Edit Profile')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('profile.edit.submit') }}" class="card">
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
                                <img src="{{ asset('dist/img/photo1.png') }}" class="img-thumbnail rounded-circle"
                                    style="object-fit:cover;" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            {{ csrf_field() }}
                            <dl class="row align-items-center">
                                <dt class="col-sm-3">Full Name</dt>
                                <dd class="col-sm-9 row">
                                    <div class='col-md-12'>
                                        <input type="text" name="name" value="{{ $user->name }}"
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
                                        <input type="text" name="address" value="{{ $user->address }}"
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
                                        <input type="number" name="phone" value="{{ $user->phone }}"
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
                                        <input type="text" name="father_name" value="{{ $user->father_name }}"
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
                                        <input type="text" name="mother_name" value="{{ $user->mother_name }}"
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
                                        <input name='dob' id="datepicker" name="dob" value="{{ \Carbon\Carbon::parse($user->dob)->format('m/d/Y') }}"
                                            placeholder="MM/DD/YYY" type="text"
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
                                        <input type="text" name="see_school" value="{{ $user->see_school }}"
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
                                        <input type="number" name="see_year" value="{{ $user->see_year }}"
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
                                        <input type="number" name="see_gpa" value="{{ $user->see_gpa }}"
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

@push('styles')
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>
    $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
</script>
@endpush