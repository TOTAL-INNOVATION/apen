import EmblaCarousel from "embla-carousel";
import Autoplay from "embla-carousel-autoplay";
import Fade from "embla-carousel-fade";

const newsSlideRoot = document.querySelector('.news_slides') as HTMLDivElement;
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
