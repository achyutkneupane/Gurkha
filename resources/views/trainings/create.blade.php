@extends('layouts.app')
@section('page_title', 'Create Training')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{ route('trainings.store') }}" method="POST" class="card">
                @csrf
                <div class="card-header d-flex flex-row justify-content-between align-items-center">
                    @yield('page_title')
                    <button class="btn btn-success">Save</button>
                </div>
                <div class="card-body container">
                    <div class="row">
                        <div class="col-12 d-flex flex-column gap-3">
                            <div class="form-group">
                                <label for="type">Training Type</label>
                                <select name="type" id="type" class="form-select">
                                    <option value="" selected disabled>Select a training type</option>
                                    <option value="physical" @if(old('type') == 'physical') selected @endif>Physical</option>
                                    <option value="educational"@if(old('type') == 'educational') selected @endif>Educational</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type">Training Type</label>
                                <input type="text" name="title" id="title" placeholder="Enter Training Title" value="{{ old('title') ?? NULL }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="shift">Training Shift</label>
                                <select name="shift" id="shift" class="form-select">
                                    <option value="" selected disabled>Select a training shift</option>
                                    <option value="morning" @if(old('shift') == 'morning') selected @endif>Morning</option>
                                    <option value="evening" @if(old('shift') == 'evening') selected @endif>Evening</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type">Date & Time</label>
                                <input type="datetime-local" name="for_date" id="for_date" placeholder="Enter Date & Time" value="{{ old('for_date') ?? NULL }}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection