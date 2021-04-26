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

<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ftco-animate">
                <h2 class="mb-3">{{ $data['post']->title }}</h2>

                {!! $data['post']->body !!}

                @if ($data['post']->tags->count() > 0)
                <div class="tag-widget post-tag-container mb-5 mt-5">
                    <div class="tagcloud">
                        @foreach ($data['post']->tags as $tag)
                        <a href="{{ route('tag.posts.index', $tag->slug) }}" class="tag-cloud-link">
                            {{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- <div class="about-author d-flex p-5 bg-light">
                    <div class="bio align-self-md-center mr-5">
                        <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
                    </div>
                    <div class="desc align-self-md-center">
                        <h3>Lance Smith</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem
                            necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente
                            consectetur similique, inventore eos fugit cupiditate numquam!</p>
                    </div>
                </div> --}}

            </div> <!-- .col-md-8 -->
            <div class="col-md-4 sidebar ftco-animate">
                @if ($recent->count() > 0)
                <div class="sidebar-box ftco-animate">
                    <h3>Recent Blog</h3>
                    @foreach ($recent as $item)
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url('{{ $item->featured_image }}');"></a>
                        <div class="text">
                            <h3 class="heading">
                                <a href="{{ route('posts.show', $item->slug) }}">{{ $item->summary }}</a>
                            </h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span>
                                        {{ $item->published_at->toDateString() }}</a></div>
                                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

                <div class="sidebar-box ftco-animate">
                    <h3>Tag Cloud</h3>
                    <div class="tagcloud">
                        @foreach ($tags as $tag)
                        <a href="{{ route('tag.posts.index', $tag->slug) }}" class="tag-cloud-link">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>

                {{-- <div class="sidebar-box ftco-animate">
                    <h3>Paragraph</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus
                        voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur
                        similique, inventore eos fugit cupiditate numquam!</p>
                </div> --}}
            </div>

        </div>
    </div>
</section> <!-- .section -->


@endsection