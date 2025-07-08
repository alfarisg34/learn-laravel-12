<!DOCTYPE html>
<html lang="en">
@include('user.head')

<body class="index-page">
    @include('user.header')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="title-wrapper">
                <h1>Visi</h1>
                <p>Menjadi organisasi yg berakhalaqul qarimah ,bermatabat dan bermanfaat bagi sesama, serta
                    menyelenggarakan event-event UMKM naik kelas yg memiliki daya saing di tingkat lokal maupun
                    nasional.
                </p>
                <br><br>
                <br><br>
                <h1>Misi</h1>
                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="row features-boxes gy-4 mt-3">
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="feature-box">
                                <p>Mendukung dan menyediakan wadah untuk berbagai ide-ide kreatif dari para pelaku UMKM.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="feature-box">
                                <p>Mendorong, merancang, mengoptimalkan, dan membina kemampuan SDM di bidang jasa maupun
                                    produk-produk unggulan untuk mencapai kualitas terbaik.</p>
                            </div>
                        </div>
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
                            <div class="feature-box">
                                <p>Meningkatkan perekonomian keluarga, masyarakat, dan negara melalui UMKM yang
                                    berkualitas.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Page Title -->
    </main>

    @include('user.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>


    <!-- Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
