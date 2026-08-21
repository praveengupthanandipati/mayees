<?php
$data = json_decode(file_get_contents(__DIR__ . '/data.json'), true);
$products = $data['products'];

$productId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($productId < 0 || $productId >= count($products)) {
    $productId = 0;
}
$product = $products[$productId];
$categorySlug = strtolower($product['category']);

$categoryLabels = ['sarees' => 'Sarees', 'dresses' => 'Dresses', 'jewellery' => 'Jewellery'];

// The catalogue only stores one photo per product, so the gallery re-shows
// it across every thumbnail slot rather than inventing unrelated images.
$galleryImages = array_fill(0, 5, $product['image']);

$categoryIntros = [
    'sarees' => 'Crafted for the woman who wears her heritage with pride, this saree blends traditional weaving techniques with a silhouette that drapes beautifully for every celebration. Pair it with statement jewellery for a festive look or keep the accessories minimal for an elegant evening out.',
    'dresses' => 'Designed for the modern woman on the go, this dress pairs an easy, flattering silhouette with a print that transitions effortlessly from a daytime outing to an evening event. Style it with block heels and minimal jewellery for a look that feels put-together without trying too hard.',
    'jewellery' => 'Finished with fine detailing, this piece is designed to be the finishing touch on your festive or bridal look. Lightweight enough for all-day wear, it layers beautifully with traditional and contemporary outfits alike.',
];

$categoryHighlights = [
    'sarees' => [
        'Premium handloom-inspired fabric with a rich drape',
        'Traditional weave detailing with a contemporary finish',
        'Includes matching unstitched blouse piece',
        'Perfect for weddings, festive days and party wear',
    ],
    'dresses' => [
        'Breathable, easy-care fabric for all-day comfort',
        'Flattering silhouette that suits most body types',
        'Versatile styling for casual outings or evening parties',
        'True to size &mdash; check the size chart before ordering',
    ],
    'jewellery' => [
        'Statement design with intricate detailing',
        'Lightweight construction for comfortable all-day wear',
        'Tarnish-resistant plating for lasting shine',
        'Ideal for festive, bridal and daily styling',
    ],
];

$categoryProductType = ['sarees' => 'Saree', 'dresses' => 'Dress', 'jewellery' => 'Jewellery Set'];

$categorySpecs = [
    'sarees' => [
        'Product Type' => 'Saree',
        'Fabric' => 'Blended Silk',
        'Saree Length' => '5.5 metres with 0.8 metre blouse piece',
        'Blouse' => 'Unstitched matching blouse piece included',
        'Border' => 'Zari Woven Border',
        'Wash Care' => 'Dry Clean Only',
        'Occasion' => 'Festive, Wedding, Party Wear',
        'Style' => 'Traditional Weave',
    ],
    'dresses' => [
        'Product Type' => 'Dress',
        'Fabric' => 'Rayon / Georgette Blend',
        'Pattern Type' => 'Printed',
        'Neck Type' => 'Round Neck',
        'Sleeve Type' => '3/4th Sleeve',
        'Shape' => 'A-Line',
        'Wash Care' => 'Gentle Machine Wash',
        'Occasion' => 'Casual, Party Wear',
    ],
    'jewellery' => [
        'Product Type' => 'Jewellery Set',
        'Material' => 'Alloy with Gold Plating',
        'Plating' => '22K Gold Polish',
        'Closure Type' => 'Hook Closure',
        'Occasion' => 'Festive, Bridal, Daily Wear',
        'Care' => 'Keep away from water, perfume and chemicals',
    ],
];
$specs = $categorySpecs[$categorySlug];
$specs['Style Code'] = 'MB-' . strtoupper(substr($categorySlug, 0, 1)) . sprintf('%04d', $productId + 1);
$specs['Package Contains'] = $categorySlug === 'sarees' ? '1 Saree with Blouse Piece' : '1 ' . $categoryProductType[$categorySlug];

$manufacturer = [
    'Manufactured &amp; Packed by' => 'Mayees Boutique Pvt. Ltd.',
    'Country Of Origin' => 'India',
    'For Complaints' => 'Customer Care +91 9848062323, info@mayees.com',
    'Marketed By' => 'Mayees Boutique Pvt. Ltd.',
    'Registered Address' => 'Plot No. &ndash; 382, Diamond Hills Lane, Opposite Cyberabad Commissionerate, Diamond Hills, Lumbini Avenue, Gachibowli, Hyderabad &ndash; 500032, Telangana, India.',
];

$showSizes = in_array($categorySlug, ['sarees', 'dresses'], true);
$sizes = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];

// You may also like: up to 5 other products from the same category
$related = [];
foreach ($products as $idx => $p) {
    if ($idx === $productId) {
        continue;
    }
    if (strtolower($p['category']) === $categorySlug) {
        $related[] = ['index' => $idx, 'product' => $p];
    }
    if (count($related) >= 5) {
        break;
    }
}

$whatsappMessage = rawurlencode('Hi Mayees Boutique, I would like to enquire about the "' . $product['name'] . '" (Rs. ' . $product['price_new'] . ').');

$pdCanonical = 'https://mayees.com/product-detail.php?id=' . $productId;
$pdTitle = htmlspecialchars($product['name']) . ' | Buy Online at Best Price - Mayees Boutique';
$pdDescription = 'Buy ' . $product['name'] . ' online at Mayees Boutique. ' . $categoryLabels[$categorySlug] . ' starting at Rs. ' . $product['price_new'] . ' &mdash; ' . implode(', ', array_values($specs)) . '.';
$pdKeywordsBase = [
    strtolower($product['name']),
    'buy ' . strtolower($product['name']) . ' online',
    'shop ' . $categorySlug . ' online',
    strtolower($categoryLabels[$categorySlug]) . ' Mayees Boutique',
    'designer ' . $categorySlug,
    'women\'s ethnic wear',
    'Mayees Boutique',
];
$pdKeywords = implode(', ', $pdKeywordsBase);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pdTitle; ?></title>

    <!-- SEO -->
    <meta name="description" content="<?php echo htmlspecialchars($pdDescription); ?>" />
    <meta name="keywords" content="<?php echo htmlspecialchars($pdKeywords); ?>" />
    <meta name="author" content="Mayees Boutique" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="<?php echo htmlspecialchars($pdCanonical); ?>" />

    <!-- Open Graph -->
    <meta property="og:type" content="product" />
    <meta property="og:site_name" content="Mayees Boutique" />
    <meta property="og:title" content="<?php echo $pdTitle; ?>" />
    <meta property="og:description" content="<?php echo htmlspecialchars($pdDescription); ?>" />
    <meta property="og:image" content="https://mayees.com/<?php echo htmlspecialchars($product['image']); ?>" />
    <meta property="og:url" content="<?php echo htmlspecialchars($pdCanonical); ?>" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo $pdTitle; ?>" />
    <meta name="twitter:description" content="<?php echo htmlspecialchars($pdDescription); ?>" />
    <meta name="twitter:image" content="https://mayees.com/<?php echo htmlspecialchars($product['image']); ?>" />

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

        <!-- product detail -->
        <section class="pdp-section">
            <div class="mh-container">

                <nav class="plp-breadcrumb pdp-breadcrumb" aria-label="Breadcrumb">
                    <a href="index.php">Home</a>
                    <span aria-hidden="true">/</span>
                    <a href="products-list.php?category=<?php echo htmlspecialchars($categorySlug); ?>"><?php echo htmlspecialchars($categoryLabels[$categorySlug]); ?></a>
                    <span aria-hidden="true">/</span>
                    <span><?php echo htmlspecialchars($product['name']); ?></span>
                </nav>

                <div class="pdp-grid">

                    <!-- gallery -->
                    <div class="pdp-gallery">
                        <div class="pdp-gallery-thumbs">
                            <div class="swiper pdpThumbsSwiper">
                                <div class="swiper-wrapper">
                                    <?php foreach ($galleryImages as $gi => $img): ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo htmlspecialchars($img); ?>" alt="<?php echo htmlspecialchars($product['name']); ?> view <?php echo $gi + 1; ?>" loading="lazy">
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="pdp-gallery-main">
                            <div class="swiper pdpMainSwiper">
                                <div class="swiper-wrapper">
                                    <?php foreach ($galleryImages as $gi => $img): ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo htmlspecialchars($img); ?>" alt="<?php echo htmlspecialchars($product['name']); ?> view <?php echo $gi + 1; ?>">
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="swiper-button-prev" role="button" aria-label="Previous image"></div>
                                <div class="swiper-button-next" role="button" aria-label="Next image"></div>
                            </div>
                        </div>
                    </div>
                    <!--/ gallery -->

                    <!-- info -->
                    <div class="pdp-info">
                        <span class="pdp-brand-eyebrow">Mayees Boutique &mdash; Your Fabulous World</span>
                        <h1 class="pdp-title"><?php echo htmlspecialchars($product['name']); ?></h1>

                        <div class="pdp-price-row">
                            <span class="pdp-price-new">Rs. <?php echo htmlspecialchars($product['price_new']); ?></span>
                            <span class="pdp-price-old">Rs. <?php echo htmlspecialchars($product['price_old']); ?></span>
                            <span class="pdp-price-off"><?php echo htmlspecialchars($product['price_off']); ?></span>
                        </div>
                        <p class="pdp-tax-note">Inclusive of all taxes</p>

                        <?php if ($showSizes): ?>
                        <div class="pdp-option-row">
                            <span class="pdp-option-label">Size</span>
                            <div class="pdp-size-options">
                                <?php foreach ($sizes as $si => $size): ?>
                                <button type="button" class="pdp-size-btn<?php echo $si === 2 ? ' is-active' : ''; ?>"><?php echo htmlspecialchars($size); ?></button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="pdp-option-row">
                            <span class="pdp-option-label">Quantity</span>
                            <div class="pdp-qty-stepper">
                                <button type="button" class="pdp-qty-btn" id="pdpQtyMinus" aria-label="Decrease quantity">&minus;</button>
                                <span class="pdp-qty-value" id="pdpQtyValue">1</span>
                                <button type="button" class="pdp-qty-btn" id="pdpQtyPlus" aria-label="Increase quantity">&plus;</button>
                            </div>
                        </div>

                        <div class="pdp-cta-row">
                            <button type="button" class="btn-enquiry-now" data-bs-toggle="modal" data-bs-target="#enquiryModal">Enquiry Now</button>
                            <a href="https://wa.me/919848062323?text=<?php echo $whatsappMessage; ?>" target="_blank" rel="noopener" class="btn-whatsapp-enquire">Enquire On WhatsApp</a>
                        </div>

                        <div class="pdp-trust-row">
                            <div class="pdp-trust-item">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 7l9-4 9 4-9 4-9-4Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M3 7v10l9 4 9-4V7" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
                                <span>15 Days Return</span>
                            </div>
                            <div class="pdp-trust-item">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="2" y="7" width="14" height="10" rx="1.5" stroke="currentColor" stroke-width="1.6"/><path d="M16 10h3.5L22 13.5V17h-6v-7Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><circle cx="7" cy="19" r="1.6" stroke="currentColor" stroke-width="1.4"/><circle cx="18" cy="19" r="1.6" stroke="currentColor" stroke-width="1.4"/></svg>
                                <span>Cash On Delivery</span>
                            </div>
                            <div class="pdp-trust-item">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.6"/><path d="M8 12.5l2.5 2.5L16 9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                <span>Quality Guaranteed</span>
                            </div>
                            <div class="pdp-trust-item">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="4" y="10" width="16" height="10" rx="1.5" stroke="currentColor" stroke-width="1.6"/><path d="M8 10V7a4 4 0 0 1 8 0v3" stroke="currentColor" stroke-width="1.6"/></svg>
                                <span>Secure Checkout</span>
                            </div>
                        </div>

                        <p class="pdp-ships-note">Ships in less than 24 hours</p>

                        <!-- accordion -->
                        <div class="pdp-accordion">
                            <div class="pdp-accordion-item is-open">
                                <button type="button" class="pdp-accordion-header">
                                    <span>Description</span>
                                    <span class="pdp-accordion-icon" aria-hidden="true"></span>
                                </button>
                                <div class="pdp-accordion-body">
                                    <p class="pdp-accordion-lead"><?php echo htmlspecialchars($product['name']); ?></p>
                                    <p class="pdp-accordion-intro"><?php echo htmlspecialchars($categoryIntros[$categorySlug]); ?></p>

                                    <h4 class="pdp-accordion-subhead">Highlights</h4>
                                    <ul class="pdp-highlight-list">
                                        <?php foreach ($categoryHighlights[$categorySlug] as $highlight): ?>
                                        <li>
                                            <svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><circle cx="10" cy="10" r="9" stroke="currentColor" stroke-width="1.4"/><path d="M6.5 10.3l2.2 2.2 4.8-4.8" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            <span><?php echo $highlight; ?></span>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>

                                    <h4 class="pdp-accordion-subhead">Product Details</h4>
                                    <ul class="pdp-spec-list">
                                        <?php foreach ($specs as $label => $value): ?>
                                        <li><strong><?php echo htmlspecialchars($label); ?>:</strong> <?php echo htmlspecialchars($value); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="pdp-accordion-item">
                                <button type="button" class="pdp-accordion-header">
                                    <span>Manufacturer Details</span>
                                    <span class="pdp-accordion-icon" aria-hidden="true"></span>
                                </button>
                                <div class="pdp-accordion-body">
                                    <ul class="pdp-spec-list">
                                        <?php foreach ($manufacturer as $label => $value): ?>
                                        <li><strong><?php echo $label; ?>:</strong> <?php echo $value; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--/ accordion -->

                    </div>
                    <!--/ info -->

                </div>

                <?php if (count($related)): ?>
                <!-- related products -->
                <div class="pdp-related">
                    <div class="section-heading" data-aos="fade-up">
                        <span class="section-eyebrow">
                            <svg viewBox="0 0 60 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 8c8-6 14 6 22 0s14-6 20 0" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
                                <path d="M50 3l8 5-8 5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            You May Also Like
                        </span>
                        <h2 class="section-title">More <?php echo htmlspecialchars($categoryLabels[$categorySlug]); ?></h2>
                    </div>
                    <div class="products-grid pdp-related-grid">
                        <?php foreach ($related as $r): $rp = $r['product']; ?>
                        <a href="product-detail.php?id=<?php echo $r['index']; ?>" class="product-card">
                            <div class="product-card-media">
                                <img src="<?php echo htmlspecialchars($rp['image']); ?>" alt="<?php echo htmlspecialchars($rp['name']); ?>" loading="lazy">
                            </div>
                            <div class="product-card-body">
                                <h3 class="product-name"><?php echo htmlspecialchars($rp['name']); ?></h3>
                                <div class="product-price">
                                    <span class="price-old">&#8377;<?php echo htmlspecialchars($rp['price_old']); ?></span>
                                    <span class="price-new">&#8377;<?php echo htmlspecialchars($rp['price_new']); ?></span>
                                    <span class="price-off"><?php echo htmlspecialchars($rp['price_off']); ?></span>
                                </div>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!--/ related products -->
                <?php endif; ?>

            </div>
        </section>
        <!--/ product detail -->

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

    <!-- enquiry modal -->
    <div class="modal fade enquiry-modal" id="enquiryModal" tabindex="-1" aria-labelledby="enquiryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title" id="enquiryModalLabel">Enquiry Now</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="enquiry-product-name">Enquiring about: <strong><?php echo htmlspecialchars($product['name']); ?></strong></p>

                    <form id="enquiryForm" novalidate>
                        <div class="enquiry-field">
                            <label for="enquiryName">Full Name <span aria-hidden="true">*</span></label>
                            <input type="text" id="enquiryName" name="name" autocomplete="name" required>
                            <span class="enquiry-error">Please enter your full name.</span>
                        </div>

                        <div class="enquiry-field">
                            <label for="enquiryPhone">Phone Number <span aria-hidden="true">*</span></label>
                            <input type="tel" id="enquiryPhone" name="phone" autocomplete="tel" inputmode="numeric" maxlength="10" required>
                            <span class="enquiry-error">Please enter a valid 10-digit mobile number.</span>
                        </div>

                        <div class="enquiry-field">
                            <label for="enquiryEmail">Email Address</label>
                            <input type="email" id="enquiryEmail" name="email" autocomplete="email">
                            <span class="enquiry-error">Please enter a valid email address.</span>
                        </div>

                        <div class="enquiry-field">
                            <label for="enquiryMessage">Message</label>
                            <textarea id="enquiryMessage" name="message" rows="3">Hi, I would like to know more about the <?php echo htmlspecialchars($product['name']); ?>.</textarea>
                        </div>

                        <button type="submit" class="btn-enquiry-submit">Send Enquiry</button>
                        <p class="enquiry-note">We'll get back to you on WhatsApp shortly after you submit.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ enquiry modal -->

    <?php include __DIR__ . '/components/scripts.php'; ?>
    <script>
        var pdpProductName = <?php echo json_encode($product['name']); ?>;
        var pdpWhatsappNumber = '919848062323';

        // Product gallery: thumbnail rail linked to the main image swiper
        $(function () {
            var pdpThumbsSwiper = new Swiper('.pdpThumbsSwiper', {
                slidesPerView: 4,
                spaceBetween: 12,
                direction: window.innerWidth > 767 ? 'vertical' : 'horizontal',
                watchSlidesProgress: true,
            });

            var pdpMainSwiper = new Swiper('.pdpMainSwiper', {
                slidesPerView: 1,
                spaceBetween: 0,
                navigation: {
                    nextEl: '.pdp-gallery-main .swiper-button-next',
                    prevEl: '.pdp-gallery-main .swiper-button-prev',
                },
                thumbs: {
                    swiper: pdpThumbsSwiper,
                },
            });

            // Quantity stepper
            var $qtyValue = $('#pdpQtyValue');
            $('#pdpQtyMinus').on('click', function () {
                var qty = Math.max(1, parseInt($qtyValue.text(), 10) - 1);
                $qtyValue.text(qty);
            });
            $('#pdpQtyPlus').on('click', function () {
                var qty = Math.min(10, parseInt($qtyValue.text(), 10) + 1);
                $qtyValue.text(qty);
            });

            // Size selector
            $('.pdp-size-btn').on('click', function () {
                $('.pdp-size-btn').removeClass('is-active');
                $(this).addClass('is-active');
            });

            // Accordion
            $('.pdp-accordion-header').on('click', function () {
                var $item = $(this).closest('.pdp-accordion-item');
                var isOpen = $item.hasClass('is-open');
                $item.siblings('.pdp-accordion-item').removeClass('is-open');
                $item.toggleClass('is-open', !isOpen);
            });

            // Enquiry Now: validated form that hands off to a prefilled WhatsApp chat
            var $enquiryModal = $('#enquiryModal');
            var $enquiryForm = $('#enquiryForm');

            function validateEnquiryForm() {
                var isValid = true;
                $enquiryForm.find('.enquiry-field').removeClass('has-error');

                if ($('#enquiryName').val().trim().length < 2) {
                    $('#enquiryName').closest('.enquiry-field').addClass('has-error');
                    isValid = false;
                }

                if (!/^[6-9]\d{9}$/.test($('#enquiryPhone').val().trim())) {
                    $('#enquiryPhone').closest('.enquiry-field').addClass('has-error');
                    isValid = false;
                }

                var email = $('#enquiryEmail').val().trim();
                if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    $('#enquiryEmail').closest('.enquiry-field').addClass('has-error');
                    isValid = false;
                }

                return isValid;
            }

            $enquiryForm.on('input', 'input, textarea', function () {
                $(this).closest('.enquiry-field').removeClass('has-error');
            });

            $enquiryForm.on('submit', function (e) {
                e.preventDefault();
                if (!validateEnquiryForm()) {
                    return;
                }

                var name = $('#enquiryName').val().trim();
                var phone = $('#enquiryPhone').val().trim();
                var email = $('#enquiryEmail').val().trim();
                var message = $('#enquiryMessage').val().trim();

                var lines = ['New enquiry for ' + pdpProductName, 'Name: ' + name, 'Phone: ' + phone];
                if (email) {
                    lines.push('Email: ' + email);
                }
                if (message) {
                    lines.push('Message: ' + message);
                }

                window.open('https://wa.me/' + pdpWhatsappNumber + '?text=' + encodeURIComponent(lines.join('\n')), '_blank');

                var modalInstance = bootstrap.Modal.getInstance($enquiryModal[0]);
                if (modalInstance) {
                    modalInstance.hide();
                }
            });

            $enquiryModal.on('hidden.bs.modal', function () {
                $enquiryForm.find('.enquiry-field').removeClass('has-error');
            });
        });
    </script>
      <!--/ scripts-->

</body>
</html>
