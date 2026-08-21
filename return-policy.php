<?php
$data = json_decode(file_get_contents(__DIR__ . '/data.json'), true);

$rpTitle = 'Return &amp; Exchange Policy | Mayees Boutique';
$rpDescription = 'Read the Mayees Boutique return and exchange policy &mdash; eligibility window, how to request an exchange, refunds and store credit, and terms for sarees, dresses and jewellery.';
$rpKeywords = 'Mayees Boutique return policy, Mayees Boutique exchange policy, Mayees Boutique refund policy, saree exchange policy, jewellery return policy';
$rpCanonical = 'https://mayees.com/return-policy.php';
$rpUpdated = 'August 21, 2026';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $rpTitle; ?></title>

    <!-- SEO -->
    <meta name="description" content="<?php echo htmlspecialchars($rpDescription); ?>" />
    <meta name="keywords" content="<?php echo htmlspecialchars($rpKeywords); ?>" />
    <meta name="author" content="Mayees Boutique" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="<?php echo htmlspecialchars($rpCanonical); ?>" />

    <!-- Open Graph -->
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Mayees Boutique" />
    <meta property="og:title" content="<?php echo $rpTitle; ?>" />
    <meta property="og:description" content="<?php echo htmlspecialchars($rpDescription); ?>" />
    <meta property="og:image" content="https://mayees.com/img/boutique.jpg" />
    <meta property="og:url" content="<?php echo htmlspecialchars($rpCanonical); ?>" />

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
                    <span>Return &amp; Exchange Policy</span>
                </nav>
                <h1 class="section-title">Return &amp; Exchange Policy</h1>
                <p class="plp-page-subtitle">Last updated: <?php echo $rpUpdated; ?></p>
            </div>
        </section>
        <!--/ page header -->

        <!-- return policy -->
        <section class="bd-section">
            <div class="mh-container">
                <article class="bd-article">
                    <div class="bd-body">

                        <p>At Mayees Boutique, every piece is handled with care &mdash; and we want you to feel just as confident once it arrives at your door. This policy explains how exchanges, refunds and store credit work for orders placed online, in our Gachibowli boutique, or at any of our exhibitions.</p>

                        <h2>Exchange Window &amp; Eligibility</h2>
                        <p>You can request an exchange within <strong>7 days of delivery</strong>. To be eligible, the item must be:</p>
                        <ul>
                            <li>Unworn, unwashed and undamaged</li>
                            <li>In its original packaging, with all tags attached</li>
                            <li>Accompanied by your order details (name, phone number, and order date)</li>
                        </ul>

                        <h2>Items Not Eligible For Exchange</h2>
                        <p>A few categories fall outside our standard exchange window, since they&rsquo;re made specifically for you or can&rsquo;t be resold once opened:</p>
                        <ul>
                            <li>Custom-stitched blouses and made-to-order or altered pieces</li>
                            <li>Pierced jewellery such as earrings, once worn, for hygiene reasons</li>
                            <li>Items marked &ldquo;final sale&rdquo; at the time of purchase</li>
                            <li>Products without their original tags or packaging</li>
                        </ul>

                        <h2>How To Request An Exchange</h2>
                        <p>Message us on WhatsApp at <a href="https://wa.me/919848062323" target="_blank" rel="noopener">+91 98480 62323</a> or email <a href="mailto:info@mayees.com">info@mayees.com</a> with your order details and the reason for the exchange. If the item arrived damaged or incorrect, please include a couple of photos &mdash; this helps us resolve things faster. Our team will confirm eligibility and share the next steps.</p>

                        <h2>Return Shipping</h2>
                        <p>If an item arrives damaged, defective or different from what you ordered, we cover the cost of return shipping. For exchanges requested due to size or personal preference, return shipping is at the customer&rsquo;s expense.</p>

                        <h2>Refunds &amp; Store Credit</h2>
                        <p>We primarily offer exchanges or store credit rather than cash refunds. Store credit is issued as a code valid for 6 months from the date of issue, redeemable on any future order. Refunds to your original payment method are considered case-by-case, mainly for items that arrive damaged or defective and can&rsquo;t be replaced. Once we receive your returned item, exchanges or store credit are processed within 3&ndash;5 business days.</p>

                        <h2>Damaged Or Incorrect Items</h2>
                        <p>If you receive a damaged, defective or incorrect item, let us know within 48 hours of delivery with photos of the product and packaging. We&rsquo;ll arrange a free replacement where available, or a refund if a replacement can&rsquo;t be sourced.</p>

                        <h2>Sale Items</h2>
                        <p>Items purchased during a sale or at a discounted price are generally final sale and not eligible for exchange, unless they arrive damaged or defective. Please check the product page at the time of purchase for any specific terms.</p>

                        <h2>Jewellery &amp; Delicate Pieces</h2>
                        <p>Jewellery can be exchanged within 7 days if it&rsquo;s unused and returned in its original packaging. As noted above, pierced items like earrings cannot be exchanged once worn. Please handle delicate embellishments and embroidery with care while trying on a piece, so it remains eligible for exchange if needed.</p>

                        <h2>In-Store &amp; Exhibition Purchases</h2>
                        <p>The same 7-day exchange window applies to items purchased at our Gachibowli boutique or at an exhibition. You&rsquo;re welcome to bring the item back to our store in person, or reach out to us on WhatsApp to arrange an exchange if you&rsquo;re not local to Hyderabad.</p>

                        <h2>Contact Us</h2>
                        <p>Have a question about an order, or need help starting an exchange? We&rsquo;re happy to help:</p>
                        <ul>
                            <li>Email: <a href="mailto:info@mayees.com">info@mayees.com</a></li>
                            <li>Phone / WhatsApp: <a href="tel:+919848062323">+91 98480 62323</a></li>
                            <li>Address: Plot No. &ndash; 382, Diamond Hills Lane, Opposite Cyberabad Commissionerate, Diamond Hills, Lumbini Avenue, Gachibowli, Hyderabad &ndash; 500032, Telangana, India.</li>
                        </ul>

                    </div>
                </article>
            </div>
        </section>
        <!--/ return policy -->

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
