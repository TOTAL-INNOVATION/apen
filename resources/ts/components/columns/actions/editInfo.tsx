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
import { Button } from "~/components/ui/button";
import {
    Dialog,
    DialogContent,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from "~/components/ui/dialog";
import { useForm } from "react-hook-form";
import { setValidationError } from "~/lib/form";
import zod from "~/lib/zod";
import { infoSchema } from "~/pages/flash-info/create";
import { FlashInfo } from "~/types";
import { handleOverlayOpen } from "~/lib/utils";
import { Pen } from "lucide-react";
import { Switch } from "~/components/ui/switch";
import { Textarea } from "~/components/ui/textarea";

function EditInfo({ info }: { info: FlashInfo }) {
    const url = usePage().url;
    const { errors } = usePage().props;
    const form = useForm<zod.infer<typeof infoSchema>>({
        resolver: zodResolver(infoSchema),
        defaultValues: {
            title: info.title,
            active: info.active,
        },
    });

    const dialogStateValue = `edit=${info.id}`;

    useEffect(() => {
        if (Object.keys(errors).length) setValidationError(form, errors);
    }, [errors, form]);

    return (
        <Dialog
            open={url.includes(dialogStateValue)}
            onOpenChange={() => handleOverlayOpen(dialogStateValue)}
        >
            <DialogTrigger asChild>
                <Button size="sm" variant="outline" className="rounded-full">
                    <Pen className="w-[18px] h-[18px] stroke-viridian" />
                </Button>
            </DialogTrigger>
            <DialogContent aria-describedby={undefined}>
                <DialogHeader>
                    <DialogTitle>Editer le flash info</DialogTitle>
                </DialogHeader>

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
                            render={({ field }) => (
                                <FormItem className="mt-4">
                                    <div className="flex items-center space-x-4">
                                        <FormControl>
                                            <Switch
                                                id={field.name}
                                                onCheckedChange={(checked) =>
                                                    form.setValue(
                                                        "active",
                                                        checked
                                                    )
                                                }
                                                checked={field.value}
                                            />
                                        </FormControl>
                                        <FormLabel
                                            className="mb-0"
                                            htmlFor={field.name}
                                        >
                                            Disponibilité de l'info
                                        </FormLabel>
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
                                Enrégistrer les modifications
                            </Button>
                        </div>
                    </form>
                </Form>
            </DialogContent>
        </Dialog>
    );

	function onSubmit(formData: zod.infer<typeof infoSchema>) {
		router.put(
			`/infos/${info.id}`,
			formData,
		);
	}
}

export default EditInfo;
