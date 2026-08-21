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
                    <?php
                    // Determine which nav link matches the page being viewed so
                    // the "is-active" state follows navigation instead of always
                    // pointing at Home.
                    $mhCurrentPage = basename($_SERVER['SCRIPT_NAME']);
                    $mhCurrentCategory = $mhCurrentPage === 'products-list.php'
                        ? ($_GET['category'] ?? null)
                        : ($mhCurrentPage === 'product-detail.php' && isset($categorySlug) ? $categorySlug : null);
                    ?>
                    <ul class="mh-nav__list">

                        <li class="mh-nav__item">
                            <a href="index.php" class="mh-nav__link<?php echo $mhCurrentPage === 'index.php' ? ' is-active' : ''; ?>">Home</a>
                        </li>

                        <li class="mh-nav__item">
                            <a href="about.php" class="mh-nav__link<?php echo $mhCurrentPage === 'about.php' ? ' is-active' : ''; ?>">About Us</a>
                        </li>

                        <!-- mega menus -->
                        <?php
                        // Maps each mega-menu key to the product category slug used by products-list.php
                        $mhCategorySlugs = ['dresses' => 'dresses', 'sarees' => 'sarees', 'jewelry' => 'jewellery'];
                        ?>
                        <?php foreach ($data['mega_menu'] as $menu): ?>
                        <?php $mhCategoryUrl = 'products-list.php' . (isset($mhCategorySlugs[$menu['key']]) ? '?category=' . $mhCategorySlugs[$menu['key']] : ''); ?>
                        <?php $mhMegaIsActive = isset($mhCategorySlugs[$menu['key']]) && $mhCurrentCategory === $mhCategorySlugs[$menu['key']]; ?>
                        <li class="mh-nav__item mh-nav__item--mega">
                            <a href="<?php echo htmlspecialchars($mhCategoryUrl); ?>" class="mh-nav__link mh-mega-trigger<?php echo $mhMegaIsActive ? ' is-active' : ''; ?>"><?php echo htmlspecialchars($menu['label']); ?> <i class="mh-caret"></i></a>
                            <div class="mh-mega">
                                <div class="mh-container mh-mega__inner">
                                    <div class="mh-mega__cols">
                                        <?php foreach ($menu['columns'] as $col): ?>
                                        <div class="mh-mega__col">
                                            <h4 class="mh-mega__col-title"><?php echo htmlspecialchars($col['title']); ?></h4>
                                            <ul class="mh-mega__col-list">
                                                <?php foreach ($col['links'] as $link): ?>
                                                <li><a href="<?php echo htmlspecialchars($mhCategoryUrl); ?>"><?php echo htmlspecialchars($link); ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="mh-mega__features">
                                        <?php foreach ($menu['features'] as $feature): ?>
                                        <a href="<?php echo htmlspecialchars($mhCategoryUrl); ?>" class="mh-feature-card mh-feature-card--<?php echo htmlspecialchars($feature['variant']); ?>">
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
                            <a href="blogs.php" class="mh-nav__link<?php echo $mhCurrentPage === 'blogs.php' ? ' is-active' : ''; ?>">Blogs</a>
                        </li>
                        <li class="mh-nav__item">
                            <a href="upcoming-shows.php" class="mh-nav__link<?php echo $mhCurrentPage === 'upcoming-shows.php' ? ' is-active' : ''; ?>">Upcoming Shows</a>
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
                    <a href="contact.php" class="mh-icon-btn<?php echo $mhCurrentPage === 'contact.php' ? ' is-active' : ''; ?>" aria-label="Support">
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
