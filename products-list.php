<?php
$data = json_decode(file_get_contents(__DIR__ . '/data.json'), true);
$products = $data['products'];
$initialVisible = 25; // 5 rows x 5 columns

$validCategories = ['sarees', 'dresses', 'jewellery'];
$activeCategory = (isset($_GET['category']) && in_array($_GET['category'], $validCategories, true))
    ? $_GET['category']
    : 'all';

$categoryLabels = ['all' => 'All Products', 'sarees' => 'Sarees', 'dresses' => 'Dresses', 'jewellery' => 'Jewellery'];

if ($activeCategory === 'all') {
    $resultsCount = count($products);
} else {
    $resultsCount = count(array_filter($products, function ($p) use ($activeCategory) {
        return strtolower($p['category']) === $activeCategory;
    }));
}

$plpSeo = [
    'all' => [
        'title' => 'Shop All Products | Sarees, Dresses &amp; Jewellery Online - Mayees Boutique',
        'description' => 'Browse the full Mayees Boutique catalogue: designer sarees, dresses and fine jewellery. Filter by category and shop silk sarees, bridal lehengas, party wear dresses, kundan and temple jewellery at the best prices.',
        'keywords' => 'Mayees Boutique products, shop sarees online, shop dresses online, shop jewellery online, designer sarees, silk sarees, Kanjivaram sarees, Banarasi sarees, Chanderi sarees, bridal lehenga, wedding sarees, party wear dresses, Indo-Western dresses, evening gowns, designer blouses, Indian jewellery online, kundan jewellery, temple jewellery, polki necklace, jhumka earrings, women\'s ethnic wear, women\'s boutique India',
    ],
    'sarees' => [
        'title' => 'Shop Sarees Online | Silk, Banarasi &amp; Wedding Sarees - Mayees Boutique',
        'description' => 'Shop designer sarees at Mayees Boutique: Kanjivaram silk, Banarasi, Chanderi, Bandhani and bridal wedding sarees in handloom fabrics with traditional embroidery.',
        'keywords' => 'shop sarees online, designer sarees, silk sarees, Kanjivaram sarees, Banarasi sarees, Chanderi sarees, Bandhani sarees, wedding sarees, bridal sarees, cotton sarees, printed sarees, handloom sarees, women\'s ethnic wear',
    ],
    'dresses' => [
        'title' => 'Shop Dresses Online | Party Wear &amp; Designer Dresses - Mayees Boutique',
        'description' => 'Shop designer dresses at Mayees Boutique: party wear, Anarkali, Indo-Western, evening gowns and casual dresses in contemporary Indian fashion styles.',
        'keywords' => 'shop dresses online, party wear dresses, designer dresses, Anarkali dress, Indo-Western dresses, evening gowns, casual dresses, office wear dresses, women\'s dresses India',
    ],
    'jewellery' => [
        'title' => 'Shop Jewellery Online | Kundan, Temple &amp; Bridal Jewellery - Mayees Boutique',
        'description' => 'Shop fine jewellery at Mayees Boutique: kundan and temple jewellery, polki necklaces, bridal necklace sets, earrings and bangles crafted with traditional artistry.',
        'keywords' => 'shop jewellery online, kundan jewellery, temple jewellery, polki necklace, bridal necklace set, jhumka earrings, silver bangles, Indian jewellery online, women\'s jewellery India',
    ],
];

$plpMeta = $plpSeo[$activeCategory];
$plpCanonical = 'https://mayees.com/products-list.php' . ($activeCategory !== 'all' ? '?category=' . $activeCategory : '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $plpMeta['title']; ?></title>

    <!-- SEO -->
    <meta name="description" content="<?php echo htmlspecialchars($plpMeta['description']); ?>" />
    <meta name="keywords" content="<?php echo htmlspecialchars($plpMeta['keywords']); ?>" />
    <meta name="author" content="Mayees Boutique" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="<?php echo htmlspecialchars($plpCanonical); ?>" />

    <!-- Open Graph -->
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Mayees Boutique" />
    <meta property="og:title" content="<?php echo $plpMeta['title']; ?>" />
    <meta property="og:description" content="<?php echo htmlspecialchars($plpMeta['description']); ?>" />
    <meta property="og:image" content="https://mayees.com/img/logo.png" />
    <meta property="og:url" content="<?php echo htmlspecialchars($plpCanonical); ?>" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo $plpMeta['title']; ?>" />
    <meta name="twitter:description" content="<?php echo htmlspecialchars($plpMeta['description']); ?>" />
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

        <!-- page header -->
        <section class="plp-page-header">
            <div class="mh-container">
                <nav class="plp-breadcrumb" aria-label="Breadcrumb">
                    <a href="index.php">Home</a>
                    <span aria-hidden="true">/</span>
                    <?php if ($activeCategory === 'all'): ?>
                    <span>All Products</span>
                    <?php else: ?>
                    <a href="products-list.php">All Products</a>
                    <span aria-hidden="true">/</span>
                    <span><?php echo htmlspecialchars($categoryLabels[$activeCategory]); ?></span>
                    <?php endif; ?>
                </nav>
                <h1 class="section-title">Shop <?php echo htmlspecialchars($categoryLabels[$activeCategory]); ?></h1>
                <p class="plp-page-subtitle">Designer sarees, dresses and fine jewellery &mdash; handpicked from our latest collection</p>
            </div>
        </section>
        <!--/ page header -->

        <!-- products listing -->
        <section class="plp-listing">
            <div class="mh-container">

                <!-- primary filters -->
                <div class="plp-filters-bar" role="tablist" aria-label="Filter products by category">
                    <button type="button" class="plp-filter-btn<?php echo $activeCategory === 'all' ? ' is-active' : ''; ?>" data-filter="all">All Products</button>
                    <button type="button" class="plp-filter-btn<?php echo $activeCategory === 'sarees' ? ' is-active' : ''; ?>" data-filter="sarees">Sarees</button>
                    <button type="button" class="plp-filter-btn<?php echo $activeCategory === 'dresses' ? ' is-active' : ''; ?>" data-filter="dresses">Dresses</button>
                    <button type="button" class="plp-filter-btn<?php echo $activeCategory === 'jewellery' ? ' is-active' : ''; ?>" data-filter="jewellery">Jewellery</button>
                </div>
                <!--/ primary filters -->

                <p class="plp-results-count"><?php echo $resultsCount; ?> products</p>

                <div class="products-grid" id="productsGrid">

                    <?php foreach ($products as $i => $p):
                        $categorySlug = strtolower($p['category']);
                        $isExtra = $i >= $initialVisible;
                        $isHidden = $activeCategory === 'all' ? $isExtra : ($categorySlug !== $activeCategory);
                        $cardClasses = 'product-card' . ($isExtra ? ' plp-extra' : '') . ($isHidden ? ' is-hidden' : '');
                    ?>
                    <div class="<?php echo $cardClasses; ?>" data-category="<?php echo htmlspecialchars($categorySlug); ?>">
                        <div class="product-card-media">
                            <a href="product-detail.php?id=<?php echo $i; ?>">
                                <img src="<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['name']); ?>" loading="lazy" width="400" height="533">
                            </a>
                            <a href="product-detail.php?id=<?php echo $i; ?>" class="product-enquiry-btn">View More</a>
                        </div>
                        <div class="product-card-body">
                            <h3 class="product-name"><a href="product-detail.php?id=<?php echo $i; ?>"><?php echo htmlspecialchars($p['name']); ?></a></h3>
                            <div class="product-price">
                                <span class="price-old">&#8377;<?php echo htmlspecialchars($p['price_old']); ?></span>
                                <span class="price-new">&#8377;<?php echo htmlspecialchars($p['price_new']); ?></span>
                                <span class="price-off"><?php echo htmlspecialchars($p['price_off']); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>

                <p class="plp-empty-state" id="plpEmptyState">No products found in this category.</p>

                <?php if (count($products) > $initialVisible): ?>
                <div class="plp-load-more-wrap<?php echo $activeCategory === 'all' ? '' : ' is-hidden'; ?>" id="plpLoadMoreWrap">
                    <button type="button" class="btn-load-more" id="plpLoadMoreBtn">
                        <span class="btn-load-more-text">Load More</span>
                        <svg class="btn-load-more-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
                <?php endif; ?>

            </div>
        </section>
        <!--/ products listing -->

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
    <script>
        // Products listing: category filters + load more toggle
        $(function () {
            var $grid = $('#productsGrid');
            var $cards = $grid.find('.product-card');
            var $filterBtns = $('.plp-filter-btn');
            var $loadMoreWrap = $('#plpLoadMoreWrap');
            var $loadMoreBtn = $('#plpLoadMoreBtn');
            var $emptyState = $('#plpEmptyState');
            var hasExtra = $cards.filter('.plp-extra').length > 0;

            function updateEmptyState() {
                $emptyState.toggle($cards.not('.is-hidden').length === 0);
            }

            function showInitialState() {
                $cards.each(function () {
                    var $card = $(this);
                    $card.toggleClass('is-hidden', $card.hasClass('plp-extra'));
                });
                $loadMoreBtn.removeClass('is-expanded').find('.btn-load-more-text').text('Load More');
                if (hasExtra) {
                    $loadMoreWrap.removeClass('is-hidden');
                }
            }

            $filterBtns.on('click', function () {
                var $btn = $(this);
                var category = $btn.data('filter');

                $filterBtns.removeClass('is-active');
                $btn.addClass('is-active');

                if (category === 'all') {
                    showInitialState();
                } else {
                    $cards.addClass('is-hidden').filter('[data-category="' + category + '"]').removeClass('is-hidden');
                    $loadMoreWrap.addClass('is-hidden');
                }

                updateEmptyState();
            });

            $loadMoreBtn.on('click', function () {
                var $extra = $cards.filter('.plp-extra');
                var expanded = $loadMoreBtn.hasClass('is-expanded');

                if (expanded) {
                    $extra.addClass('is-hidden');
                    $loadMoreBtn.removeClass('is-expanded').find('.btn-load-more-text').text('Load More');
                } else {
                    $extra.removeClass('is-hidden');
                    $loadMoreBtn.addClass('is-expanded').find('.btn-load-more-text').text('Show Less');
                }
            });
        });
    </script>
      <!--/ scripts-->

</body>
</html>
