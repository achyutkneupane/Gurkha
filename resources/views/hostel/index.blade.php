@extends('layouts.app')
@section('page_title', 'Hostel Slots')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>@yield('page_title')</span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-light table-bordered">
                        <thead class='table-dark'>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">From Date</th>
                            <th scope="col">To Date</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Form Close Date</th>
                            <th scope="col">Capacity</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
        
                        <tbody class="table-light">
                        @forelse ($hostels as $slot)
                          <tr>
                              <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $slot->from_date }}</td>
                                <td>{{ $slot->to_date }}</td>
                                <td>{{ \Carbon\Carbon::parse($slot->from_date)->diffInDays($slot->to_date) }} days</td>
                                <td>{{ $slot->form_close_time }}</td>
                                <td>{{ $slot->capacity }} ({{ $slot->bookings_count }} booked)</td>
                                <td class="text-center">{!! $slot->open ? "<span class='badge bg-success'>Open</span>" : "<span class='badge bg-danger'>Closed</span>" !!}</td>
                                <td class='text-end'>
                                    @if (auth()->user()->role == 'admin' && auth()->user()->role != 'staff')
                                    <a href="{{ route('hostel.show',$slot->id) }}" class="btn btn-primary">
                                        View
                                    </a>
                                    @if($slot->open)
                                        <a href="{{ route('hostel.close',$slot->id) }}" class="btn btn-warning">
                                            Close
                                        </a>
                                    @endif
                                        <a href="{{ route('hostel.delete',$slot->id) }}" class="btn btn-danger">
                                            Delete
                                        </a>
                                    @endif
                                    @if(auth()->user()->role == 'user')
                                        @if($slot->open)
                                            @if($slot->bookings()->where('user_id',auth()->user()->id)->count() == 0)
                                            <a href="{{ route('hostel.book',$slot->id) }}" class="btn btn-primary">
                                                Book
                                            </a>
                                            @else
                                            <div>Booked</div>
                                            @endif
                                        @endif
                                    @endif
                                </td>
                          </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-muted text-center">
                                    No Hostel Slots
                                </td>
                            </tr>
                        @endforelse
                        @if(auth()->user()->role == 'admin' && auth()->user()->role != 'staff')
                            <tr class="text-center">
                                <td colspan="8">
                                    + <a href="{{ route('hostel.create') }}" class="link-dark">Create Slot</a>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection