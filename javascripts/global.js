jQuery(document).ready(function($) {
    (function(){

    // Check if homepage
    if ( !$('body').is('.home') ) {
        $('body').addClass('min-header');
    }
    if ( $('body').is('.single-post') ) {
        $('.blog-nav a').addClass('active');
        $('.work-nav a').addClass('inactive');
    }

    var contW = $(".container").width();

    // On resize, if a skeleton query is hit, call following functions
    $(window).resize(function(){
        var contC = $(".container").width();
        if (contC != contW) {
            /* PERFORM YOUR TRIGGERED FUNCTIONS */
            contW = contC;
        }
    });

    // Check if paint boxes are setup, if not add proper children
    if ( !$('.paint-box').has('.inner').length ) {
        $('.paint-box').wrapInner('<div class="inner" />');
        $('.paint-box').append('<span class="paint corner top-left"></span><span class="paint corner top-right"></span><span class="paint corner bot-left"></span><span class="paint corner bot-right"></span><span class="paint h-edge top-edge"></span><span class="paint h-edge bot-edge"></span><span class="paint v-edge left-edge"></span><span class="paint v-edge right-edge"></span>');
    }

    // AJAX for content loading
    $(".blog-nav a").click( function(e){
        if ( !$(".blog-nav a").is('.active') ) {
            goToBlog( true, 1 );
        }
    });
    $(".work-nav a").click( function(e){
        if ( !$(".work-nav a").is('.active') ) {
            goToWork( true, 1 );
        }
    });
    $(".ajax-nav a").click( function(e){
        goToPage( true, $(this).attr('href').substr(1) );
    });
    $('.header .inner a, .footer-logo').click(function(e) {
        if ( $('body').is('.home') ) {
            e.preventDefault();
            goToHome();
        }
    });

    // Check location to see if page should be loaded
    var blogPatt = /#blog(-\d+)*/gi,
        workPatt = /#work(-\d+)*/gi,
        pagePatt = /#\w+/gi;
    if ( blogPatt.test(window.location.hash) ) {
        goToBlog(false, pgNum(window.location.hash));
    } else if ( workPatt.test(window.location.hash) ) {
        goToWork(false, pgNum(window.location.hash));
    } else if ( window.location.hash.length > 1 ) {
        goToPage(false, window.location.hash.substr(1) );
    } else {
        //$('.main-content, .blog-content, .work-content').fadeIn();
        $('.main-content').fadeIn();
    }

    // Attach fixed items on scroll
    /* function fixedItems() {
        return $('.blog-nav.active').css('position', 'relative');
    }

    $(window).scroll(function(e) {
        fixedItems().css('top', $(window).scrollTop() + 'px');
    }); */

    function goToPage(anim, pgURL, title) {
        $('body').removeClass('animated');
        if (anim) {
            $('body').addClass('animated');
            $('.main-content, .blog-content, .work-content, .page-content').fadeOut(1000);
        } else {
            $('.main-content, .blog-content, .work-content, .page-content').hide();
            if (title) {
                document.title = title + " | Benjamin Chirlin";
            } else {
                document.title = "Benjamin Chirlin";
            }
            $('body').addClass('min-header');
            $(".blog-nav, .work-nav, .active, .inactive").removeClass('active inactive');
            $('a[href$="' + pgURL + '"]').addClass('active');
        }

        startAjaxLoader();
        $.ajax({
            url: pgURL
        }).done(function( html ) {
            if (title) {
                document.title = title + " | Benjamin Chirlin";
            } else {
                document.title = "Benjamin Chirlin";
            }
            $('body').addClass('min-header');
            $(".blog-nav, .work-nav, .active, .inactive").removeClass('active inactive');
            $('a[href$="' + pgURL + '"]').addClass('active');

            stopAjaxLoader();
            if (anim) {
                $('.page-content').html(html).fadeIn(1000);
            } else {
                $('.page-content').html(html).show();
            }
            $('.page-content').show();
        });
    }

    function goToWork(anim, pg) {
        if ( typeof pg == 'undefined' || !pg ) {
            pg = 1;
        }
        $('body').removeClass('animated');
        if (anim) {
            $('body').addClass('animated');
            $('.main-content, .blog-content, .work-content, .page-content').fadeOut(1000);
        } else {
            $('.main-content, .blog-content, .work-content, .page-content').hide();
            document.title = "Work | Benjamin Chirlin";
            $('body').addClass('min-header');
            $(".blog-nav a, .active").removeClass('active').addClass('inactive');
            $(".work-nav a").removeClass('inactive').addClass('active');
        }
        startAjaxLoader();
        $.ajax({
            url: '/work/?pg=' + pg
        }).done(function( html ) {
            document.title = "Work | Benjamin Chirlin";
            $('body').addClass('min-header');
            $('.blog-content, .page-content').html('');
            $(".blog-nav a, .active").removeClass('active').addClass('inactive');
            $(".work-nav a").removeClass('inactive').addClass('active');

            stopAjaxLoader();
            if (anim) {
                $('.work-content').html(html).fadeIn(1000);
            } else {
                $('.work-content').html(html).show();
            }
            //attachWorkItems();
            attachWorkPaging();
        });
    }

    function goToBlog(anim, pg) {
        if ( typeof pg == 'undefined' || !pg ) {
            pg = 1;
        }
        $('body').removeClass('animated');
        if (anim) {
            $('body').addClass('animated');
            $('.main-content, .blog-content, .work-content, .page-content').fadeOut(1000);
        } else {
            $('.main-content, .blog-content, .work-content, .page-content').hide();
            $('body').addClass('min-header');
            $('.work-content, .page-content').html('');
            $(".work-nav a, .active").removeClass('active').addClass('inactive');
            $(".blog-nav a").removeClass('inactive').addClass('active');
        }

        startAjaxLoader();
        $.ajax({
            url: '/blog/page/' + pg + '/'
        }).done(function( html ) {
            document.title = "Blog | Benjamin Chirlin";
            $('body').addClass('min-header');
            $('.work-content, .page-content').html('');
            $(".work-nav a, .active").removeClass('active').addClass('inactive');
            $(".blog-nav a").removeClass('inactive').addClass('active');

            stopAjaxLoader();
            if (anim) {
                $('.blog-content').html(html).fadeIn(1000);
            } else {
                $('.blog-content').html(html).show();
            }
            $('.wp-caption').css('width', '100%');
            //attachComments();
            attachPaging();
        });
    }

    // Trap blog paging
    function attachPaging() {
        $('.nav-previous a, .nav-next a, .pods-pagination-number').click(function(e){
            e.preventDefault();
            var link = $(this).attr('href').replace("http://benjaminchirlin.com", "");
            var loc = link.split("/")[1];
            window.location.hash = loc + "-" + pgNum(link);
            $('.' + loc + '-content').fadeOut(1000, function(){
                $(this).load(link, function() {
                    //attachComments();
                    attachPaging();
                    $(this).fadeIn(1000);
                });
            });
        });
    }

    function attachWorkPaging() {
        $('.nav-previous a, .nav-next a, .pods-pagination-number').click(function(e){
            e.preventDefault();
            var link = $(this).attr('href');
            window.location.hash = "work-" + pgNum(link);
            $('.work-content .work-items').fadeOut(1000, function(){
                $(this).load( '/' + link, function() {
                    //attachWorkItems();
                    attachWorkPaging();
                    $(this).fadeIn(1000);
                });
            });
        });
    }

    function attachWorkItems() {
        $('.work-item a').click(function(e) {
            e.preventDefault();
            var link = $(this).attr('href').replace('http://benjaminchirlin.com', '');
            var loc = link.split('/')[2];
            window.location.hash += '/' + loc;
            $(this).next().load(link, function() {
                $(this).fadeIn(1000);
            });
        });
    }

    function initSlideshows(sel) {
        var slider = sel.find('.slider').cycle({
            fx: 'fade',
            next: '.next',
            prev: '.last',
            'manual-trump': false,
            speed: 750,
            timeout: 7000,
            delay: 3000,
            slides: '> .slide',
            loader: true
        });
        sel.find('.slider').fadeIn();
    }
    initSlideshows($('.work-content'));

    // Attach hidden comments
    /*
function attachComments() {
        $('.blog-content article .show-comments').click(function(e){
            e.preventDefault();
            if ( !$(this).next('.comment-box').is('.active') ) {
                $('.comment-box.active').slideUp();
                $(this).next('.comment-box').slideDown();
            }
        });
    }
*/
    function goToHome() {
        $('body').addClass('animated');
        window.location.hash = "";
        document.title = "Benjamin Chirlin";
        $('.blog-content:visible').fadeOut( 1000, function(e){resetToHome(e);} );
        $('.work-content:visible').fadeOut( 1000, function(e){resetToHome(e);} );
        $('.page-content:visible').fadeOut( 1000, function(e){resetToHome(e);} );
    }

    // Helper functions

    // perform ajax loader animation
    var ajaxTimer;
    function startAjaxLoader() {
        clearInterval(ajaxTimer);
        $('.ajax-loader .jax').html('');
        $('.ajax-loader').fadeIn();
        ajaxTimer = setInterval( function(){
            if ( $('.ajax-loader .jax div').size() > 6 ) {
                $('.ajax-loader .jax').html('');
            }
            $('<div></div>').appendTo($('.ajax-loader .jax')).fadeIn(200);
        }, 400 );
    }

    function stopAjaxLoader() {
        $('.ajax-loader').hide();
        $('.ajax-loader .jax').html('');
        clearInterval(ajaxTimer);
    }

    // return to homepage
    function resetToHome(e){
        $('body').removeClass('min-header');
        $(".active, .inactive").removeClass('active inactive');
        $('.main-content').fadeIn(1000);
    }

    // return page from hash
    function pgNum(str) {
        var pgPatt = /\d+/;
        var res = pgPatt.exec(str);
        if ( res == null ) {
            return 1;
        } else {
            return res[0];
        }
    }

    // Show main content
    $('.main-container').fadeIn();

    })();
});