import EmblaCarousel from "embla-carousel";
import Autoplay from "embla-carousel-autoplay";
import Fade from "embla-carousel-fade";
import Observer from "./observer";

const PATHNAME = window.location.pathname;

function initSlides() {
	const newsSlideRoot = document.querySelector<HTMLDivElement>('.news_slides');

	if (newsSlideRoot) {
		EmblaCarousel(
			newsSlideRoot, 
			{
				loop: true,
				watchDrag: false,
				duration: 40
			}, 
			[
				Autoplay({delay: 10_000}),
				Fade(),
			]
		);
	}	
}

function observeFields() {
	const selectElements = document.querySelectorAll<HTMLSelectElement>(
		"select[data-observer-name]"
	);
	selectElements.forEach(select => new Observer(select));
}

switch (PATHNAME) {
	case "/":
		initSlides();
		break;

	case "/form":
		observeFields();
		break;

	default:
		break;
}