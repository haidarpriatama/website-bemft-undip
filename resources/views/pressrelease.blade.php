@extends('layouts.layout')

@section('seo')
<meta name="description" content="{{ settings('meta.description') }}" />
<meta name="keywords" content="{{ settings('meta.keywords') }}" />

<title>Press Release | {{ settings('site.title') }}</title>
@stop

@section('custom_css')
<link rel="stylesheet" href="{{ asset('css/featurebox.css') }}">
<style>
    .carousel-indicators {
        align-items: center;
    }
    .carousel-indicators [data-bs-target] {
        box-sizing: content-box;
        flex: 0 1 auto;
        width: 10px; /* change width */
        height: 10px; /* change height */
        padding: 0;
        margin-right: 1rem;
        margin-left: 1rem;
        text-indent: -999px;
        cursor: pointer;
        background-color: #fff;
        background-clip: padding-box;
        border: 0;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        opacity: .5;
        transition: opacity .6s ease;
        border-radius: 100%; // /* add border-radius */
    }
    .carousel-indicators .active {
        width: 15px; /* change width */
        height: 15px; /* change height */
        background-color: #FFBD59;
    }
</style>
@stop

@section('content')
<div class="">
    <div class="row text-center">
        <div class="col-lg-12 col-md-12 col-sm-12 py-10 border-bottom border-warning bg-primarylightcolor">
            <h1 class="text-white" style="font-size: 4.5vh;">Press Release</h1>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="container mt-20 mb-20">
                <div class="row">
                    @foreach ($pressreleases as $pressrelease)
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-10">
                            <div class="card shadow-sm rounded rounded-5 border border-light border-hover h-150px bg-hover-light text-hover-inverse-light zoom" data-bs-toggle="modal" data-bs-target="#modalPressrelease{{ $pressrelease->id }}">
                                <div class="blur"></div>
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <h2 class="mt-5">{{ $pressrelease->name }}</h2>
                                </div>
                            </div>

                            <div class="modal fade" tabindex="-1" id="modalPressrelease{{ $pressrelease->id }}">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content rounded rounded-3">
                                        <div class="modal-header">
                                            <h3>{{ $pressrelease->name }}</h3>
                                        </div>
                                        <div class="modal-body p-0 rounded rounded-3">
                                            <div id="mPressrelease{{ $pressrelease->id }}" class="carousel slide" data-bs-ride="true">
                                                <div class="carousel-indicators">
                                                    @foreach ($pressrelease->images as $key => $image)
                                                    <button type="button" data-bs-target="#mPressrelease{{ $pressrelease->id }}" data-bs-slide-to="{{$key}}" @if($loop->first) class="active" aria-current="true" @endif aria-label="Slide {{$key+1}}"></button>
                                                    @endforeach
                                                </div>
                                                <div class="carousel-inner rounded rounded-3">
                                                    @foreach ($pressrelease->images as $image)
                                                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                            <img src="{{ asset('storage/'. $image) }}" class="d-block w-100" alt="press_release_image_{{ $loop->iteration }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#mPressrelease{{ $pressrelease->id }}" data-bs-slide="prev">
                                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                  <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#mPressrelease{{ $pressrelease->id }}" data-bs-slide="next">
                                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                  <span class="visually-hidden">Next</span>
                                                </button>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div style="background: {{ settings('site.secondarycolor') }};height: 80px;">

</div>
@stop
