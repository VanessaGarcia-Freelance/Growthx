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
        console.log('common');
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
    },
    'join': {
      init: function() {

      },
      finalize: function() {
        console.log('join page');

        $("form button" ).wrap( "<div class='button'></div>" );

        $('button.company').on('click', function () {
          toggleForm('.modal-company');
        });
        $('button.investor').on('click', function () {
          toggleForm('.modal-investor');
        });


        function toggleForm(currentModal) {
          console.log( 'currentModal:', currentModal  );
          $(currentModal).show();
          $('.overlay').show();
          $('.close', currentModal).on('click', function (){
            $(currentModal).hide();
            $('.overlay').hide();
          });
        }
      }
    },
    'contact': {
      init: function() {

      }
    },
    'blog': {
      init: function() { 
      },
      finalize: function () {
        var article = $('article');
        $('.newsletter-block').insertAfter(article[3]);
      }
    },
    'single': {
      init: function() {
        
      },
      finalize: function() {
        //console.log('founder story / blog');

        var paragraphs = $('.entry-content p'),
            quotes = $('.quote'),
            skip = Math.round(paragraphs.length / quotes.length),
            gallery = $('.gallery-container');
        //console.log( 'skip:', skip );

        if(gallery) {
          var galplacement = Math.floor(paragraphs.length / 2);
          //console.log('gal galplacement', galplacement);
          $(gallery).insertBefore(paragraphs[galplacement]);
        }

        if(quotes.length > 0) {
          for (i = 0; i < quotes.length; i++) { 
              var placement = skip*i;
              //console.log('placement ', placement);
              $(quotes[i]).insertBefore( paragraphs[placement] );
          }
        }
        // JavaScript to be fired on the home page, after the init JS
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
