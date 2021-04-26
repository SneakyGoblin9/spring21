@extends('layouts.frontend')

@section('content')
<div class="hero-wrap" style="background-image: url('/images/blog.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span
                        class="mr-2"><a href="/">Home</a></span> <span>Blog</span></p>
                <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Blog</h1>
            </div>
        </div>
    </div>
</div>


<section class="ftco-section">
    <div class="container">
        <div class="row d-flex">
            @foreach($data['posts'] as $post)
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="{{ route('posts.show', $post->slug) }}" class="block-20"
                        style="background-image: url('{{ $post->featured_image }}');"> </a>
                    <div class="text p-4 d-block">
                        <div class="meta mb-3">
                            <div><a href="#">{{ $post->published_at->toDateString() }}</a></div>
                            <div><a href="#">Admin</a></div>
                            {{-- <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div> --}}
                        </div>
                        <h3 class="heading mt-3"><a href="#">{{ $post->title }}</a></h3>
                        <p>{{ $post->summary }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>


        <div class="row mt-5">
            <div class="mx-auto">{{ $data['posts']->links() }}</div>
        </div>
    </div>
</section>
@endsection