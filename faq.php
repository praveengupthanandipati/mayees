<?php
$data = json_decode(file_get_contents(__DIR__ . '/data.json'), true);
$faqGroups = $data['faqs'];
$faqTotal = 0;
foreach ($faqGroups as $group) {
    $faqTotal += count($group['items']);
}

$faqTitle = 'FAQs | Orders, Shipping, Returns &amp; More - Mayees Boutique';
$faqDescription = 'Answers to common questions about Mayees Boutique &mdash; ordering, shipping, returns and exchange, sizing, saree and jewellery care, and our store and exhibitions.';
$faqKeywords = 'Mayees Boutique FAQ, Mayees Boutique shipping policy, Mayees Boutique return policy, Mayees Boutique exchange policy, saree boutique FAQ, saree size guide, jewellery care FAQ, Mayees Boutique order tracking';
$faqCanonical = 'https://mayees.com/faq.php';

// Structured data for FAQ rich results
$faqSchema = ['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => []];
foreach ($faqGroups as $group) {
    foreach ($group['items'] as $item) {
        $faqSchema['mainEntity'][] = [
            '@type' => 'Question',
            'name' => $item['q'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => strip_tags(html_entity_decode($item['a']))],
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $faqTitle; ?></title>

    <!-- SEO -->
    <meta name="description" content="<?php echo htmlspecialchars($faqDescription); ?>" />
    <meta name="keywords" content="<?php echo htmlspecialchars($faqKeywords); ?>" />
    <meta name="author" content="Mayees Boutique" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="<?php echo htmlspecialchars($faqCanonical); ?>" />

    <!-- Open Graph -->
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Mayees Boutique" />
    <meta property="og:title" content="<?php echo $faqTitle; ?>" />
    <meta property="og:description" content="<?php echo htmlspecialchars($faqDescription); ?>" />
    <meta property="og:image" content="https://mayees.com/img/boutique.jpg" />
    <meta property="og:url" content="<?php echo htmlspecialchars($faqCanonical); ?>" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo $faqTitle; ?>" />
    <meta name="twitter:description" content="<?php echo htmlspecialchars($faqDescription); ?>" />
    <meta name="twitter:image" content="https://mayees.com/img/boutique.jpg" />

    <meta name="theme-color" content="#c11e6b" />
    <link rel="icon" type="image/png" sizes="32x32" href="img/fav.png" />
    <script type="application/ld+json"><?php echo json_encode($faqSchema, JSON_UNESCAPED_SLASHES); ?></script>
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
                    <span>FAQs</span>
                </nav>
                <h1 class="section-title">Frequently Asked Questions</h1>
                <p class="plp-page-subtitle">Answers to <?php echo $faqTotal; ?> common questions about orders, shipping, returns and more</p>
            </div>
        </section>
        <!--/ page header -->

        <!-- faq -->
        <section class="faq-section">
            <div class="mh-container">

                <!-- category tabs (desktop/tablet) -->
                <div class="plp-filters-bar faq-tabs" role="tablist" aria-label="Filter FAQs by category">
                    <?php foreach ($faqGroups as $gIndex => $group): ?>
                    <button type="button" class="plp-filter-btn faq-tab-btn<?php echo $gIndex === 0 ? ' is-active' : ''; ?>" data-faq-category="<?php echo $gIndex; ?>" role="tab" aria-selected="<?php echo $gIndex === 0 ? 'true' : 'false'; ?>"><?php echo htmlspecialchars($group['category']); ?></button>
                    <?php endforeach; ?>
                </div>
                <!--/ category tabs -->

                <!-- category dropdown (mobile) -->
                <div class="faq-select-wrap">
                    <label for="faqCategorySelect" class="visually-hidden">Select FAQ category</label>
                    <select id="faqCategorySelect" class="faq-category-select">
                        <?php foreach ($faqGroups as $gIndex => $group): ?>
                        <option value="<?php echo $gIndex; ?>"><?php echo htmlspecialchars($group['category']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <!--/ category dropdown -->

                <div class="faq-panels">
                    <?php foreach ($faqGroups as $gIndex => $group): ?>
                    <div class="faq-panel<?php echo $gIndex === 0 ? '' : ' is-hidden'; ?>" data-faq-panel="<?php echo $gIndex; ?>">
                        <div class="faq-list">
                            <?php foreach ($group['items'] as $iIndex => $item): ?>
                            <div class="faq-item">
                                <button type="button" class="faq-question" aria-expanded="false">
                                    <span><?php echo htmlspecialchars($item['q']); ?></span>
                                    <span class="faq-icon" aria-hidden="true"></span>
                                </button>
                                <div class="faq-answer">
                                    <p><?php echo $item['a']; ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <!--/ faq -->

        <!-- faq cta -->
        <section class="about-cta">
            <div class="mh-container">
                <h2 class="about-cta-title">Still Have Questions?</h2>
                <p class="about-cta-text">Can&rsquo;t find what you&rsquo;re looking for? Send us a message and our team will get back to you shortly.</p>
                <div class="about-cta-actions">
                    <a href="contact.php" class="btn-view-all">Contact Us</a>
                    <a href="https://wa.me/919848062323" target="_blank" rel="noopener" class="btn-cta-outline">Chat On WhatsApp</a>
                </div>
            </div>
        </section>
        <!--/ faq cta -->

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
        // FAQ category tabs (desktop) + dropdown (mobile), kept in sync,
        // plus an accordion that keeps one open item per panel at a time.
        $(function () {
            var $tabBtns = $('.faq-tab-btn');
            var $select = $('#faqCategorySelect');
            var $panels = $('.faq-panel');

            function showCategory(index) {
                $panels.addClass('is-hidden').filter('[data-faq-panel="' + index + '"]').removeClass('is-hidden');
                $tabBtns.removeClass('is-active').attr('aria-selected', 'false')
                    .filter('[data-faq-category="' + index + '"]').addClass('is-active').attr('aria-selected', 'true');
                $select.val(index);
            }

            $tabBtns.on('click', function () {
                showCategory($(this).data('faq-category'));
            });

            $select.on('change', function () {
                showCategory($(this).val());
            });

            $('.faq-question').on('click', function () {
                var $item = $(this).closest('.faq-item');
                var $panel = $item.closest('.faq-panel');
                var isOpen = $item.hasClass('is-open');

                $panel.find('.faq-item').removeClass('is-open').find('.faq-question').attr('aria-expanded', 'false');
                $item.toggleClass('is-open', !isOpen);
                $item.find('.faq-question').attr('aria-expanded', String(!isOpen));
            });
        });
    </script>

</body>
</html>
