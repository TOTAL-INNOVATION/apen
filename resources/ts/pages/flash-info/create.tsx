import { zodResolver } from "@hookform/resolvers/zod";
import {
    Form,
    FormControl,
    FormField,
    FormItem,
    FormLabel,
    FormMessage,
} from "~/components/ui/form";
import { router, usePage } from "@inertiajs/react";
import React, { useEffect } from "react";
import { useForm } from "react-hook-form";
import { setValidationError } from "~/lib/form";
import zod from "~/lib/zod";
import { Switch } from "~/components/ui/switch";
import { Button } from "~/components/ui/button";
import { Textarea } from "~/components/ui/textarea";

export const infoSchema = zod.object({
	title: zod.string().min(10).max(255),
	active: zod.boolean(),
});

function Create() {

	const form = useForm<zod.infer<typeof infoSchema>>({
		resolver: zodResolver(infoSchema),
		defaultValues: {
			title: "",
			active: true,
		},
	});


    const { errors } = usePage().props;

    useEffect(() => {
        if (Object.keys(errors).length) setValidationError(form, errors);
    }, [errors, form]);

	return (
		<div>
            <div className="py-4">
                <p>
                    <span className="font-franklin-medium">Note:</span>Tous les
                    champs sont obligatoires.
                </p>
            </div>

			<Form {...form}>
				<form onSubmit={form.handleSubmit(onSubmit)}>
					<FormField
                        control={form.control}
                        name="title"
                        render={({ field }) => (
                            <FormItem>
                                <FormLabel>Titre</FormLabel>
                                <FormControl>
                                    <Textarea
                                        placeholder="Entrez le titre"
                                        {...field}
                                    />
                                </FormControl>
                                <FormMessage />
                            </FormItem>
                        )}
                    />

					<FormField
						control={form.control}
						name="active"
						render={({field}) => (
							<FormItem className="mt-4">
                                <div className="flex items-center space-x-4">
									<FormControl>
										<Switch
											id={field.name}
											onCheckedChange={(checked) => form.setValue("active", checked)}
											checked={field.value}
										/>
									</FormControl>
									<FormLabel className="mb-0" htmlFor={field.name}>Définir la disponibilité</FormLabel>
								</div>
                                <FormMessage />
                            </FormItem>
						)}
					/>

					<div className="mt-6 md:mt-8 text-center">
						<Button
							type="submit"
							className="w-full font-franklin-medium"
						>
							Enrégistrer
						</Button>
					</div>
				</form>
			</Form>
		</div>
	);

	function onSubmit(formData: zod.infer<typeof infoSchema>) {
		router.post(
			"/infos",
			formData,
		);
	}
}

export default Create;
