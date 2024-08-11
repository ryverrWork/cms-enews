@extends('frontends.frontend')

@section('title', $communityVoice?->title ?? __('app.Community Voice'))

@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">

                @foreach ($sliders as $slider)
                    <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                        <img src="{{ asset($slider->image) }}" alt="{{ $slider->title }}">
                        <div class="carousel-container">
                            <h2>{{ $slider->title }}</h2>
                            {!! $slider->description !!}
                        </div>
                    </div>
                @endforeach

                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

                <ol class="carousel-indicators"></ol>

            </div>

        </section><!-- /Hero Section -->

        <div class="page-title dark-background" data-aos="fade" style="background-color: #2c4666">
            <div class="container position-relative">
                <h1>{{ __('app.Community Voice') }}</h1>

                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ __('app.Community Voice') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <section id="primary" class="content-area col-sm-12 col-lg-12">
                    <div class="row">
                        <div class="col-md-12">
                            <main id="main" class="site-main" role="main">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="article-detail"
                                            style="border: 1px solid #ccc; border-radius: 5px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                            <h3
                                                style="font-weight: bold; margin-bottom: 20px; padding-bottom:10px; border-bottom: 1px solid #888">
                                                {{ $communityVoice->title }}</h3>
                                            <div class="description">
                                                {!! $communityVoice->description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </main>
                        </div>
                    </div>
                </section><!-- #primary -->

            </div><!-- .row -->
        </div>

    </main>
@endsection
