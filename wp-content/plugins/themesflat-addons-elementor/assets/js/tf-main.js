;(function($) {

    "use strict";

    var responsive_menu = function() {
        
        $('.tf-nav-menu').each(function(){
            var $this = $(this).data('id_random'),
            $tf_nav_menu = $('.'+$this),
            $btn_menu_mobile = $('.'+$this).find('.btn-menu-mobile'),
            $close_menu_panel_style_default = $('.'+$this).find('.close-menu-panel-style-default'),
            $btn_menu_only = $('.'+$this).find('.btn-menu-only'),
            $mobile_menu_overlay = $('.'+$this).find('.mobile-menu-overlay');

            $('.'+$this).find('.btn-submenu').remove();
            var hasChildMenu = $tf_nav_menu.find('.mainnav-mobi').find('li:has(ul)');
            hasChildMenu.children('ul').hide();                                    
            hasChildMenu.children('a').after('<span class="btn-submenu"><i class="fa fa-angle-down" aria-hidden="true"></i></span>');

            var menuType = 'desktop';
            $(window).on('load resize', function() {
                var currMenuType = 'desktop';

                if ( matchMedia( 'only screen and (max-width: 991px)' ).matches ) {                
                    currMenuType = 'mobile';
                }

                if ( currMenuType !== menuType ) {
                    menuType = currMenuType;
                } else {                             
                    $('.'+$this).find('.mobile-menu-overlay').removeClass('active');
                    $('.'+$this).find('.nav-panel').removeClass('active');      
                }

            });

            $(document).on('click', '.mainnav-mobi li .btn-submenu', function(e) {
                $(this).toggleClass('active').next('ul').slideToggle(300);
                e.stopImmediatePropagation();
                e.preventDefault();
            }); 

            //Open Nav
            $($btn_menu_mobile).on('click', function() {                
                $(this).addClass('active');
                $(this).siblings().addClass('active');
            });             

            //Close Nav
            $($close_menu_panel_style_default).on('click', function() {             
                $(this).closest('.nav-panel').removeClass('active');             
                $(this).closest('.nav-panel').siblings().removeClass('active');           
            });

            $($mobile_menu_overlay).on('click', function() {             
                $(this).siblings().removeClass('active');            
                $(this).removeClass('active');            
            }); 

            $($btn_menu_only).on('click', function() { 
                $(this).siblings().addClass('active');
            });


            
        });        
                         
    }
    
    var carousel_Box = function() {
        if ( $().owlCarousel ) {
            $('.tf-carousel-box').each(function(){
                var
                $this = $(this),
                item = $this.data("column"),
                item2 = $this.data("column2"),
                item3 = $this.data("column3"),
                spacer = Number($this.data("spacer")),
                prev_icon = $this.data("prev_icon"),
                next_icon = $this.data("next_icon");

                var loop = false;
                if ($this.data("loop") == 'yes') {
                    loop = true;
                }

                var arrow = false;
                if ($this.data("arrow") == 'yes') {
                    arrow = true;
                } 

                var auto = false;
                if ($this.data("auto") == 'yes') {
                    auto = true;
                }  

                var rtl = false;
                if ($this.data("rtl") == 'yes') {
                    rtl = true;
                }               

                $this.find('.owl-carousel').owlCarousel({
                    rtl:rtl,
                    loop: loop,
                    margin: spacer,
                    nav: true,
                    pagination: true,
                    autoplay: auto,
                    autoplayTimeout: 5000,
                    smartSpeed: 850,
                    autoplayHoverPause: true,
                    navText : ["<i class=\""+prev_icon+"\"></i>","<i class=\""+next_icon+"\"></i>"],
                    responsive: {
                        0:{
                            items:item3
                        },
                        768:{
                            items:item2
                        },
                        1000:{
                            items:item
                        }
                    }
                });
            });
        }
    }

    var onepage_nav = function () {
        $('.tf-nav-menu.has-one-page .mainnav > ul > li > a').on('click',function(e) {

            var anchor = $(this).attr('href').split('#')[1];            
            var largeScreen = matchMedia('only screen and (min-width: 992px)').matches;
            var headerHeight = 0;
            headerHeight = $('.header').height();        
            if ( anchor ) {
                if ( $('#'+anchor).length > 0 ) {
                   if ( $('.header-shadow').length > 0 ) {
                        headerHeight = headerHeight;
                   } else {
                        headerHeight = 0;
                   }                   
                   var target = $('#'+anchor).offset().top - headerHeight;
                   $('html,body').animate({scrollTop: target}, 1000, 'easeInOutExpo');
                }
            }

            e.preventDefault();

        });
    } 

    var search_form = function(){
        $('.tf-widget-search').each(function(){
            $(this).find('.tf-icon-search').on('click' , function(){
                $(this).siblings('.tf-modal-search-panel').addClass('show');
            });
        });
        $(document).on('click', '.tf-widget-search .tf-modal-search-panel', function() {
            $(this).removeClass('show');
        });
        $(document).on('click', '.tf-widget-search .tf-search-form', function(e) {
            e.stopImmediatePropagation();
        });
    };

    var blogPostsOwl = function() {
        if ( $().owlCarousel ) {
            $('.tf-posts-wrap.has-carousel').each(function(){
                var
                $this = $(this),
                item = $this.data("column"),
                item2 = $this.data("column2"),
                item3 = $this.data("column3"),
                spacer = Number($this.data("spacer")),
                prev_icon = $this.data("prev_icon"),
                next_icon = $this.data("next_icon");

                var loop = false;
                if ($this.data("loop") == 'yes') {
                    loop = true;
                }

                var arrow = false;
                if ($this.data("arrow") == 'yes') {
                    arrow = true;
                } 

                var auto = false;
                if ($this.data("auto") == 'yes') {
                    auto = true;
                } 

                var rtl = false;
                if ($this.data("rtl") == 'yes') {
                    rtl = true;
                }               

                $this.find('.owl-carousel').owlCarousel({
                    rtl:rtl,
                    loop: loop,
                    margin: spacer,
                    nav: true,
                    pagination: false,
                    autoplay: auto,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    animateIn: 'fadeIn',
                    animateOut: 'fadeOut',
                    navText : ["<i class=\""+prev_icon+"\"></i>","<i class=\""+next_icon+"\"></i>"],
                    responsive: {
                        0:{
                            items:item3
                        },
                        768:{
                            items:item2
                        },
                        1000:{
                            items:item
                        }
                    }
                });

            });
        }
    }

    var blogLoadMore = function() {

        var $container_wrap = $('.tf-posts-wrap'); 
        var $container = $('.tf-posts-wrap').find('.tf-posts');  

        $('.navigation.loadmore a').on('click', function(e) {
            e.preventDefault(); 

            $container.after('<div class="tfpost-loading"><span></span></div>');

            $.ajax({
                type: "GET",
                url: $(this).attr('href'),
                dataType: "html",
                success: function( out ) {
                    var result = $(out).find('.column');  
                    var nextlink = $(out).find('.navigation.loadmore a').attr('href');

                    result.css({ opacity: 0 , visibility: 'hidden' });
                    if ($container.hasClass('masonry')) {
                        $container.append(result).imagesLoaded(function () {
                            result.css({ opacity: 1 , visibility: 'visible' });
                            $container.isotope('appended', result);
                        });
                    }
                    else {
                        $container.append(result).imagesLoaded(function () {
                            result.css({ opacity: 1 , visibility: 'visible' });
                            $container.isotope('appended', result);
                        });                         
                    }

                    if ( nextlink != undefined ) {
                        $('.navigation.loadmore a').attr('href', nextlink);
                        $container_wrap.find('.tfpost-loading').remove();
                    } else {
                        $container_wrap.find('.tfpost-loading').addClass('no-ajax').text('All posts loaded').delay(2000).queue(function() {$(this).remove();});
                        $('.navigation.loadmore a').remove();
                    }
                }
            });
        });
             
    }

    var blogMasonry = function() {
        $('.tf-posts-wrap .tf-posts').each(function(){
            var $this = $(this);
            if ($this.hasClass('masonry')) {
                var $grid = $this.isotope({
                    itemSelector: '.column',
                    percentPosition: true,
                    masonry: {
                    columnWidth: '.grid-sizer'
                    }
                });
                
                $grid.imagesLoaded().progress( function() {
                    $grid.isotope('layout');
                });
            } 
        });            
    } 

    var tftabs = function() {   
     
        $('.tf-tabs').each( function() {
            
            $(this).find('.tf-tabnav ul > li').filter(':first').addClass('active').removeClass('inactive');
            $(this).find('.tf-tabcontent').children().filter(':first').addClass('active');

            
            if ( $(this).find('.tf-tabnav ul > li').hasClass('set-active-tab') ) {
                $(this).find('.tf-tabnav ul > li').siblings().removeClass('active');                
            }
            if ( $(this).find('.tf-tabcontent').children().hasClass('set-active-tab') ) {
                $(this).find('.tf-tabcontent').children().siblings().removeClass('active');
            }

            $(this).find('.tf-tabnav ul > li').on('click', function(){
                var tab_id = $(this).attr('data-tab');

                $(this).siblings().removeClass('active').removeClass('set-active-tab').addClass('inactive');
                $(this).closest('.tf-tabs').find('.tf-tabcontent').children().removeClass('active').removeClass('set-active-tab').addClass('inactive');

                $(this).addClass('active').removeClass('inactive');
                $(this).closest('.tf-tabs').find('.tf-tabcontent').children('#'+tab_id).addClass('active').removeClass('inactive');
            });
        });
    }

    var filterPortfolioIsotope = function() { 
        if ( $( '.portfolio-container' ).hasClass('show_filter_portfolio') ) {
            if ( $().isotope ) {           
                var $container = $('.portfolio-container');
                $container.imagesLoaded(function(){
                    $container.isotope({
                        itemSelector: '.item',
                        transitionDuration: '1s'
                    });
                });

                $('.portfolio-filter li').on('click',function() {                           
                    var selector = $(this).find("a").attr('data-filter');
                    $('.portfolio-filter li').removeClass('active');
                    $(this).addClass('active');
                    $container.isotope({ filter: selector });
                    return false;
                });            
            };
        };        
    };

    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-nav-menu.default', responsive_menu );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tfcarousel.default', carousel_Box );        
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-nav-menu.default', onepage_nav );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-search.default', search_form );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tfposts.default', blogPostsOwl );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tfposts.default', blogLoadMore );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tfposts.default', blogMasonry );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tftabs.default', tftabs );
    });

    // Dom Ready
    $(function() {                
        filterPortfolioIsotope();            
    });

})(jQuery);
