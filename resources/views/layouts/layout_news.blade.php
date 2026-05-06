@extends('layouts.layout')

@section('seo')
{!! seo() !!}
@stop

@section('custom_css')
<style>
</style>
@stop

@section('content')
<div class="bg-primarylightcolor h-20px">

</div>
<div class="container mt-5 mb-20">
    {{-- <div class="row"> --}}
        {{-- <div class="col-lg-9 col-md-12 col-sm-12"> --}}
            <div class="card">
                @if(!$post->getMedia('thumbnails')->isEmpty())
                    {{-- <img src="{{ $post->getFirstMediaUrl('thumbnails') }}" class="my-10 w-full h-full shadow-md rounded-[2rem] rounded-bl-none z-0 object-cover"/> --}}
                    <a class="d-block overlay mb-4" data-fslightbox="lightbox-hot-sales" href="{{ $post->getFirstMediaUrl('thumbnails') }}">
                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded rounded rounded-3 min-h-400px" style="background-image:url('{{ $post->getFirstMediaUrl("thumbnails") }}')"></div>
                        <div class="overlay-layer bg-dark card-rounded bg-opacity-25">
                            <i class="bi bi-eye-fill fs-2x text-white"></i>
                        </div>
                    </a>
                @else
                    <a class="d-block overlay mb-4" data-fslightbox="lightbox-hot-sales" href="{{ asset('images/defaultimage.png') }}">
                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded rounded rounded-3 min-h-400px" style="background-image:url('{{ asset("images/defaultimage.png") }}')"></div>
                        <div class="overlay-layer bg-dark card-rounded bg-opacity-25">
                            <i class="bi bi-eye-fill fs-2x text-white"></i>
                        </div>
                    </a>
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h1 class="text-news text-center">{!! $post->title !!}</h1>
                            <h6 class="text-muted text-center mb-10">{{ $post->published_at->format('d F Y') }}</h6>

                            {!! $post->content !!}

                            <div class="mt-10">
                                @if ($post->bidang)
                                    <h3 class="font-bold text-gray-700 dark:text-gray-100 hover:underline mb-0">{{ $post->bidang->name }} ({{ $post->bidang->singkatan }})</h3>
                                @else
                                    <a href="#" class="d-flex align-items-center gap-2">
                                        <img src="{{ \Filament\Facades\Filament::getUserAvatarUrl($post->author) }}" alt="avatar" class="object-cover w-40px h-40px rounded-circle sm:block">
                                        <h3 class="font-bold text-gray-700 dark:text-gray-100 hover:underline mb-0">{{ $post->author->name ?? '' }}</h3>
                                    </a>
                                @endif
                                <h3 class="font-bold text-gray-700 dark:text-gray-100 hover:underline mb-0">{{ settings('navbar.title') }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
        {{-- <div class="col-lg-3">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div> --}}
    <h1 class="custom-text-color my-10">Related Articles</h1>

    <div class="row mt-5">
        @foreach ($relateds as $related)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card shadow-sm card-flush mb-3">
                    {{-- <a href="#"> --}}
                        @if(!$related->getMedia('thumbnails')->isEmpty())
                            {{-- <img src="{{ $related->getFirstMediaUrl('thumbnails') }}" class="my-10 w-full h-full shadow-md rounded-[2rem] rounded-bl-none z-0 object-cover"/> --}}
                            <a class="d-block overlay mb-4" data-fslightbox="lightbox-hot-sales" href="{{ $related->getFirstMediaUrl('thumbnails') }}">
                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded rounded rounded-3 min-h-300px" style="background-image:url('{{ $related->getFirstMediaUrl("thumbnails") }}')"></div>
                                <div class="overlay-layer bg-dark card-rounded bg-opacity-25">
                                    <i class="bi bi-eye-fill fs-2x text-white"></i>
                                </div>
                            </a>
                        @else
                            <a class="d-block overlay mb-4" data-fslightbox="lightbox-hot-sales" href="{{ asset('images/defaultimage.png') }}">
                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded rounded rounded-3 min-h-300px" style="background-image:url('{{ asset("images/defaultimage.png") }}')"></div>
                                <div class="overlay-layer bg-dark card-rounded bg-opacity-25">
                                    <i class="bi bi-eye-fill fs-2x text-white"></i>
                                </div>
                            </a>
                        @endif
                        <div class="card-body rounded">
                            <span class="text-muted fst-italic fs-6">{{ $related->published_at->format('d F Y') }} by {{ $related->author->name ?? '' }}</span>
                            <h4 class="card-title mt-2">{!! $related->title !!}</h4>
                            {{-- <p class="text-dark">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                        </div>
                    {{-- </a> --}}
                    <div class="card-footer py-4">
                        <a href="{{ route('news.post', ['type' => 'article', 'slug' => $related->slug]) }}" class="btn btn-dark rounded-3 py-3" target="_blank" style="background: {{ settings('site.primarylightcolor') }};">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div style="background: {{ settings('site.secondarycolor') }};height: 80px;">

</div>
@stop

@section('custom_js')
<script src="{{ asset('plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
@stop
