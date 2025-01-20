import EmblaCarousel from "embla-carousel";
import Autoplay from "embla-carousel-autoplay";
import Fade from "embla-carousel-fade";
import Observer from "./observer";

const newsSlideRoot = document.querySelector<HTMLDivElement>(".news_slides");
const selectElements = document.querySelectorAll<HTMLSelectElement>(
	"select[data-observer-name]"
);
const certificateChoiceElements = document.querySelectorAll<HTMLInputElement>(
	"input[name='has-certificate']"
);
const certificateZoneElement = document.querySelector<HTMLDivElement>("#certificates-zone");
const nextButtonZoneElement = document.querySelector("#next-button") as HTMLDivElement;

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

if (certificateChoiceElements.length && certificateZoneElement) {
	
	for (let choice of certificateChoiceElements) {
		
		if (choice.value === "no" && choice.checked) {
			if (!certificateZoneElement.classList.contains("hidden")) {
				certificateZoneElement.classList.add("hidden");
				if (nextButtonZoneElement.classList.contains("hidden")) {
					nextButtonZoneElement.classList.remove("hidden");
				} 
			}
		} else {
			nextButtonZoneElement.classList.add("hidden");
		}

		choice.addEventListener("change", (ev) => {
			const target = ev.target as HTMLInputElement;
			if (target.value === "yes" && certificateZoneElement.classList.contains("hidden")) {
				certificateZoneElement.classList.remove("hidden");
				if (!nextButtonZoneElement.classList.contains("hidden")) {
					nextButtonZoneElement.classList.add("hidden");
				} 
				return;
			}

			certificateZoneElement.classList.add("hidden");
			nextButtonZoneElement.classList.remove("hidden");
		})
	}
}

selectElements.forEach(select => new Observer(select));
