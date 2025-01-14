enum STATE {
    accepted = "accepted",
    rejected = "rejected",
};

type changeCallback = (files: File[], state: STATE, event: DragEvent) => void;
type DropFieldProps = {
    root: string|HTMLElement;
    input: HTMLInputElement;
    accepts: string[];
    onChange: changeCallback;
}

class DropField {
    private rootElement: HTMLElement;
    private input: HTMLInputElement;
    private accepts: string[];
    private onChange: changeCallback;

    /**
     * 
     * @param root - element or its id
     * @param accepts - the files types. Ex: png,jpg,jpeg
     */
    constructor({root, input, accepts, onChange}: DropFieldProps) {
        if (typeof root === "string")
        {
            const element = document.querySelector(root) as HTMLElement;
            if (!element) throw new Error(`Can't find error with id "${root}"`);
            this.rootElement = element;
        } else this.rootElement = root;

        this.input = input;
        this.accepts = accepts;
        this.onChange = onChange;
        this.rootElement.append(this.input);

        this.configureEvents();
    }

    private configureEvents() {
        this.rootElement.addEventListener("dragover", (ev) => {
            if (!ev.dataTransfer) return;
            this.handleTransfert(ev.dataTransfer);
        });
    }

    private handleTransfert(transfert: DataTransfer) {
        console.log();
    }
}

export default DropField;
