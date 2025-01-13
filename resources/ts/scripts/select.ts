enum KEYDOWN_NAME {
    UP = "ArrowUp",
    DOWN = "ArrowDown",
    ENTER = "Enter",
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
                this.placeholder.textContent = li.textContent;
                li.setAttribute("aria-selected", "true");
            }

            return li;
        });

        if (this.list.hasChildNodes()) {
            Array.from(this.list.childNodes).forEach(child => child.remove())
        }

        this.list.append(...items)

        this.configureEvents();
    }

    configureEvents() {
        this.trigger.addEventListener("click", (ev) => {
            ev.stopImmediatePropagation();
            this.toogleContent();
        });

        this.list.addEventListener("click", (ev) => {
            const target = ev.target;
            if (target instanceof HTMLLIElement) {
                this.setSelectedOption(target);
            }
        })

        document.addEventListener("keydown", (ev) => {
            const target = ev.target;

            if (ev.key === KEYDOWN_NAME.ENTER && target instanceof HTMLLIElement) {
                this.setSelectedOption(target);
                return;
            }
            
            if (target instanceof HTMLInputElement) {
                return;
            }

            if (target instanceof HTMLUListElement) {
                if (this.select.selectedIndex !== -1) {
                    const selectedOption = this.select.options[this.select.selectedIndex];
                    const item = this.list.querySelector<HTMLLIElement>(`li[data-value="${selectedOption.value}"]`);
                    if (!item) return;

                    this.handleListNavigate(item, ev);

                    return;
                }
            }

            if (target instanceof HTMLLIElement) {
                this.handleListNavigate(target, ev);
            }
        });

        document.addEventListener("click", (ev) => {
            const target = ev.target as HTMLElement;
            if (target !== this.trigger && !this.container.contains(target)) {
                this.container.classList.add("hidden");
            }
        });
    }

    setSelectedOption(target: HTMLLIElement) {
        if (target instanceof HTMLLIElement) {
            const value = target.getAttribute("data-value");
            const selectedOption = Array.from(this.options).find((option) => option.value === value);
            if (!selectedOption) return;

            this.select.selectedIndex = selectedOption.index;
            this.placeholder.textContent = target.textContent;
            Array.from(this.list.querySelectorAll("li")).find((li) => {
                return li.ariaSelected === "true";
            })?.removeAttribute("aria-selected");
            target.setAttribute("aria-selected", "true");
            this.container.classList.add("hidden");
            this.container.setAttribute("aria-hidden", "true");
            this.removeDropdownFocus();
        }
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

    handleListNavigate(target: HTMLLIElement, ev: KeyboardEvent) {
        if (ev.key === KEYDOWN_NAME.UP) {
            const previousSibling = target.previousElementSibling;
            if (!previousSibling || !(previousSibling instanceof HTMLLIElement)) return;

            target.removeAttribute("tabindex");
            ev.preventDefault();
            previousSibling.tabIndex = 1;
            previousSibling.focus();
            previousSibling.scrollIntoView({
                behavior: "smooth",
                block: "center"
            })
            return;
        }

        if (ev.key === KEYDOWN_NAME.DOWN) {
            const nextSibling = target.nextElementSibling;
            if (!nextSibling || !(nextSibling instanceof HTMLLIElement)) return;

            ev.preventDefault();
            target.removeAttribute("tabindex");
            nextSibling.tabIndex = 1;
            nextSibling.focus();
            nextSibling.scrollIntoView({
                behavior: "smooth",
                block: "center"
            })
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
