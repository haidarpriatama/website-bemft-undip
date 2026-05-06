@extends('layouts.layout')

@section('seo')
<meta name="description" content="{{ settings('meta.description') }}" />
<meta name="keywords" content="{{ settings('meta.keywords') }}" />

<title>Teknikshop - {{ $categories->name }} | {{ settings('site.title') }}</title>
@stop

@section('custom_css')
<style>
    .sliding-middle-out {
        display: inline-block;
        position: relative;
        padding-bottom: 3px;
    }
    .sliding-middle-out:after {
        content: '';
        display: block;
        margin: auto;
        height: 3px;
        width: 0px;
        background: transparent;
        transition: width .5s ease, background-color .5s ease;
    }
    .sliding-middle-out:hover:after {
        width: 100%;
        background: #FFFFFF;
    }
</style>
@stop

@section('content')
<div class="bg-teknik">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 py-10 text-center bg-primarylightcolor">
            <h1 class="text-white" style="font-size: 4.5vh;">{{ $categories->name }}</h1>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="container mt-15 mb-20">
                <div class="row">
                    @forelse ($products as $product)
                        <div class="col-lg-4 col-md-12 col-sm-12 ps-10 pe-10">
                            <div class="card shadow-sm card-flush mb-10 rounded rounded-4 mt-5">
                                @if(!$product->getMedia('productbems')->isEmpty())
                                    {{-- <img src="{{ $product->getFirstMediaUrl('productbems') }}" class="my-10 w-full h-full shadow-md rounded-[2rem] rounded-bl-none z-0 object-cover"/> --}}
                                    <a class="d-block overlay mb-4" data-fslightbox="lightbox-hot-sales" href="{{ $product->getFirstMediaUrl('productbems') }}">
                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded rounded rounded-3 min-h-200px" style="background-image:url('{{ $product->getFirstMediaUrl("productbems") }}')"></div>
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
                                <div class="card-footer py-4">
                                    <h1 class="custom-text-color">{{ $product->name }}</h1>
                                    <h4 class="custom-text-color">@currency($product->price)</h4>
                                    <a href="{{ $product->url }}" class="btn btn-dark rounded-3 py-2 mt-5 bg-primarylightcolor">Read More</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center">
                            <h1 class="mt-15 custom-text-color" style="font-size: 3vh;">Belum ada produk</h1>
                        </div>
                    @endforelse
                </div>
                {{ $products->links('pagination::custom') }}
            </div>
        </div>
    </div>
</div>
<div style="background: {{ settings('site.secondarycolor') }};height: 80px;">

</div>
@stop

@section('custom_js')
<script src="{{ asset('plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
@stop
