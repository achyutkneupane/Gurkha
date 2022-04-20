@extends('layouts.app')
@section('page_title', 'Trainings')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex flex-row justify-content-between align-items-center">
                    @yield('page_title')
                    <a class="btn btn-primary" href="{{ route('trainings.create') }}">Create</a>
                </div>
                <div class="card-body container">
                    <div class="d-flex flex-column gap-2">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="d-flex flex-row gap-2">
                                <form action={{ route('trainings.list') }} method="POST">
                                    @csrf
                                    <input type="hidden" name="type" value="all">
                                    <input type="hidden" name="shift" value="{{ $shift }}">
                                    <button class="btn @if($type == 'all') btn-primary @else btn-outline-primary @endif">
                                        All
                                    </button>
                                </form>
                                <form action={{ route('trainings.list') }} method="POST">
                                    @csrf
                                    <input type="hidden" name="type" value="physical">
                                    <input type="hidden" name="shift" value="{{ $shift }}">
                                    <button class="btn @if($type == 'physical') btn-primary @else btn-outline-primary @endif">
                                        Physical
                                    </button>
                                </form>
                                <form action={{ route('trainings.list') }} method="POST">
                                    @csrf
                                    <input type="hidden" name="type" value="educational">
                                    <input type="hidden" name="shift" value="{{ $shift }}">
                                    <button class="btn @if($type == 'educational') btn-primary @else btn-outline-primary @endif">
                                        Educational
                                    </button>
                                </form>
                            </div>
                            <div class="d-flex flex-row gap-2">
                                <form action={{ route('trainings.list') }} method="POST">
                                    @csrf
                                    <input type="hidden" name="shift" value="all">
                                    <input type="hidden" name="type" value="{{ $type }}">
                                    <button class="btn @if($shift == 'all') btn-primary @else btn-outline-primary @endif">
                                        All
                                    </button>
                                </form>
                                <form action={{ route('trainings.list') }} method="POST">
                                    @csrf
                                    <input type="hidden" name="shift" value="morning">
                                    <input type="hidden" name="type" value="{{ $type }}">
                                    <button class="btn @if($shift == 'morning') btn-primary @else btn-outline-primary @endif">
                                        Morning
                                    </button>
                                </form>
                                <form action={{ route('trainings.list') }} method="POST">
                                    @csrf
                                    <input type="hidden" name="shift" value="evening">
                                    <input type="hidden" name="type" value="{{ $type }}">
                                    <button class="btn @if($shift == 'evening') btn-primary @else btn-outline-primary @endif">
                                        Evening
                                    </button>
                                </form>
                            </div>
                        </div>
                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="row">#</th>
                                    <th scope="row">Title</th>
                                    <th scope="row">Type</th>
                                    <th scope="row">Shift</th>
                                    <th scope="row">Date</th>
                                    <th scope="row">Status</th>
                                    <th scope="row">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($trainings as $training)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $training->title }}</td>
                                        <td>{{ ucwords($training->type) }}</td>
                                        <td>{{ ucwords($training->shift) }}</td>
                                        <td>{{ $training->for_date }}</td>
                                        <td>{!! $training->completed ? "<span class='badge bg-success'>Completed</span>" : "<span class='badge bg-warning text-dark'>Not Completed</span>" !!}</td>
                                        <td>
                                            <a href="{{ route('trainings.show',$training) }}" class="btn btn-primary">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="6">No Trainings created</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection