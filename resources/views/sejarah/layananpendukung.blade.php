@extends('layouts.layout')

@section('seo')
<meta name="description" content="{{ settings('meta.description') }}" />
<meta name="keywords" content="{{ settings('meta.keywords') }}" />

<title>Layanan Pendukung | {{ settings('site.title') }}</title>
@stop

@section('custom_css')
<style>
</style>
@stop

@section('content')
<div class="">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 py-10 border-bottom border-warning bg-1 text-center bg-primarylightcolor">
            <h1 class="text-white" style="font-size: 4.5vh;">Layanan Pendukung BEM FT UNDIP</h1>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 bg-white">
            <div class="container mt-5">
                @foreach ($layananpendukung as $layanan)
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 text-lg-end">
                            <p class="text-custom-color fw-bold" style="font-size: 9vh;">0{{ $loop->iteration }}</p>
                        </div>
                        <div class="col-lg-9 col-md-6 col-sm-6">
                            <h1 class="text-custom-color mb-0 mt-lg-6" style="font-size: 2.5vh;">
                                {!! str_replace('&nbsp;', '<br>', strip_tags($layanan->value)) !!}
                            </h1>
                        </div>
                    </div>
                @endforeach

                <div class="row mt-10 mb-10">
                    <div class="col-lg-4 col-md-12 col-sm-12 mt-4">
                        <a href="{{ route('pages.sejarah') }}" class="btn btn-dark bg-primarylightcolor fw-bolder w-100 rounded-4">Sejarah</a>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 mt-4">
                        <a href="{{ route('pages.layananinti') }}" class="btn btn-dark bg-primarylightcolor fw-bolder w-100 rounded-4">Layanan Inti</a>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 mt-4">
                        <a href="{{ route('pages.bidangunit') }}" class="btn btn-dark bg-primarylightcolor fw-bolder w-100 rounded-4">Bidang dan Unit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="background: {{ settings('site.secondarycolor') }};height: 80px;">

</div>
@stop
