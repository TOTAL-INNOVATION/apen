import CustomSelect from "./select";

type Field = HTMLInputElement | HTMLSelectElement;

class Observer {
    public subscribers: NodeListOf<HTMLElement>;

    constructor(public target: Field) {
        const targetName = target.dataset.observerName;
        if (!targetName) {
            throw new Error(
                "Observer target should have a name. Define a `data-observer-name` attribute for the element."
            );
        }
        this.subscribers = document.querySelectorAll<HTMLElement>(
            `[data-subscribe="${targetName}"]`
        );
		
        if (!this.subscribers.length) return;
		this.watch();
    }

    protected watch() {
		this.showOrHide();
		this.setAttrAsOptions();

        this.target.addEventListener("change", () => {
			this.showOrHide();
			this.setAttrAsOptions();
		});
    }

	protected showOrHide(): void {
		const elements = Array.from(this.subscribers).filter(
			element => element.hasAttribute("data-show-when") ||
			element.hasAttribute("data-hide-when")
		);

		elements.forEach(element => {
			const desiredValue = element.dataset.showWhen;
			const unwantedValue = element.dataset.hideWhen;
			const currentValue = this.getValue();

			const hideElement = (el: HTMLElement) => {
				if (!el.classList.contains("hidden"))
					el.classList.add("hidden");
			}

			if (desiredValue && currentValue !== desiredValue) {
				hideElement(element);
				return;
			}

			if (unwantedValue && currentValue === unwantedValue) {
				hideElement(element);
				return;
			}


			if (element.classList.contains("hidden"))
				element.classList.remove("hidden");
		});
	}

	/**
	 * Set selected option dataset attribute value as options
	 * 
	 * `Note`: This is only applicable to select element and
	 * the attribute should contains a stringified array of item.
	 * @returns 
	 */
	protected setAttrAsOptions() {
		if (!(this.target instanceof HTMLSelectElement)) return;
		
		const elements = Array.from(this.subscribers).filter(
			element => element.hasAttribute("data-set-attr-as-options"),
		) as HTMLSelectElement[];
		
		const selectedOption = this.target.options[this.target.selectedIndex];
		if (!selectedOption) return;
		
		elements.forEach(element => {
			
			const attributeName = element.dataset.setAttrAsOptions as string;
			if (!selectedOption.getAttribute(attributeName)) return;
				
			const attributeValue = JSON.parse(
				selectedOption.getAttribute(attributeName) as string
			);
			if (Array.isArray(attributeName)) return;

			const options = (attributeValue as string[]).map(value => {
				const option = document.createElement("option");
				option.setAttribute("value", value);
				option.textContent = value;

				return option;
			});

			if (element.hasChildNodes())
				Array.from(element.childNodes).forEach(child => child.remove());

			element.append(
				...options,
			);
		});
	}

	protected getValue(): string {
		let value: string;
		if (this.target instanceof HTMLInputElement)
			value = this.target.value;
		else
			value = this.target.options[this.target.selectedIndex].value;

		return value;
	}
}

export default Observer;
