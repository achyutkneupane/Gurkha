@extends('layouts.app')
@section('page_title', 'Home Page')

@section('content')
    <div class="container-fluid px-0">
        <div id="imagesCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-inner">
                    @foreach ($carousels as $carousel)
                        <div class="carousel-item dark @if ($loop->first) active @endif">
                            <div class="vw-100 top-0 left-0 absolute" style="height: 90vh; z-index: 5;">
                                <img class="relative w-100" src="{{ asset(Storage::url($carousel->image)) }}"
                                    alt="{{ $carousel->title }}">
                            </div>
                            <div class="overlay">
                                <div class="carousel-caption d-none d-md-block">
                                    <h1 class="display-1">{{ $carousel->title }}</h1>
                                    <h3 class="h3">{{ $carousel->value }}</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#imagesCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#imagesCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container" style="margin-top: 150px;" id="why_us">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center mb-5">
                    We have Recruiment Courses for
                </h2>
            </div>
            @foreach ($armyDetails as $detail)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $detail->image? asset(Storage::url($detail->image)): 'https://mapandan.gov.ph/wp-content/uploads/2018/03/no_image.jpg' }}"
                            class="card-img-top" alt="{{ $detail->title }}" height="250">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $detail->title }}</h5>
                            <p class="card-text text-center">{{ $detail->value }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container-fluid px-0 bg-white" id="about_us"
        style="margin-top: 150px; padding-top: 40px; padding-bottom:60px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h2 class="text-center mb-5">
                        About Us
                    </h2>
                    <div class="container">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-5">
                                <img src="{{ $about_us->image? asset(Storage::url($about_us->image)): 'https://mapandan.gov.ph/wp-content/uploads/2018/03/no_image.jpg' }}"
                                    class="card-img-top" alt="About Us">
                            </div>
                            <div class="col-md-7" style="text-align: justify;">
                                {{ $about_us->value }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-5">
                    We are located
                </h2>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item w-100" src="{{ $location->value }}"
                        height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-light bg-dark pt-5">
        <div class="row">
            <div class="col-md-4 d-flex flex-column align-items-center">
                <h2 class="pb-3">Links</h2>
                <a href="{{ route('landing') }}" class="h5 text-decoration-none">Home</a>
                <a href="{{ route('home') }}" class="h5 text-decoration-none">Dashboard</a>
                <a href="#about_us" class="h5 text-decoration-none">About Us</a>
                <a href="#why_us" class="h5 text-decoration-none">Why Us</a>
            </div>
            <div class="col-md-4 d-flex flex-column align-items-center">
                <h2 class="pb-3">Contact Us</h2>
                <div class="h5"><i class="fas fa-phone"></i> Phone: <a
                        href="tel:{{ $contactNumber->value }}"
                        class="text-white text-decoration-none">{{ $contactNumber->value }}</a></div>
                <div class="h5"><i class="fas fa-at"></i> Email: <a
                        href="mailto:{{ $contactEmail->value }}"
                        class="text-white text-decoration-none">{{ $contactEmail->value }}</a></div>
            </div>
            <div class="col-md-4 d-flex flex-column align-items-center">
                <h2 class="pb-3">Social Media</h2>
                <div class="d-flex flex-row gap-2">
                    @foreach($socialDetails as $detail)
                    <a href="{{ $detail->value }}" class="text-decoration-none text-white" target="_blank" alt="{{ $detail->title }}">
                        <i class="fab fa-3x fa-{{ $detail->key }}"></i>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <hr />
        <div class="row pb-4">
            <div class="col-md-12 text-center text-white h5">
                &copy; {{ env('APP_NAME') }}
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .overlay {
            position: absolute;
            color: white;
            display: block;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            opacity: 0.65;
            transition: .5s ease;
            background-color: black;
        }

    </style>
@endpush
