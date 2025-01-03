import React, { useEffect } from "react";
import { Button } from "~/components/ui/button";
import {
    Dialog,
    DialogContent,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from "~/components/ui/dialog";
import { Pen } from "lucide-react";
import { useForm } from "react-hook-form";
import { zodResolver } from "@hookform/resolvers/zod";
import {
    Form,
    FormControl,
    FormField,
    FormItem,
    FormLabel,
    FormMessage,
} from "~/components/ui/form";
import zod from "~/lib/zod";
import { Input } from "~/components/ui/input";
import { handleOverlayOpen } from "~/lib/utils";
import { Decree } from "~/types";
import zodFile from "~/lib/zod/custom";
import { router, usePage } from "@inertiajs/react";
import DocInput from "~/components/doc-input";
import { DOC_TYPES, MAX_DOC_SIZE, readableDocTypes } from "~/pages/decrees/create";
import { setValidationError } from "~/lib/form";

const schema = zod.object({
	name: zod.string().min(5).max(255),
	doc: zodFile(
			MAX_DOC_SIZE,
			DOC_TYPES,
			`Le fichier doit être de type ${readableDocTypes.toString()}`
		).optional(),
});

function EditDecree({decree}: {decree: Decree}) {

	const url = usePage().url;
	const { errors } = usePage().props;
	const form = useForm<zod.infer<typeof schema>>({
		resolver: zodResolver(schema),
		defaultValues: {
			name: decree.name,
			doc: undefined,
		}
	});

	const dialogStateValue = `edit=${decree.id}`;

	useEffect(() => {
        if (Object.keys(errors).length) setValidationError(form, errors);
    }, [errors, form]);


	return (
		<Dialog open={url.includes(dialogStateValue)} onOpenChange={() => handleOverlayOpen(dialogStateValue)}>
			<DialogTrigger asChild>
				<Button size="sm" variant="outline" className="rounded-full">
					<Pen className="w-[18px] h-[18px] stroke-viridian" />
				</Button>
			</DialogTrigger>
			<DialogContent aria-describedby={undefined}>
				<DialogHeader>
					<DialogTitle>Editer le décret</DialogTitle>
				</DialogHeader>

				<Form {...form}>
					<form onSubmit={form.handleSubmit(onSubmit)}>
						<FormField
							control={form.control}
							name="name"
							render={({ field }) => (
								<FormItem>
									<FormLabel>Nom</FormLabel>
									<FormControl>
										<Input
											placeholder="Entrez le nom du décret"
											{...field}
										/>
									</FormControl>
									<FormMessage />
								</FormItem>
							)}
						/>

						<FormField
							control={form.control}
							name="doc"
							render={({ field }) => (
								<FormItem>
									<FormLabel>Fichier(Optionel)</FormLabel>
									<FormControl>
										<DocInput {...field} />
									</FormControl>
									<FormMessage />
								</FormItem>
							)}
						/>

						<div className="mt-6 md:mt-8 text-center">
							<Button type="submit" className="w-full font-franklin-medium">Enrégistrer</Button>
						</div>
					</form>
				</Form>
			</DialogContent>
		</Dialog>
	);

	function onSubmit(formData: zod.infer<typeof schema>) {
		router.post(
			`/decrets/${decree.id}`,
			formData,
		);
	}
}

export default EditDecree;
