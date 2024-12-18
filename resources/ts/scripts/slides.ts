import EmblaCarousel from "embla-carousel";
import Autoplay from "embla-carousel-autoplay";
import Fade from "embla-carousel-fade";

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
