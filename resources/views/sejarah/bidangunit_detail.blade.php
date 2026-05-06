@extends('layouts.layout')

@section('seo')
<meta name="description" content="{{ settings('meta.description') }}" />
<meta name="keywords" content="{{ settings('meta.keywords') }}" />

<title>Bidang dan Unit | {{ settings('site.title') }}</title>
@stop

@section('custom_css')
<link rel="stylesheet" href="{{ asset('css/featurebox.css') }}">
<style>
</style>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 py-10 bg-primarylightcolor text-center">
        <h1 class="text-white" style="font-size: 4.5vh;">{{ $bidang->name }} ({{ $bidang->singkatan }})</h1>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 bg-white">
        <div class="container mt-5 mb-10">

            @for ($rank = 1; $rank <= $maxRank; $rank++)
                <div class="row mb-20">
                    @if ($ranks[$rank] > 4)
                        <div class="tns tns-default mb-10">
                            <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000" data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true" data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false" data-tns-prev-button="#kt_team_slider_prev" data-tns-next-button="#kt_team_slider_next" data-tns-responsive="{1200: {items: 4}, 992: {items: 2}}">
                                @foreach ($bidang->pengurus as $pengurus)
                                    @if ($pengurus->jabatan->contains('pivot.rank', $rank))
                                        <div class="text-center">
                                            @if(!$pengurus->getMedia('foto_kepengurusans')->isEmpty())
                                                <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url({{ $pengurus->getFirstMediaUrl('foto_kepengurusans') }})"></div>
                                            @else
                                                <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url({{ asset('images/default.png') }})"></div>
                                            @endif

                                            <div class="mb-0">
                                                <a target="_blank" href="{{ $pengurus->instagram ?? '#' }}" class="text-dark fw-bolder text-hover-primary fs-2">{{ $pengurus->nama }}</a>
                                                <div class="fs-3 fw-bolder mt-1 primary-light-text-color">{{ $pengurus->jabatan->first()->name ?? '' }}</div>
                                                <div class="fs-5 fw-bold mt-1">{{ $pengurus->jurusan->name ?? '' }} {{ $pengurus->angkatan }}</div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <button class="btn btn-icon btn-active-color-danger" id="kt_team_slider_prev">
                                <i class="fa-solid fa-chevron-left fs-3x"></i>
                            </button>
                            <button class="btn btn-icon btn-active-color-danger" id="kt_team_slider_next">
                                <i class="fa-solid fa-chevron-right fs-3x"></i>
                            </button>
                        </div>
                    @else
                        @foreach ($bidang->pengurus as $pengurus)
                            @if ($pengurus->jabatan->contains('pivot.rank', $rank))
                                <div class="col-lg-{{ 12 / $ranks[$rank] }} col-md-{{ 12 / $ranks[$rank] }} col-sm-12">
                                    <div class="text-center">
                                        @if(!$pengurus->getMedia('foto_kepengurusans')->isEmpty())
                                            <div class="octagon mx-auto mb-5 d-flex w-250px h-250px bgi-no-repeat bgi-size-contain bgi-position-center shadow" style="background-image: url('{{ $pengurus->getFirstMediaUrl('foto_kepengurusans') }}')"></div>
                                        @else
                                            <div class="octagon mx-auto mb-5 d-flex w-250px h-250px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url({{ asset('images/default.png') }})"></div>
                                        @endif
                                        <div class="mb-0">
                                            <a target="_blank" href="{{ $pengurus->instagram }}" class="text-dark fw-bolder text-hover-primary fs-2">{{ $pengurus->nama }}</a>
                                            <div class="fs-3 fw-bolder mt-1 primary-light-text-color">{{ $pengurus->jabatan->first()->name ?? '' }}</div>
                                            <div class="fs-5 fw-bold mt-1">{{ $pengurus->jurusan->name ?? '' }} {{ $pengurus->angkatan }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            @endfor

            <hr>

            <h3 class="mt-10" style="text-align: justify;line-height: 2;">{{ $bidang->description }}</h3>

            <h1 class="mt-10" style="color: {{ settings('site.primarycolor') }}">Program Kerja</h1>

            <hr width="140" style="height:3px;border:none;color:{{ settings('site.textcolor') }};background-color:{{ settings('site.textcolor') }};opacity: 1;">

            @foreach ($bidang->divisi as $divisi)
                <a href="#" class="btn btn-dark bg-primarylightcolor fw-bolder rounded-3 fs-5">{{ $divisi->name }}</a>

                <ol style="color: {{ settings('site.textcolor') }};font-weight: 600;font-size: 1.15rem;" class="mt-5">
                    @foreach ($divisi->programkerja as $proker)
                        <li>
                            <h5>{{ $proker->name }}</h5>
                        </li>
                        <h5 style="line-height: 2;text-align:justify;">{{ $proker->description }}</h5>
                    @endforeach
                </ol>
            @endforeach
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="container">
            <div class="row mt-10 mb-10">
                <div class="d-flex align-items-center justify-content-between mb-10">
                    <a href="{{ route('pages.bidangunit_detail', $previous->slug) }}" class="btn btn-dark fw-bolder text-hover-inverse-dark" style="background: transparent;color: {{ settings('site.textcolor') }};"><i style="color: {{ settings('site.textcolor') }};" class="fa-solid fa-chevron-left text-hover-inverse-dark"></i> <span>{{ $previous->name }}</span></a>

                    <a href="{{ route('pages.bidangunit_detail', $next->slug) }}" class="btn btn-dark fw-bolder text-hover-inverse-dark" style="background: transparent;color: {{ settings('site.textcolor') }};"><span>{{ $next->name }}</span> <i style="color: {{ settings('site.textcolor') }};" class="fa-solid fa-chevron-right text-hover-inverse-dark"></i></a>
                </div>

                <div class="col-lg-3 col-md-12 col-sm-12 mt-4">
                    <a href="{{ route('pages.sejarah') }}" class="btn btn-dark bg-primarylightcolor fw-bolder w-100 rounded-3">Sejarah BEM FT</a>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 mt-4">
                    <a href="{{ route('pages.layananinti') }}" class="btn btn-dark bg-primarylightcolor fw-bolder w-100 rounded-3">Layanan Inti</a>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 mt-4">
                    <a href="{{ route('pages.layananpendukung') }}" class="btn btn-dark bg-primarylightcolor fw-bolder w-100 rounded-3">Layanan Pendukung</a>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 mt-4">
                    <a href="{{ route('pages.bidangunit') }}" class="btn btn-dark bg-primarylightcolor fw-bolder w-100 rounded-3">Bidang dan Unit</a>
                </div>
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
