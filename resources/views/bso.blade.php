@extends('layouts.layout')

@section('seo')
<meta name="description" content="{{ settings('meta.description') }}" />
<meta name="keywords" content="{{ settings('meta.keywords') }}" />

<title>BSO | {{ settings('site.title') }}</title>
@stop

@section('custom_css')
<link rel="stylesheet" href="{{ asset('css/featurebox.css') }}">
<style>
</style>
@stop

@section('content')
<div class="row text-center">
    <div class="col-lg-12 col-md-12 col-sm-12 py-10 border-bottom border-warning bg-primarylightcolor">
        <h1 class="text-white" style="font-size: 4.5vh;">BSO</h1>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="container mt-20 mb-20">
            <div class="row">
                @foreach ($bsos as $bso)
                    <div class="col-lg-3 col-md-12 col-sm-12 mb-10">
                        <a href="{{ $bso->url ?? '#' }}" target="_blank">
                            <div class="card shadow-sm rounded rounded-5 h-275px bg-hover-warning text-hover-inverse-warning zoom bg-secondarycolor">
                                <div class="card-body ">
                                    <div class="text-center px-4">
                                        <img class="mw-100 mh-250px card-rounded-bottom" alt="" src="{{ $bso->getFirstMediaUrl('logobsos') }}"/>
                                    </div>

                                    <h2 class="mt-5" style="color: #000957;">{{ $bso->name }}</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div style="background: {{ settings('site.secondarycolor') }};height: 80px;">

</div>
@stop
