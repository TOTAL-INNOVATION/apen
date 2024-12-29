import { useFormField } from "@/components/ui/form";
import { useEffect, useState } from "react";
import { useFormContext } from "react-hook-form";

type ChangeEventHander = React.ChangeEvent<HTMLInputElement>;

export function useNumberInput(intialValue: number, externalHandler?: (event: ChangeEventHander) => void) {
	const [value, setValue] = useState<number>(intialValue);
	const context = useFormContext();
	const {name} = useFormField();

	useEffect(() => {
		if (name)
			context.setValue(name, value);
	}, [name, value, context]);

	const handler = (event: ChangeEventHander) => {
		if (externalHandler)
			externalHandler(event);
		const parsedValue = Number(event.target.value);
		
		if (!isNaN(parsedValue))
			setValue(parsedValue);
		if (name)
			context.setValue(name, parsedValue);
	}

	return {value, setValue, handler};
}
