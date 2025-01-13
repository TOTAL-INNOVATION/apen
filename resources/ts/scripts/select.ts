enum NAVIGATE {
    UP = 'moveUp',
    DOWN = 'moveDown'
}

class CustomSelect {
    public select: HTMLSelectElement;
    public root: HTMLElement;
    public trigger: HTMLButtonElement;
    public placeholder: HTMLSpanElement;
    public content: HTMLDivElement;
    public dropdown: HTMLUListElement;
    public options: HTMLOptionsCollection;

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
        this.content = this.root.querySelector(
            "[data-content]"
        ) as HTMLDivElement;
        this.dropdown = this.content.querySelector(
            "ul"
        ) as HTMLUListElement;

        this.render();
    }

    render() {
        const selectedIndex = this.options.selectedIndex;
        const dropdownItems = Array.from(this.options).map((option, index) => {
            const list = document.createElement("li");
            list.setAttribute(
                "class",
                "px-2 w-full h-10 flex items-center cursor-pointer hover:bg-whisper focus:bg-whisper",
            );
            
            if (option.disabled) list.setAttribute("aria-disabled", "true");

            list.setAttribute("data-value", option.value);
            list.append(...option.childNodes);
            if (selectedIndex === index)
            {
                list.setAttribute("aria-selected", "true");
                list.focus();
            }

            return list;
        });
        
        this.dropdown.append(
            ...dropdownItems
        );

        this.configureEvent();
    }

    configureEvent() {
        this.trigger.addEventListener("click", this.toogleContent.bind(this));

        document.addEventListener("click", (ev) => {
            const target = ev.target as HTMLElement;
            if (target !== this.trigger && !this.content.contains(target)) {
                this.content.classList.add("hidden");
            }
        });
    }

    toogleContent() {
        this.content.classList.toggle("hidden");

        if (this.content.classList.contains("hidden")) {
            this.content.setAttribute("aria-hidden", "true");
            return;
        }
        (this.content.querySelector('ul') as HTMLUListElement).focus();
        this.content.setAttribute("aria-hidden", "false");
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
