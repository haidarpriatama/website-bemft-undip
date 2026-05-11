@inject('navbarpostcategories', 'navbarpostcategories')
@inject('navbarbidangs', 'navbarbidang')
@inject('navbarjurusans', 'navbarjurusan')
@inject('navbarproductcategories', 'navbarproductcategories')
<!--begin::Header-->
<div id="kt_header" class="header align-items-stretch" style="height: 80px;" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '100px', lg: '150px'}">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-center">
        <!--begin::Heaeder menu toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n2 me-3" title="Show aside menu">
            <div class="btn btn-icon btn-custom w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">
                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                <span class="svg-icon svg-icon-2x">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
                        <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
        </div>
        <!--end::Heaeder menu toggle-->
        <!--begin::Header Logo-->
        <div class="header-logo me-5 me-md-10 d-flex align-items-center justify-content-center">
            <a href="{{ route('home') }}">
                <img alt="Logo" src="{{ asset('storage/'. settings('navbar.logo')) }}" class="h-40px h-lg-45px logo-default" />
                <img alt="Logo" src="{{ asset('storage/'. settings('navbar.logo')) }}" class="h-35px h-lg-40px logo-sticky" />
            </a>
            <a href="{{ route('home') }}">
                <h5 class="landing-icon-text ms-4 mt-2 mb-2" style="font-weight: 800;">{{ settings('navbar.title') }} <p class="mb-0 fw-bold">{{ settings('navbar.tagline') }}</p></h5>
            </a>
        </div>
        <!--end::Header Logo-->
        <!--begin::Wrapper-->
        <div class="d-flex align-items-stretch justify-content-end flex-lg-grow-1">
            <!--begin::Navbar-->
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                <!--begin::Menu wrapper-->
                <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <!--begin::Menu-->
                    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
                        <div class="menu-item">
                            <a class="menu-link active py-3" href="{{ route('home') }}">
                                <span class="menu-title">Beranda</span>
                            </a>
                        </div>
                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3">
                                <span class="menu-title">Profil</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="{{ route('pages.sejarah') }}">
                                        <span class="menu-title">BEM FT Undip</span>
                                    </a>
                                </div>
                                <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item menu-accordion mb-1">
                                    <span class="menu-link py-3">
                                        <span class="menu-title">Bidang dan Unit</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                        @foreach ($navbarbidangs as $bidang)
                                        <div class="menu-item">
                                            <a class="menu-link py-3" href="{{ route('pages.bidangunit_detail', $bidang->slug) }}">
                                                <span class="menu-title">{{ $bidang->name }}</span>
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item menu-accordion mb-1">
                                    <span class="menu-link py-3">
                                        <span class="menu-title">Get To Know FT</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                        @foreach ($navbarjurusans as $jurusan)
                                        <div class="menu-item">
                                            <a target="_blank" class="menu-link py-3" href="{{ $jurusan->website }}">
                                                <span class="menu-title">{{ $jurusan->name }}</span>
                                            </a>
                                        </div>
                                        @endforeach
                                        {{-- <div class="menu-item">
                                            <a class="menu-link py-3" href="https://geodesi.ft.undip.ac.id/beranda/">
                                                <span class="menu-title">Teknik Geodesi</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link py-3" href="https://geologi.ft.undip.ac.id/">
                                                <span class="menu-title">Teknik Geologi</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link py-3" href="https://elektro.undip.ac.id/v3/en/home/">
                                                <span class="menu-title">Teknik Elektro</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link py-3" href="https://industri.ft.undip.ac.id/en/home-2/">
                                                <span class="menu-title">Teknik Industri</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link py-3" href="https://tekim.ft.undip.ac.id/">
                                                <span class="menu-title">Teknik Kimia</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link py-3" href="https://mesin.ft.undip.ac.id/en/home-2/">
                                                <span class="menu-title">Teknik Mesin</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link py-3" href="https://tekkom.ft.undip.ac.id/">
                                                <span class="menu-title">Teknik Komputer</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link py-3" href="https://lingkungan.ft.undip.ac.id/en/hestia-front-2/">
                                                <span class="menu-title">Teknik Lingkungan</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link py-3" href="https://sipil.ft.undip.ac.id/">
                                                <span class="menu-title">Teknik Sipil</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link py-3" href="https://perkapalan.ft.undip.ac.id/en/home/">
                                                <span class="menu-title">Teknik Perkapalan</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link py-3" href="https://arsitektur.ft.undip.ac.id/">
                                                <span class="menu-title">Arsitektur</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link py-3" href="https://pwk.ft.undip.ac.id/id/beranda/">
                                                <span class="menu-title">Perencanaan Wilayah dan Kota</span>
                                            </a>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="{{ route('pages.upk') }}">
                                        <span class="menu-title">UPK</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="{{ route('pages.bso') }}">
                                        <span class="menu-title">BSO</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="{{ route('pages.pressrelease') }}">
                                        <span class="menu-title">Press Release</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3">
                                <span class="menu-title">Info Cah Teknik</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                @foreach ($navbarpostcategories as $category)
                                    <div class="menu-item">
                                        <a class="menu-link py-3" href="{{ route('news.type', $category->slug) }}">
                                            <span class="menu-title">{{ $category->name }}</span>
                                        </a>
                                    </div>
                                @endforeach
                                {{-- <div class="menu-item">
                                    <a class="menu-link py-3" href="{{ route('news.type', 'beasiswa') }}">
                                        <span class="menu-title">Beasiswa</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="{{ route('news.type', 'lomba') }}">
                                        <span class="menu-title">Lomba</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="{{ route('news.type', 'magang') }}">
                                        <span class="menu-title">Magang</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="{{ route('news.type', 'lowongan-kerja') }}">
                                        <span class="menu-title">Lowongan Kerja</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="{{ route('news.type', 'kajian-isu') }}">
                                        <span class="menu-title">Kajian Isu</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="{{ route('news.type', 'surat-keputusan') }}">
                                        <span class="menu-title">Surat Keputusan</span>
                                    </a>
                                </div> --}}
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="{{ settings('menu.linkktmhilang') }}">
                                        <span class="menu-title">KTM Hilang</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link py-3" target="_blank" href="{{ settings('content.linkteknikdalamangka') }}">
                                <span class="menu-title">Teknik Dalam Angka</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link py-3" target="_blank" href="{{ settings('menu.linkeristek') }}" target="_blank">
                                <span class="menu-title">E-Ristek</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link py-3" target="_blank" href="{{ settings('menu.linkpartnership') }}">
                                <span class="menu-title">Partnership</span>
                            </a>
                        </div>

                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Menu wrapper-->
            </div>
            <!--end::Navbar-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->
