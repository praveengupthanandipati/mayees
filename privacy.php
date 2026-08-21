<?php
$data = json_decode(file_get_contents(__DIR__ . '/data.json'), true);

$privacyTitle = 'Privacy Policy | Mayees Boutique';
$privacyDescription = 'Read the Mayees Boutique privacy policy to understand what information we collect, how we use it, and the choices you have when you shop with us online or in store.';
$privacyKeywords = 'Mayees Boutique privacy policy, Mayees Boutique data protection, Mayees Boutique customer data, Mayees Boutique cookies policy';
$privacyCanonical = 'https://mayees.com/privacy.php';
$privacyUpdated = 'August 21, 2026';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $privacyTitle; ?></title>

    <!-- SEO -->
    <meta name="description" content="<?php echo htmlspecialchars($privacyDescription); ?>" />
    <meta name="keywords" content="<?php echo htmlspecialchars($privacyKeywords); ?>" />
    <meta name="author" content="Mayees Boutique" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="<?php echo htmlspecialchars($privacyCanonical); ?>" />

    <!-- Open Graph -->
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Mayees Boutique" />
    <meta property="og:title" content="<?php echo $privacyTitle; ?>" />
    <meta property="og:description" content="<?php echo htmlspecialchars($privacyDescription); ?>" />
    <meta property="og:image" content="https://mayees.com/img/boutique.jpg" />
    <meta property="og:url" content="<?php echo htmlspecialchars($privacyCanonical); ?>" />

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
                    <span>Privacy Policy</span>
                </nav>
                <h1 class="section-title">Privacy Policy</h1>
                <p class="plp-page-subtitle">Last updated: <?php echo $privacyUpdated; ?></p>
            </div>
        </section>
        <!--/ page header -->

        <!-- privacy policy -->
        <section class="bd-section">
            <div class="mh-container">
                <article class="bd-article">
                    <div class="bd-body">

                        <p>Mayees Boutique Pvt. Ltd. (&ldquo;Mayees Boutique&rdquo;, &ldquo;we&rdquo;, &ldquo;us&rdquo; or &ldquo;our&rdquo;) respects your privacy and is committed to protecting the personal information you share with us. This policy explains what information we collect, how we use it, and the choices you have when you browse our website, enquire about a product, or visit us in store or at an exhibition.</p>

                        <h2>Information We Collect</h2>
                        <p>We collect information you provide directly to us, such as when you send a product enquiry, submit our contact form, sign up for our newsletter, or message us on WhatsApp or by phone. This may include:</p>
                        <ul>
                            <li>Your name, phone number and email address</li>
                            <li>Delivery address, when you place an order</li>
                            <li>Details of the products you enquire about or order</li>
                            <li>Any message, styling request or feedback you send us</li>
                        </ul>
                        <p>We do not collect or store payment card details on our systems &mdash; payments made by UPI, card or net banking are processed directly by our payment partners.</p>

                        <h2>How We Use Your Information</h2>
                        <p>We use the information we collect to:</p>
                        <ul>
                            <li>Respond to your enquiries and confirm, process and ship your orders</li>
                            <li>Send order updates, tracking links and delivery information</li>
                            <li>Send newsletters and offers, if you&rsquo;ve chosen to subscribe</li>
                            <li>Improve our products, website and customer experience</li>
                            <li>Invite you to exhibitions, trunk shows and events near you</li>
                        </ul>

                        <h2>Cookies &amp; Tracking</h2>
                        <p>Our website uses cookies and similar technologies to remember your preferences, keep the site running smoothly, and understand how visitors use our pages so we can improve them. You can disable cookies in your browser settings, though some parts of the site may not work as intended without them.</p>

                        <h2>Sharing Of Information</h2>
                        <p>We do not sell your personal information to third parties. We may share your information with trusted service providers who help us run our business &mdash; such as courier and logistics partners for delivery, and payment processors for completing transactions &mdash; solely for the purpose of fulfilling your order. We may also disclose information where required by law.</p>

                        <h2>Data Security</h2>
                        <p>We take reasonable technical and organisational measures to protect your personal information from unauthorised access, loss or misuse. However, no method of transmission over the internet is completely secure, and we cannot guarantee absolute security.</p>

                        <h2>Your Rights &amp; Choices</h2>
                        <p>You can ask us to access, correct or delete the personal information we hold about you, or unsubscribe from marketing communications at any time. To make a request, email us at <a href="mailto:info@mayees.com">info@mayees.com</a> or message us on WhatsApp, and we&rsquo;ll respond as soon as we can.</p>

                        <h2>Third-Party Links</h2>
                        <p>Our website may link to third-party services such as WhatsApp, Google Maps, Instagram and Facebook. We are not responsible for the privacy practices of these external sites, and we encourage you to review their privacy policies separately.</p>

                        <h2>Children&rsquo;s Privacy</h2>
                        <p>Our website and services are intended for general audiences and are not directed at children under 13. We do not knowingly collect personal information from children.</p>

                        <h2>Changes To This Policy</h2>
                        <p>We may update this privacy policy from time to time to reflect changes in our practices. Any updates will be posted on this page with a revised &ldquo;last updated&rdquo; date.</p>

                        <h2>Contact Us</h2>
                        <p>If you have any questions about this privacy policy or how we handle your information, please reach out to us:</p>
                        <ul>
                            <li>Email: <a href="mailto:info@mayees.com">info@mayees.com</a></li>
                            <li>Phone / WhatsApp: <a href="tel:+919848062323">+91 98480 62323</a></li>
                            <li>Address: Plot No. &ndash; 382, Diamond Hills Lane, Opposite Cyberabad Commissionerate, Diamond Hills, Lumbini Avenue, Gachibowli, Hyderabad &ndash; 500032, Telangana, India.</li>
                        </ul>

                    </div>
                </article>
            </div>
        </section>
        <!--/ privacy policy -->

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
