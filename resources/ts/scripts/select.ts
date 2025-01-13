enum MOVE {
    UP = "moveUp",
    DOWN = "moveDown",
}

class CustomSelect {
    public select: HTMLSelectElement;
    public root: HTMLElement;
    public trigger: HTMLButtonElement;
    public placeholder: HTMLSpanElement;
    public container: HTMLDivElement;
    public list: HTMLUListElement;
    public options: HTMLOptionsCollection;
    public input: HTMLInputElement|null;

    constructor(select: HTMLSelectElement) {
        this.select = select;
        this.options = select.options;
        this.root = select.parentElement as HTMLElement;

        this.trigger = this.root.querySelector(
            "button[data-trigger]"
        ) as HTMLButtonElement;
        this.placeholder = this.trigger.querySelector(
            "span[data-placeholder]"
        ) as HTMLSpanElement;
        this.container = this.root.querySelector(
            "[data-content]"
        ) as HTMLDivElement;
        this.input = this.container.querySelector<HTMLInputElement>(
            "input[type='text']"
        );
        this.list = this.container.querySelector("ul") as HTMLUListElement;

        this.render();
    }

    render() {
        const selectedIndex = this.options.selectedIndex;
        const items = Array.from(this.options).map((option, index) => {
            const li = document.createElement("li");
            li.setAttribute(
                "class",
                "px-2 w-full h-10 flex items-center cursor-pointer hover:bg-whisper focus:bg-whisper outline-none"
            );

            if (option.disabled) li.setAttribute("aria-disabled", "true");

            li.setAttribute("data-value", option.value);
            li.append(...option.childNodes);
            if (selectedIndex === index) {
                li.setAttribute("aria-selected", "true");
            }

            return li;
        });

        this.list.append(...items);

        this.configureEvents();
    }

    configureEvents() {
        this.trigger.addEventListener("click", (ev) => {
            ev.stopImmediatePropagation();
            this.toogleContent();
        });

        document.addEventListener("keydown", (ev) => {
            const target = ev.target;
            
            if (target instanceof HTMLInputElement) {
                return;
            }

            if (target instanceof HTMLUListElement) {

                if (this.select.selectedIndex === -1) {
                    const listFirstChild = this.list.firstElementChild as HTMLOptionElement|null;
                    if (!listFirstChild) {
                        this.list.focus();
                        return;
                    };
    
                    listFirstChild.tabIndex = 1;
                    listFirstChild.focus();

                    return;
                }

                const selectedItem = this.select.options[this.select.selectedIndex];
                //
            }
        });

        document.addEventListener("click", (ev) => {
            const target = ev.target as HTMLElement;
            if (target !== this.trigger && !this.container.contains(target)) {
                this.container.classList.add("hidden");
            }
        });
    }

    /**
     * Show or hide the dropdown
     * @returns void
     */
    toogleContent() {
        this.container.classList.toggle("hidden");

        if (this.container.classList.contains("hidden")) {
            this.container.setAttribute("aria-hidden", "true");
            this.removeDropdownFocus();
            return;
        }
        this.container.setAttribute("aria-hidden", "false");
        if (this.container.checkVisibility()) {
            this.setDropdownFocus();
        }
    }

    setDropdownFocus() {
        this.trigger.blur();

        if (this.input) {            
            this.input.tabIndex = 1;
            this.input.focus();
            return;
        }
        this.list.tabIndex = 1;
        this.list.focus();
    }

    removeDropdownFocus() {
        if (this.input && this.input.hasAttribute("tabindex")) {
            this.input.removeAttribute("tabindex");
            this.input.blur();
            return;
        }

        if (this.list.hasAttribute("tabindex")) {
            this.list.removeAttribute("tabindex");
        }
    }

    static init() {
        document
            .querySelectorAll<HTMLSelectElement>("select[data-custom-select]")
            .forEach((select) => {
                new CustomSelect(select);
            });
    }
}

export default CustomSelect;
