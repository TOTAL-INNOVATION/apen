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
import zodFile from "~/lib/zod/custom";
import { Input } from "~/components/ui/input";
import { Button } from "~/components/ui/button";
import DocInput, { DEFAULT_DOC_TYPES } from "~/components/doc-input";

export const MAX_DOC_SIZE = 10240 * 1024;
export const DOC_TYPES = Object.keys(DEFAULT_DOC_TYPES);
export const readableDocTypes = Object.values(DEFAULT_DOC_TYPES).map(
    (docTypeVariants) => docTypeVariants[0]
);

const schema = zod.object({
    name: zod.string().min(5).max(255),
    doc: zodFile(
        MAX_DOC_SIZE,
        DOC_TYPES,
        `Le fichier doit être de type ${readableDocTypes.toString()}`
    ),
});

function Create() {
    const form = useForm<zod.infer<typeof schema>>({
        resolver: zodResolver(schema),
        defaultValues: {
            name: "",
            doc: undefined,
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
                                <FormLabel>Fichier</FormLabel>
                                <FormControl>
                                    <DocInput {...field} />
                                </FormControl>
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

    function onSubmit(formData: zod.infer<typeof schema>) {
        router.post(
            "/decrets",
            formData,
        );
    }
}

export default Create;
