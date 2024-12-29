import * as zod from "zod";
import translations from "./translations.json";

const {types, errors} = translations;


const errorsMap: zod.ZodErrorMap = (issue, __) => {
	return {
		message: (() => {
			switch (issue.code) {
				case zod.ZodIssueCode.invalid_type:
					return `Ce champ attend de recevoir ${types[issue.expected]}`;
		
				case zod.ZodIssueCode.invalid_string:
					if (typeof issue.validation === "object") {
						if ("startsWith" in issue.validation) {
							let message = errors.invalid_string.startsWith;
							message = message.replace("{{startsWith}}", issue.validation.startsWith);
							return message;
						} else if ("endsWith" in issue.validation) {
							let message = errors.invalid_string.endsWith;
							message = message.replace("{{endsWith}}", issue.validation.endsWith);
							return message;
						}
					}
					return errors.invalid_string[issue.validation as keyof typeof errors.invalid_string] ??
						"Ce champ s'attend à recevoir une valeur de type inconnu."
		
				case zod.ZodIssueCode.too_big:
					const maximum =issue.type === "date"
					? new Date(issue.maximum as number)
					: issue.maximum;
					return errors.too_big[issue.type][
						issue.exact
						? "exact"
						: issue.inclusive
						? "inclusive"
						: "not_inclusive"
					].replace("{{maximum}}", maximum.toString());
		
				case zod.ZodIssueCode.too_small:
					if (issue.type !== "date" && issue.minimum === 1)
						return errors.required;
					
					const minimum =issue.type === "date"
					? new Date(issue.minimum as number)
					: issue.minimum;
					return errors.too_small[issue.type][
						issue.exact
						? "exact"
						: issue.inclusive
						? "inclusive"
						: "not_inclusive"
					].replace("{{minimum}}", minimum.toString());
		
			
				default:
					return issue.message;
			}
		})() as string,
	}
};

zod.setErrorMap(errorsMap);

export default zod;
