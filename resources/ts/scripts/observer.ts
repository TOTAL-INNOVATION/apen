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
            `[data-subscriber="${targetName}"]`
        );
		
        if (this.subscribers.length) this.watch();
    }

    protected watch() {
        this.target.addEventListener("change", () => {
			this.showOrHide();
			this.setSelectedOptionAttrAsValue();
		});
    }

	protected setSelectedOptionAttrAsValue(): void {
		if (!(this.target instanceof HTMLSelectElement)) return;

		const option = this.target.options[this.target.selectedIndex];
		const elements = Array.from(this.subscribers).filter(element => (
			(element instanceof HTMLInputElement || element instanceof HTMLSelectElement)
			&& element.hasAttribute("data-set-option-attr")
		)) as Field[];

		elements.forEach(element => {
			const attribute = element.dataset.setTargetAttr as string;
			const attributeValue = option.getAttribute(attribute);
			if (!attributeValue) return;

			if (element instanceof HTMLInputElement) {
				element.setAttribute("value", attributeValue);
				return;
			}

			const targetOption = Array.from(element.options).find(
				option => option.value === attributeValue
			);

			if (targetOption) element.selectedIndex = targetOption.index;

		});
	}

	protected showOrHide(): void {
		const elements = Array.from(this.subscribers).filter(
			element => element.hasAttribute("data-show-when"),
		);

		elements.forEach(element => {
			const desiredValue = element.dataset.showWhen as string;

			if (this.getValue() !== desiredValue) {
				if (!element.classList.contains("hidden"))
					element.classList.add("hidden");
				return;
			}

			if (element.classList.contains("hidden"))
				element.classList.remove("hidden");
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
