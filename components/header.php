    <!-- header -->
    <header class="mh-header fixed-top">
        <!-- announcement bar -->
        <div class="mh-header__top">
            <div class="mh-container">
                <p class="mh-topbar-text">Welcome to the Next Generation of Women Saree!</p>
            </div>
        </div>
        <!--/ announcement bar -->

        <!-- main nav -->
        <div class="mh-header__main">
            <div class="mh-container mh-row">

                <!-- logo -->
                <div class="mh-logo">
                    <a href="index.php">
                        <img src="img/logo.png" alt="Mayees Boutique">
                    </a>
                </div>
                <!--/ logo -->

                <!-- mobile toggle -->
                <button type="button" class="mh-toggle" id="mhToggle" aria-label="Toggle navigation" aria-expanded="false" aria-controls="mhNav">
                    <span class="mh-toggle__bar"></span>
                    <span class="mh-toggle__bar"></span>
                    <span class="mh-toggle__bar"></span>
                </button>
                <!--/ mobile toggle -->

                <!-- nav -->
                <div class="mh-backdrop" id="mhBackdrop"></div>
                <nav class="mh-nav" id="mhNav">
                    <ul class="mh-nav__list">

                        <li class="mh-nav__item">
                            <a href="index.php" class="mh-nav__link is-active">Home</a>
                        </li>

                        <li class="mh-nav__item">
                            <a href="about.html" class="mh-nav__link">About Us</a>
                        </li>

                        <!-- mega menus -->
                        <?php foreach ($data['mega_menu'] as $menu): ?>
                        <li class="mh-nav__item mh-nav__item--mega">
                            <a href="#" class="mh-nav__link mh-mega-trigger"><?php echo htmlspecialchars($menu['label']); ?> <i class="mh-caret"></i></a>
                            <div class="mh-mega">
                                <div class="mh-container mh-mega__inner">
                                    <div class="mh-mega__cols">
                                        <?php foreach ($menu['columns'] as $col): ?>
                                        <div class="mh-mega__col">
                                            <h4 class="mh-mega__col-title"><?php echo htmlspecialchars($col['title']); ?></h4>
                                            <ul class="mh-mega__col-list">
                                                <?php foreach ($col['links'] as $link): ?>
                                                <li><a href="#"><?php echo htmlspecialchars($link); ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="mh-mega__features">
                                        <?php foreach ($menu['features'] as $feature): ?>
                                        <a href="#" class="mh-feature-card mh-feature-card--<?php echo htmlspecialchars($feature['variant']); ?>">
                                            <span class="mh-feature-tag"><?php echo htmlspecialchars($feature['tag']); ?></span>
                                            <span class="mh-feature-title"><?php echo htmlspecialchars($feature['title']); ?></span>
                                            <span class="mh-feature-cta"><?php echo htmlspecialchars($feature['cta']); ?> <span aria-hidden="true">&rarr;</span></span>
                                        </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                        <!--/ mega menus -->
                          <li class="mh-nav__item">
                            <a href="javascript:void(0)" class="mh-nav__link">Blogs</a>
                        </li>
                        <li class="mh-nav__item">
                            <a href="javascript:void(0)" class="mh-nav__link">Upcoming Shows</a>
                        </li>

                    </ul>
                </nav>
                <!--/ nav -->

                <!-- actions -->
                <div class="mh-actions">
                    <button type="button" class="mh-icon-btn" aria-label="Search" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.8"/>
                            <path d="M21 21L16.65 16.65" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <a href="#" class="mh-icon-btn" aria-label="Support">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 13.5V12a8 8 0 0 1 16 0v1.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M4 13.5a2 2 0 0 1 2-2h.5a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5H6a2 2 0 0 1-2-2v-2Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                            <path d="M20 13.5a2 2 0 0 0-2-2h-.5A1.5 1.5 0 0 0 16 13v3a1.5 1.5 0 0 0 1.5 1.5h.5a2 2 0 0 0 2-2v-2Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                            <path d="M18 17.5v.5a3 3 0 0 1-3 3h-2.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </a>
                </div>
                <!--/ actions -->

            </div>
        </div>
        <!--/ main nav -->
    </header>
    <!--/ header -->
