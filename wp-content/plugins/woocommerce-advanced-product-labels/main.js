/**
 * @version    1.5
 * @package    Ferado
 * @author     WooRockets Team <support@woorockets.com>
 * @copyright  Copyright (C) 2014 WooRockets.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.woorockets.com
 */

(function($) {
	"use strict";
	$(document).ready(function() {

        /*chamada fancybox - youtube lightbox*/


		/*  [ Detecting Mobile Devices ]
		- - - - - - - - - - - - - - - - - - - - */
		var isMobile = {
			Android: function() {
				return navigator.userAgent.match(/Android/i);
			},
			BlackBerry: function() {
				return navigator.userAgent.match(/BlackBerry/i);
			},
			iOS: function() {
				return navigator.userAgent.match(/iPhone|iPad|iPod/i);
			},
			Opera: function() {
				return navigator.userAgent.match(/Opera Mini/i);
			},
			Windows: function() {
				return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
			},
			Desktop: function() {
				return window.innerWidth <= 960;
			},
			any: function() {
				return ( isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows() || isMobile.Desktop() );
			}
		};


		/*  [ Search box  ]
		- - - - - - - - - - - - - - - - - - - - */
		$( '.wr-icon-search' ).on( 'click', function() {
			$(this).parent().toggleClass('active');
		});

		/*  [ Custom RTL Menu ]
		- - - - - - - - - - - - - - - - - - - - */
		if ( ! isMobile.any() ) {
			$( '.sub-menu li' ).on( 'hover', function () {
			var sub_menu = $( this ).find( ' > .sub-menu' );
				if ( sub_menu.length ) {
					if ( sub_menu.outerWidth() > ( $( window ).outerWidth() - sub_menu.offset().left ) ) {
						$( this ).addClass( 'menu-rtl' );
					}
				}
			});
		}



		/*  [ Back To Top ]
		- - - - - - - - - - - - - - - - - - - - */
		$(window).scroll(function () {
			if ( $( this ).scrollTop() > 50 ) {
				$( '.back-to-top' ).fadeIn( 'slow' );
			} else {
				$( '.back-to-top' ).fadeOut( 'slow' );
			}
		});
		$('.back-to-top').click(function () {
			$( "html, body" ).animate({
				scrollTop: 0
			}, 500);
			return false;
		});

		/*  [ Menu Responsive ]
		- - - - - - - - - - - - - - - - - - - - */
		
			var container, button, menu;
			container = document.getElementById( 'site-navigation' );
			if ( ! container )
				return;

			button = container.getElementsByTagName( 'button' )[0];
			if ( 'undefined' === typeof button )
				return;

			menu = container.getElementsByTagName( 'ul' )[0];

			// Hide menu toggle button if menu is empty and return early.
			if ( 'undefined' === typeof menu ) {
				button.style.display = 'none';
				return;
			}

			button.onclick = function() {
				if ( -1 !== container.className.indexOf( 'active' ) )
					container.className = container.className.replace( ' active', '' );
				else
					container.className += ' active';
			};

			var MenuChildren = $('#menu-main .menu-item-has-children');

			MenuChildren.children('a').after('<div class="touch"><i class="dashicons dashicons-arrow-down-alt2"></i></div>');
			MenuChildren.on('click', '.touch', function(e){
				e.stopPropagation();
				$(this).parent('.menu-item').toggleClass('active');
			});
		

		/*  [ Remove p empty tag of page builder ]
		- - - - - - - - - - - - - - - - - - - - */
		$( 'p' ).each(function() {
			var $this = $( this );
				if( $this.html().replace(/\s|&nbsp;/g, '').length == 0) {
				$this.remove();
			}
		});

		/*  [ Modify default gallery of wordpress to carousel ]
		- - - - - - - - - - - - - - - - - - - - - - - - - - - - */
		$( ".gallery" ) .owlCarousel({
			items: 1,
			pagination: true,
		});

		/*  [ Switch style for shop page  ]
		- - - - - - - - - - - - - - - - - - - - */
		$( '.style-switch a' ).on('click', function () {
			$(this).parent().children().removeClass(' active' );
			$(this).toggleClass('active');

			if ( $(this).hasClass( 'list' ) ) {
				$( '.products' ).addClass( 'list-style' );
			} else {
				$( '.products' ).removeClass( 'list-style' );
			}
		});

		/*  [ Custom accordion element ]
		- - - - - - - - - - - - - - - - - - - - */
		function toggleChevron(e) {
			$(e.target).prev('.panel-heading').find('a').toggleClass('collapsed');
		}
		$('.wr-element-accordion').on('hidden.bs.collapse', toggleChevron);
		$('.wr-element-accordion').on('shown.bs.collapse', toggleChevron);

		/*  [ Custom heading element ]
		- - - - - - - - - - - - - - - - - - - - */
		$('.h-center').wrap('<div style="text-align: center;"></div>');
		$('.h-center').append('<div class="dot"></div>');

		/*  [ Custom add to cart button ]
		- - - - - - - - - - - - - - - - - - - - */
		$( '.add_to_cart_button' ).click(function( e ) {
			setTimeout(function() {
				$(this).siblings('.added_to_cart').remove();
				$(this).removeClass('.added');
			}.bind(this), 350);
		});

		/*  [ Custom row fullwidth ]
		- - - - - - - - - - - - - - - - - - - - */
		$('.wr_fullwidth').each(function() {
			var $self_html = $(this).html();
			$(this).empty();$(this).append('<div class="container">' + $self_html + '</div>');
		});
		$( 'body' ).removeClass( 'wr-full-width' );

		/*  [ Custom promo box ]
		- - - - - - - - - - - - - - - - - - - - */
		$( '.wr-element-promobox' ).find( '.btn' ).each(function() {
			$(this).parent().addClass( 'has-btn' );
		});

	});

	$(window).load(function() {

		/*  [ Sticky header trigger ]
		- - - - - - - - - - - - - - - - - - - - */
		if ( extraParams.sticky_menu == '1' ) {
			$( '.header-bot' ).scrollFix({
				fixClass: 'sticky',
			});
		}

		/*  [ Blog masonry trigger ]
		- - - - - - - - - - - - - - - - - - - - */
		if ( extraParams.blog_masonry == 'masonry' ) {
			var container = document.querySelector( '.blog-masonry' );
			var msnry = new Masonry( container, {
				itemSelector: '.hentry',
				columnWidth: container.querySelector( '.grid-sizer' )
			});
		}

        $("a#inline").fancybox({
            'hideOnContentClick': true
        });

        $(".fancybox").fancybox({
            type: "iframe",
            // other API options
        })


		/*  [ Page loader]
		- - - - - - - - - - - - - - - - - - - - */
		setTimeout(function() {
			$( 'body' ).addClass( 'loaded' );
			setTimeout(function () {
				$('#pageloader').remove();
			}, 1500);
		}, 1500);
	});

    $(".subscribe-me").subscribeBetter({
        trigger: "onidle",
        delay: 2000
    });

    /*Configurações página produto - FAT*/
    $('.profissionais').css('opacity','0');
    $('.quantity input').css('display','none');
    //
    //
    $('.tm-field-display input').click(function() {
        $('.profissionais').css('opacity','1');
        $('.quantity input').css('display','block');
        $('.profisionais').css('position','relative');
        $('.profisionais').css('bottom','-563px;');
    });

    /*****Scroll Suave - Planos****/
    $('.nav a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        var id = $(this).attr('href'),
            targetOffset = $(id).offset().top;

        $('html, body').animate({
            scrollTop: targetOffset - 100
        }, 1000);
    });
    /*****Fim do Scroll Suave - Planos****/


    $('.flexslider').flexslider({
        animation: "slide"
    });

    $( ".carousel-home-category .products" ).owlCarousel({
		items: 3,
		pagination: false,
		navigation: true,
		navigationText: ['<', '>'],
		//rewindNav: false,
		scrollPerPage: true,
		stopOnHover: true,
		itemsDesktop : [1170,3], //5 items between 1000px and 901px
		itemsDesktopSmall : [970,3], // betweem 900px and 601px
		itemsTablet: [768,2], //2 items between 600 and 0
		itemsMobile : [480,1] // itemsMobile disabled - inherit from itemsTablet option
	});

	var $span = "<span class='juros' style='margin-top: 10px; width: 150px;'>Em até 10x no cartão1</span>";
    //$span.className = 'juros';
    document.getElementsByClassName(".carousel-home-category .price").insertBefore($span);
    //$span.innerText = 'Em até 10x no cartão';
	//document.getElementsByClassName('carousel-home-category').appendChild( $span );
	//$( ".carousel-home-category .price" ).append( "<span class='juros' style='margin-top: 10px; width: 150px;'>Em até 10x no cartão</span>" );

    var nav = $('.header-bot');
    $(window).scroll(function () {
        if(nav.width() >= 1200) { //Caso a largura for maior ou igual a 1200px testa determinada distancia do topo
            if ($(this).scrollTop() > 30) {
                nav.addClass("fixo");
                $("nav#site-navigation").css("display","none");
                $("form.search-form").css("margin-top","-99px");
            } else {
                nav.removeClass("fixo");
                $("nav#site-navigation").css("display","block");
                $("form.search-form").css("margin-top","-155px");
            }
        } else if(nav.width <= 480) { //Se não, teste para a largura igual ou menor que 480px
            if ($(this).scrollTop() > 30) {
                nav.addClass("fixo");
            } else {
                nav.removeClass("fixo");
            }
        }
    });



    //$('.menu-superior a[href^="#"]').on('click', function(e) {
    //    e.preventDefault();
    //    var id = $(this).attr('href'),
    //        targetOffset = $(id).offset().top;
    //
    //    $('html, body').animate({
    //        scrollTop: targetOffset - 100
    //    }, 1000);
    //});




    /*Fim*/


    /**********Background animado************/
    //var container = document.getElementById('section-videos');
    //var renderer = new FSS.CanvasRenderer();
    //var scene = new FSS.Scene();
    //var light = new FSS.Light('751F26', '751F26');
    //var geometry = new FSS.Plane(2000, 1000, 15, 8);
    //var material = new FSS.Material('FFFFFF', 'FFFFFF');
    //var mesh = new FSS.Mesh(geometry, material);
    //var now, start = Date.now();
    //
    //function initialise() {
    //    scene.add(mesh);
    //    scene.add(light);
    //    container.appendChild(renderer.element);
    //    window.addEventListener('resize', resize);
    //}
    //
    //function resize() {
    //    renderer.setSize(container.offsetWidth, container.offsetHeight);
    //}
    //
    //function animate() {
    //    now = Date.now() - start;
    //    light.setPosition(300*Math.sin(now*0.001), 200*Math.cos(now*0.0005), 60);
    //    renderer.render(scene);
    //    requestAnimationFrame(animate);
    //}
    //
    //initialise();
    //resize();
    //animate();

    function configLabel(data) {
    	var percentage,
    		er = /\%|\-/g;

    	for (var i = 0; i < data.length; i++) {
    		percentage = data[i].innerText.replace(er, "");
    		if (percentage < 6) {

    			//data[i].parentNode.style.background = 'black';
    			data[i].classList.add('maior');
    		} else if (percentage < 11) {
    			console.log('igual 0')
    			//perce.addClass('0');
    		}
    	}
    }
    configLabel(document.getElementsByClassName('wapl-label-text'));

})(jQuery);

