<!DOCTYPE html>
<html lang="en">
@include('user.head')

<body class="index-page">
    @include('user.header')
    <main class="main">
        <div class="container">
            <form method="GET" action="{{ url('/umkm') }}" class="mb-4">
                <div class="row g-2">
                    <!-- Category Filter -->
                    <div class="col-md-4">
                        <select name="category" class="form-select">
                            <option value="">-- All Categories --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Location Filter -->
                    <div class="col-md-4">
                        <input type="text" name="location" class="form-control" placeholder="Enter location..."
                            value="{{ request('location') }}">
                    </div>

                    <!-- Submit Button -->
                    <div class="col-md-4">
                        <button type="submit" class="btn text-white w-100"
                            style="background-color: #436c56; border-color: #436c56;">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>


        <!-- Category Section Section -->
        <section id="category-section" class="category-section section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <!-- Featured Posts -->
                <div class="row gy-4 mb-4">
                    @foreach ($products as $product)
                        <div class="col-lg-4">
                            <article class="featured-post">
                                <div class="post-img">
                                    <img src="{{ asset('storage/' . $product->picture) }}" alt="{{ $product->title }}"
                                        class="img-fluid" loading="lazy">
                                </div>
                                <div class="post-content">
                                    <div class="category-meta">
                                        <span
                                            class="post-category">{{ $product->category->name ?? 'Uncategorized' }} - {{ $product->village_name  ?? '-' }}</span>
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
