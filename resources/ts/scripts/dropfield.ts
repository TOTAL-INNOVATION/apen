export enum STATE {
    accepted = "accepted",
    rejected = "rejected",
};

type callback = (acceptedFiles: File[], rejectedFiles: File[], state: STATE, event: DragEvent) => void;
type DropFieldProps = {
    root: string|HTMLElement;
    input: HTMLInputElement;
    accepts: string[];
    multiple?: boolean;
    onChange: callback;
    onDragOver: callback;
}

class DropField {
    private rootElement: HTMLElement;
    private input: HTMLInputElement;
    private multiple: boolean;
    private accepts: string[];
    private onChange: callback;
    private onDragOver: callback;

    constructor({root, input, multiple = false, accepts, onChange, onDragOver}: DropFieldProps) {
        if (typeof root === "string")
        {
            const element = document.querySelector(root) as HTMLElement;
            if (!element) throw new Error(`Can't find error with id "${root}"`);
            this.rootElement = element;
        } else this.rootElement = root;

        this.input = input;
        this.accepts = accepts;
        this.onChange = onChange;
        this.input.accept = this.accepts.toString();
        this.input.multiple = multiple;
        this.multiple = multiple;
        this.rootElement.append(this.input);

        this.configureEvents();
    }

    private configureEvents() {

        this.rootElement.addEventListener("click", () => this.input.click());
        this.rootElement.addEventListener("dragover", (ev) => this.handleDragAndDrop(ev, this.onDragOver));
    }

    private handleDragAndDrop(ev: DragEvent, callback: callback) {
        const transfert = ev.dataTransfer;
        if (!transfert) {
            ev.preventDefault();
            return;
        }
        
        if (!transfert.files.length) ev.preventDefault();

        const files = Array.from(transfert.files);
        if (!this.multiple) {
            const file = files[0];
            
            if (this.accepts.includes(file.type)) {
                callback(
                    [file],
                    [],
                    STATE.accepted,
                    ev,
                );

                return;
            }

            callback(
                [],
                [file],
                STATE.rejected,
                ev,
            )
            return;
        }

        const acceptedFiles = files.filter((file) => this.accepts.includes(file.type));
        const rejectedFiles = files.filter((file) => !this.accepts.includes(file.type));

        callback(
            acceptedFiles,
            rejectedFiles,
            rejectedFiles.length > 0 ? STATE.rejected : STATE.accepted,
            ev,
        );

    }
}

export default DropField;
