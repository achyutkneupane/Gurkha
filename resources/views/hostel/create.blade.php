@extends('layouts.app')
@section('page_title', 'Create Slots')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="card" action="{{ route('hostel.store') }}" method="POST">
                @csrf
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>@yield('page_title')</span>
                        <button class="btn btn-success">Save</button>
                    </div>
                </div>
                <div class="card-body d-flex flex-column gap-2">
                    <div class="form-group">
                        <label for="from_date">From Date</label>
                        <input type="date" class="form-control" id="from_date" placeholder="From Date" value="{{ old('from_date') }}" name="from_date">
                        @error('from_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="to_date">To Date</label>
                        <input type="date" class="form-control" id="to_date" placeholder="To Date" value="{{ old('to_date') }}" name="to_date">
                        @error('to_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="form_close_date">Form Close</label>
                        <input type="datetime-local" class="form-control" id="form_close_time" placeholder="Form Close" value="{{ old('form_close_time') }}" name="form_close_time">
                        @error('form_close_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="capacity">Capacity</label>
                        <input type="number" class="form-control" id="capacity" placeholder="Capacity" value="{{ old('capacity') }}" name="capacity">
                        @error('capacity')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection