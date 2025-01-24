import EmblaCarousel from "embla-carousel";
import Autoplay from "embla-carousel-autoplay";
import Fade from "embla-carousel-fade";
import Observer from "./observer";
import { HSOverlay } from "preline";

const newsSlideRoot = document.querySelector<HTMLDivElement>(".news_slides");
const selectElements = document.querySelectorAll<HTMLSelectElement>(
    "select[data-observer-name]"
);
const certificateChoiceElements = document.querySelectorAll<HTMLInputElement>(
    "input[name='has-certificate']"
);
const certificateZoneElement =
    document.querySelector<HTMLDivElement>("#certificates-zone");
const nextButtonZoneElement = document.querySelector(
    "#next-button"
) as HTMLDivElement;
const avatarInputElement = document.querySelector<HTMLInputElement>(
    "input[name='avatar']"
);
const submitContainer =
    document.querySelector<HTMLDivElement>("#submit-container");
const preview = document.querySelector<HTMLImageElement>("#preview");
const paymentMethodRoot =
    document.querySelector<HTMLDivElement>("#payment-methods");

if (newsSlideRoot) {
    EmblaCarousel(
        newsSlideRoot,
        {
            loop: true,
            watchDrag: false,
            duration: 40,
        },
        [Autoplay({ delay: 10_000 }), Fade()]
    );
}

if (paymentMethodRoot) {
    const radioElements = paymentMethodRoot.querySelectorAll<HTMLInputElement>(
        "input[type='radio']"
    );
    const codeHolderElement = document.querySelector<HTMLSpanElement>("span#code");

    for (let input of radioElements) {
        if (input.checked && codeHolderElement) {
            codeHolderElement.textContent = input.value;
        }

        input.addEventListener("change", (ev) => {
            if (codeHolderElement) {
                codeHolderElement.textContent = (
                    ev.target as HTMLInputElement
                ).value;
            }
        });
    }
}

if (avatarInputElement && submitContainer) {
    avatarInputElement.addEventListener("change", (ev) => {
        const files = (ev.target as HTMLInputElement).files;
        if (!files || !files.length) return;

        const file = files[0];

        if (!file.type.startsWith("image")) return;

        if (submitContainer.classList.contains("hidden")) {
            submitContainer.classList.remove("hidden");
        }

        if (preview) {
            const url = URL.createObjectURL(file);
            preview.src = url;

            window.addEventListener("beforeunload", () => {
                URL.revokeObjectURL(url);
            });
        }
    });
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
            if (
                target.value === "yes" &&
                certificateZoneElement.classList.contains("hidden")
            ) {
                certificateZoneElement.classList.remove("hidden");
                if (!nextButtonZoneElement.classList.contains("hidden")) {
                    nextButtonZoneElement.classList.add("hidden");
                }
                return;
            }

            certificateZoneElement.classList.add("hidden");
            nextButtonZoneElement.classList.remove("hidden");
        });
    }
}

selectElements.forEach((select) => new Observer(select));
