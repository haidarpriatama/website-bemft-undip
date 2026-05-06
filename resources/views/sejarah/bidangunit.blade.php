@extends('layouts.layout')

@section('seo')
<meta name="description" content="{{ settings('meta.description') }}" />
<meta name="keywords" content="{{ settings('meta.keywords') }}" />

<title>Bidang dan Unit | {{ settings('site.title') }}</title>
@stop

@section('custom_css')
<link rel="stylesheet" href="{{ asset('css/featurebox.css') }}">
<style>
    .bg-1 {
        background: url('{{ asset("images/Group 9.png") }}');
        background-repeat: no-repeat;
        background-size: contain;
        background-position: right;
    }
    .bg-2 {
        background-image: url('{{ asset("images/Group 10.png") }}');
        background-repeat: no-repeat;
        background-position: left bottom;
    }
</style>
@stop

@section('content')
<div class="">
    <div class="row text-center">
        <div class="col-lg-12 col-md-12 col-sm-12 py-10 border-bottom border-warning bg-primarylightcolor">
            <h1 class="text-white" style="font-size: 4.5vh;">Bidang dan Unit BEM FT Undip</h1>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 bg-white">
            <div class="container mt-20">
                <div class="row">
                    @foreach ($bidangs as $bidang)
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-10">
                            <a href="{{ route('pages.bidangunit_detail', $bidang->slug) }}">
                                <div class="card shadow-sm rounded rounded-5 border border-warning border-hover h-275px bg-hover-warning text-hover-inverse-warning zoom bg-secondarycolor">
                                    <div class="card-body ">
                                        <div class="text-center px-4">
                                            <img class="mw-100 mh-300px card-rounded-bottom" alt="" src="{{ $bidang->getFirstMediaUrl('logobidangunits') }}"/>
                                        </div>

                                        <h2 class="mt-5" style="color: {{ settings('site.textcolor') }};">{{ $bidang->name }}</h2>
                                        <h2 class="" style="color: {{ settings('site.textcolor') }};">({{ $bidang->singkatan }})</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="row mt-20 mb-10">
                    <div class="col-lg-4 col-md-12 col-sm-12 mt-4">
                        <a href="{{ route('pages.sejarah') }}" class="btn btn-dark bg-primarylightcolor fw-bolder w-100 rounded-4">Sejarah BEM FT</a>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 mt-4">
                        <a href="{{ route('pages.layananinti') }}" class="btn btn-dark bg-primarylightcolor fw-bolder w-100 rounded-4">Layanan Inti</a>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 mt-4">
                        <a href="{{ route('pages.layananpendukung') }}" class="btn btn-dark bg-primarylightcolor fw-bolder w-100 rounded-4">Layanan Pendukung</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="background: {{ settings('site.secondarycolor') }};height: 80px;">

</div>
@stop
