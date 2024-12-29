import { UseFormReturn } from "react-hook-form";

const setValidationError = (form: UseFormReturn<any>, errorsBag: Record<string, string> = {}) => {
	const keys = Object.getOwnPropertyNames(errorsBag)
	keys.forEach((key) => {
		form.setError(key, {
			message: errorsBag[key]
		})
	})
}


export {setValidationError};
