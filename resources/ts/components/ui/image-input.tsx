import * as React from "react";
import { useFormContext } from "react-hook-form";
import { useDropzone, Accept } from "react-dropzone";
import { cn } from "~/lib/utils";
import { Image, Upload } from "lucide-react";

export interface ImageInputProps
    extends Omit<React.HTMLAttributes<HTMLInputElement>, "type"> {
    name: string;
    authorizedTypes?: Accept;
}

export const DEFAULT_AUTHORIZED_TYPES = {
    "image/png": [],
    "image/jpg": [],
    "image/jpeg": [],
};

function ImageInput({
    authorizedTypes = DEFAULT_AUTHORIZED_TYPES,
    name,
    onChange,
    className,
    id,
}: ImageInputProps) {
    const [preview, setPreview] = React.useState<string | null>(null);

    const context = useFormContext();

    const { getRootProps, getInputProps, isDragAccept, isDragReject } =
        useDropzone({
            accept: authorizedTypes,
            onDrop(acceptedFiles) {
                if (acceptedFiles.length)
                    setPreview(URL.createObjectURL(acceptedFiles[0]));
            },
        });

    React.useEffect(() => {
        return () => {
            if (preview) URL.revokeObjectURL(preview);
        };
    }, [preview]);

    return (
        <div
            {...getRootProps({
                className: cn(
                    "relative p-4 aspect-video border border-dashed border-rainee",
                    {
                        "border-error": isDragReject,
                        "border-success": isDragAccept,
                    },
                    className
                ),
            })}
        >
            <div className="mx-auto aspect-video w-full bg-white border border-whisper">
                {preview ? (
                    <div className="h-full relative">
                        <img
                            src={preview}
                            className="w-full h-full object-cover"
                            alt="Image chargé"
                        />
                        <div className="absolute top-0 w-full h-full flex items-center justify-center bg-black/50 opacity-0 transition-opacity  hover:opacity-100">
                            <div className="flex flex-col items-center justify-center">
                                <div>
                                    <Upload className="w-12 h-12 stroke-1 stroke-white" />
                                </div>
                                <p className="mt-4 text-white">
                                    Glissez déposer ou cliquez
                                </p>
                            </div>
                        </div>
                    </div>
                ) : (
                    <div className="h-full w-full flex flex-col items-center justify-center">
                        <div>
                            <Image className="w-12 h-12 stroke-1 stroke-rainee" />
                        </div>
                        <p className="mt-4 text-dark/60">
                            Glissez déposer ou cliquez
                        </p>
                    </div>
                )}
            </div>
            <input {...getInputProps({ id, name, onChange: onInputChange })} />
        </div>
    );

    function onInputChange(event: React.ChangeEvent<HTMLInputElement>) {
        if (onChange) onChange(event);

        const files = event.target.files;

        if (files && files.length) context.setValue(name, files[0]);
    }
}

export default ImageInput;
