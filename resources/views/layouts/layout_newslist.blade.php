@extends('layouts.layout')

@section('seo')
<meta name="description" content="{{ settings('meta.description') }}" />
<meta name="keywords" content="{{ settings('meta.keywords') }}" />

<title>{{ $title }} | {{ settings('site.title') }}</title>
@stop

@section('custom_css')
<style>
    .card-hover:hover {
        box-shadow: 0 0.5rem 1.5rem 0.5rem rgb(0 0 0 / 8%) !important;
    }

    .page-link.active, .active > .page-link {
        background-color: {{ settings('site.primarylightcolor') }};
    }

    .page-item:not(.active) .page-link:hover {
        color: {{ settings('site.textcolor') }};
        background-color: {{ settings('site.primarylightcolor') }}20;
    }
</style>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 py-10 text-center bg-primarylightcolor">
        <h1 class="text-white" style="font-size: 4.5vh;">{{ $title }}</h1>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="container mt-15 mb-20">
            <div class="row">
                @forelse ($news as $new)
                    <div class="col-lg-4 col-md-12 col-sm-12 ps-5 pe-5 mb-10">
                        <div class="card bg-card me-md-6 rounded rounded-4 card-hover">
                            @if(!$new->getMedia('thumbnails')->isEmpty())
                                {{-- <img src="{{ $new->getFirstMediaUrl('thumbnails') }}" class="my-10 w-full h-full shadow-md rounded-[2rem] rounded-bl-none z-0 object-cover"/> --}}
                                <a class="d-block overlay mb-4" data-fslightbox="lightbox-hot-sales" href="{{ $new->getFirstMediaUrl('thumbnails') }}">
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded rounded rounded-3 min-h-200px" style="background-image:url('{{ $new->getFirstMediaUrl("thumbnails") }}')"></div>
                                    <div class="overlay-layer bg-dark card-rounded bg-opacity-25">
                                        <i class="bi bi-eye-fill fs-2x text-white"></i>
                                    </div>
                                </a>
                            @else
                                <a class="d-block overlay mb-4" data-fslightbox="lightbox-hot-sales" href="{{ asset('images/defaultimage.png') }}">
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded rounded rounded-3 min-h-200px" style="background-image:url('{{ asset("images/defaultimage.png") }}')"></div>
                                    <div class="overlay-layer bg-dark card-rounded bg-opacity-25">
                                        <i class="bi bi-eye-fill fs-2x text-white"></i>
                                    </div>
                                </a>
                            @endif

                            <a href="{{ route('news.post', ['type' => $type, 'slug' => $new->slug]) }}">
                                <div class="card-body pt-0">
                                    <span class="fs-4 fw-bolder text-hover-primary lh-base custom-text-color">{!! $new->title ?? '' !!}</span>
                                    {{-- <div class="fw-bold fs-5 text-gray-400 mt-3 mb-5">{!! $new->description ?? '' !!}</div> --}}
                                    <div class="fs-6 fw-bolder">
                                        <a href="#" class="text-gray-400 text-hover-primary">{{ $new->author->name ?? '' }}</a>
                                        <span class="text-muted">on {{ $new->published_at->format('d M Y') ?? '' }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="text-center">
                        <h1 class="mt-15 custom-text-color" style="font-size: 3vh;">Belum ada postingan</h1>
                    </div>
                @endforelse
            </div>
            {{ $news->links('pagination::custom') }}
        </div>
    </div>
</div>
<div style="background: {{ settings('site.secondarycolor') }};height: 80px;">

</div>
@stop

@section('custom_js')
<script src="{{ asset('plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
@stop
