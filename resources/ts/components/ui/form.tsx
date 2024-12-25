import React from "react";
import { Label } from "./label";
import { cn, generateUuid } from "~/lib/utils";
import { Input } from "./input";
import { Textarea } from "./textarea";
import { useForm as inertiaFormHook } from "@inertiajs/react";

type FormFields = Record<string, string>;

export interface FormFieldProps<T extends FormFields> {
    id?: string;
    name?: keyof T;
    label?: string;
    type?: React.HTMLInputTypeAttribute;
    placeholder?: string;
    elementType?: "input" | "textarea";
    className?: string;
    required?: boolean;
}

const FormContext = React.createContext<{ fields: FormFields }>({
    fields: {},
});

const Form = React.forwardRef<
    HTMLFormElement,
    React.HTMLAttributes<HTMLFormElement> & { fields: FormFields }
>(({fields, ...props}, ref) => (
    <FormContext.Provider value={{ fields }}>
        <form {...props} ref={ref} />
    </FormContext.Provider>
));

function FormField<T extends FormFields>({
    id = generateUuid(),
    name = generateUuid(),
    label,
    type = "text",
    placeholder = "",
    elementType = "input",
    required = false,
    className,
}: FormFieldProps<T>) {
    const props = {
        type,
        id,
        placeholder,
        required,
        onChange: handleChange
    };
    
    const fields = React.useContext(FormContext).fields;
    const {errors, setData} = inertiaFormHook(fields);
    const error = errors[name as string];

    return (
        <div className={cn("mb-2 sm:mb-4", className)}>
            {label && <Label htmlFor={id}>{label}</Label>}

            {elementType === "input" ? (
                <Input name={name as string} {...props} />
            ) : (
                <Textarea name={name as string} {...props} />
            )}

            {error && (
                <p className="text-error mt-2">{error}</p>
            )}
        </div>
    );

    function handleChange(event: React.ChangeEvent<HTMLInputElement|HTMLTextAreaElement>) {
        setData(name as string, event.target.value);
    }
}

function useForm<Fields extends FormFields>(fields: Fields) {
    return {
        ...inertiaFormHook(fields),
        FormField: FormField<Fields>,
        Form,
    };
}

export { Form, FormField, useForm };
