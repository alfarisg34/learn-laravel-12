<!DOCTYPE html>
<html lang="en">
@include('user.head')

<body class="index-page">
    @include('user.header')
    <main class="main">

        <!-- Blog Hero Section -->
        <section id="blog-hero" class="blog-hero section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="blog-grid">

                    <!-- Featured Post (Large) -->
                    @if ($latestArticle)
                        <article class="blog-item featured" data-aos="fade-up">
                            <img src="{{ asset('storage/' . $latestArticle->picture) }}" alt="Blog Image"
                                class="img-fluid">
                            <div class="blog-content">
                                <div class="post-meta">
                                    <span class="date">
                                        <i class="bi bi-calendar3"></i>
                                        {{ \Carbon\Carbon::parse($latestArticle->created_at)->translatedFormat('j F Y') }}
                                    </span>
                                </div>
                                <h2 class="post-title">
                                    <a href="{{ route('articles.show', $latestArticle->id) }}"
                                        title="{{ $latestArticle->title }}">
                                        {{ $latestArticle->title }}
                                    </a>
                                </h2>
                            </div>
                        </article>
                    @else
                        <p>No articles found.</p>
                    @endif

                    <!-- End Featured Post -->

                    <!-- Regular Posts -->
                    @foreach ($articles as $article)
                        <article class="blog-item" data-aos="fade-up" data-aos-delay="100">
                            <img src="{{ asset('storage/' . $article->picture) }}" alt="Blog Image" class="img-fluid">
                            <div class="blog-content">
                                <div class="post-meta">
                                    <span class="date">
                                        <i class="bi bi-calendar3"></i>
                                        {{ \Carbon\Carbon::parse($article->created_at)->translatedFormat('j F Y') }}
                                    </span>
                                </div>
                                <h3 class="post-title">
                                    <a href="{{ route('articles.show', $article->id) }}" title="{{ $article->title }}">
                                        {{ $article->title }}
                                    </a>
                                </h3>
                            </div>
                        </article>
                    @endforeach
                </div>

            </div>

        </section><!-- /Blog Hero Section -->
        <!-- Category Section Section -->
        <section id="category-section" class="category-section section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Bagian UMKM</h2>
                <div> <span class="description-title">Bagian UMKM</span></div>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <!-- Featured Posts -->
                <div class="row gy-4 mb-4">
                    @foreach ($product1 as $product)
                        <div class="col-lg-4">
                            <article class="featured-post">
                                <div class="post-img">
                                    <img src="{{ asset('storage/' . $product->picture) }}" alt="{{ $product->title }}"
                                        class="img-fluid" loading="lazy">
                                </div>
                                <div class="post-content">
                                    <div class="category-meta">
                                        <span
                                            class="post-category">{{ $product->category->name ?? 'Uncategorized' }}</span>
                                        <div class="author-meta">
                                            <span class="date">
                                                <i class="bi bi-calendar3"></i>
                                                {{ \Carbon\Carbon::parse($product->created_at)->translatedFormat('j F Y') }}
                                            </span>
                                        </div>
                                    </div>
                                    <h2 class="title">
                                        <a href="{{ route('product.show', $product->id) }}">{{ $product->title }}</a>
                                    </h2>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

                <!-- List Posts -->
                <div class="row">
                    @foreach ($product4 as $product)
                        <div class="col-xl-4 col-lg-6">
                            <article class="list-post">
                                <div class="post-img">
                                    <img src="{{ asset('storage/' . $product->picture) }}" alt="{{ $product->name }}"
                                        class="img-fluid" loading="lazy">
                                </div>
                                <div class="post-content">
                                    <div class="category-meta">
                                        <span class="post-category">{{ $product->category->name ?? 'Product' }}</span>
                                    </div>
                                    <h3 class="title">
                                        <a href="{{ route('product.show', $product->id) }}">{{ $product->title }}</a>
                                    </h3>
                                    <div class="post-meta">
                                        <span class="date">
                                            <i class="bi bi-calendar3"></i>
                                            {{ \Carbon\Carbon::parse($product->created_at)->translatedFormat('j F Y') }}
                                        </span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- /Category Section Section -->
        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4 justify-content-between align-items-center">
                    <div class="col-lg-6">
                        <div class="cta-content" data-aos="fade-up" data-aos-delay="200">
                            <h2>Daftarkan UMKM Anda</h2>
                            <p>Ingin produk Anda tampil di direktori kami? Daftarkan UMKM Anda sekarang, gratis!</p>
                            <div class="cta-buttons d-flex flex-wrap gap-3">
                                <a href="#" class="btn text-white px-4 py-3 fs-5"
                                    style="background-color: #f75815; border-color: #f75815;">
                                    Klik Disini!
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cta-image" data-aos="zoom-out" data-aos-delay="200">
                            <img src="{{ asset('images/cta/cta-1.webp') }}" alt="" class="img-fluid">

                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Call To Action Section -->
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
