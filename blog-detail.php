<?php
$data = json_decode(file_get_contents(__DIR__ . '/data.json'), true);
$blogs = $data['blogs'];

$blogId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($blogId < 0 || $blogId >= count($blogs)) {
    $blogId = 0;
}
$post = $blogs[$blogId];

// Up to 3 related posts: same category first, then fill with the rest so
// the related grid is always populated.
$related = [];
foreach ($blogs as $idx => $b) {
    if ($idx === $blogId) {
        continue;
    }
    if ($b['category'] === $post['category']) {
        $related[] = ['index' => $idx, 'post' => $b];
    }
}
if (count($related) < 3) {
    foreach ($blogs as $idx => $b) {
        if ($idx === $blogId || count($related) >= 3) {
            continue;
        }
        $alreadyAdded = false;
        foreach ($related as $r) {
            if ($r['index'] === $idx) {
                $alreadyAdded = true;
                break;
            }
        }
        if (!$alreadyAdded) {
            $related[] = ['index' => $idx, 'post' => $b];
        }
    }
}
$related = array_slice($related, 0, 3);

$bdCanonical = 'https://mayees.com/blog-detail.php?id=' . $blogId;
$bdTitle = htmlspecialchars($post['title']) . ' | Mayees Journal - Mayees Boutique';
$bdDescription = $post['excerpt'];
$bdKeywordsBase = [
    strtolower($post['title']),
    strtolower($post['category']) . ' blog',
    'Mayees Boutique blog',
    'Mayees Journal',
    'Indian fashion blog',
    'women\'s ethnic wear tips',
];
$bdKeywords = implode(', ', $bdKeywordsBase);
$bdShareUrl = rawurlencode($bdCanonical);
$bdShareText = rawurlencode($post['title'] . ' — Mayees Boutique');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $bdTitle; ?></title>

    <!-- SEO -->
    <meta name="description" content="<?php echo htmlspecialchars($bdDescription); ?>" />
    <meta name="keywords" content="<?php echo htmlspecialchars($bdKeywords); ?>" />
    <meta name="author" content="Mayees Boutique" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="<?php echo htmlspecialchars($bdCanonical); ?>" />

    <!-- Open Graph -->
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="Mayees Boutique" />
    <meta property="og:title" content="<?php echo $bdTitle; ?>" />
    <meta property="og:description" content="<?php echo htmlspecialchars($bdDescription); ?>" />
    <meta property="og:image" content="https://mayees.com/<?php echo htmlspecialchars($post['image']); ?>" />
    <meta property="og:url" content="<?php echo htmlspecialchars($bdCanonical); ?>" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo $bdTitle; ?>" />
    <meta name="twitter:description" content="<?php echo htmlspecialchars($bdDescription); ?>" />
    <meta name="twitter:image" content="https://mayees.com/<?php echo htmlspecialchars($post['image']); ?>" />

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
                    <a href="blogs.php">Blogs</a>
                    <span aria-hidden="true">/</span>
                    <span><?php echo htmlspecialchars($post['category']); ?></span>
                </nav>
                <h1 class="section-title"><?php echo htmlspecialchars($post['title']); ?></h1>
            </div>
        </section>
        <!--/ page header -->

        <!-- blog detail -->
        <section class="bd-section">
            <div class="mh-container">
                <article class="bd-article">

                    <div class="bd-meta-row">
                        <span class="bd-category"><?php echo htmlspecialchars($post['category']); ?></span>
                        <span class="bd-meta-sep" aria-hidden="true">&bull;</span>
                        <span class="bd-meta-text"><?php echo htmlspecialchars($post['date']); ?></span>
                        <span class="bd-meta-sep" aria-hidden="true">&bull;</span>
                        <span class="bd-meta-text"><?php echo htmlspecialchars($post['read_time']); ?></span>
                    </div>

                    <div class="bd-hero" data-aos="fade-up">
                        <img src="<?php echo htmlspecialchars($post['image']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>">
                    </div>

                    <div class="bd-body" data-aos="fade-up">
                        <?php foreach ($post['content'] as $i => $paragraph): ?>
                        <p><?php echo $paragraph; ?></p>
                        <?php if ($i === 0 && !empty($post['quote'])): ?>
                        <blockquote class="bd-quote">&ldquo;<?php echo $post['quote']; ?>&rdquo;</blockquote>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                    <div class="bd-share">
                        <span class="bd-share-label">Share This Story</span>
                        <a class="bd-share-link" target="_blank" rel="noopener" aria-label="Share on WhatsApp" href="https://wa.me/?text=<?php echo $bdShareText; ?>%20-%20<?php echo $bdShareUrl; ?>">
                            <svg viewBox="0 0 32 32" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M16.004 3C9.107 3 3.5 8.607 3.5 15.504c0 2.35.646 4.61 1.87 6.59L3 29l7.086-2.328a12.46 12.46 0 0 0 5.918 1.507h.005c6.897 0 12.503-5.607 12.503-12.504C28.512 8.778 22.9 3 16.004 3Z"/></svg>
                        </a>
                        <a class="bd-share-link" target="_blank" rel="noopener" aria-label="Share on Facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $bdShareUrl; ?>">
                            <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M22 12a10 10 0 1 0-11.6 9.9v-7H7.9V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.4h-1.2c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.4 2.9h-2.4v7A10 10 0 0 0 22 12Z"/></svg>
                        </a>
                        <a class="bd-share-link" target="_blank" rel="noopener" aria-label="Share on X" href="https://twitter.com/intent/tweet?text=<?php echo $bdShareText; ?>&amp;url=<?php echo $bdShareUrl; ?>">
                            <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M18.9 2H22l-7.6 8.7L23.3 22H16.7l-5.2-6.8L5.6 22H2.5l8.1-9.3L1.7 2h6.8l4.7 6.2L18.9 2Zm-1.2 18h1.7L7.4 3.9H5.6L17.7 20Z"/></svg>
                        </a>
                    </div>

                    <div class="bd-author">
                        <img src="img/logo.png" alt="Mayees Boutique" class="bd-author-logo">
                        <div>
                            <p class="bd-author-name">Mayees Boutique Team</p>
                            <p class="bd-author-text">Notes on sarees, dresses and jewellery from the team behind 11+ years of Mayees Boutique.</p>
                        </div>
                    </div>

                </article>

                <?php if (!empty($related)): ?>
                <div class="bd-related">
                    <div class="section-heading" data-aos="fade-up">
                        <h2 class="section-title">You Might Also Like</h2>
                    </div>
                    <div class="row g-4">
                        <?php foreach ($related as $r): ?>
                        <div class="col-12 col-sm-6 col-lg-4">
                            <article class="blog-card">
                                <a href="blog-detail.php?id=<?php echo $r['index']; ?>" class="blog-card-media">
                                    <img src="<?php echo htmlspecialchars($r['post']['image']); ?>" alt="<?php echo htmlspecialchars($r['post']['title']); ?>" loading="lazy">
                                    <span class="blog-card-category"><?php echo htmlspecialchars($r['post']['category']); ?></span>
                                </a>
                                <div class="blog-card-body">
                                    <p class="blog-card-date"><?php echo htmlspecialchars($r['post']['date']); ?></p>
                                    <h3 class="blog-card-title"><a href="blog-detail.php?id=<?php echo $r['index']; ?>"><?php echo htmlspecialchars($r['post']['title']); ?></a></h3>
                                    <p class="blog-card-excerpt"><?php echo $r['post']['excerpt']; ?></p>
                                    <a href="blog-detail.php?id=<?php echo $r['index']; ?>" class="blog-card-link">Read More <span aria-hidden="true">&rarr;</span></a>
                                </div>
                            </article>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

            </div>
        </section>
        <!--/ blog detail -->

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
