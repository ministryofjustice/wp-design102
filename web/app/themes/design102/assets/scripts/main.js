/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.

(function($) {
  // Hero carousels
  $('.hero-carousel-block').each(function(i, carousel) {
    var slidesContainer = $(carousel).find('.carousel__slides');
    var autoplay = !!+$(carousel).data('autoplay');

    if (slidesContainer.find('> li').length > 1) {
      // Play/pause video in the given slide
      var videoInSlide = function(action, slide) {
        var videos = $(slide).find('video');
        if (videos.length > 0) {
          videos.get(0)[action]();
        }
      };

      // Play video on carousel init
      slidesContainer.on('init', function(event, slick) {
        $(carousel).find('.carousel').addClass('carousel--active');
        videoInSlide('play', slick.$slides.get(slick.currentSlide));
      });

      // Play/pause video when changing slides
      slidesContainer.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
        videoInSlide('pause', slick.$slides.get(currentSlide));
        videoInSlide('play', slick.$slides.get(nextSlide));
      });

      slidesContainer.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        adaptiveHeight: true,
        autoplay: autoplay
      });
    }
  });

  // Navbar float
  $(function(){
    // Navbar will float this many pixels down the page
    var floatAfter = 15;
    var navbar = $('.navbar-light');

    var floatHeader = function() {
      var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      navbar.toggleClass('float', scrollTop >= floatAfter);
    };

    $(window).scroll($.throttle(250, floatHeader));
  });

  // Zoomable images
  $(function(){
    $('.zoomable').magnificPopup({
      type: 'image',
      closeOnContentClick: true,
      image: {
        verticalFit: true
      },
      gallery: {
        enabled: true
      }
    });
  });

  // Team members
  $('.team-members-block').each(function() {
    var teamMembers = $(this).find('.team-member');

    teamMembers.each(function(i, el) {
      var member = $(el);
      var video = member.find('video')[0];

      var resetVideo = function() {
        video.pause();
        video.currentTime = 0;
      };

      var mouseover = function() {
        resetVideo();
        $(video).addClass('show');
        video.play();
      };

      var mouseout = function() {
        $(video).removeClass('show');
        resetVideo();
      };

      member.hover(mouseover, mouseout);
      member.on('click', function(e) {
        e.preventDefault();
      });
    });
  });

  // Expandable
  $('.expandable__trigger').each(function() {
    var $trigger = $(this);
    var $content = $(this).siblings('.expandable__content');

    $content.hide();

    $trigger.on('click', function(e) {
      e.preventDefault();
      if ($content.not(':visible')) {
        $content.slideDown();
        $trigger.slideUp();
      }
    });
  });

})(jQuery);
