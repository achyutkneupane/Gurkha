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
                    @if(!$training->completed)<a class="btn btn-primary" href="{{ route('trainings.attendance',$training) }}">Take Attendance</a>@endif
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
                        @if($training->completed)
                        <hr />
                        <div class="col-md-12">
                            <h5>Attendance</h5>
                            @foreach($training->attendance as $attendance)
                            <div class="border p-2 d-flex flex-row justify-content-between align-items-center">
                                <div>
                                    {{ $attendance->user->name }}
                                </div>
                                <div>
                                    {!! $attendance->attended ? "<span class='badge bg-success'>Present</span>" : "<span class='badge bg-danger'>Absent</span>" !!}
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection