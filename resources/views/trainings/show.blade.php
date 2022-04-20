@extends('layouts.app')
@section('page_title', $training->title)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @csrf
                <div class="card-header d-flex flex-row justify-content-between align-items-center">
                    @yield('page_title')
                    <a class="btn btn-primary" href="{{ route('trainings.attendance',$training) }}">Take Attendance</a>
                </div>
                <div class="card-body container">
                    <div class="row">
                        <div class="col-12 d-flex flex-column">
                            <dl class="row">
                                <dt class="col-sm-3">Title</dt>
                                <dd class="col-sm-9">{!! $training->title ?? "<span class='text-muted'>N/A</span>" !!}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3">Date & Time</dt>
                                <dd class="col-sm-9">{!! $training->for_date ?? "<span class='text-muted'>N/A</span>" !!}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3">Type</dt>
                                <dd class="col-sm-9">{!! $training->type ? ucwords($training->type) : "<span class='text-muted'>N/A</span>" !!}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3">Shift</dt>
                                <dd class="col-sm-9">{!! $training->shift ? ucwords($training->shift) : "<span class='text-muted'>N/A</span>" !!}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3">Status</dt>
                                <dd class="col-sm-9">{!! $training->completed ? "<span class='badge bg-success'>Completed</span>" : "<span class='badge bg-warning text-dark'>Not Completed</span>" !!}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection