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
            columns : 8
          },
          w480 : {
            rows : 8,
            columns : 4
          },
          w320 : {
            rows : 8,
            columns : 4
          },
          w240 : {
            rows : 8,
            columns : 4
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
          var mgHeight = $('.membergrid').height() - 30;
         // console.log( 'height:', mgHeight );
          
          $('.page-header, .page-header > div').height(mgHeight);
        }
        //$('.pageheader').height();

        $(window).load(function(){
          resizeHeader();
          $(window).resize(function(){
            setTimout(function(){
              resizeHeader();
            }, 1000 );
            
          }); 
        });
        

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
          var top = $(document).scrollTop();
          top = top + 20;
          console.log( 'top:', top );
          $(currentModal).css({ top: top+'px' });

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
    'news': {
      init: function() { 
      },
      finalize: function () {
        var article = $('article');
        console.log( 'aricle 3:', article );
        console.log( 'news:', $('.newsletter-block') );
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
            gallery = $('.gallery-container'),
            figure = $('figure');

        //super hacky but don't have time to figure out the way this was done. Visably good solve for now
        if((figure) && ($(window).width() < 768)) {
          $(figure).width('95%');
        }

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


        //wouldn't work unless I wrapped it in an load function.
        $(window).load(function(){ 
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
        });

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
          preventClick    : true,
        } );

      },
      finalize: function() {
        console.log('community test1');
        // console.log( 'templateDir:', templateDir );
        var phpRequest = templateDir + '/memberinfo.php';


        function showModal(currentModal) {
          var modal = $('.modal.member');

          modal.show();
          $('.overlay').show();
          $('.close', modal).on('click touchstart', function (){
            $(modal).hide();
            $('.overlay').hide();
          });
        }

        function addMemberData(obj){
          var modal = $('.modal.member');
          var useimage = obj.Headshot;
          if(obj.Wideimage){ 
            useimage = obj.Wideimage;
            $('.modal-image', modal).attr('style', "background-image:url("+useimage+")");
            $('.modal-header', modal).addClass('wide');
          }else{
             $('.modal-image', modal).attr('style', "background-image:url("+useimage+")");
            $('.modal-header', modal).removeClass('wide');
          }

          
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
          
          $('.membergrid a').on('click touchend', function (evt){
            console.log('click touchstart no');
            evt.preventDefault();
            // evt.stopPropagation();
            console.log( 'show bio - id:', $(this).attr('data-url') );
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

          $('.f-story').on('click touchend', function (evt){
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
