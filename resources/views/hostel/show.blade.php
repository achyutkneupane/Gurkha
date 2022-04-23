@extends('layouts.app')
@section('page_title', 'Hostel Slot ' . $hostel->id)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>@yield('page_title')</span>
                            <div>{{ $hostel->bookings_count }} out of {{ $hostel->capacity }} booked</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-light table-bordered">
                            <thead class='table-dark'>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Booked</th>
                                </tr>
                            </thead>

                            <tbody class="table-light">
                                @forelse ($hostel->bookings as $booking)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $booking->user->name }}</td>
                                        <td>{{ $booking->user->phone }}</td>
                                        <td>{{ $booking->user->email }}</td>
                                        <td>{{ $booking->created_at->diffForHumans() }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-muted text-center">
                                            No Hostel Bookings
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
