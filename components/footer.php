    <!-- footer -->
    <footer class="site-footer">
        <div class="mh-container">
            <div class="footer-grid">

                <div class="footer-col footer-col--collections">
                    <h4 class="footer-col-title">Collections</h4>
                    <ul class="footer-links">
                        <?php foreach ($data['footer']['collections'] as $link): ?>
                        <li><a href="#"><?php echo htmlspecialchars($link); ?></a></li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="footer-social">
                        <a href="#" class="footer-social-link" aria-label="Facebook">
                            <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 12a10 10 0 1 0-11.6 9.9v-7H7.9V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.4h-1.2c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.4 2.9h-2.4v7A10 10 0 0 0 22 12Z"/>
                            </svg>
                        </a>
                        <a href="#" class="footer-social-link" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" xmlns="http://www.w3.org/2000/svg">
                                <rect x="3" y="3" width="18" height="18" rx="5"/>
                                <circle cx="12" cy="12" r="4"/>
                                <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/>
                            </svg>
                        </a>
                        <a href="#" class="footer-social-link" aria-label="YouTube">
                            <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23 12s0-3.6-.5-5.3c-.3-1-1-1.8-2-2C18.7 4.2 12 4.2 12 4.2s-6.7 0-8.5.5c-1 .2-1.7 1-2 2C1 8.4 1 12 1 12s0 3.6.5 5.3c.3 1 1 1.7 2 2 1.8.5 8.5.5 8.5.5s6.7 0 8.5-.5c1-.3 1.7-1 2-2 .5-1.7.5-5.3.5-5.3ZM9.8 15.5V8.5l6.3 3.5-6.3 3.5Z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="footer-col">
                    <h4 class="footer-col-title">Useful Links</h4>
                    <ul class="footer-links">
                        <?php foreach ($data['footer']['useful_links'] as $link): ?>
                        <li><a href="<?php echo htmlspecialchars($link['href']); ?>"><?php echo htmlspecialchars($link['label']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4 class="footer-col-title">Newsletter</h4>
                    <p class="footer-newsletter-text">Sign up to get exclusive offers, latest collections, and style tips!</p>
                    <form class="footer-newsletter-form" onsubmit="return false;">
                        <input type="email" class="footer-newsletter-input" placeholder="E-mail" required>
                        <button type="submit" class="footer-newsletter-btn">Subscribe</button>
                    </form>
                </div>

                <div class="footer-col">
                    <h4 class="footer-col-title">Get In Touch</h4>

                    <div class="footer-contact-group">
                        <span class="footer-contact-label">Location</span>
                        <p class="footer-contact-text">Plot No. &ndash; 382, Diamond Hills Lane, Opposite Cyberabad Commissionerate, Diamond Hills, Lumbini Avenue, Gachibowli, Hyderabad &ndash; 500032, Telangana, India.</p>
                    </div>

                    <div class="footer-contact-group">
                        <span class="footer-contact-label">Contact</span>
                        <p class="footer-contact-text">
                            <a href="tel:+919848062323">+91 9848062323</a><br>
                            <a href="mailto:info@mayees.com">info@mayees.com</a>
                        </p>
                    </div>

                    <div class="footer-contact-group">
                        <span class="footer-contact-label">Hours</span>
                        <p class="footer-contact-text">Monday &ndash; Saturday: 10am &ndash; 7pm<br>Sunday: Closed</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="mh-container footer-bottom-inner text-center">
                <p class="footer-copyright w-100 text-center">&copy; <?php echo date('Y'); ?> Mayees Boutique &mdash; Your Fabulous World</p>
            </div>
        </div>
    </footer>
    <!--/ footer -->
