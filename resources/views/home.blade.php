@extends('layouts.layout')

@section('seo')
<meta name="description" content="{{ settings('meta.description') }}" />
<meta name="keywords" content="{{ settings('meta.keywords') }}" />

<title>{{ $title ?? settings('site.title') }}</title>
@stop

@section('custom_css')
<link rel="stylesheet" href="{{ asset('css/featurebox.css') }}">
<link href="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
<style>
    .card-hover:hover{
        transform: scale(1.01);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15) !important;
    }
    .section-title {
        position: relative;
        display: inline-block;
    }
    .section-title::before {
        content: '';
        position: absolute;
        background-color: {{ settings('site.secondarycolor') }};
        width: 100%;
        height: 3px;
        bottom: -5px;
        left: 0;
        right: 0;
    }

    .carousel-indicators {
        align-items: center;
    }
    .carousel-indicators [data-bs-target] {
        box-sizing: content-box;
        flex: 0 1 auto;
        width: 10px;
        height: 10px;
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
        border-radius: 100%;
    }
    .carousel-indicators .active {
        width: 15px;
        height: 15px;
        background-color: {{ settings('site.secondarycolor') }};
    }

    .carousel-custom-item {
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .carousel-custom-item::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-image: url('{{ asset("images/bgdekanat.png") }}');
        filter: blur(3px);
        z-index: -1;
    }

    .fa-5x {
        font-size: 5em;
    }

    .vh-100 {
        height: 100vh;
    }

    @media (min-width: 768px) {
        .carousel-custom-item {
            height: 100vh;
        }

        .carousel-custom-item .container {
            height: 100%;
            display: flex;
            flex-direction: column;
            margin-top: 20%;
        }
    }

    .fc-event{
        cursor: pointer;
    }

    .half-outline-circle {
        margin-left: -30rem;
        width: 50rem;
        height: 50rem;
        /* border-top-left-radius: 110px; */
        border-top-right-radius: 50%;
        border-bottom-right-radius: 50%;
        border-left: none;
    }

    @media (max-width: 768px) {
        .mission_div .mission_number {
            margin-left: 0rem !important;
        }
        .mission_div .mission_value {
            margin-left: 2rem !important;
        }
    }

    .fc .fc-daygrid-day.fc-day-today {
        background-color: {{ settings('site.secondarycolor') }}50;
    }
</style>
@stop

@section('content')
<section id="welcome">
    <!-- Carousel wrapper -->
    <div id="carouselHome" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item carousel-custom-item active">
            <div class="d-flex align-items-center vh-100">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    <img class="rounded-circle shadow" src="{{ asset('storage/'. settings('navbar.logo')) }}" height="300" alt="">
                    <h1 class="mb-4 text-white" style="font-size: 6rem;text-shadow: 2px 2px {{ settings('site.textcolor') }};">{{ settings('navbar.title') }}</h1>
                    <h1 class="mb-5 text-white" style="text-shadow: 2px 2px {{ settings('site.textcolor') }};">Kabinet {{ settings('navbar.kabinet') }}</h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- <div class="carousel-item">
            <div class="d-flex justify-content-center align-items-center vh-100">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <i class="fas fa-laptop fa-5x mb-4"></i>
                    <h1 class="mb-4">Responsive Design</h1>
                    <p class="lead mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in ultricies purus. Nam auctor mi vitae nisi consequat, at suscipit nibh sollicitudin. Sed sed justo euismod, commodo dolor vel, pellentesque eros.</p>
                    <a href="#" class="btn btn-primary btn-lg">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="d-flex justify-content-center align-items-center vh-100">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <i class="fas fa-cog fa-5x mb-4"></i>
                    <h1 class="mb-4">Customizable Options</h1>
                    <p class="lead mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in ultricies purus. Nam auctor mi vitae nisi consequat, at suscipit nibh sollicitudin. Sed sed justo euismod, commodo dolor vel, pellentesque eros.</p>
                    <a href="#" class="btn btn-primary btn-lg">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
        </div>
    </div>
    <!-- Carousel wrapper -->
    {{-- <div class="d-flex align-items-center justify-content-center" style="background-image: url('{{ asset("images/1small.png") }}');background-repeat: no-repeat;background-size: cover;margin-top: -1%;"> --}}
        {{-- <img src="" class="img-fluid w-100" style=""> --}}
        {{-- <img style="width: 25%;height: 25%;" src="{{ asset('images/Logo Kolaborasi Juang PNG 2.png') }}" alt=""> --}}

    {{-- </div> --}}
    {{-- <img src="{{ asset('images/bghome.png') }}" class="img-fluid" style="margin-top: -5%;"> --}}
</section>
<section id="tentangkami">
    <div class="text-center" style="background: {{ settings('site.primarylightcolor') }};">
        <h1 class="py-5 text-white" style="font-size: 3rem;">TENTANG KAMI</h1>
    </div>
    <div class="mt-10 text-center" style="font-size: 2rem;">
        {!! $profiles->where('type', 'Tentang Kami')->first()->value ?? 'Not found' !!}
    </div>
    <h2 class="text-white w-100 w-xl-25 w-l-25 mt-20" style="background: {{ settings('site.secondarycolor') }};text-align: center;padding-right: 2rem;padding-top: 0.3rem;padding-bottom: 0.3rem;font-size: 3.5rem;border-top-right-radius: 25px;border-bottom-right-radius: 25px;">VISI</h2>
    <div class="text-center">
        <i class="fa-solid fa-quote-left" style="color: {{ settings('site.secondarycolor') }};font-size: 3rem;"></i>
        <div class="mt-20" style="font-size: 3rem;line-height: 1.5;">{!! $profiles->where('type', 'Visi')->first()->value ?? 'Not found' !!}</div>
    </div>
    <div class="d-flex justify-content-end mt-20 mb-5">
        <h2 class="text-white w-100 w-xl-25 w-l-25" style="background: {{ settings('site.secondarycolor') }};text-align: center;padding-right: 2rem;padding-top: 0.3rem;padding-bottom: 0.3rem;font-size: 3.5rem;border-top-left-radius: 25px;border-bottom-left-radius: 25px;">MISI</h2>
    </div>
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 d-none d-lg-block">
            <div class="half-outline-circle shadow-sm" style="border: 5px solid {{ settings('site.secondarycolor') }};"></div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 d-flex flex-column justify-content-around">
            @foreach ($profiles->where('type', 'Misi') as $mission)
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 d-flex align-items-center mission_div">
                        <span class="badge badge-primary rounded-3 shadow mission_number" style="font-size: 2.5rem;margin-left: @if($loop->first || $loop->last) -8rem @else {{ 0 - abs($loop->iteration - 3) * 2 }}rem @endif;background-color:{{ settings('site.secondarycolor') }};">{{ $loop->iteration }}</span>
                        <span class="fs-1 text-bold text-capitalize ms-12 mission_value">{!! $mission->value!!}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section id="beritaterkini">
    <div class="px-10 mt-20">
        <h1>Artikel Terbaru</h1>
        <hr width="140" style="height:3px;border:none;color:{{ settings('site.secondarycolor') }};background-color:{{ settings('site.secondarycolor') }};opacity: 1;">

        <div class="row mt-5">
            @foreach ($posts as $post)
                <div class="col-lg-3 col-md-6 col-sm-12 p-lg-10">
                    <div class="card shadow-sm card-flush mb-3">
                        {{-- <a href="#"> --}}
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
                            <div class="card-body rounded">
                                <span class="text-muted fst-italic fs-6">{{ $post->published_at->format('d F Y') }} by {{ $post->author->name ?? '' }}</span>
                                <h4 class="card-title mt-2">{!! $post->title !!}</h4>
                                {{-- <p class="text-dark">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                            </div>
                        {{-- </a> --}}
                        <div class="card-footer py-4">
                            <a href="{{ route('news.post', ['type' => 'article', 'slug' => $post->slug]) }}" class="btn btn-dark rounded-3 py-3" target="_blank" style="background: {{ settings('site.primarylightcolor') }};">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section id="layanan">
    <div class="px-10 mt-20">
        <div class="row mb-10">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <a href="#" class=" d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#modal_prestasi">
                    <div class="feature-box fbox-center fbox-effect rounded rounded-5 p-10 shadow-sm card-hover h-xl-325px h-l-325px w-xl-75 w-l-75 w-sm-100 w-md-100 mb-5" style="background: {{ settings('site.primarylightcolor') }};">
                        <div class="fbox-icon">
                            <i class="icon-screen fa-solid fa-graduation-cap"></i>
                        </div>
                        <h3 style="color: {{ settings('site.secondarycolor') }};">Tebar Prestasi</h3>

                        <h6 class="text-white" style="text-align: justify;text-justify: inter-word;line-height: 1.5;">Layanan berupa dukungan bagi mahasiswa FT Undip yang sedang atau akan mengikuti kegiatan riset di tingkat nasional dan internasional serta apresiasi bagi mahasiswa FT Undip yang berprestasi melalui Official Account LINE BEM FT Undip.</h6>
                    </div>
                </a>

                <div class="modal fade" tabindex="-1" id="modal_prestasi">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content rounded rounded-5">
                            <div class="modal-body p-0 rounded rounded-5">
                                <div id="carouselPrestasi" class="carousel slide" data-bs-ride="true">
                                    <div class="carousel-indicators">
                                        @foreach ($prestasis as $key => $prestasi)
                                        <button type="button" data-bs-target="#carouselPrestasi" data-bs-slide-to="{{$key}}" @if($loop->first) class="active" aria-current="true" @endif aria-label="Slide {{$key+1}}"></button>
                                        @endforeach
                                    </div>
                                    <div class="carousel-inner rounded rounded-5">
                                        @foreach ($prestasis as $prestasi)
                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                <img src="{{ asset('storage/'. $prestasi->image) }}" class="d-block w-100" alt="...">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselPrestasi" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselPrestasi" data-bs-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Next</span>
                                    </button>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <a href="{{ route('news.type', 'beasiswa') }}" class=" d-flex align-items-center justify-content-center">
                    <div class="feature-box fbox-center fbox-effect rounded rounded-5 p-10 shadow-sm card-hover h-xl-325px h-l-325px w-xl-75 w-l-75 w-sm-100 w-md-100 mb-5" style="background: {{ settings('site.primarylightcolor') }};">
                        <div class="fbox-icon">
                            <i class="icon-screen fa-solid fa-user-graduate"></i>
                        </div>
                        <h3 style="color: {{ settings('site.secondarycolor') }};">Beasiswa</h3>

                        <h6 class="text-white" style="text-align: justify;text-justify: inter-word;line-height: 1.5;">Sumber informasi beasiswa yang sedang membuka pendaftaran dari sumber-sumber yang terpercaya yaitu menjalin kerjasama atau masuk secara resmi ke Universitas Diponegoro.</h6>
                    </div>
                </a>
            </div>
        </div>

        <div class="row mt-10">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <a href="{{ route('news.type', 'lomba') }}" class=" d-flex align-items-center justify-content-center">
                    <div class="feature-box fbox-center fbox-effect rounded rounded-5 p-10 shadow-sm card-hover h-xl-325px h-l-325px w-xl-75 w-l-75 w-sm-100 w-md-100 mb-5" style="background: {{ settings('site.primarylightcolor') }};">
                        <div class="fbox-icon">
                            <i class="icon-screen fa-solid fa-book-bookmark"></i>
                        </div>
                        <h3 style="color: {{ settings('site.secondarycolor') }};">Lomba</h3>

                        <h6 class="text-white" style="text-align: justify;text-justify: inter-word;line-height: 1.5;">Layanan yang membagikan info-info perlombaan di bidang English Skill dan DIKTI serta pendelegasian ke luar negeri melalui Official Account LINE BEM FT Undip.</h6>
                    </div>
                </a>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <a href="{{ settings('content.linkecritics') }}" class=" d-flex align-items-center justify-content-center">
                    <div class="feature-box fbox-center fbox-effect rounded rounded-5 p-10 shadow-sm card-hover h-xl-325px h-l-325px w-xl-75 w-l-75 w-sm-100 w-md-100 mb-5" style="background: {{ settings('site.primarylightcolor') }};">
                        <div class="fbox-icon">
                            <i class="icon-screen fa-solid fa-pencil"></i>
                        </div>
                        <h3 style="color: {{ settings('site.secondarycolor') }};">E-Critics</h3>

                        <h6 class="text-white" style="text-align: justify;text-justify: inter-word;line-height: 1.5;">Wadah bagi mahasiswa Fakultas Teknik untuk memberikan kritik dan sarannya kepada BEM FT UNDIP. Masukan dan saran yang diberikan dapat menjadi evaluasi terhadap pelaksanaan pelayanan BEM, pengelolaan keorganisasian, dan lainnya.</h6>
                    </div>
                </a>
            </div>
        </div>
        {{-- <i class="icon-screen fa-solid fa-user-graduate"></i>
            <i class="icon-screen fa-solid fa-book-bookmark"></i>
            <i class="icon-screen fa-solid fa-pencil"></i> --}}
    </div>
</section>
<section id="infocahteknik">
    <div class="px-10 mt-20">
        <h1>Info Cah Teknik</h1>
        <hr width="140" style="height:3px;border:none;color:{{ settings('site.secondarycolor') }};background-color:{{ settings('site.secondarycolor') }};opacity: 1;">

        <div class="row">
            @foreach ($postcategories as $category)
                <div class="col-lg-6 col-md-12 col-sm-12 mb-5">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('news.type', $category->slug) }}" class="btn btn-lg btn-icon btn-dark rounded-circle me-5" style="background: {{ settings('site.primarylightcolor') }};"><i class="fa-solid fa-newspaper fs-3"></i></a>
                        <a href="{{ route('news.type', $category->slug) }}"><h3 class="mb-0">{{ $category->name }}</h3></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section id="suarateknik">
    <div class="px-10 mt-20 text-center">
        <h1 class="section-title">Suara Teknik</h1>

        <div class="mt-5">
            <iframe style="border-radius:12px" src="{{ settings('content.linkspotifyhomepage') }}" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        </div>
    </div>
</section>
<section id="kalendercahteknik">
    <div class="px-10 mt-20 mb-20">
        <h1>Kalender Cah Teknik</h1>
        <hr width="140" style="height:3px;border:none;color:{{ settings('site.secondarycolor') }};background-color:{{ settings('site.secondarycolor') }};opacity: 1;">

        <div class="card">
            <div class="card-body">
                <div id="kt_kalendercahteknik"></div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" id="calendarModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 id="modal-title">Modal title</h3>

                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                <span class="svg-icon svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                                    </svg>
                                </span>
                            </div>
                            <!--end::Close-->
                        </div>

                        <div>
                            <p id="modal-description">Modal body text goes here.</p>

                            <div class="border border-gray-300 border-dashed rounded py-10 px-10 mb-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-regular fa-calendar fs-1 me-3" style="color: {{ settings('site.primarylightcolor') }}"></i>
                                        <div class="fs-1 fw-bolder counted text-center" data-kt-countup="true" data-kt-countup-value="4500" data-kt-countup-prefix="$">
                                            <span id="modal-start-date">
                                                01 November 2022
                                            </span>
                                            <br>
                                            <span id="modal-start-hour">
                                                12:00 AM
                                            </span>
                                        </div>
                                    </div>
                                    <!--begin::Svg Icon | path: assets/media/icons/duotone/Navigation/Minus.svg-->
                                    <span class="svg-icon svg-icon-muted svg-icon-2hx text-danger"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
                                    </svg></span>
                                    <!--end::Svg Icon-->
                                    <div class="d-flex align-items-center">
                                        <i class="fa-regular fa-calendar fs-1 me-3" style="color: {{ settings('site.primarylightcolor') }}"></i>
                                        <div class="fs-1 fw-bolder counted text-center" data-kt-countup="true" data-kt-countup-value="4500" data-kt-countup-prefix="$">
                                            <span id="modal-end-date">02 November 2022</span>
                                            <br>
                                            <span id="modal-end-hour">12:00 AM</span>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="d-flex align-items-center justify-content-between">
                                    <div id="modal-time-start" class="fw-bold fs-6 text-gray-400">08:00</div>
                                    <div id="modal-time-end" class="fw-bold fs-6 text-gray-400">10:00</div>
                                </div> --}}
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="enigmaft">
    <div class="px-10 mt-20 mb-20">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 d-flex align-items-center justify-content-center">
                <h1 style="line-height: 2;">Terkhusus untuk para <br>
                    <span style="text-decoration: underline;">#CahTeknik</span>,  yuk segera <br>
                    unduh aplikasi <a target="_blank" href="https://play.google.com/store/apps/details?id=com.bemftundip.app"><span class="rounded-3 p-3 text-dark" style="background: {{ settings('site.secondarycolor') }};">Enigma FT</span></a> <br>
                    dan temukan beragam <br>
                    informasi terbaru di <br>
                    Fakultas Teknik!</h1>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <img class="img-fluid" src="{{ asset('images/Galaxy Note 20 Ultra.png') }}" alt="enigma">
            </div>
        </div>
    </div>
</section>
@stop

@section('custom_js')
<script src="{{ asset('plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
<script src="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<script>
    const element = document.getElementById("kt_kalendercahteknik");

    var todayDate = moment().startOf("day");
    var YM = todayDate.format("YYYY-MM");
    var YESTERDAY = todayDate.clone().subtract(1, "day").format("YYYY-MM-DD");
    var TODAY = todayDate.format("YYYY-MM-DD");
    var TOMORROW = todayDate.clone().add(1, "day").format("YYYY-MM-DD");

    const myModal = new bootstrap.Modal('#calendarModal', {
        keyboard: false
    });

    var calendarEl = document.getElementById("kt_kalendercahteknik");
    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek"
        },
        height: 700,
        contentHeight: 680,
        aspectRatio: 2,  // see: https://fullcalendar.io/docs/aspectRatio

        nowIndicator: true,
        now: TODAY + "T09:25:00", // just for demo

        views: {
            dayGridMonth: { buttonText: "month" },
            timeGridWeek: { buttonText: "week" },
            timeGridDay: { buttonText: "day" }
        },

        initialView: "dayGridMonth",
        initialDate: TODAY,

        editable: false,
        dayMaxEvents: true, // allow "more" link when too many events
        navLinks: true,
        events: [
            @foreach ($events as $event)
                {
                    'title': '{{ $event->title }}',
                    'description': '{{ $event->description }}',
                    'sdate': '{{ $event->start_date->format("d F Y") }}',
                    'edate': '{{ $event->end_date->format("d F Y") }}',
                    'shour': '{{ $event->start_date->format("H:i A") }}',
                    'ehour': '{{ $event->end_date->format("H:i A") }}',
                    'start': '{{ $event->start_date }}',
                    'end': '{{ $event->end_date }}',
                    'allDay' : true,
                },
            @endforeach
        ],
        eventColor: '{{ settings("site.primarylightcolor") }}',
        eventClick:  function(event, jsEvent, view) {
            console.log(event.event);
            document.getElementById('modal-title').innerHTML = event.event.title;
            document.getElementById('modal-description').innerHTML = event.event.extendedProps.description;
            document.getElementById('modal-start-date').innerHTML = event.event.extendedProps.sdate;
            document.getElementById('modal-end-date').innerHTML = event.event.extendedProps.edate;
            document.getElementById('modal-start-hour').innerHTML = event.event.extendedProps.shour;
            document.getElementById('modal-end-hour').innerHTML = event.event.extendedProps.ehour;
            // $('#eventUrl').attr('href',event.url);
            myModal.show();
        },

        eventContent: function (info) {
            var element = $(info.el);

            if (info.event.extendedProps && info.event.extendedProps.description) {
                if (element.hasClass("fc-day-grid-event")) {
                    element.data("content", info.event.extendedProps.description);
                    element.data("placement", "top");
                    KTApp.initPopover(element);
                } else if (element.hasClass("fc-time-grid-event")) {
                    element.find(".fc-title").append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                } else if (element.find(".fc-list-item-title").lenght !== 0) {
                    element.find(".fc-list-item-title").append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                }
            }
        }
    });

    calendar.render();
</script>
@stop
