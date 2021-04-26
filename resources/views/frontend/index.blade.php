@extends('layouts.frontend')

@section('content')
{{-- <div class="hero-wrap" style="background-image: url('images/Home.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Doing Nothing is Not An
                    Option of Our Life</h1>
                <p class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Created by <a
                        href="#">Colorlib.com</a></p>

                <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="https://vimeo.com/45830194"
                        class="btn btn-white btn-outline-white px-4 py-3 popup-vimeo"><span
                            class="icon-play mr-2"></span>Watch Video</a></p>
            </div>
        </div>
    </div>
</div> --}}
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="/images/Home.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="/images/Home2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="/images/Home3.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 d-flex services p-3 py-4 d-block">
                    <div class="icon d-flex mb-3"><span class="flaticon-donation-1"></span></div>
                    <div class="media-body pl-4">
                        <h3 class="heading">Make Donation</h3>
                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 d-flex services p-3 py-4 d-block">
                    <div class="icon d-flex mb-3"><span class="flaticon-charity"></span></div>
                    <div class="media-body pl-4">
                        <h3 class="heading">Become A Volunteer</h3>
                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 d-flex services p-3 py-4 d-block">
                    <div class="icon d-flex mb-3"><span class="flaticon-donation"></span></div>
                    <div class="media-body pl-4">
                        <h3 class="heading">Sponsorship</h3>
                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section bg-light">
    <div class="container-fluid">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-5 heading-section ftco-animate text-center">
                <h2 class="mb-4">Our Causes</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                    the blind texts.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="carousel-cause owl-carousel">
                    @foreach ($featured as $item)
                    <div class="item">
                        <div class="cause-entry">
                            <a href="#" class="img" style="background-image: url({{ $item->link}});"></a>
                            <div class="text p-3 p-md-4">
                                <h3><a href="#">{{ $item->name }}</a></h3>
                                <p>{{ $item->description }}</p>
                                {{-- <span class="donation-time mb-3 d-block">Last donation 1w ago</span>
                                <div class="progress custom-progress-success">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 28%"
                                        aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="fund-raised d-block">$12,000 raised of $30,000</span> --}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-gallery">
    <div class="row">
        @foreach ($images as $image)
        <a href="{{ $image->link }}"
            class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate"
            style="background-image: url({{ $image->link}});">
            <div class="icon d-flex justify-content-center align-items-center">
                <span class="icon-search"></span>
            </div>
        </a>
        @endforeach
    </div>
</section>
@endsection