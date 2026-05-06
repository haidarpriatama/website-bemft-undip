@extends('layouts.layout')

@section('seo')
<meta name="description" content="{{ settings('meta.description') }}" />
<meta name="keywords" content="{{ settings('meta.keywords') }}" />

<title>HMarketPlace | {{ settings('site.title') }}</title>
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
        background: {{ settings('site.secondarycolor') }};
    }
</style>
@stop

@section('content')
<div class="bg-teknik">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 py-10 text-center bg-primarylightcolor">
            <h1 class="text-white" style="font-size: 4.5vh;">HMarketplace</h1>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="container mt-15 mb-20">
                @forelse ($jurusans as $jurusan)
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('pages.hmarketlist', $jurusan->slug) }}">
                            <h1>{{ $jurusan->name }}</h1>
                        </a>
                        <a href="{{ $jurusan->instagram ?? '#' }}">
                            <h3 class="sliding-middle-out custom-text-color" style="transition: all 0.5s;">Tekan untuk informasi selanjutnya <i class="fa-solid fa-chevron-right fs-5 custom-text-color"></i> <i class="fa-brands fa-instagram fs-3 custom-text-color"></i></h3>
                        </a>
                    </div>

                    <hr style="height:3px;border:none;color:{{ settings('site.textcolor') }};background-color:{{ settings('site.secondarycolor') }};opacity: 1;width: 20vw;">

                    <div class="row">
                        @forelse ($jurusan->products->take(3) as $product)
                            <div class="col-lg-4 col-md-12 col-sm-12 ps-15 pe-15">
                                <div class="card shadow-sm card-flush mb-10 rounded rounded-4 mt-5">
                                    <a target="_blank" href="{{ $product->url }}">
                                        @if (!$product->getMedia('product_images')->isEmpty())
                                            <img src="{{ $product->getFirstMediaUrl('product_images') }}" class="card-img-top rounded rounded-4 min-h-200px" alt="product_image">
                                        @else
                                            <img src="{{ asset('images/defaultimage.png') }}" class="card-img-top rounded rounded-4 min-h-200px" alt="360x360">
                                        @endif
                                    </a>
                                    <div class="card-footer py-4">
                                        <h1 class="custom-text-color">{{ $product->name }}</h1>
                                        <h4 class="custom-text-color">@currency($product->price)</h4>
                                        <a target="_blank" href="{{ $product->url }}" class="btn btn-dark rounded-pill py-2 mt-5 bg-primarylightcolor">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <h1 class="my-15 custom-text-color" style="font-size: 2vh;">Belum ada produk</h1>
                            </div>
                        @endforelse
                    </div>
                @empty
                    <div class="text-center">
                        <h1 class="mt-15 custom-text-color" style="font-size: 2vh;">Belum ada data jurusan</h1>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</div>
<div style="background: {{ settings('site.secondarycolor') }};height: 80px;">

</div>
@stop
