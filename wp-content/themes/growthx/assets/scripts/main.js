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

        $('.carousel').carousel({
            interval: 8000 //changes the speed
        });
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
        $( '.membergrid' ).gridrotator( {
          rows : 4,
          columns : 8,
          maxStep : 0,
          interval : 99999999,
          w1024 : {
            rows : 4,
            columns : 8
          },
          w768 : {
            rows : 4,
            columns : 5
          },
          w480 : {
            rows : 4,
            columns : 4
          },
          w320 : {
            rows : 4,
            columns : 4
          },
          w240 : {
            rows : 4,
            columns : 3
          },
          animType : 'fadeInOut',
          // animation easings
          animEasingOut : 'ease',
          animEasingIn  : 'ease',
          preventClick    : true,
        } );
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
        
        function resizeHeader () {
          console.log('height');

          var mgHeight = $('.membergrid').height() - 25;
          console.log( 'height:',mgHeight );
          
          $('.page-header').height(mgHeight);
        }
        //$('.pageheader').height();

        $(window).load(function(){
          resizeHeader();
        });
        $(window).resize(resizeHeader()); 

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
        //console.log('join page');

        function toggleForm(currentModal) {
          console.log( 'currentModal:', currentModal  );
          $(currentModal).show();
          $('.overlay').show();
          $('.close', currentModal).on('click', function (){
            $(currentModal).hide();
            $('.overlay').hide();
          });
        }

        $("form button" ).wrap( "<div class='button'></div>" );

        $('button.company').on('click', function () {
          toggleForm('.modal-company');
        });
        $('button.investor').on('click', function () {
          toggleForm('.modal-investor');
        });


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
            wpcaption = $('.wp-caption'),
            quotes = $('.quote'),
            skip = Math.round(paragraphs.length / quotes.length),
            gallery = $('.gallery-container');
        //console.log( 'skip:', skip );

        if(gallery) {
          var galplacement = Math.floor(paragraphs.length / 2);
          //console.log('gal galplacement', galplacement);
          //$(gallery).insertBefore(paragraphs[galplacement]);
          //always place after 2nd paragraph
          $(gallery).insertBefore(paragraphs[2]);
        }

        if(quotes.length > 0) {
          for (i = 0; i < quotes.length; i++) {  
              var placement = '';
              if($(quotes[i]).data('position') === ''){
                placement = skip*i;
              }else{
                placement = $(quotes[i]).data('position') - 1;
              }
              //console.log('placement ', placement);
              $(quotes[i]).insertBefore( paragraphs[placement] );
          }
        }

        if(wpcaption.length > 0) {
            var height = '';
            var width = '';
          for (i = 0; i < wpcaption.length; i++) {  
                height = $(wpcaption[i]).find('img').height() - 40;
                width = $(wpcaption[i]).width() - 40;
                $(wpcaption[i]).append('<div class="inset-border" style="height:'+height+'px;width:'+width+'px"></div>');
                $('.wp').height();
          }
          $( ".wp-caption" ).each(function() { 
            $( this ).find('.inset-border').height( $(this).find('img').height() - 40 );
          });

        }

      }
    },
    'community': {
      init: function() {

        $( '.membergrid' ).gridrotator( {
          rows : 4,
          columns : 8,
          maxStep : 0,
          interval : 999999,
          w1024 : {
            rows : 5,
            columns : 6
          },
          w768 : {
            rows : 5,
            columns : 5
          },
          w480 : {
            rows : 6,
            columns : 4
          },
          w320 : {
            rows : 7,
            columns : 4
          },
          w240 : {
            rows : 7,
            columns : 3
          },
          animType : 'fadeInOut',
          preventClick    : false,
        } );

      },
      finalize: function() {
        // console.log('community');
        // console.log( 'templateDir:', templateDir );
        var phpRequest = templateDir + '/memberinfo.php';


        function showModal(currentModal) {
          var modal = $('.modal.member');

          modal.show();
          $('.overlay').show();
          $('.close', modal).on('click', function (){
            $(modal).hide();
            $('.overlay').hide();
          });
        }

        function addMemberData(obj){
          var modal = $('.modal.member');

          $('.modal-image', modal).attr('style', "background-image:url("+obj.Headshot+")");
          $('.name', modal).html(obj.Name);
          $('.company', modal).html(obj.Company);

          var links = '';

          if(obj.Email !== '') {
            links += "<li>" + obj.Email + "</li>";
          }
          if(obj.Angellist !== '') {
            links += "<li>" + obj.Angellist + "</li>";
          }
          if(obj.Linkedin !== '') {
            links += "<li>" + obj.Linkedin + "</li>";
          }
          if(obj.Twitter !== '') {
            links += "<li>" + obj.Twitter + "</li>";
          }
          $('.links ul', modal).html(links);

          var bio = '<p>Bio Coming Soon...</p>';
          if(obj.Bio !== '') {
            bio = obj.Bio;
          }
          $('.bio', modal).html(bio);


          showModal();
        }


        //wouldn't work unless I wrapped it in an load function.
        $(window).load(function(){
          $('.member.bio-modal').on('click', function(evt){
            evt.preventDefault();
            console.log( 'show bio - id:', $(this).attr('href') );
            var memberId = $(this).attr('data-url');

            $.ajax({
              type: "POST",
              url: phpRequest, //memberId,
              dataType:"json",
              data:{action: memberId},
              success:function(json) {
                console.log(json);
                addMemberData(json);
              },
              error: function(json){
                console.log(json);
              }
            });

          });

          $('.f-story').on('click', function(evt){
            evt.stopPropagation();
          });

        });
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
