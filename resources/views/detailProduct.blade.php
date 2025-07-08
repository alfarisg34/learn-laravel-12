<!DOCTYPE html>
<html lang="en">

@include('user.head')

<body class="blog-details-page">

    @include('user.header')

    <main class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Blog Details Section -->
                    <section id="blog-details" class="blog-details section">
                        <div class="container" data-aos="fade-up">
                            <article class="article">
                                <div class="hero-img" data-aos="zoom-in">
                                    <img src="{{ asset('storage/' . $product->picture) }}" alt="Featured blog image">
                                    class="img-fluid" loading="lazy">
                                    <div class="meta-overlay">
                                        <div class="meta-categories">
                                        </div>
                                    </div>
                                </div>

                                <div class="article-content" data-aos="fade-up" data-aos-delay="100">
                                    <div class="content-header">
                                        <h1 class="title">{{ $product->title }}</h1>
                                        <div class="author-info">
                                            <div class="author-details">
                                                <div class="info">
                                                </div>
                                            </div>
                                            <div class="post-meta">
                                                <span class="date">
                                                    <i class="bi bi-calendar3"></i>
                                                    {{ \Carbon\Carbon::parse($product->created_at)->translatedFormat('j F Y') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="content">
                                        {!! $product->desc !!}
                                    </div>
                                </div>

                            </article>

                        </div>
                    </section>
                </div>

                <div class="col-lg-4 sidebar">
                    <div class="widgets-container" data-aos="fade-up" data-aos-delay="200">
                    </div>

                </div>

            </div>
        </div>

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
