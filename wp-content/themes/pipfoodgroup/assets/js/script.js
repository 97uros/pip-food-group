jQuery(window).on('load', function() {
  let width = jQuery(window).width();


	// Dropdown Menu 

  // show dropdown on hover
  if($('.menu-item').length) {
    if(width > 1199) {
      jQuery( "li.menu-item" ).hover(function() { // mouse hover
        $( this ).find( " > .dropdown-menu" ).addClass('d-flex');
        jQuery( this ).find( " .nav-dropdown-wrapper > .dropdown-menu" ).addClass('d-flex');
      }, function(){ // mouse leave
        jQuery( this ).find( ".dropdown-menu" ).hide(); // hide if not current page
        jQuery( this ).find( ".dropdown-menu" ).removeClass('d-flex');
      });
    }
  }

  if($('.submenu').length) {
    $('submenu a:eq(0)').append ( "<i class='fa fa-chevron-right'></i>" );
    let allSub = document.getElementsByClassName('submenu');
    for (let i = 0; i < allSub.length; ++i) {
       let childA = allSub[i].firstChild;
      childA.classList.add('btn--arrow')
    }
  }
 
  if(width < 1200 ) {
    if($('.product-menu .dropdown-menu:eq(0)').length){
      $('.product-menu .dropdown-menu:eq(0)').css('padding','0 12px');
    }
  }
  
  //trigger hover style on menu list items
  $('.menu-item').hover(function(){
    if(width > 1199) {
      let numOfElements = this.childElementCount;
      if(numOfElements > 1) {
        $(this.firstChild).toggleClass("active-item");
        $(this.lastChild).toggleClass("active-item");
      } else {
        $(this.firstChild).toggleClass("active-item");
      }
    }
  });

  addWrapper(); // initial check
  jQuery(window).on('resize', function(){
    addWrapper();
  })
  
  // add wrapper or remove it for mobile
  function addWrapper () {
    if($('.product-menu').length) {
      if(width > 1199) {
        $(".product-menu ul:eq(0)").wrapAll("<div class='nav-dropdown-wrapper'></div>");//add div to first ul
      } else {
        if($('.nav-dropdown-wrapper').length) {
          // Find your wrapper HTMLElement
          let wrapper = document.querySelector('.nav-dropdown-wrapper');
          // Replace the whole wrapper with its own contents
          wrapper.outerHTML = wrapper.innerHTML;
        }
      }
    }
  }

	jQuery(document).ready(function(){

		jQuery('.dropdown-menu > li > .dropdown-menu').parent().addClass('dropdown-submenu').find(' > .dropdown-item').addClass('dropdown-toggle');

		jQuery('.dropdown-submenu > a').on("click", function(e) {
			jQuery(this).next('.dropdown-menu').toggleClass('show');
			jQuery(this).toggleClass('show');
			e.stopPropagation();
		});

		jQuery('.dropdown').on("hidden.bs.dropdown", function() {
      $(this).find('.dropdown-menu.show').removeClass('show');
      $(this).find('.dropdown-item.show').removeClass('show');
		});

	});
	jQuery( ".dropdown-submenu a" ).after( "<i class='fa fa-chevron-right'></i>" );

	// Owl Carousel

	jQuery('.owl-carousel1').owlCarousel({
    loop: true,
    items: 1,
    center: true,
    nav: true,
		navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		responsive : {
			0: {
				stagePadding:12,
        loop: false
			},
			600: {
				stagePadding:100,
        loop: false
			},
			1200: {
				stagePadding:200,
        loop: false
			},
			1400: {
				stagePadding:300
			},
			1600: {
				stagePadding:400
			}
		}
	})

	jQuery('.owl-carousel2').owlCarousel({
    loop: false,
		stagePadding: 12,
    nav: true,
		navRewind:false,
    center: true,
    info: true,
		navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 3
      },
      1000: {
        items: 4
      }
		}
	})

	jQuery('.owl-carousel3').owlCarousel({
    loop: true,
		stagePadding: 10,
    nav: false,
    center: true,
    info: true,
    responsive: {
      0: {
        items: 4
      },
      600: {
        items: 3
      },
      1000: {
        items: 5
      }
		}
	})

	jQuery('.owl-carousel4').owlCarousel({
    loop: false,
		stagePadding: 0,
    nav: true,
		dots: false,
    center: false,
    info: true,
		navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive: {
      0: {
        items: 2
      },
      600: {
        items: 2
      },
      1000: {
        items: 3
      }
		}
	})
	
	// Collapsible Search 
  
	jQuery(".fa-search").click(function(){
		jQuery(".search-container, .input").toggleClass("active");
		jQuery(".input[type='text']").focus();
	});

	// Map

	jQuery("#RS").click(function() {
		jQuery(".carousel-item, .location").removeClass("active");
		jQuery("#location1, #RS").addClass("active");
	});
	jQuery("#BA").click(function() {
		jQuery(".carousel-item, .location").removeClass("active");
		jQuery("#location2, #BA").addClass("active");
	});
	jQuery("#SI").click(function() {
		jQuery(".carousel-item, .location").removeClass("active");
		jQuery("#location3, #SI").addClass("active");
	});
	
	jQuery('.map-slider').on('slide.bs.carousel', function (e) {
    var activeIndex = jQuery(e.relatedTarget).index();
    if (activeIndex == 0) {
      jQuery('.location').removeClass('active');
      jQuery('#RS').addClass('active');
    } else if (activeIndex == 1) {
      jQuery('.location').removeClass('active');
      jQuery('#BA').addClass('active');
    } else if (activeIndex == 2) {
      jQuery('.location').removeClass('active');
      jQuery('#SI').addClass('active');
    }
  });
	
	// History 

	jQuery("#1992").click(function() {
		jQuery(".carousel-item, .year-info, .year").removeClass("active");
		jQuery("#year1, #1992").addClass("active");
	});
	jQuery("#1998").click(function() {
		jQuery(".carousel-item, .year-info, .year").removeClass("active");
		jQuery("#year2, #1998").addClass("active");
	});
	jQuery("#1999").click(function() {
		jQuery(".carousel-item, .year-info, .year").removeClass("active");
		jQuery("#year3, #1999").addClass("active");
	});
	jQuery("#2000").click(function() {
		jQuery(".carousel-item, .year-info, .year").removeClass("active");
		jQuery("#year4, #2000").addClass("active");
	});
	jQuery("#2001").click(function() {
		jQuery(".carousel-item, .year-info, .year").removeClass("active");
		jQuery("#year5, #2001").addClass("active");
	});
	jQuery("#2002").click(function() {
		jQuery(".carousel-item, .year-info, .year").removeClass("active");
		jQuery("#year6, #2002").addClass("active");
	});
	jQuery("#2004").click(function() {
		jQuery(".carousel-item, .year-info, .year").removeClass("active");
		jQuery("#year7, #2004").addClass("active");
	});
	jQuery("#2007").click(function() {
		jQuery(".carousel-item, .year-info, .year").removeClass("active");
		jQuery("#year8, #2007").addClass("active");
	});
	jQuery("#2013").click(function() {
		jQuery(".carousel-item, .year-info, .year").removeClass("active");
		jQuery("#year9, #2013").addClass("active");
	});
	jQuery("#2014").click(function() {
		jQuery(".carousel-item, .year-info, .year").removeClass("active");
		jQuery("#year10, #2014").addClass("active");
	});
	jQuery("#2015").click(function() {
		jQuery(".carousel-item, .year-info, .year").removeClass("active");
		jQuery("#year11, #2015").addClass("active");
	});
	jQuery("#2016").click(function() {
		jQuery(".carousel-item, .year-info, .year").removeClass("active");
		jQuery("#year12, #2016").addClass("active");
	});
	jQuery("#2017").click(function() {
		jQuery(".carousel-item, .year-info, .year").removeClass("active");
		jQuery("#year13, #2017").addClass("active");
	});

	// Back To Top 

	var offset = 100;
	var speed = 250;
	var duration = 500;
		jQuery(window).scroll(function(){
			if (jQuery(this).scrollTop() < offset) {
				jQuery('#back-to-top') .fadeOut(duration);
			} else {
				jQuery('#back-to-top') .fadeIn(duration);
			}
		});
	jQuery('#back-to-top').on('click', function(){
		jQuery('html, body').animate({scrollTop:0}, speed);
		return false;
		});
	jQuery('#back-to-top-mobile').on('click', function(){
		jQuery('html, body').animate({scrollTop:0}, speed);
		return false;
		});

 // get clicked country class
  if(jQuery('.country.colored-clicable').length) {
    jQuery('.country.colored-clicable').on('click',function(){
      removeClassActive('.country' , 'active')
      this.classList.add('active')
      // change slide
      let country = this.getAttribute("class").substring(0,2);
      let sliderForCountry = jQuery(`.${country}`)[0]
      removeClassActive('.contact__locations-slider .carousel-item' , 'active')
      sliderForCountry.classList.add("active")
      // change marker 
      let test = document.getElementsByClassName(country)
      let found = false
      for(let i = 0 ; i<test.length ; i++ ) {
        if(test[i].classList.contains('marker') && !found){
          changeMarker(test[i])
          found = true
        }
      }
    });
  }

  // remove active classes
  function removeClassActive(classToSelect, classToRemove) {
    if(jQuery(classToSelect).length) {
      let allElements = jQuery(classToSelect)
      for(let i = 0 ; i<allElements.length ; i++ ) {
        allElements[i].classList.remove(classToRemove)
      }
    }
  }

  // change marker image
  function changeMarker(targetMarker){
    let allMarkers = jQuery('.marker')
    for(let i = 0 ; i<allMarkers.length ; i++ ) {
      allMarkers[i].setAttribute('fill','url(#fg1)')
      allMarkers[i].classList.remove('active')
      if(allMarkers[i].classList.contains('SI')) {
        allMarkers[i].setAttribute('fill','url(#adriatic1)')
      }
      if(allMarkers[i].classList.contains('BA')) {
        allMarkers[i].setAttribute('fill','url(#bl1)')
      }
    }
    targetMarker.setAttribute('fill','url(#fg2)')
    if(targetMarker.classList.contains('SI')) {
      targetMarker.setAttribute('fill','url(#adriatic2)')
    }
     if(targetMarker.classList.contains('BA')) {
      targetMarker.setAttribute('fill','url(#bl2)')
    }
    targetMarker.classList.add('active')
  }

  // change active country
  function changeCountry(countryTarget){
    removeClassActive('.country','active');
    for(let i = 0 ; i<countryTarget.length ; i++ ) {
      if(countryTarget[i].classList.contains('colored-clicable')) {
        countryTarget[i].classList.add('active')
      }
    }
  }
  
  // on change slide 
  function changeSlide(){
    setTimeout(function() {
      let selectSlide = document.querySelectorAll('.carousel-item.active')[0]
      let markerToSelect = selectSlide.className.split(" ")[1]
      let countryToSelect = selectSlide.className.split(" ")[2]
      let countryTarget = document.getElementsByClassName(countryToSelect)
      let markerTarget = document.getElementsByClassName(markerToSelect)[1]
      changeMarker(markerTarget)
      changeCountry(countryTarget)
    },1000);
  }
  
  if(jQuery('.contact__locations').length) {
    changeSlide()
  }
  // prev slide
  if(jQuery('.carousel-control-prev').length) {
    jQuery('.carousel-control-prev').click(function() {
      changeSlide()
    })
  }

  // next slide
  if(jQuery('.carousel-control-next').length) {
    jQuery('.carousel-control-next').click(function() {
      changeSlide()
    })
  }

  // on marker click , change slider
  if(jQuery('.marker').length) {
    // initial marker
    let firstMarker = jQuery('.marker')[0]
    changeMarker(firstMarker)
    jQuery('.marker').click(function(){
      // change marker image
      changeMarker(this)
      // change slide
      let markerClasses = this.className.baseVal.split(" ")
      let countryToSelect = markerClasses[1]
      let countryTarget = document.getElementsByClassName(countryToSelect)
      changeCountry(countryTarget)
      let markerClass = markerClasses[markerClasses.length-2]
      removeClassActive('.contact__locations-slider .carousel-item' , 'active')
      let selectSlide = document.getElementsByClassName(markerClass)[0]
      selectSlide.classList.add("active")
    })
  }
 // adjust map position for different screen size
  function AdjustMap () {
    width = jQuery(window).width();
    let height = jQuery(window).height();
    let diff = width/height;
    let headerHeight = Math.round(jQuery('.navbar').outerHeight());
    let footerHeight = Math.round(jQuery('footer').outerHeight());
    let svgHeight = headerHeight + footerHeight;
    if(width > 991) {
      if(diff > 1.1 && diff < 1.6) {
        jQuery('.contact svg').css('width', '122%');
        
        jQuery('.contact svg').css('height', `calc(100vh - ${svgHeight}px)`);
      }else if (diff < 1.1) {
        jQuery('.contact svg').css('width', '230%');
        jQuery('.contact svg').css('height', '95vh');
      
      }else {
        jQuery('.contact svg').css('width', '120%');
        jQuery('.contact svg').css('height', '100vh');
      }
    }
  }
  if(jQuery('.contact svg').length) {
    AdjustMap();
    jQuery(window).on('resize', function(){
      AdjustMap();
    })
  }
 
  function matchHeightFunction(classToMatch) {
    if(jQuery(classToMatch).length) {
      jQuery(classToMatch).matchHeight();
    }
  }
  // hide back to button top on contact page
  if(!jQuery('.home').length ) {
    if(jQuery('#back-to-top').length) {
      jQuery('#back-to-top').addClass('d-none')
    }
    if(jQuery('#back-to-top-mobile').length) {
      jQuery('#back-to-top-mobile').addClass('d-none')
    }
    
  }
  // array of blocks to match height
  const classNames = ['.latest-blog-posts-home .blog-post .card-image-wrapper img','.latest-blog-posts-home .card-title' , '.latest-blog-posts-home .card-text' ,'.demo-centar-intro-content img','.demo-centar-intro-content h4','.demo-centar-intro-content p' , '.blog-section .card-text' , '.blog-section .card-title', '.blog-section img' , '.team .card-img-top' , '.contact .card-body' , '.card-address' , '.card-location' , '.card-tel' , '.card-mail' , '.contact .card-img-top' ,'.card-logo__wrapper' , '.product .related.products h3' , '.product .related.products p']
  classNames.forEach( className=>{ matchHeightFunction(className)} )

	// Thumbnail Gallery

	var current = document.getElementById('current');
	var photos = document.getElementsByClassName('thumb');
	for (var i=0;i<photos.length; i++) {
    photos[i].addEventListener('click',display);
	}
	function display() {
    var ph = this.getAttribute('src');
    current.setAttribute('src',ph);
	}

  if($('.language-dropdown').length && $('.wpml-ls-item-sr').length & $('.wpml-ls-item-en').length) {
    $('.language-dropdown').hover(function(){
      $('.wpml-ls-item-legacy-list-vertical').toggleClass('d-flex')
    })
    
  }
  

});