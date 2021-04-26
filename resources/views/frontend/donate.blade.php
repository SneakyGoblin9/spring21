@extends('layouts.frontend')

@section('content')
<div class="hero-wrap" style="background-image: url('/images/donate.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span
                        class="mr-2"><a href="/">Home</a></span> <span>Donation</span></p>
                <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Donation</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 d-flex ftco-animate">
                <div class="img align-self-stretch"
                    style="background-image: url(images/crph-donate-campaign.webp); width: 100%;"></div>
            </div>
            <div class="col-md-6 pl-md-2 ftco-animate">
                <h2 class="mb-3">Support Myanmar, The People, CDM & CRPH</h2>
                <p class="text-justify">First of all, we would like to announce that we are not registered organizations
                    or working under any
                    organizations.
                    The donation you are going to make will go directly to Myanmar(Burma) People Elected Government -
                    CRPH(Commitee
                    Representing Pyidaungsu Hluttaw)'s fundraising campaign
                    and we Do Not create or have any of our own Fundraising campaigns. For more details info about CRPH,
                    Please check here
                    (https://crphmyanmar.org/).
                    If you have Questions about donations please ask <a href="/contact">here</a>, we are happy to help
                    and
                    explain your Questions.</p>
                <a href="https://donate.crphmyanmar.org/" target="_" class="btn btn-primary py-3 px-5">Donate</a>
            </div>
        </div>
    </div>
</section>
@endsection