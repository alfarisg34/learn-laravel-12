<!DOCTYPE html>
<html lang="en">
@include('user.head')

<body class="index-page">
    @include('user.header')
    <main class="main">
        <!-- Category Section Section -->
        <section id="category-section" class="category-section section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <!-- Featured Posts -->
                <div class="row gy-4 mb-4">
                    @foreach ($posts as $post)
                        <div class="col-lg-4">
                            <article class="featured-post">
                                <div class="post-img">
                                    <img src="{{ asset('storage/' . $post->picture) }}" alt="{{ $post->title }}"
                                        class="img-fluid" loading="lazy">
                                </div>
                                <div class="post-content">
                                    <div class="category-meta">
                                        <span class="post-category">{{ $post->category->name ?? 'Berita' }}</span>
                                        <div class="author-meta">
                                            <span class="date">
                                                <i class="bi bi-calendar3"></i>
                                                {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('j F Y') }}
                                            </span>
                                        </div>
                                    </div>
                                    <h2 class="title">
                                        <a href="{{ route('articles.show', $post->id) }}">{{ $post->title }}</a>
                                    </h2>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>

        </section>
        <!-- /Category Section Section -->
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
