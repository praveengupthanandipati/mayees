// Header nav (mobile off-canvas + mega menu accordion)
$(function () {
  var $toggle = $('#mhToggle');
  var $nav = $('#mhNav');
  var $backdrop = $('#mhBackdrop');
  if (!$toggle.length || !$nav.length) return;

  function closeNav() {
    $toggle.removeClass('is-active').attr('aria-expanded', 'false');
    $nav.removeClass('is-active');
    $backdrop.removeClass('is-active');
    $('body').removeClass('mh-nav-open');
    $nav.find('.mh-nav__item--mega').removeClass('is-open');
  }

  function openNav() {
    $toggle.addClass('is-active').attr('aria-expanded', 'true');
    $nav.addClass('is-active');
    $backdrop.addClass('is-active');
    $('body').addClass('mh-nav-open');
  }

  $toggle.on('click', function () {
    if ($nav.hasClass('is-active')) {
      closeNav();
    } else {
      openNav();
    }
  });

  $backdrop.on('click', closeNav);

  $(document).on('keyup', function (e) {
    if (e.key === 'Escape') closeNav();
  });

  // Mega menu: accordion on mobile, hover-intent on desktop
  $nav.on('click', '.mh-mega-trigger', function (e) {
    if (window.innerWidth > 991) return;
    e.preventDefault();
    var $item = $(this).closest('.mh-nav__item--mega');
    var isOpen = $item.hasClass('is-open');
    $item.siblings('.mh-nav__item--mega').removeClass('is-open');
    $item.toggleClass('is-open', !isOpen);
  });

  // Desktop hover-intent: a short close delay bridges the gap between the
  // nav link and the mega panel so the menu doesn't flicker closed while
  // the pointer is travelling between them.
  var closeTimer = null;
  $nav.on('mouseenter', '.mh-nav__item--mega', function () {
    if (window.innerWidth <= 991) return;
    clearTimeout(closeTimer);
    var $item = $(this);
    $item.siblings('.mh-nav__item--mega').removeClass('is-open');
    $item.addClass('is-open');
  });

  $nav.on('mouseleave', '.mh-nav__item--mega', function () {
    if (window.innerWidth <= 991) return;
    var $item = $(this);
    closeTimer = setTimeout(function () {
      $item.removeClass('is-open');
    }, 250);
  });

  $(window).on('resize', function () {
    if (window.innerWidth > 991) {
      closeNav();
    } else {
      $nav.find('.mh-nav__item--mega').removeClass('is-open');
    }
  });
});

// Home hero carousel
var heroSwiper = new Swiper('.heroSwiper', {
  loop: true,
  effect: 'fade',
  fadeEffect: {
    crossFade: true,
  },
  speed: 1000,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
    pauseOnMouseEnter: true,
  },
  pagination: {
    el: '.hero-carousel .swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.hero-carousel .swiper-button-next',
    prevEl: '.hero-carousel .swiper-button-prev',
  },
  keyboard: {
    enabled: true,
  },
});

// Categories carousel
var categoriesSwiper = new Swiper('.categoriesSwiper', {
  slidesPerView: 2,
  spaceBetween: 14,
  loop: true,
  speed: 700,
  autoplay: {
    delay: 2800,
    disableOnInteraction: false,
    pauseOnMouseEnter: true,
  },
  pagination: {
    el: '.categories-section .swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.category-swiper-next',
    prevEl: '.category-swiper-prev',
  },
  breakpoints: {
    480: {
      slidesPerView: 2,
      spaceBetween: 16,
    },
    640: {
      slidesPerView: 3,
      spaceBetween: 18,
    },
    900: {
      slidesPerView: 4,
      spaceBetween: 20,
    },
    1200: {
      slidesPerView: 5,
      spaceBetween: 22,
    },
    1400: {
      slidesPerView: 6,
      spaceBetween: 24,
    },
  },
});

var swiper = new Swiper('.swiper-testimonials-home', {
      slidesPerView: 1,
      spaceBetween: 10,
	   autoplay: {
        delay: 5000,
        disableOnInteraction: true,
      },
      // init: false,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
      }
    });
// Custom Marquee JS for immediate repeat and pause on hover
document.addEventListener('DOMContentLoaded', function() {
  var marquee = document.querySelector('.custom-marquee');
  if (marquee) {
    // Duplicate content for seamless loop
    marquee.innerHTML += marquee.innerHTML;
  }
});

     var swiper = new Swiper(".mySwiper-hero", {
      slidesPerView: 1,
      spaceBetween: 2,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".hero-swiper-next",
        prevEl: ".hero-swiper-prev",
      },
      loop: true,
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 15,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
      },
    });


    var swiper = new Swiper(".mySwiper-hero-right", {
      spaceBetween: 30,
       autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      effect: "fade",
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });



// Ensure header class toggling works correctly
$(function () {
  const $header = $(".fixed-top");
  function toggleHeaderClass() {
    if ($(window).scrollTop() > 10) {
      $header.addClass("fixed-top-nav");
    } else {
      $header.removeClass("fixed-top-nav");
    }
  }
  $(window).on('scroll', toggleHeaderClass);
  toggleHeaderClass(); // Run on page load
  
  // Initialize AOS with premium settings
  if (typeof AOS !== 'undefined') {
    AOS.init({
      duration: 900,
      once: true,
      offset: 80,
      easing: 'ease-out-cubic',
      anchorPlacement: 'top-bottom',
      disable: false
    });
  }

  // Scroll-triggered number counter animation
  function animateCounters() {
    var counters = document.querySelectorAll('.safety-col .number');
    var observer = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          var el = entry.target;
          var target = parseInt(el.textContent);
          var count = 0;
          var increment = 1;
          var timer = setInterval(function() {
            count += increment;
            el.textContent = count < 10 ? '0' + count : count;
            if (count >= target) {
              clearInterval(timer);
              el.textContent = target < 10 ? '0' + target : target;
            }
          }, 150);
          observer.unobserve(el);
        }
      });
    }, { threshold: 0.5 });
    counters.forEach(function(counter) {
      observer.observe(counter);
    });
  }
  animateCounters();

  // Subtle parallax for decorative icons on scroll
  $(window).on('scroll', function() {
    var scrollTop = $(window).scrollTop();
    $('.whovr01icon').css('transform', 'translateY(' + (scrollTop * 0.04) + 'px)');
    $('.whovr02icon').css('transform', 'translateY(' + (scrollTop * -0.03) + 'px)');
    $('.reachicon01').css('transform', 'translateY(' + (scrollTop * 0.05) + 'px) rotate(' + (scrollTop * 0.02) + 'deg)');
    $('.reachicon02').css('transform', 'translateY(' + (scrollTop * -0.04) + 'px) rotate(' + (scrollTop * -0.015) + 'deg)');
    $('.zoneicon01').css('transform', 'translateY(' + (scrollTop * 0.03) + 'px)');
  });
});
// Only handle mobile: remove styles on resize to mobile
$(function () {
  function handleDropdownMobile() {
    if (window.innerWidth <= 991) {
      $(".navbar-nav .dropdown").off('mouseenter mouseleave');
      $(".navbar-nav .dropdown-menu").removeAttr('style');
    }
  }
  handleDropdownMobile();
  $(window).on('resize', handleDropdownMobile);
});


//on click move to browser top
$(document).ready(function () {
  $(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
      $("#movetop").fadeIn();
    } else {
      $("#movetop").fadeOut();
    }
  });
  //click event to scroll to top
  $("#movetop").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 200);
  });
});

//swiper home banmner
var swiper = new Swiper(".homeSwiper", {
  slidesPerView: 1,
  spaceBetween: 0,
  speed: 1200,
  // effect: "cube",
  // cubeEffect: {
  //   slideShadows: false,
  // },
  // effect: "flip",
  // flipEffect: {
  //   slideShadows: false,
  // },
  // Boolean: true,
  parallax: true,
  autoplay: {
    delay: 8000,
    disableOnInteraction: true,
  },
  loop: true,
  keyboard: {
    enabled: true,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

var swiper = new Swiper(".testimonials-swiper", {
  spaceBetween: 0,
  centeredSlides: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: true,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

//speakers
var swiper = new Swiper(".swiper-speakers", {
  slidesPerView: 1,
  spaceBetween: 10,
  // loop: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: true,
  },
  // init: false,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 4,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 6,
      spaceBetween: 10,
    },
    1500: {
      slidesPerView: 7,
      spaceBetween: 10,
    },
  },
});

(function () {
  function hidePageLoader() {
    setTimeout(function () {
      var loader = document.getElementById("load");
      if (loader) loader.classList.add("is-hidden");
    }, 500);
  }
  // If the document already finished loading by the time this script runs
  // (common on fast/cached loads), "complete" has already fired and
  // onreadystatechange would never trigger — hide the loader right away.
  if (document.readyState === "complete") {
    hidePageLoader();
  } else {
    document.onreadystatechange = function () {
      if (document.readyState === "complete") {
        hidePageLoader();
      }
    };
  }
})();


// Mobile category drawer (off-canvas)
$(function () {
  var $toggle = $('#menuToggle');
  var $drawer = $('#mobileCategoryDrawer');
  var $backdrop = $('#mobileDrawerBackdrop');
  var $closeBtn = $('#mobileDrawerClose');
  if (!$toggle.length || !$drawer.length) return;

  function openDrawer() {
    $drawer.addClass('is-active').attr('aria-hidden', 'false');
    $backdrop.addClass('is-active');
    $toggle.addClass('is-active').attr('aria-expanded', 'true');
    $('body').addClass('drawer-open');
  }

  function closeDrawer() {
    $drawer.removeClass('is-active').attr('aria-hidden', 'true');
    $backdrop.removeClass('is-active');
    $toggle.removeClass('is-active').attr('aria-expanded', 'false');
    $('body').removeClass('drawer-open');
  }

  $toggle.on('click', function () {
    if ($drawer.hasClass('is-active')) {
      closeDrawer();
    } else {
      openDrawer();
    }
  });

  $closeBtn.on('click', closeDrawer);
  $backdrop.on('click', closeDrawer);

  $(document).on('keyup', function (e) {
    if (e.key === 'Escape') closeDrawer();
  });
});

// Tab Products - desktop tabs / mobile accordion
$(function () {
  var $tabProducts = $('.tab-products');
  if (!$tabProducts.length) return;

  function setActiveTab(target) {
    $tabProducts.attr('data-active', target);
    $tabProducts.find('.tab-group').removeClass('is-current');
    $tabProducts.find('.tab-group[data-category="' + target + '"]').addClass('is-current');
  }

  // Desktop tabs
  setActiveTab($tabProducts.attr('data-active') || 'all');

  $tabProducts.on('click', '.tab-btn', function () {
    var target = $(this).data('target');
    $(this).addClass('is-active').siblings('.tab-btn').removeClass('is-active');
    setActiveTab(target);
  });

  // Mobile accordion (single-open)
  $tabProducts.on('click', '.accordion-header', function () {
    var $group = $(this).closest('.tab-group');
    var isOpen = $group.hasClass('is-open');
    $group.siblings('.tab-group').removeClass('is-open');
    $group.toggleClass('is-open', !isOpen);
  });
});

// Header search modal - autocomplete with product catalog, auto-populated on open
$(function () {
  var products = [
    { name: "Floral Party Wear Dress", category: "Dresses" },
    { name: "Emerald Green Casual Dress", category: "Dresses" },
    { name: "Designer Anarkali Dress", category: "Dresses" },
    { name: "Indo-Western Fusion Dress", category: "Dresses" },
    { name: "Ivory Wedding Gown", category: "Dresses" },
    { name: "Chiffon A-Line Dress", category: "Dresses" },
    { name: "Sequin Evening Gown", category: "Dresses" },
    { name: "Cotton Summer Dress", category: "Dresses" },
    { name: "Georgette Office Wear Dress", category: "Dresses" },
    { name: "Kanjivaram Silk Saree", category: "Sarees" },
    { name: "Banarasi Wedding Saree", category: "Sarees" },
    { name: "Chanderi Cotton Saree", category: "Sarees" },
    { name: "Bandhani Printed Saree", category: "Sarees" },
    { name: "Designer Georgette Saree", category: "Sarees" },
    { name: "Bridal Red Silk Saree", category: "Sarees" },
    { name: "Pastel Chiffon Saree", category: "Sarees" },
    { name: "Handloom Cotton Saree", category: "Sarees" },
    { name: "Festive Printed Saree", category: "Sarees" },
    { name: "Kundan Bridal Necklace Set", category: "Jewelleries" },
    { name: "Temple Gold Earrings", category: "Jewelleries" },
    { name: "Antique Silver Bangles", category: "Jewelleries" },
    { name: "Fashion Statement Rings", category: "Jewelleries" },
    { name: "Pearl Drop Earrings", category: "Jewelleries" },
    { name: "Polki Choker Necklace", category: "Jewelleries" },
    { name: "Meenakari Jhumka Earrings", category: "Jewelleries" }
  ];

  var $input = $('#headerSearchInput');
  var $box = $('#searchSuggestions');
  var $modal = $('#searchModal');
  var activeIndex = -1;

  if (!$input.length || !$box.length) return;

  function escapeRegExp(str) {
    return str.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
  }

  function renderList(list, query) {
    $box.empty();
    activeIndex = -1;

    if (!list.length) {
      $box.append('<div class="no-results">No products found</div>');
      $box.addClass('active');
      return;
    }

    if (!query) {
      $box.append('<div class="suggestion-label">All Products (' + list.length + ')</div>');
    } else {
      $box.append('<div class="suggestion-label">' + list.length + ' result' + (list.length === 1 ? '' : 's') + '</div>');
    }

    list.forEach(function (p) {
      var label = p.name;
      if (query) {
        var re = new RegExp('(' + escapeRegExp(query) + ')', 'ig');
        label = p.name.replace(re, '<strong>$1</strong>');
      }
      var $item = $(
        '<div class="suggestion-item">' +
          '<svg class="suggestion-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.8"/><path d="M21 21L16.65 16.65" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>' +
          '<span class="item-name">' + label + '</span>' +
          '<span class="item-category">' + p.category + '</span>' +
        '</div>'
      );
      $item.attr('data-name', p.name);
      $box.append($item);
    });

    $box.addClass('active');
  }

  function filterProducts(val) {
    var q = val.toLowerCase();
    return products.filter(function (p) {
      return p.name.toLowerCase().indexOf(q) !== -1 || p.category.toLowerCase().indexOf(q) !== -1;
    });
  }

  function refresh() {
    var val = $input.val().trim();
    if (!val) {
      renderList(products, '');
    } else {
      renderList(filterProducts(val), val);
    }
  }

  $input.on('focus input', refresh);

  $box.on('click', '.suggestion-item', function () {
    $input.val($(this).attr('data-name'));
    refresh();
  });

  $input.on('keydown', function (e) {
    var $items = $box.find('.suggestion-item');
    if (!$items.length) return;

    if (e.key === 'ArrowDown') {
      e.preventDefault();
      activeIndex = (activeIndex + 1) % $items.length;
      $items.removeClass('active-item').eq(activeIndex).addClass('active-item');
    } else if (e.key === 'ArrowUp') {
      e.preventDefault();
      activeIndex = (activeIndex - 1 + $items.length) % $items.length;
      $items.removeClass('active-item').eq(activeIndex).addClass('active-item');
    } else if (e.key === 'Enter') {
      if (activeIndex > -1) {
        e.preventDefault();
        $items.eq(activeIndex).trigger('click');
      }
    }
  });

  // Reset on open/close: the product list stays hidden until the user
  // clicks into the field or starts typing (see the 'focus input' handler above).
  if ($modal.length) {
    $modal.on('shown.bs.modal', function () {
      $input.val('');
      $box.empty().removeClass('active');
    });
    $modal.on('hidden.bs.modal', function () {
      $input.val('');
      $box.empty().removeClass('active');
    });
  }
});

// Load download links only when user scrolls near them
document.addEventListener('DOMContentLoaded', function() {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const link = entry.target;
        link.href = link.dataset.src;
        observer.unobserve(link);
      }
    });
  });

  document.querySelectorAll('[data-src]').forEach(el => {
    observer.observe(el);
  });
});
