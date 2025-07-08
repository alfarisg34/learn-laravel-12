<!DOCTYPE html>
<html lang="en">
@include('user.head')

<body class="index-page">
    @include('user.header')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="title-wrapper">
                <h1>Struktur organisasi</h1>
                <div class="container my-5">
                    <div class="card shadow">
                        <div class="card-body">
                            <ol class="list-group list-group-numbered">
                                <li class="list-group-item">Dewan penasihat : Bapak H .Sudjatmiko ST </li>
                                <li class="list-group-item">Dewan pembina 1 : Ibu Hj. Kurnia dewi dan mas Rangga</li>
                                <li class="list-group-item">Dewan pembina 2 : Mas Rangga</li>
                                <li class="list-group-item">Ketua : Diyan Hikmayati</li>
                                <li class="list-group-item">Wakil Ketua : Anita </li>
                                <li class="list-group-item">Sekretaris 1 : Yeni heryani</li>
                                <li class="list-group-item">Sekretaris 2 : Seni Suryani </li>
                                <li class="list-group-item">Bendahara 1 : Mustikawati</li>
                                <li class="list-group-item">Pelatihan & keterampilan : Tari dan Susanti</li>
                                <li class="list-group-item">Ekonomi kreatif dan humas : Windi lestari dan Listy</li>
                            </ol>
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
