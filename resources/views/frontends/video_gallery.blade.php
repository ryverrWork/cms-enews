@extends('frontends.frontend')

@section('title', $sectionSetting?->title ?? __('app.Video Gallery'))

@section('content')
    <style>
        .video-gallery {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .video-item {
            flex: 1 1 calc(33.333% - 1rem);
            margin-bottom: 0.4rem;
            padding-right: 0.5rem;
        }

        @media (max-width: 768px) {
            .video-item {
                flex: 1 1 calc(50% - 1rem);
            }
        }

        @media (max-width: 480px) {
            .video-item {
                flex: 1 1 100%;
            }
        }

        .video-embed {
            width: 100%;
            height: auto;
            border-radius: 0.5rem;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
    </style>
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
                <h1>{{ $sectionSetting?->title ?? __('app.Video Gallery') }}</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ $sectionSetting?->title ?? __('app.Video Gallery') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <section id="primary" class="w-full ">
                    <main id="main" class="site-main" role="main">
                        <h2 class="mb-5">{{ $sectionSetting?->title ?? __('app.Video Gallery') }}</h2>
                        @if ($videoGalleries->isEmpty())
                            <div class="no-galleries">
                                <div>
                                    <h2>{{ __('app.No Video Available') }}</h2>
                                </div>
                            </div>
                        @else
                            <div class="video-gallery">
                                @foreach ($videoGalleries as $video)
                                    <div class="video-item">
                                        <div class="video-embed">
                                            <iframe width="560" height="315" src="{{ $video->url }}" frameborder="0"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </main>
                </section>
            </div>
        </div>
    </main>
@endsection
