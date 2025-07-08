<!DOCTYPE html>
<html lang="en">
@include('user.head')

<body class="index-page">
    @include('user.header')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="title-wrapper">
                <h1>Kontak</h1>
                <p>Ada Pertanyaan? Kami Siap Membantu!
                    Jangan ragu untuk menghubungi kami. Tim kami akan dengan senang hati menjawab semua pertanyaan Anda.
                </p>
            </div>
        </div><!-- End Page Title -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4 mb-5">
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="info-card">
                            <div class="icon-box">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <h3>Alamat</h3>
                            <p>Perum. Prima Harapan Regency, Bekasi Utara, Kota Bekasi</p>
                        </div>
                    </div>

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="info-card">
                            <div class="icon-box">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <h3>Nomor Kontak</h3>
                            <p>Telp: 08129636577<br>
                                Email: umkm.lestari.official@gmail.com</p>
                        </div>
                    </div>

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="info-card">
                            <div class="icon-box">
                                <i class="bi bi-clock"></i>
                            </div>
                            <h3>Jam Buka</h3>
                            <p>Senin - Jumat:<br>
                                9:00 - 17:00
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Contact Section -->

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
