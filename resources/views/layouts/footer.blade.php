<div style="background: {{ settings('site.primarycolor') }};">
    <div class="container py-10">
        <div class="d-flex align-items-center justify-content-between">
            <div class="px-5">
                <h3 style="color: {{ settings('site.secondarycolor') }};">Tentang Kami</h3>

                <h6 class="text-white">{!! settings('site.tentangkami') !!}</h6>
                {{-- <h6 class="text-white">Website ini dikelola oleh </h6>
                <h6 class="text-white">Unit Kantor Media Informasi </h6>
                <h6 class="text-white">BEM FT UNDIP 2022</h6> --}}

            </div>
            <div class="px-5">
                <h3 style="color: {{ settings('site.secondarycolor') }};">Sosial Media</h3>

                <a href="{{ settings('footer.linkinstagram') }}" target="_blank" class="btn btn-active-danger px-4 me-2">
                    <i class="fa-brands fa-instagram fs-3 me-0 pe-0 text-white"></i>
                </a>

                <a href="{{ settings('footer.linkspotify') }}" target="_blank" class="btn btn-active-danger px-4 me-2">
                    <i class="fa-brands fa-spotify fs-3 me-0 pe-0 text-white"></i>
                </a>

                <a href="{{ settings('footer.linklinkedin') }}" target="_blank" class="btn btn-active-danger px-4 me-2">
                    <i class="fa-brands fa-linkedin fs-3 me-0 pe-0 text-white"></i>
                </a>

                <a href="{{ settings('footer.linktwitter') }}" target="_blank" class="btn btn-active-danger px-4 me-2">
                    <i class="fa-brands fa-twitter fs-3 me-0 pe-0 text-white"></i>
                </a>

                <a href="{{ settings('footer.linkyoutube') }}" target="_blank" class="btn btn-active-danger px-4 me-2">
                    <i class="fa-brands fa-youtube fs-3 me-0 pe-0 text-white"></i>
                </a>

            </div>
        </div>
        <div class="d-flex align-items-center justify-content-between mt-5">
            <div class="px-5">
                <h3 style="color: {{ settings('site.secondarycolor') }};">Kontak</h3>

                <h6 class="text-white">{{ settings('site.kontak') }}</h6>
            </div>
            <div class="px-5">
                <h3 style="color: {{ settings('site.secondarycolor') }};">{{ settings('navbar.title') }}</h3>

                <h6 class="text-white">{{ settings('navbar.tagline') }}</h6>
            </div>
        </div>
    </div>
</div>
<div class="footer py-5 d-flex flex-lg-column" style="background: {{ settings('site.primarycolor') }};" id="kt_footer">
    <!--begin::Container-->
    <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between px-10">
        <!--begin::Copyright-->
        <div class="text-white order-2 order-md-1">
            <h6 class="text-white">Copyrights © {{ date('Y') }} {{ settings('navbar.title') }}.</h6>
            {{-- <a href="https://keenthemes.com" target="_blank" class="text-gray-200 text-hover-success">Keenthemes</a> --}}
        </div>
        <!--end::Copyright-->
        <!--begin::Menu-->
        <ul class="menu menu-white menu-hover-primary fw-bold order-1">
            {{-- <li class="menu-item">
                <a href="#" target="_blank" class="menu-link px-2">Support</a>
            </li> --}}
            {{-- <li class="menu-item">
                <a href="#" target="_blank" class="menu-link px-2">Sitemap</a>
            </li> --}}
        </ul>
        <!--end::Menu-->
    </div>
    <!--end::Container-->
</div>
<!--end::Footer-->
