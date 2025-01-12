class CustomSelect {
    public select: HTMLSelectElement;
    public options: HTMLCollectionOf<HTMLOptionElement>;

    constructor(select: HTMLSelectElement) {
        this.select = select;
        this.options = select.options;
		console.log(this.options);
		
    }

    static init() {
        document
            .querySelectorAll<HTMLSelectElement>("select")
            .forEach((select) => {
                new CustomSelect(select);
            });
    }
}

export default CustomSelect;
