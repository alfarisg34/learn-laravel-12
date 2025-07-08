    <header id="header" class="header position-relative">
        <div class="container-fluid container-xl position-relative">
            <div class="top-row d-flex align-items-center justify-content-between">
                <a href="/" class="logo d-flex align-items-end">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <h1 class="sitename">UMKM Lestari</h1><span>.</span>
                </a>

                <div class="d-flex align-items-center">
                    <div class="social-links">
                        {{-- <a href="#" class="facebook"><i class="bi bi-facebook"></i></a> --}}
                        {{-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a> --}}
                        <a href="https://www.instagram.com/umkm.lestari/" class="instagram"><i
                                class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="nav-wrap">
            <div class="container d-flex justify-content-center position-relative">
                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Beranda</a></li>
                        <li><a href="/umkm" class="{{ request()->is('umkm') ? 'active' : '' }}">UMKM</a></li>
                        <li><a href="/berita" class="{{ request()->is('berita') ? 'active' : '' }}">Berita</a></li>
                        <li
                            class="dropdown {{ request()->is('visimisi') || request()->is('struktur') || request()->is('logo') ? 'active' : '' }}">
                            <a href="#"><span>Tentang Kami</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li>
                                    <a href="/visimisi" class="{{ request()->is('visimisi') ? 'active' : '' }}">Visi &
                                        Misi</a>
                                </li>
                                <li>
                                    <a href="/struktur" class="{{ request()->is('struktur') ? 'active' : '' }}">Struktur
                                        Organisasi</a>
                                </li>
                                <li>
                                    <a href="/artilogo" class="{{ request()->is('artilogo') ? 'active' : '' }}">Arti Logo</a>
                                </li>
                            </ul>
                        </li>

                        <li><a href="/kontak" class="{{ request()->is('kontak') ? 'active' : '' }}">Kontak</a>
                        </li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>
            </div>
        </div>
    </header>
