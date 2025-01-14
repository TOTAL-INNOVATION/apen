import DropField from "./dropfield";

class ImageField {
    private root: HTMLDivElement;
    private input: HTMLInputElement;
    private preview: HTMLDivElement;
    private isObjectUrl: boolean = false;

    constructor(field: HTMLElement) {
        this.root = field.querySelector("div[data-root]") as HTMLDivElement;
        this.input = field.querySelector(
            "input[type='file']"
        ) as HTMLInputElement;
        this.preview = this.root.querySelector(
            "div[data-preview-box]"
        ) as HTMLDivElement;

        this.configureEvents();
    }

    private configureEvents() {
        new DropField({
            root: this.root,
            input: this.input,
            accepts: ["image/png", "image/jpg", "image/jpeg"],
            onChange(acceptedFiles, rejectedFiles, state, event) {
                
            },
            onDragOver(acceptedFiles, rejectedFiles, state, event) {
                
            },
        });
    }

    static init() {
        document
            .querySelectorAll<HTMLElement>("[data-image-field]")
            .forEach((element) => new ImageField(element));
    }
}

export default ImageField;
