import Swiper from "swiper";
import { Navigation, Autoplay, Pagination } from "swiper/modules";

import "swiper/css";


document.addEventListener("DOMContentLoaded", function () {
	let swiper = new Swiper(".b-news-banner", {
		modules: [Navigation, Autoplay, Pagination],
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
		autoplay: {
			delay: 5000,
		},
		loop: true,
        slidesPerView: 1,
        spaceBetween: 30,
	});

    console.log(document.querySelector('.b-news-banner'));
});
