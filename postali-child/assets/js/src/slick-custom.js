/**
 * Slick Custom
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

	$('#awards-slider').slick({
		dots: false,
		infinite: true,
		fade: false,
		autoplay: true,
  		autoplaySpeed: 2500,
  		speed: 1200,
		slidesToShow: 7,
		slidesToScroll: 1,
		prevArrow: false,
    	nextArrow: false,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
        responsive: [
            {
                breakpoint: 1401,
                settings: {
                    slidesToShow: 6,
                }
            },
            {
                breakpoint: 1201,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 820,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 401,
                settings: {
                    slidesToShow: 1,
                }
            }
          ]
	});

    $('#attorney-slider').slick({
		dots: false,
		infinite: true,
		fade: false,
		autoplay: false,
  		speed: 1200,
		slidesToShow: 4,
		slidesToScroll: 1,
		arrows: false,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
        responsive: [
            {
                breakpoint: 1401,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                }
            }
          ]
	});

    $('.next-button-slick').click(function(){
        $('#attorney-slider').slick("slickNext");
    });
	
});