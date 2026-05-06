@extends('layouts.layout')

@section('seo')
<meta name="description" content="{{ settings('meta.description') }}" />
<meta name="keywords" content="{{ settings('meta.keywords') }}" />

<title>Sejarah | {{ settings('site.title') }}</title>
@stop

@section('custom_css')
<style>
</style>
@stop

@section('content')
<div class="row text-center">
    <div class="col-lg-12 col-md-12 col-sm-12 py-10 border-bottom border-warning bg-primarylightcolor">
        <h1 class="text-white" style="font-size: 4.5vh;">Sejarah BEM FT UNDIP</h1>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 bg-white">
        <div class="container mt-20">
            <h1 class="custom-text-color" style="text-align: justify;line-height: 2;">
                Didirikan di Semarang pada tahun 1980, BEM FT Undip memiliki peran besar untuk mengolaborasikan seluruh elemen yang dimiliki Fakultas Teknik agar dapat bersama-sama menuju satu makna juang yang selaras, yaitu kejayaan Fakultas Teknik.
            </h1>
            <h1 class="custom-text-color" style="text-align: justify;line-height: 2;">
                Berlandaskan Tri Dharma Perguruan Tinggi dan Wawasan Almamater Universitas Diponegoro BEM FT Undip menyediakan berbagai bentuk layanan yang terimplementasi dalam program dengan tujuan kebermanfaatan bagi seluruh elemen di Fakultas Teknik. Segala hal baik ini dilaksanakan demi tujuan akhir untuk menciptakan rumah bersama bagi Mahasiswa/i Fakultas Teknik dengan slogan “Satu Tekad Teknik Jaya!”
            </h1>
            <br>
            <br>
            <br>

            <div class="row mt-20 mb-10">
                <div class="col-lg-4 col-md-12 col-sm-12 mt-4">
                    <a href="{{ route('pages.layananinti') }}" class="btn btn-dark fw-bolder w-100 rounded-4 bg-primarylightcolor">Layanan Inti</a>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 mt-4">
                    <a href="{{ route('pages.layananpendukung') }}" class="btn btn-dark fw-bolder w-100 rounded-4 bg-primarylightcolor">Layanan Pendukung</a>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 mt-4">
                    <a href="{{ route('pages.bidangunit') }}" class="btn btn-dark fw-bolder w-100 rounded-4 bg-primarylightcolor">Bidang dan Unit</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="background: {{ settings('site.secondarycolor') }};height: 80px;">

</div>
@stop
