<?php
$data = json_decode(file_get_contents(__DIR__ . '/data.json'), true);
$shows = $data['upcoming_shows'];

$usTitle = 'Upcoming Shows &amp; Exhibitions | Meet Mayees Boutique - India &amp; USA';
$usDescription = 'See where Mayees Boutique is exhibiting next &mdash; trunk shows, bridal previews and fashion exhibitions across India and the USA. RSVP to reserve your spot.';
$usKeywords = 'Mayees Boutique exhibitions, Mayees Boutique trunk show, Mayees Boutique USA tour, saree exhibition India, bridal preview event, fashion exhibition schedule, Mayees Boutique events, Indian fashion trunk show USA';
$usCanonical = 'https://mayees.com/upcoming-shows.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $usTitle; ?></title>

    <!-- SEO -->
    <meta name="description" content="<?php echo htmlspecialchars($usDescription); ?>" />
    <meta name="keywords" content="<?php echo htmlspecialchars($usKeywords); ?>" />
    <meta name="author" content="Mayees Boutique" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="<?php echo htmlspecialchars($usCanonical); ?>" />

    <!-- Open Graph -->
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Mayees Boutique" />
    <meta property="og:title" content="<?php echo $usTitle; ?>" />
    <meta property="og:description" content="<?php echo htmlspecialchars($usDescription); ?>" />
    <meta property="og:image" content="https://mayees.com/img/boutique.jpg" />
    <meta property="og:url" content="<?php echo htmlspecialchars($usCanonical); ?>" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo $usTitle; ?>" />
    <meta name="twitter:description" content="<?php echo htmlspecialchars($usDescription); ?>" />
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
                    <span>Upcoming Shows</span>
                </nav>
                <h1 class="section-title">Upcoming Shows &amp; Exhibitions</h1>
                <p class="plp-page-subtitle">Meet us in person &mdash; trunk shows, bridal previews and exhibitions across India and the USA</p>
            </div>
        </section>
        <!--/ page header -->

        <!-- upcoming shows -->
        <section class="us-section">
            <div class="mh-container">
                <p class="us-count"><?php echo count($shows); ?> upcoming shows</p>

                <div class="us-list">
                    <?php foreach ($shows as $show): ?>
                    <?php
                    $usRsvpText = rawurlencode('Hi Mayees Boutique, I would like to RSVP for the "' . $show['title'] . '" in ' . $show['city'] . ' on ' . html_entity_decode($show['date_range']) . '.');
                    ?>
                    <article class="us-card<?php echo $show['featured'] ? ' is-featured' : ''; ?>" data-aos="fade-up">
                        <div class="us-card-date">
                            <span class="us-card-day"><?php echo htmlspecialchars($show['day']); ?></span>
                            <span class="us-card-month"><?php echo htmlspecialchars($show['month']); ?></span>
                        </div>
                        <div class="us-card-body">
                            <div class="us-card-top">
                                <span class="us-tag"><?php echo htmlspecialchars($show['tag']); ?></span>
                                <?php if ($show['featured']): ?>
                                <span class="us-featured-badge">Featured</span>
                                <?php endif; ?>
                            </div>
                            <h2 class="us-card-title"><?php echo htmlspecialchars($show['title']); ?></h2>
                            <div class="us-card-meta">
                                <span>
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 21s7-6.5 7-11.5A7 7 0 0 0 5 9.5C5 14.5 12 21 12 21Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                                        <circle cx="12" cy="9.5" r="2.4" stroke="currentColor" stroke-width="1.8"/>
                                    </svg>
                                    <?php echo htmlspecialchars($show['venue'] . ', ' . $show['country']); ?>
                                </span>
                                <span>
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="8.5" stroke="currentColor" stroke-width="1.8"/>
                                        <path d="M12 7.5V12l3 2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <?php echo $show['date_range'] . ' &bull; ' . $show['time']; ?>
                                </span>
                            </div>
                            <p class="us-card-desc"><?php echo $show['description']; ?></p>
                            <a href="https://wa.me/919848062323?text=<?php echo $usRsvpText; ?>" target="_blank" rel="noopener" class="us-rsvp-btn">RSVP On WhatsApp</a>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!--/ upcoming shows -->

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
