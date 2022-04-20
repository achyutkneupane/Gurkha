@extends('layouts.app')
@section('page_title', "Attendance for ".$training->title)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('trainings.attendance.store') }}" method="POST" class="card">
                @csrf
                <div class="card-header d-flex flex-row justify-content-between align-items-center">
                    @yield('page_title')
                    <button class="btn btn-success">Save</button>
                </div>
                <div class="card-body container">
                    <div class="row">
                        <div class="col-12 d-flex flex-column gap-1">
                            @forelse($students as $student)
                            <div class="border p-2 d-flex flex-row justify-content-between align-items-center">
                                <div>
                                    {{ $student->name }}
                                </div>
                                <div>
                                    <input type="radio" class="btn-check" name="student-{{ $student->id }}" id="student-{{ $student->id }}-present" autocomplete="off" value="present">
                                    <label class="btn btn-outline-success" for="student-{{ $student->id }}-present">Present</label>

                                    <input type="radio" class="btn-check" name="student-{{ $student->id }}" id="student-{{ $student->id }}-absent" autocomplete="off" value="absent">
                                    <label class="btn btn-outline-danger" for="student-{{ $student->id }}-absent">Absent</label>
                                </div>
                            </div>
                            @empty
                            <div class="text-center">No Students</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection