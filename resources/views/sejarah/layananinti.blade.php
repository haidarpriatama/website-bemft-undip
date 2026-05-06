@extends('layouts.layout')

@section('seo')
<meta name="description" content="{{ settings('meta.description') }}" />
<meta name="keywords" content="{{ settings('meta.keywords') }}" />

<title>Layanan Inti | {{ settings('site.title') }}</title>
@stop

@section('custom_css')
<style>
</style>
@stop

@section('content')
<div class="row text-center">
    <div class="col-lg-12 col-md-12 col-sm-12 py-10 border-bottom border-warning bg-primarylightcolor">
        <h1 class="text-white" style="font-size: 4.5vh;">Layanan Inti BEM FT UNDIP</h1>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 bg-white">
        <div class="container mt-20 pt-20 pb-0 ">
            <div class="row mt-10">
                @foreach ($layananinti as $layanan)
                <div class="col-lg-2 col-md-6 col-md-12">
                    <h1 class="mb-0" style="font-size: 10vh;color: {{ settings('site.secondarycolor') }};">0{{ $loop->iteration }}</h1>
                    <h3 style="font-size: 3vh;" class="custom-text-color">{{ strip_tags($layanan->value) }}</h3>
                </div>
                @endforeach
            </div>

            <div class="row mt-20 mb-10">
                <div class="col-lg-4 col-md-12 col-sm-12 mt-4">
                    <a href="{{ route('pages.sejarah') }}" class="btn btn-dark fw-bolder w-100 rounded-4 text-white bg-primarylightcolor">Sejarah</a>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 mt-4">
                    <a href="{{ route('pages.layananpendukung') }}" class="btn btn-dark fw-bolder w-100 rounded-4 text-white bg-primarylightcolor">Layanan Pendukung</a>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 mt-4">
                    <a href="{{ route('pages.bidangunit') }}" class="btn btn-dark fw-bolder w-100 rounded-4 text-white bg-primarylightcolor">Bidang dan Unit</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="background: {{ settings('site.secondarycolor') }};height: 80px;">

</div>
@stop
