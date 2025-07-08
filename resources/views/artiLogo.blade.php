<!DOCTYPE html>
<html lang="en">
@include('user.head')

<body class="index-page">
    @include('user.header')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="title-wrapper">
                <h1>Arti Logo</h1>
                <p>Logo kami bukan sekadar simbol visual—ia merepresentasikan nilai-nilai, visi, dan semangat yang
                    menjadi dasar berdirinya organisasi ini. Setiap elemen pada logo memiliki makna tersendiri yang
                    mencerminkan jati diri dan tujuan kami.</p>
            </div>
        </div><!-- End Page Title -->

        <!-- Author Profile Section -->
        <section id="author-profile" class="author-profile section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="author-profile-1">

                    <div class="row">
                        <!-- Author Info -->
                        <div class="col-lg-4 mb-4 mb-lg-0">
                            <div class="author-card" data-aos="fade-up">
                                <div class="author-image">
                                    <img src="{{ asset('images/logo.png') }}" alt="logo" class="img-fluid rounded">
                                </div>
                            </div>
                        </div>

                        <!-- Author Content -->
                        <div class="col-lg-8">
                            <div class="author-content" data-aos="fade-up" data-aos-delay="200">
                                <div class="content-header">
                                    <h3>Arti Logo</h3>
                                </div>
                                <div class="content-body">
                                    <p> Logo ini bermakna yg mendalam . Huruf L , yg merupakan singkatan dari Lestari,
                                        diberi warna hijau, yg menggambarkan harapan dan kesuburan. Warna hijau ini juga
                                        berawal dari pencalonan BPK H.Sudjatmiko dari partai PKB. Di dalam logo
                                        ,terdapat tulisan UMKM , yg dikelilingi oleh gambar pagi dan kapas, ini
                                        melambangkan komitmen UMKM Lestari utk membantu masyarakat agar LBH makmur dan
                                        sejahtera . Kombinasi warna hijau dan kuning, menggambarkan kesuburan dan
                                        kemakmuran, dgn kuning yg melambangkan keemasan, mencerminkan usia rata2
                                        pengurus yg penuh semangat dan pengalaman.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </section><!-- /Author Profile Section -->

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
