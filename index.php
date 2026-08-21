<?php
$data = json_decode(file_get_contents(__DIR__ . '/data.json'), true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mayees Boutique | Designer Sarees, Dresses &amp; Jewellery Online</title>

    <!-- SEO -->
    <meta name="description" content="Shop Mayees Boutique for designer sarees, bridal lehengas, party wear dresses and fine jewellery. Handloom fabrics, traditional embroidery and contemporary Indian fashion since 2015." />
    <meta name="keywords" content="Mayees Boutique, designer sarees online, women's ethnic wear, silk sarees, Kanjivaram sarees, Banarasi sarees, bridal lehenga, wedding sarees, party wear dresses, Indo-Western dresses, designer blouses, Indian jewellery online, kundan jewellery, temple jewellery, women's boutique India" />
    <meta name="author" content="Mayees Boutique" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="https://mayees.com/" />

    <!-- Open Graph -->
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Mayees Boutique" />
    <meta property="og:title" content="Mayees Boutique | Designer Sarees, Dresses &amp; Jewellery Online" />
    <meta property="og:description" content="Shop designer sarees, bridal lehengas, party wear dresses and fine jewellery, handcrafted with traditional Indian embroidery and handloom fabrics." />
    <meta property="og:image" content="https://mayees.com/img/logo.png" />
    <meta property="og:url" content="https://mayees.com/" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Mayees Boutique | Designer Sarees, Dresses &amp; Jewellery Online" />
    <meta name="twitter:description" content="Shop designer sarees, bridal lehengas, party wear dresses and fine jewellery at Mayees Boutique." />
    <meta name="twitter:image" content="https://mayees.com/img/logo.png" />

    <meta name="theme-color" content="#c11e6b" />
    <link rel="icon" type="image/png" sizes="32x32" href="img/fav.png" />
    <?php include __DIR__ . '/components/styles.php'; ?>
</head>
<body>

    <!-- page loader -->
    <div id="load" class="page-loader">
        <img src="img/logo.png" alt="Aman India" class="page-loader-logo">
        <span class="page-loader-spinner" aria-hidden="true"></span>
    </div>
    <!--/ page loader -->

    <?php include __DIR__ . '/components/header.php'; ?>

    <!-- main -->
    <main>
        <!-- carousel -->
        <section class="hero-carousel">
            <div class="swiper heroSwiper">
                <div class="swiper-wrapper">

                    <?php foreach ($data['hero_slides'] as $i => $slide): ?>
                    <div class="swiper-slide<?php echo $i === 0 ? ' swiper-slide-active' : ''; ?>">
                        <div class="hero-slide-bg" style="background-image: url('<?php echo htmlspecialchars($slide['image']); ?>');"></div>
                        <div class="hero-overlay"></div>
                        <div class="mh-container hero-slide-inner">
                            <div class="hero-content">
                                <span class="hero-eyebrow"><?php echo htmlspecialchars($slide['eyebrow']); ?></span>
                                <h1 class="hero-title"><?php echo htmlspecialchars($slide['title']); ?></h1>
                                <span class="hero-divider"></span>
                                <p class="hero-subtitle"><?php echo htmlspecialchars($slide['subtitle']); ?></p>
                                <a href="#" class="hero-cta"><?php echo htmlspecialchars($slide['cta']); ?></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>

                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev" role="button" aria-label="Previous slide"></div>
                <div class="swiper-button-next" role="button" aria-label="Next slide"></div>
                <span class="hero-scroll-cue" aria-hidden="true"></span>
            </div>
        </section>
        <!--/ carousel-->

        <!-- categories -->
        <section class="categories-section">
            <div class="mh-container">
                <div class="section-heading" data-aos="fade-up">
                    <span class="section-eyebrow">
                        <svg viewBox="0 0 60 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 8c8-6 14 6 22 0s14-6 20 0" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
                            <path d="M50 3l8 5-8 5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Shop By
                    </span>
                    <h2 class="section-title">Collections</h2>
                    <p class="section-subtitle">Curated styles for every celebration</p>
                </div>
            </div>

            <div class="mh-container categories-carousel-wrap">
                <div class="swiper categoriesSwiper">
                    <div class="swiper-wrapper">

                        <?php foreach ($data['categories'] as $cat): ?>
                        <div class="swiper-slide">
                            <a href="#" class="category-card">
                                <img src="<?php echo htmlspecialchars($cat['image']); ?>" alt="<?php echo htmlspecialchars($cat['title']); ?>" loading="lazy">
                                <div class="category-card-overlay"></div>
                                <div class="category-card-body">
                                    <h3 class="category-card-title"><?php echo htmlspecialchars($cat['title']); ?></h3>
                                    <p class="category-card-text"><?php echo htmlspecialchars($cat['text']); ?></p>
                                    <span class="category-card-cta">Explore <span aria-hidden="true">&rarr;</span></span>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; ?>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="category-swiper-prev" role="button" aria-label="Previous categories"></div>
                <div class="category-swiper-next" role="button" aria-label="Next categories"></div>
            </div>
        </section>
        <!--/ categories -->

         <!-- featured products -->
         <section class="featured-products">
            <div class="mh-container">
                <div class="section-heading" data-aos="fade-up">
                    <span class="section-eyebrow">
                        <svg viewBox="0 0 60 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 8c8-6 14 6 22 0s14-6 20 0" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
                            <path d="M50 3l8 5-8 5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        New Arrivals
                    </span>
                    <h2 class="section-title">Fresh Off The Loom</h2>
                    <p class="section-subtitle">Handpicked new arrivals across sarees, dresses &amp; jewellery</p>
                </div>

                <div class="products-grid">

                    <?php foreach ($data['featured_products'] as $p): ?>
                    <div class="product-card" data-aos="fade-up">
                        <div class="product-card-media">
                            <span class="product-badge">New</span>
                            <img src="<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['name']); ?>" loading="lazy">
                            <button type="button" class="product-enquiry-btn">Enquiry Now</button>
                        </div>
                        <div class="product-card-body">
                            <h3 class="product-name"><?php echo htmlspecialchars($p['name']); ?></h3>
                            <div class="product-price">
                                <span class="price-old">&#8377;<?php echo htmlspecialchars($p['price_old']); ?></span>
                                <span class="price-new">&#8377;<?php echo htmlspecialchars($p['price_new']); ?></span>
                                <span class="price-off"><?php echo htmlspecialchars($p['price_off']); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>

                <div class="products-view-all">
                    <a href="products-list.php" class="btn-view-all">View All Products</a>
                </div>
            </div>
         </section>
         <!--/ featured products -->

         <!-- latest collection -->
          <section class="latest-collection-home">
            <div class="mh-container">
                <div class="section-heading" data-aos="fade-up">
                    <span class="section-eyebrow">
                        <svg viewBox="0 0 60 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 8c8-6 14 6 22 0s14-6 20 0" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
                            <path d="M50 3l8 5-8 5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Latest Arrivals
                    </span>
                    <h2 class="section-title">Styles That Will Leave You Speechless</h2>
                    <p class="section-subtitle">Curated styles for every special moment</p>
                </div>
            </div>

            <div class="latest-collection-grid">
                <?php foreach ($data['latest_collection'] as $item): ?>
                <a href="#" class="latest-collection-item">
                    <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" loading="lazy">
                    <div class="latest-collection-overlay"></div>
                    <div class="latest-collection-body">
                        <h3 class="latest-collection-title"><?php echo htmlspecialchars($item['title']); ?></h3>
                        <p class="latest-collection-text"><?php echo htmlspecialchars($item['text']); ?></p>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
          </section>
          <!--/ latest collection-->

          <!-- about intro -->
           <section class="about-intro">
            <div class="mh-container">
                <div class="about-intro-grid">

                    <div class="about-intro-media" data-aos="fade-right">
                        <div class="about-intro-media-frame">
                            <img src="img/boutique.jpg" alt="Mayees Boutique store interior" loading="lazy">
                        </div>
                        <div class="about-intro-badge">
                            <span class="about-intro-badge-num">11+</span>
                            <span class="about-intro-badge-text">Years of Excellence</span>
                        </div>
                    </div>

                    <div class="about-intro-content" data-aos="fade-left">
                        <span class="section-eyebrow">
                            <svg viewBox="0 0 60 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 8c8-6 14 6 22 0s14-6 20 0" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
                                <path d="M50 3l8 5-8 5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            About Mayees
                        </span>
                        <h2 class="section-title about-intro-title">Our Story</h2>
                        <p class="about-intro-text">Mayees Boutique Pvt. Ltd. has been serving the fashion industry from 11 years and still counting. Mayees Boutique was started by a young Entrepreneur Mrs. Hanisha Devi. For promoting the Mayees brand and expanding the reachability of brand, Mayees Boutique has started organising the various exhibitions and fashion shows in India. We have also organised our events in USA with 3 places in early stage and tasted the success of happening it in 45 different locations of USA. We are known for our luxurious, contemporary style that reflects traditional Indian colours, Handloom fabrics and embroidery. We are proud to announce our visibility and credibility of Indian fashion cultures to the 45 different places in USA and India.</p>
                        <a href="about.php" class="btn-view-all about-intro-btn">Read More</a>
                    </div>

                </div>
            </div>
           </section>
           <!--/ about intro-->

           <!-- offer section -->
            <section class="offer-section">
                <div class="mh-container">
                    <h2 class="offer-title" data-aos="fade-up">Running Offers on 60%</h2>

                    <div class="swiper mySwiper-offer">
                        <div class="swiper-wrapper">

                            <?php foreach ($data['offers'] as $o): ?>
                            <div class="swiper-slide">
                                <div class="offer-card">
                                    <div class="offer-card-media">
                                        <span class="offer-badge"><?php echo htmlspecialchars($o['badge']); ?></span>
                                        <img src="<?php echo htmlspecialchars($o['image']); ?>" alt="<?php echo htmlspecialchars($o['name']); ?>" loading="lazy">
                                    </div>
                                    <div class="offer-card-body">
                                        <p class="offer-card-name"><?php echo htmlspecialchars($o['name']); ?></p>
                                        <div class="offer-card-price">
                                            <span class="offer-price-new"><?php echo htmlspecialchars($o['price_new']); ?></span>
                                            <span class="offer-price-old"><?php echo htmlspecialchars($o['price_old']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                    <div class="offer-view-all">
                        <a href="products-list.php" class="btn-view-all">View All</a>
                    </div>
                </div>
            </section>
            <!--/ offer section-->

        <!-- floating actions -->
        <a href="https://wa.me/919848062323" target="_blank" rel="noopener" class="floating-whatsapp" aria-label="Chat on WhatsApp">
            <svg viewBox="0 0 32 32" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.004 3C9.107 3 3.5 8.607 3.5 15.504c0 2.35.646 4.61 1.87 6.59L3 29l7.086-2.328a12.46 12.46 0 0 0 5.918 1.507h.005c6.897 0 12.503-5.607 12.503-12.504C28.512 8.778 22.9 3 16.004 3Zm0 22.79h-.004a10.36 10.36 0 0 1-5.28-1.447l-.379-.225-3.945 1.297 1.318-3.845-.247-.395a10.34 10.34 0 0 1-1.586-5.51c0-5.72 4.657-10.376 10.377-10.376 2.773 0 5.379 1.08 7.34 3.043a10.31 10.31 0 0 1 3.036 7.343c0 5.72-4.657 10.115-10.63 10.115Zm5.68-7.719c-.31-.156-1.837-.907-2.122-1.01-.285-.104-.492-.156-.7.156-.207.311-.802 1.01-.984 1.217-.181.208-.362.234-.673.078-.31-.156-1.31-.483-2.494-1.538-.922-.822-1.544-1.837-1.725-2.148-.181-.311-.02-.479.137-.634.14-.14.31-.363.466-.545.156-.181.207-.311.31-.519.104-.208.052-.39-.026-.545-.078-.156-.7-1.687-.959-2.31-.253-.607-.51-.524-.7-.534l-.596-.01c-.207 0-.545.078-.83.39-.285.31-1.088 1.063-1.088 2.594s1.114 3.01 1.27 3.218c.156.207 2.192 3.348 5.31 4.695.742.32 1.32.512 1.772.655.744.237 1.42.204 1.955.124.596-.089 1.837-.751 2.096-1.476.259-.726.259-1.347.181-1.476-.078-.13-.285-.208-.596-.363Z"/>
            </svg>
        </a>
        <!-- <a href="#" class="floating-appointment">Book An Appointment</a> -->
        <!--/ floating actions -->

       
    </main>
    <!--/ main -->

    <?php include __DIR__ . '/components/footer.php'; ?>

    <!-- search modal -->
    <div class="modal fade search-modal" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title" id="searchModalLabel">Search Mayees Boutique</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="search-wrap">
                        <div class="search-input-wrap">
                            <svg class="search-input-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.8"/>
                                <path d="M21 21L16.65 16.65" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                            </svg>
                            <input type="text" id="headerSearchInput" class="search-modal-input" placeholder="Search for sarees, dresses, jewellery..." autocomplete="off">
                        </div>
                        <div id="searchSuggestions" class="search-suggestions"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ search modal -->

    <?php include __DIR__ . '/components/scripts.php'; ?>
    <script>
        var offerSwiper = new Swiper(".mySwiper-offer", {
            slidesPerView: 2,
            spaceBetween: 20,
            speed: 600,
            pagination: {
                el: ".offer-section .swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                576: {
                    slidesPerView: 2,
                    spaceBetween: 22,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 24,
                },
                992: {
                    slidesPerView: 4,
                    spaceBetween: 28,
                },
            },
        });
    </script>
      <!--/ scripts-->
    
</body>
</html>