@extends('layouts.frontend')

@section('content')

@if ($message = session()->get('message'))
<div class="alert alert-info col-md-3 fixed-top ml-auto mr-1" style="margin-top: 5%" id="alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <p>{{ $message }} </p>
</div>
@endif

<div class="hero-wrap" style="background-image: url('/images/contact.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span
                        class="mr-2"><a href="/">Home</a></span> <span>Contact</span></p>
                <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Contact Us</h1>
            </div>
        </div>
    </div>
</div>


<section class="ftco-section contact-section ftco-degree-bg">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-12 mb-4">
                <h2 class="h4">Contact Information</h2>
            </div>
            <div class="w-100"></div>
            <div class="col-md-4">
                <p><span>Facebook :</span> <a href="https://www.facebook.com/MynStdEU">MynStdEU</a></p>
            </div>
            <div class="col-md-4">
                <p><span>Twitter:</span> <a href="https://twitter.com/BurmeseEu">@BurmeseEu</a></p>
            </div>
            <div class="col-md-4">
                <p><span>Email:</span> <a href="mailto:burmesestudentseu@gmail.com">burmesestudentseu@gmail.com</a></p>
            </div>
        </div>
        <div class="row block-9">
            <div class="col-md-12 pr-md-5">
                <h4 class="mb-4">Do you have any questions?</h4>
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" required name="name" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input type="text" required name="email" class="form-control" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input type="text" required name="subject" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea name="message" required id="" cols="30" rows="7" class="form-control"
                            placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                    </div>
                </form>

            </div>

            {{-- <div class="col-md-6" id="map"></div> --}}
        </div>
    </div>
</section>
@endsection