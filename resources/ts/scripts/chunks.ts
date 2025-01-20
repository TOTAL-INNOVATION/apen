import EmblaCarousel from "embla-carousel";
import Autoplay from "embla-carousel-autoplay";
import Fade from "embla-carousel-fade";
import Observer from "./observer";

const newsSlideRoot = document.querySelector<HTMLDivElement>(".news_slides");
const selectElements = document.querySelectorAll<HTMLSelectElement>(
	"select[data-observer-name]"
);
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

selectElements.forEach(select => new Observer(select));
