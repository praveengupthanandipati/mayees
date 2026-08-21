<?php
$data = json_decode(file_get_contents(__DIR__ . '/data.json'), true);

$aboutTitle = 'About Us | Our Story &amp; Craftsmanship - Mayees Boutique';
$aboutDescription = 'Mayees Boutique Pvt. Ltd. &mdash; 11+ years of celebrating Indian craftsmanship through designer sarees, dresses and fine jewellery, from Hyderabad to 45 locations across India and the USA.';
$aboutKeywords = 'about Mayees Boutique, Mayees Boutique story, Mayees Boutique Hyderabad, Hanisha Devi, Indian ethnic wear brand, designer saree boutique, women\'s fashion boutique India, handloom fabrics, traditional Indian embroidery, saree exhibitions India, fashion shows India USA, bridal jewellery boutique, women\'s boutique Gachibowli, Mayees Boutique Pvt Ltd';
$aboutCanonical = 'https://mayees.com/about.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $aboutTitle; ?></title>

    <!-- SEO -->
    <meta name="description" content="<?php echo htmlspecialchars($aboutDescription); ?>" />
    <meta name="keywords" content="<?php echo htmlspecialchars($aboutKeywords); ?>" />
    <meta name="author" content="Mayees Boutique" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="<?php echo htmlspecialchars($aboutCanonical); ?>" />

    <!-- Open Graph -->
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Mayees Boutique" />
    <meta property="og:title" content="<?php echo $aboutTitle; ?>" />
    <meta property="og:description" content="<?php echo htmlspecialchars($aboutDescription); ?>" />
    <meta property="og:image" content="https://mayees.com/img/boutique.jpg" />
    <meta property="og:url" content="<?php echo htmlspecialchars($aboutCanonical); ?>" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo $aboutTitle; ?>" />
    <meta name="twitter:description" content="<?php echo htmlspecialchars($aboutDescription); ?>" />
    <meta name="twitter:image" content="https://mayees.com/img/boutique.jpg" />

    <meta name="theme-color" content="#c11e6b" />
    <link rel="icon" type="image/png" sizes="32x32" href="img/fav.png" />
    <?php include __DIR__ . '/components/styles.php'; ?>
</head>
<body>

    <!-- page loader -->
    <div id="load" class="page-loader">
        <img src="img/logo.png" alt="Mayees Boutique" class="page-loader-logo">
        <span class="page-loader-spinner" aria-hidden="true"></span>
    </div>
    <!--/ page loader -->

    <?php include __DIR__ . '/components/header.php'; ?>

    <!-- main -->
    <main>

        <!-- page header -->
        <section class="plp-page-header">
            <div class="mh-container">
                <nav class="plp-breadcrumb" aria-label="Breadcrumb">
                    <a href="index.php">Home</a>
                    <span aria-hidden="true">/</span>
                    <span>About Us</span>
                </nav>
                <h1 class="section-title">About Mayees Boutique</h1>
                <p class="plp-page-subtitle">Eleven years of celebrating Indian craftsmanship through sarees, dresses and fine jewellery</p>
            </div>
        </section>
        <!--/ page header -->

        <!-- about intro -->
        <section class="about-intro">
            <div class="mh-container">
                <div class="about-intro-grid">

                    <div class="about-intro-media" data-aos="fade-right">
                        <div class="about-intro-media-frame">
                            <img src="img/boutique.jpg" alt="Mayees Boutique store interior" loading="lazy" width="600" height="495">
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
                        <p class="about-intro-text">Mayees Boutique Pvt. Ltd. has been serving the fashion industry for over 11 years and counting. The brand was started by young entrepreneur Mrs. Hanisha Devi, with a vision to bring the richness of Indian textiles and craftsmanship to women everywhere. To promote the Mayees brand and expand its reach, we have organised numerous exhibitions and fashion shows across India. We carried that vision overseas too, launching our presence in the USA at 3 locations in the early stages, and have since grown our footprint to 45 different locations across India and the USA.</p>
                        <p class="about-intro-text">We are known for our luxurious, contemporary style that reflects traditional Indian colours, handloom fabrics and intricate embroidery &mdash; a signature that has made Mayees Boutique a trusted name across sarees, dresses and jewellery. Today, we continue to celebrate India&rsquo;s rich fashion heritage and share it with the world, one collection at a time.</p>
                        <a href="products-list.php" class="btn-view-all about-intro-btn">Shop The Collection</a>
                    </div>

                </div>
            </div>
        </section>
        <!--/ about intro -->

        <!-- about stats -->
        <section class="about-stats">
            <div class="mh-container">
                <div class="about-stats-grid">
                    <div class="about-stat-card" data-aos="fade-up">
                        <div class="about-stat-num">11+</div>
                        <p class="about-stat-label">Years Of Excellence</p>
                    </div>
                    <div class="about-stat-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="about-stat-num">45+</div>
                        <p class="about-stat-label">Locations Across India &amp; USA</p>
                    </div>
                    <div class="about-stat-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="about-stat-num">3</div>
                        <p class="about-stat-label">Signature Collections &mdash; Sarees, Dresses &amp; Jewellery</p>
                    </div>
                </div>
            </div>
        </section>
        <!--/ about stats -->

        <!-- what we offer -->
        <section class="about-offer">
            <div class="mh-container">
                <div class="section-heading" data-aos="fade-up">
                    <span class="section-eyebrow">
                        <svg viewBox="0 0 60 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 8c8-6 14 6 22 0s14-6 20 0" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
                            <path d="M50 3l8 5-8 5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        What We Offer
                    </span>
                    <h2 class="section-title">Our Collections</h2>
                    <p class="section-subtitle">Handpicked craftsmanship across three signature categories</p>
                </div>

                <div class="about-offer-grid">
                    <a href="products-list.php?category=sarees" class="category-card" data-aos="fade-up">
                        <img src="img/categories/cat02.jpg" alt="Mayees Boutique sarees collection" loading="lazy">
                        <div class="category-card-overlay"></div>
                        <div class="category-card-body">
                            <h3 class="category-card-title">Sarees</h3>
                            <p class="category-card-text">Silk, Banarasi, Kanjivaram &amp; bridal weaves crafted in handloom fabrics</p>
                            <span class="category-card-cta">Explore <span aria-hidden="true">&rarr;</span></span>
                        </div>
                    </a>
                    <a href="products-list.php?category=dresses" class="category-card" data-aos="fade-up" data-aos-delay="100">
                        <img src="img/categories/cat04.jpg" alt="Mayees Boutique dresses collection" loading="lazy">
                        <div class="category-card-overlay"></div>
                        <div class="category-card-body">
                            <h3 class="category-card-title">Dresses</h3>
                            <p class="category-card-text">Contemporary Indo-Western and party wear for every occasion</p>
                            <span class="category-card-cta">Explore <span aria-hidden="true">&rarr;</span></span>
                        </div>
                    </a>
                    <a href="products-list.php?category=jewellery" class="category-card" data-aos="fade-up" data-aos-delay="200">
                        <img src="img/categories/cat01.jpg" alt="Mayees Boutique jewellery collection" loading="lazy">
                        <div class="category-card-overlay"></div>
                        <div class="category-card-body">
                            <h3 class="category-card-title">Jewellery</h3>
                            <p class="category-card-text">Kundan, temple and bridal jewellery crafted with traditional artistry</p>
                            <span class="category-card-cta">Explore <span aria-hidden="true">&rarr;</span></span>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <!--/ what we offer -->

        <!-- about cta -->
        <section class="about-cta">
            <div class="mh-container">
                <h2 class="about-cta-title">Visit Mayees Boutique</h2>
                <p class="about-cta-text">Plot No. &ndash; 382, Diamond Hills Lane, Opposite Cyberabad Commissionerate, Diamond Hills, Lumbini Avenue, Gachibowli, Hyderabad &ndash; 500032, Telangana, India. Open Monday &ndash; Saturday, 10am &ndash; 7pm.</p>
                <div class="about-cta-actions">
                    <a href="products-list.php" class="btn-view-all">Shop Now</a>
                    <a href="https://wa.me/919848062323" target="_blank" rel="noopener" class="btn-cta-outline">Chat On WhatsApp</a>
                </div>
            </div>
        </section>
        <!--/ about cta -->

        <!-- floating actions -->
        <a href="https://wa.me/919848062323" target="_blank" rel="noopener" class="floating-whatsapp" aria-label="Chat on WhatsApp">
            <svg viewBox="0 0 32 32" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.004 3C9.107 3 3.5 8.607 3.5 15.504c0 2.35.646 4.61 1.87 6.59L3 29l7.086-2.328a12.46 12.46 0 0 0 5.918 1.507h.005c6.897 0 12.503-5.607 12.503-12.504C28.512 8.778 22.9 3 16.004 3Zm0 22.79h-.004a10.36 10.36 0 0 1-5.28-1.447l-.379-.225-3.945 1.297 1.318-3.845-.247-.395a10.34 10.34 0 0 1-1.586-5.51c0-5.72 4.657-10.376 10.377-10.376 2.773 0 5.379 1.08 7.34 3.043a10.31 10.31 0 0 1 3.036 7.343c0 5.72-4.657 10.115-10.63 10.115Zm5.68-7.719c-.31-.156-1.837-.907-2.122-1.01-.285-.104-.492-.156-.7.156-.207.311-.802 1.01-.984 1.217-.181.208-.362.234-.673.078-.31-.156-1.31-.483-2.494-1.538-.922-.822-1.544-1.837-1.725-2.148-.181-.311-.02-.479.137-.634.14-.14.31-.363.466-.545.156-.181.207-.311.31-.519.104-.208.052-.39-.026-.545-.078-.156-.7-1.687-.959-2.31-.253-.607-.51-.524-.7-.534l-.596-.01c-.207 0-.545.078-.83.39-.285.31-1.088 1.063-1.088 2.594s1.114 3.01 1.27 3.218c.156.207 2.192 3.348 5.31 4.695.742.32 1.32.512 1.772.655.744.237 1.42.204 1.955.124.596-.089 1.837-.751 2.096-1.476.259-.726.259-1.347.181-1.476-.078-.13-.285-.208-.596-.363Z"/>
            </svg>
        </a>
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

</body>
</html>
