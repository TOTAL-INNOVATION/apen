import React, { useState } from "react";
import { Label } from "./label";
import { cn, generateUuid } from "~/lib/utils";
import { Input } from "./input";
import { Textarea } from "./textarea";
import { useForm as inertiaFormHook } from "@inertiajs/react";
import { useDropzone } from "react-dropzone";
import { ImageUp } from "lucide-react";
import { Slot } from "@radix-ui/react-slot";

type FormFields = Record<string, any>;

export interface FormFieldProps<T extends FormFields> {
    id?: string;
    name?: keyof T;
    label?: string;
    type?: React.HTMLInputTypeAttribute;
    placeholder?: string;
    elementType?: "input" | "textarea" | "image";
    authorizeFileTypes?: Record<string, string[]>;
    className?: string;
    required?: boolean;
}

const FormContext = React.createContext<{ fields: FormFields }>({
    fields: {},
});

function FormField<T extends FormFields>({
    id = generateUuid(),
    name = generateUuid(),
    label,
    type = "text",
    placeholder = "",
    elementType = "input",
    authorizeFileTypes = {
        "image/png": [],
        "image/jpg": [],
        "image/jpeg": [],
    },
    required = false,
    className,
}: FormFieldProps<T>) {
    const props = {
        type,
        id,
        placeholder,
        required,
        onChange: handleChange,
    };

    const fields = React.useContext(FormContext).fields;
    const { errors, setData } = inertiaFormHook(fields);
    const error = errors[name as string];
    const elements = {
        input: <Input name={name as string} {...props} />,
        textarea: <Textarea name={name as string} {...props} />,
        image: (
            <FormImageField<T>
                id={id}
                name={name}
                placeholder={placeholder}
                className={className}
                authorizeTypes={authorizeFileTypes}
                required
            />
        ),
    };

    return (
        <div className={cn("mb-2 sm:mb-4", className)}>
            {label && <Label htmlFor={id}>{label}</Label>}

            {elements[elementType]}

            {error && <p className="text-error mt-2">{error}</p>}
        </div>
    );

    function handleChange(
        event: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>
    ) {
        setData(name as string, event.target.value);
    }
}

function FormImageField<T extends FormFields>({
    id,
    name,
    label,
    placeholder,
    className,
    required,
    authorizeTypes,
}: Omit<FormFieldProps<T>, "type" | "elementType"> & {
    authorizeTypes: Record<string, string[]>;
}) {
    const [preview, setPreview] = useState<string | null>(null);
    const fields = React.useContext(FormContext).fields;
    const { setData } = inertiaFormHook(fields);

    const { getRootProps, getInputProps, isDragAccept, isDragReject } =
        useDropzone({
            accept: authorizeTypes,
            onDrop(acceptedFiles) {
                if (acceptedFiles.length)
                    setPreview(URL.createObjectURL(acceptedFiles[0]));
            },
        });

    return (
        <div>
            {label && (
                <div>
                    <Label htmlFor={id}>{label}</Label>
                </div>
            )}
            <div
                {...getRootProps({
                    className: cn(
                        "p-4 w-full border border-dashed border-rainee aspect-video",
                        {
                            "border-danger": isDragReject,
                        },
                        {
                            "border-success": isDragAccept,
                        },
                        className
                    ),
                })}
            >
                <div className="h-full bg-white border border-whisper">
                    {preview ? (
                        <img
                            src={preview}
                            className="w-full h-full object-cover"
                            alt="Uploaded file"
                        />
                    ) : (
                        <div className="h-full w-full flex items-center justify-center">
                            <div className="flex flex-col items-center space-y-2">
                                <ImageUp className="w-14 h-14 stroke-[1] stroke-rainee" />
                                <div>
                                    {placeholder ? <strong>{placeholder}</strong> : <strong>Sélectionner une image</strong>}
                                    <p className="mt-1">Cliquez ou glissez déposer</p>
                                </div>
                            </div>
                        </div>
                    )}
                </div>
                <input
                    {...getInputProps({
                        id,
                        name: name as string,
                        onChange: handleChange,
                        required,
                    })}
                />
            </div>
        </div>
    );

    function handleChange(event: React.ChangeEvent<HTMLInputElement>) {
        const files = event.target.files;

        if (files && files.length) setData(name as string, files[0]);
    }
}

function useForm<Fields extends FormFields>(fields: Fields) {
    return {
        ...inertiaFormHook(fields),
        FormField: FormField<Fields>,
        Form: React.forwardRef<
            HTMLFormElement,
            React.HTMLAttributes<HTMLFormElement> & {asChild?: boolean}
        >(({asChild = false, ...props}, ref) => {
            const Comp = asChild ? Slot : "form";
            return (
                <FormContext.Provider value={{ fields }}>
                    <Comp {...props} ref={ref} />
                </FormContext.Provider>
            );
        }),
    };
}

export default useForm;
