import Dropzone from "dropzone";

class Preview {
    private previewElement: HTMLImageElement;
    private inputElement: HTMLInputElement;
    private previewIsObjectUrl: boolean = false;

    constructor(rootElement: HTMLElement) {
        const previewElement = rootElement.querySelector("img");
        if (!previewElement) {
            throw new Error("Preview element not found");
        }
        this.previewElement = previewElement;

        const inputElement =
            rootElement.querySelector<HTMLInputElement>("input[type='file']");
        if (!inputElement) {
            throw new Error("Input element not found");
        }
        this.inputElement = inputElement;
        this.inputElement.addEventListener(
            "change",
            this.onInputChange.bind(this)
        );
		this.applyDropzone(rootElement);
    }

    onInputChange(event: Event) {
        const files = (event.target as HTMLInputElement).files;
        if (!files || !files.length) {
            return;
        }

        this.setPreview(files[0]);
    }

    setPreview(file: File) {
        if (this.previewIsObjectUrl) {
            URL.revokeObjectURL(this.previewElement.src);
        }
        this.previewElement.src = URL.createObjectURL(file);
        this.previewIsObjectUrl = true;
    }

	applyDropzone(element: HTMLElement) {
		new Dropzone(element, {
			acceptedFiles: "image/*",
			maxFiles: 1,
			init: () => {
				if (this.previewIsObjectUrl) {
					URL.revokeObjectURL(this.previewElement.src);
				}
			},
			accept: (file) => {
				this.setPreview(file);
			},
		});
	}

    static init() {
        document
            .querySelectorAll<HTMLElement>("[data-image-input-preview]")
            .forEach((rootElement) => new Preview(rootElement));
    }
}

export default Preview;
