$(document).ready(function () {

	// Login/Signup modal
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container    = document.getElementById('container');

    const signin       = document.getElementById('sign-in-container');
    const signup       = document.getElementById('sign-up-container');
    const overlayleft  = document.getElementById('overlay-left');
    const overlayright  = document.getElementById('overlay-right');
    // responsive
    if($( window ).width() < 578){

        overlayright.style.justifyContent= "flex-start";
        signup.style.transform = "translateY(-175px)";
        signin.style.zIndex= "999"
        signup.style.zIndex="0"
        
        signUpButton.addEventListener('click', () => {
            setTimeout(function() {
                signin.style.opacity= "0";
                signup.style.opacity= "1";
                signup.style.zIndex= "999"
                signin.style.zIndex="0"
                overlayright.style.opacity = "0";
                overlayleft.style.opacity= "1";
            }, 300);
        });

        signInButton.addEventListener('click', () => {
            setTimeout(function() {
                signin.style.opacity= "1";
                signup.style.opacity= "0";
                signin.style.zIndex= "999"
                signup.style.zIndex="0"
                overlayright.style.opacity = "1";
                overlayleft.style.opacity= "0";
            }, 300);
            // overlayleft.style.transform = "translateY(310px) !important"
        });
    }
    else{
        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    }
	// ------end Login/Signup modal-------

    // ------breaking news section--------
    
    var $ticker = $('[data-ticker="list"]'),
    tickerItem = '[data-ticker="item"]',
    itemCount = $(tickerItem).length,
    viewportWidth = 0;

    if(itemCount == ''){
        itemCount = 1;
    }

    let speedFactor = 30000;
    let speed = (speedFactor * itemCount) / 5;



    function setupViewport(){
        $ticker.find(tickerItem).clone().prependTo('[data-ticker="list"]');
        
        for (i = 0; i < itemCount; i++){
            var itemWidth = $(tickerItem).eq(i).outerWidth();
            viewportWidth = viewportWidth + itemWidth;
        }
        
        $ticker.css('width', viewportWidth);
    }

    function animateTicker(){
        $ticker.animate({
            marginLeft: -viewportWidth
        }, speed, "linear", function() {
            $ticker.css('margin-left', '0');
            animateTicker();
        });
    }

    function initializeTicker(){
        setupViewport();
        animateTicker();
        
        // $ticker.on('mouseenter', function(){
        //     $(this).stop(true);
        // }).on('mouseout', function(){
        //     animateTicker();
        // });
    }

    initializeTicker();

    // ------end breaking news section----------


    // -------Floating Add--------
    
    $(".floating-add").fadeOut().delay(6000).fadeIn();
    $(".btn-close-add").click(function(){
        $(".floating-add").hide();
    });
    
    // -------end Floating Add--------





	/* scrolltop btn */

	$(window).scroll(function () {
		if ($(this).scrollTop() > 300) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});

	$('.scrollToTop').click(function () {
		$('html, body').animate({
			scrollTop: 0
		}, 800);
	});

	/* top category slider */
	$('.topcategory-slider').slick({
		autoplay: true,
		infinite: true,
		dots: false,
		slidesToShow: 5,
		slidesToScroll: 1,
		prevArrow: null,
		nextArrow: null,
		autoplaySpeed: 2000,
		responsive: [
			{
				breakpoint: 1198,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: true,
				}
    		},

			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
    		},

			{
				breakpoint: 570,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
    		}
		]
	});

    /* ltnews slider */
	$('.latestnews-slide').slick({
		autoplay: true,
		infinite: true,
		dots: false,
        nav: true,
		prevArrow: '<i class="fa fa-angle-left ltnews-left"></i>',
		nextArrow: '<i class="fa fa-angle-right ltnews-right"></i>',
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplay: true,
		responsive: [
			{
				breakpoint: 1198,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
					infinite: true,
					dots: true
				}
    },
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
    },
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
    }

  ]
	});
    
    
	/* popular news slider */
	$('.popularnews-slider').slick({
		autoplay: true,
		infinite: true,
		vertical: true,
		dots: true,
        nav: false,
		slidesToShow: 5,
		slidesToScroll: 2,
	});


	/*top news slider */
	$('.tn-slider').slick({
		autoplay: true,
		infinite: true,
		dots: false,
		slidesToShow: 1,
		slidesToScroll: 1,
        fade:true,
        cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
		nav: true,
		prevArrow: '<i class="fa fa-angle-left tnslider-left"></i>',
		nextArrow: '<i class="fa fa-angle-right tnslider-right"></i>'
	});

	$('.brk-slider').slick({
		autoplay: true,
		vertical: true,
		infinite: true,
		dots: false,
		slidesToShow: 1,
		slidesToScroll: 1,
		nav: true,
		prevArrow: '<i class="fa fa-angle-left brk-left"></i>',
		nextArrow: '<i class="fa fa-angle-right brk-right"></i>'
	});


    // ------- Gallery Section --------
    $('.small-carousel').slick({
        slidesToShow: 4,
        dots:true,
        centerMode: true,
        autoplay:true,
        autoplaySpeed: 2500,
        responsive: [
            {
                breakpoint: 1300,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 3,
                    infinite: true,
                }
            },
            {
                breakpoint: 1198,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2,
                    infinite: true,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },

            {
                breakpoint: 570,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.large-image-carousel').slick({
        dots: false,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        autoplay:true,
        autoplaySpeed: 3500
    });
    // ------- end Gallery Section --------


	/* active and remove class menu */
	// var list = document.querySelector(".list");
	// var menu = document.querySelector(".menu");
	// menu.addEventListener('click', function () {
	// 	list.classList.toggle("active");
	// });

	

	/*slide mysidebar*/

	// var opennav = document.querySelector(".opennav");
	// var closenav = document.querySelector(".closenav");
	// var sidebar = document.querySelector(".sidebar");

	// opennav.addEventListener("click", () => {
	// 	sidebar.style.height= "35rem";
	// });

	// closenav.addEventListener("click", () => {
	// 	sidebar.style.height = "0";
	// });

	/* main desktop navbar sticky */

	window.onscroll = function () {
		myFunction()
	};

	var navbar = document.querySelector(".header-area");
    var navlinkc = document.querySelector(".main-menu li a");
    
	var sticky = navbar.offsetTop;

	function myFunction() {
		if (window.pageYOffset >= sticky) {
			navbar.classList.add("sticky");
            navlinkc.style.color="#fff";
		} else {
			navbar.classList.remove("sticky");
            navlinkc.style.color="#444";
		}
	}

    // Featured video Section
    $('.feature-owl-carousel').owlCarousel({
        margin: 15,
        nav: true,
        dots: false,
        navText: ["<div class='nav-button owl-prev'>‹</div>", "<div class='nav-button owl-next'>›</div>"],
        items : 4,
		responsiveClass: true,
		responsive: {
			0:{
			  items: 1,
              dots: true,
              nav:false
			},
			480:{
			  items: 2,
              dots: true,
              nav:false
			},
			570:{
			  items: 2,
              dots: true,
              nav:true
			},
			769:{
			  items: 3,
              nav:true
			},
			992:{
			  items: 4,
              nav:true
			}
		}
    });



    //3 tab section
    const tablist = document.querySelector(".tablist").querySelectorAll("li");
    const tabs = document.querySelectorAll('[data-tab-target]');
    const tabcontents = document.querySelectorAll('[data-tab-content]');

    tablist.forEach(element => {
    element.addEventListener("click", function(){
    tablist.forEach(e => e.classList.remove("active"));
    this.classList.add("active");
    });
    });

    tabs.forEach(tab => {
    tab.addEventListener("click", function(){
    const target = document.querySelector(tab.dataset.tabTarget);

    tabcontents.forEach(tabcontent => tabcontent.classList.remove("active"))
    target.classList.add("active");
    });
    });
});
