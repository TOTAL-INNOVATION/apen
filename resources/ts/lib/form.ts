import { UseFormReturn } from "react-hook-form";

const formatErrors = (errors: Record<string, string[]>) => {
    const formErrors: Record<string, string> = {};
    for (const key in errors) formErrors[key] = errors[key][0];

    return formErrors;
};

const setValidationError = (
    form: UseFormReturn<any>,
    errorsBag: Record<string, string> = {}
) => {
    const keys = Object.getOwnPropertyNames(errorsBag);
    keys.forEach((key) => {
        form.setError(key, {
            message: errorsBag[key],
        });
    });
};

export { formatErrors, setValidationError };
