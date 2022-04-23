@extends('layouts.app')
@section('page_title', 'Settings')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card sticky-top" style="top: 20px; height:800px;">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>@yield('page_title') Section</span>
                    </div>
                </div>
                <div class="card-body d-flex flex-column gap-2 overflow-scroll">
                    <a href="#{{ $about_us->key }}" class="btn btn-link">{{ $about_us->title }}</a>
                    <a href="#{{ $location->key }}" class="btn btn-link">{{ $location->title }}</a>
                    <h4 class="text-center">Contact Details</h4>
                    @foreach($contactDetails as $detail)
                    <a href="#{{ $detail->key }}" class="btn btn-link">{{ $detail->title }}</a>
                    @endforeach
                    <h4 class="text-center">Army Details</h4>
                    @foreach($armyDetails as $detail)
                    <a href="#{{ $detail->key }}" class="btn btn-link">{{ $detail->title }}</a>
                    @endforeach
                    <h4 class="text-center">Carousels</h4>
                    @foreach($carousels as $detail)
                    <a href="#{{ $detail->key }}" class="btn btn-link">{{ $detail->title }}</a>
                    @endforeach
                    <h4 class="text-center">Social Media</h4>
                    @foreach($socialDetails as $detail)
                    <a href="#{{ $detail->key }}" class="btn btn-link">{{ $detail->title }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>@yield('page_title')</span>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-group mb-4" action="{{ route('settings.update') }}" method="POST" id="{{ $about_us->key }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="key" value="{{ $about_us->key }}">
                        <label for="{{ $about_us->key }}_value" class="col-form-label text-md-right fw-bolder">{{ $about_us->title }}</label>
                        @if ($about_us->image)
                            (<a href="{{ asset(Storage::url($about_us->image)) }}" target="_blank">View Image</a>)
                        @endif
                        <input type="file" name="image" id="{{ $about_us->key }}_image" class="form-control mb-2">
                        @if($about_us->type == 'text')
                            <textarea id="{{ $about_us->key }}_value" type="text" class="form-control mb-2" name="value" rows="10" placeholder="{{ $about_us->title }}" required>{{ $about_us->value }}</textarea>
                        @else
                            <input id="{{ $about_us->key }}_value" type="text" class="form-control mb-2" name="value" value="{{ $about_us->value }}" placeholder="{{ $about_us->title }} Caption" required />
                        @endif
                        <button type="submit" class="btn btn-primary w-100">Update</button>
                    </form>
                    <form class="form-group mb-4" action="{{ route('settings.update') }}" method="POST" id="{{ $location->key }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="key" value="{{ $location->key }}">
                        <label for="{{ $location->key }}_value" class="col-form-label text-md-right fw-bolder">{{ $location->title }}</label>
                        @if($location->type == 'text')
                            <textarea id="{{ $location->key }}_value" type="text" class="form-control mb-2" name="value" rows="6" placeholder="{{ $location->title }}" required>{{ $location->value }}</textarea>
                        @else
                            <input id="{{ $location->key }}_value" type="text" class="form-control mb-2" name="value" value="{{ $location->value }}" placeholder="{{ $location->title }} Caption" required />
                        @endif
                        <button type="submit" class="btn btn-primary w-100">Update</button>
                    </form>
                    @foreach($contactDetails as $detail)
                        <form class="form-group mb-4" action="{{ route('settings.update') }}" method="POST" id="{{ $detail->key }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="key" value="{{ $detail->key }}">
                            <label for="{{ $detail->key }}_value" class="col-form-label text-md-right fw-bolder">{{ $detail->title }}</label>
                            @if($detail->type == 'text')
                                <textarea id="{{ $detail->key }}_value" type="text" class="form-control mb-2" name="value" rows="5" placeholder="{{ $detail->title }}" required>{{ $detail->value }}</textarea>
                            @else
                                <input id="{{ $detail->key }}_value" type="text" class="form-control mb-2" name="value" rows="5" value="{{ $detail->value }}" placeholder="{{ $detail->title }}" required />
                            @endif
                            <button type="submit" class="btn btn-primary w-100">Update</button>
                        </form>
                    @endforeach
                    @foreach($armyDetails as $detail)
                        <form class="form-group mb-4" action="{{ route('settings.update') }}" method="POST" id="{{ $detail->key }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="key" value="{{ $detail->key }}">
                            <label for="{{ $detail->key }}_value" class="col-form-label text-md-right fw-bolder">{{ $detail->title }}</label>
                            @if ($detail->image)
                                (<a href="{{ asset(Storage::url($detail->image)) }}" target="_blank">View Image</a>)
                            @endif
                            <input type="file" name="image" id="{{ $detail->key }}_image" class="form-control mb-2">
                            @if($detail->type == 'text')
                                <textarea id="{{ $detail->key }}_value" type="text" class="form-control mb-2" name="value" rows="5" placeholder="{{ $detail->title }}" required>{{ $detail->value }}</textarea>
                            @else
                                <input id="{{ $detail->key }}_value" type="text" class="form-control mb-2" name="value" rows="5" value="{{ $detail->value }}" placeholder="{{ $detail->title }}" required />
                            @endif
                            <button type="submit" class="btn btn-primary w-100">Update</button>
                        </form>
                    @endforeach

                    @foreach($carousels as $detail)
                        <form class="form-group mb-4" action="{{ route('settings.update') }}" method="POST" id="{{ $detail->key }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="key" value="{{ $detail->key }}">
                            <label for="{{ $detail->key }}_value" class="col-form-label text-md-right fw-bolder">{{ $detail->title }}</label>
                            @if ($detail->image)
                                (<a href="{{ asset(Storage::url($detail->image)) }}" target="_blank">View Image</a>)
                            @endif
                            <input type="file" name="image" id="{{ $detail->key }}_image" class="form-control mb-2">
                            @if($detail->type == 'text')
                                <textarea id="{{ $detail->key }}_value" type="text" class="form-control mb-2" name="value" rows="5" placeholder="{{ $detail->title }}" required>{{ $detail->value }}</textarea>
                            @else
                                <input id="{{ $detail->key }}_value" type="text" class="form-control mb-2" name="value" rows="5" value="{{ $detail->value }}" placeholder="{{ $detail->title }} Caption" required />
                            @endif
                            <button type="submit" class="btn btn-primary w-100">Update</button>
                        </form>
                    @endforeach

                    @foreach($socialDetails as $detail)
                        <form class="form-group mb-4" action="{{ route('settings.update') }}" method="POST" id="{{ $detail->key }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="key" value="{{ $detail->key }}">
                            <label for="{{ $detail->key }}_value" class="col-form-label text-md-right fw-bolder">{{ $detail->title }}</label>
                            @if($detail->type == 'text')
                                <textarea id="{{ $detail->key }}_value" type="text" class="form-control mb-2" name="value" rows="5" placeholder="{{ $detail->title }}" required>{{ $detail->value }}</textarea>
                            @else
                                <input id="{{ $detail->key }}_value" type="text" class="form-control mb-2" name="value" rows="5" value="{{ $detail->value }}" placeholder="{{ $detail->title }} Caption" required />
                            @endif
                            <button type="submit" class="btn btn-primary w-100">Update</button>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection