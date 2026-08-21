<?php
$data = json_decode(file_get_contents(__DIR__ . '/data.json'), true);

$ctAddress = 'Plot No. &ndash; 382, Diamond Hills Lane, Opposite Cyberabad Commissionerate, Diamond Hills, Lumbini Avenue, Gachibowli, Hyderabad &ndash; 500032, Telangana, India.';
$ctMapQuery = rawurlencode('Diamond Hills Lane, Gachibowli, Hyderabad, Telangana 500032, India');
$ctMapSrc = 'https://maps.google.com/maps?q=' . $ctMapQuery . '&t=&z=14&ie=UTF8&iwloc=&output=embed';

$ctTitle = 'Contact Us | Visit Or Reach Mayees Boutique - Hyderabad';
$ctDescription = 'Get in touch with Mayees Boutique &mdash; visit our Gachibowli, Hyderabad store, call or WhatsApp us, or send a message. Find our address, phone number, email and store hours.';
$ctKeywords = 'Mayees Boutique contact, Mayees Boutique address, Mayees Boutique Gachibowli, Mayees Boutique Hyderabad store, Mayees Boutique phone number, Mayees Boutique email, saree boutique Hyderabad contact';
$ctCanonical = 'https://mayees.com/contact.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $ctTitle; ?></title>

    <!-- SEO -->
    <meta name="description" content="<?php echo htmlspecialchars($ctDescription); ?>" />
    <meta name="keywords" content="<?php echo htmlspecialchars($ctKeywords); ?>" />
    <meta name="author" content="Mayees Boutique" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="<?php echo htmlspecialchars($ctCanonical); ?>" />

    <!-- Open Graph -->
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Mayees Boutique" />
    <meta property="og:title" content="<?php echo $ctTitle; ?>" />
    <meta property="og:description" content="<?php echo htmlspecialchars($ctDescription); ?>" />
    <meta property="og:image" content="https://mayees.com/img/boutique.jpg" />
    <meta property="og:url" content="<?php echo htmlspecialchars($ctCanonical); ?>" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo $ctTitle; ?>" />
    <meta name="twitter:description" content="<?php echo htmlspecialchars($ctDescription); ?>" />
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
                    <span>Contact Us</span>
                </nav>
                <h1 class="section-title">Contact Us</h1>
                <p class="plp-page-subtitle">We&rsquo;d love to hear from you &mdash; reach out for styling advice, order support or to plan a boutique visit</p>
            </div>
        </section>
        <!--/ page header -->

        <!-- contact -->
        <section class="ct-section">
            <div class="mh-container">
                <div class="ct-grid">

                    <!-- contact form -->
                    <div class="ct-form-card" data-aos="fade-up">
                        <h2 class="ct-form-title">Send Us A Message</h2>
                        <p class="ct-form-subtitle">Fill in the details below and we&rsquo;ll get back to you by email shortly.</p>

                        <form id="contactForm" novalidate>
                            <div class="ct-form-row">
                                <div class="enquiry-field">
                                    <label for="ctName">Full Name <span aria-hidden="true">*</span></label>
                                    <input type="text" id="ctName" name="name" autocomplete="name" required>
                                    <span class="enquiry-error">Please enter your full name.</span>
                                </div>
                                <div class="enquiry-field">
                                    <label for="ctPhone">Phone Number <span aria-hidden="true">*</span></label>
                                    <input type="tel" id="ctPhone" name="phone" autocomplete="tel" inputmode="numeric" maxlength="10" required>
                                    <span class="enquiry-error">Please enter a valid 10-digit mobile number.</span>
                                </div>
                            </div>

                            <div class="ct-form-row">
                                <div class="enquiry-field">
                                    <label for="ctEmail">Email Address</label>
                                    <input type="email" id="ctEmail" name="email" autocomplete="email">
                                    <span class="enquiry-error">Please enter a valid email address.</span>
                                </div>
                                <div class="enquiry-field">
                                    <label for="ctSubject">Subject</label>
                                    <input type="text" id="ctSubject" name="subject" placeholder="Order support, styling advice, etc.">
                                </div>
                            </div>

                            <div class="enquiry-field">
                                <label for="ctMessage">Message <span aria-hidden="true">*</span></label>
                                <textarea id="ctMessage" name="message" rows="4" required></textarea>
                                <span class="enquiry-error">Please enter a short message.</span>
                            </div>

                            <div class="ct-hp-field" aria-hidden="true">
                                <label for="ctWebsite">Leave this field empty</label>
                                <input type="text" id="ctWebsite" name="website" tabindex="-1" autocomplete="off">
                            </div>

                            <button type="submit" class="btn-enquiry-submit">Send Message</button>
                            <p class="enquiry-note">We&rsquo;ll email your message straight to our team and confirm here once it&rsquo;s sent.</p>
                            <div class="ct-form-message" id="ctFormMessage" role="status" aria-live="polite"></div>
                        </form>
                    </div>
                    <!--/ contact form -->

                    <!-- contact info -->
                    <div class="ct-info-list" data-aos="fade-up" data-aos-delay="100">

                        <div class="ct-info-card">
                            <span class="ct-info-icon">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 21s7-6.5 7-11.5A7 7 0 0 0 5 9.5C5 14.5 12 21 12 21Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                                    <circle cx="12" cy="9.5" r="2.4" stroke="currentColor" stroke-width="1.8"/>
                                </svg>
                            </span>
                            <div>
                                <p class="ct-info-label">Visit Us</p>
                                <p class="ct-info-text"><?php echo $ctAddress; ?></p>
                            </div>
                        </div>

                        <div class="ct-info-card">
                            <span class="ct-info-icon">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 13.5V12a8 8 0 0 1 16 0v1.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                    <path d="M4 13.5a2 2 0 0 1 2-2h.5a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5H6a2 2 0 0 1-2-2v-2Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                                    <path d="M20 13.5a2 2 0 0 0-2-2h-.5A1.5 1.5 0 0 0 16 13v3a1.5 1.5 0 0 0 1.5 1.5h.5a2 2 0 0 0 2-2v-2Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                                    <path d="M18 17.5v.5a3 3 0 0 1-3 3h-2.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                </svg>
                            </span>
                            <div>
                                <p class="ct-info-label">Call Or WhatsApp</p>
                                <p class="ct-info-text"><a href="tel:+919848062323">+91 98480 62323</a></p>
                            </div>
                        </div>

                        <div class="ct-info-card">
                            <span class="ct-info-icon">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.8"/>
                                    <path d="m4 7 8 6 8-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <div>
                                <p class="ct-info-label">Email Us</p>
                                <p class="ct-info-text"><a href="mailto:info@mayees.com">info@mayees.com</a></p>
                            </div>
                        </div>

                        <div class="ct-info-card">
                            <span class="ct-info-icon">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="8.5" stroke="currentColor" stroke-width="1.8"/>
                                    <path d="M12 7.5V12l3 2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <div>
                                <p class="ct-info-label">Store Hours</p>
                                <p class="ct-info-text">Monday &ndash; Saturday: 10am &ndash; 7pm<br>Sunday: Closed</p>
                            </div>
                        </div>

                    </div>
                    <!--/ contact info -->

                </div>

                <!-- map -->
                <div class="ct-map-wrap" data-aos="fade-up">
                    <iframe src="<?php echo htmlspecialchars($ctMapSrc); ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Mayees Boutique store location"></iframe>
                </div>
                <!--/ map -->

            </div>
        </section>
        <!--/ contact -->

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
        // Contact form: client-side validation, then a real submission to
        // contact-send.php which emails praveennandipati@gmail.com.
        $(function () {
            var $contactForm = $('#contactForm');
            var $submitBtn = $contactForm.find('.btn-enquiry-submit');
            var $formMessage = $('#ctFormMessage');
            var submitBtnDefaultText = $submitBtn.text();

            function validateContactForm() {
                var isValid = true;
                $contactForm.find('.enquiry-field').removeClass('has-error');

                if ($('#ctName').val().trim().length < 2) {
                    $('#ctName').closest('.enquiry-field').addClass('has-error');
                    isValid = false;
                }

                if (!/^[6-9]\d{9}$/.test($('#ctPhone').val().trim())) {
                    $('#ctPhone').closest('.enquiry-field').addClass('has-error');
                    isValid = false;
                }

                var email = $('#ctEmail').val().trim();
                if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    $('#ctEmail').closest('.enquiry-field').addClass('has-error');
                    isValid = false;
                }

                if ($('#ctMessage').val().trim().length < 5) {
                    $('#ctMessage').closest('.enquiry-field').addClass('has-error');
                    isValid = false;
                }

                return isValid;
            }

            function showFormMessage(text, type) {
                $formMessage
                    .text(text)
                    .removeClass('is-success is-error')
                    .addClass('is-visible ' + (type === 'success' ? 'is-success' : 'is-error'));
            }

            $contactForm.on('input', 'input, textarea', function () {
                $(this).closest('.enquiry-field').removeClass('has-error');
            });

            $contactForm.on('submit', function (e) {
                e.preventDefault();
                $formMessage.removeClass('is-visible is-success is-error');

                if (!validateContactForm()) {
                    return;
                }

                $submitBtn.prop('disabled', true).text('Sending...');

                $.ajax({
                    url: 'contact-send.php',
                    method: 'POST',
                    dataType: 'json',
                    data: $contactForm.serialize(),
                })
                    .done(function (response) {
                        if (response && response.success) {
                            $contactForm[0].reset();
                            showFormMessage(response.message || 'Thanks! Your message has been sent.', 'success');
                        } else {
                            if (response && response.errors) {
                                $.each(response.errors, function (field, errorText) {
                                    var $field = $('#ct' + field.charAt(0).toUpperCase() + field.slice(1));
                                    $field.closest('.enquiry-field').addClass('has-error').find('.enquiry-error').text(errorText);
                                });
                            }
                            showFormMessage((response && response.message) || 'Something went wrong. Please try again.', 'error');
                        }
                    })
                    .fail(function () {
                        showFormMessage('Sorry, we couldn\'t send your message. Please try again or reach us at info@mayees.com.', 'error');
                    })
                    .always(function () {
                        $submitBtn.prop('disabled', false).text(submitBtnDefaultText);
                    });
            });
        });
    </script>

</body>
</html>
