import { zodResolver } from "@hookform/resolvers/zod";
import {
    Form,
    FormControl,
    FormField,
    FormItem,
    FormLabel,
    FormMessage,
} from "~/components/ui/form";
import { usePage } from "@inertiajs/react";
import React, { useEffect } from "react";
import { useForm } from "react-hook-form";
import { toast } from "~/components/toast";
import { setValidationError } from "~/lib/form";
import zod from "~/lib/zod";
import zodFile from "~/lib/zod/custom";
import { FlashMessage } from "~/types";
import { Input } from "~/components/ui/input";
import { Button } from "~/components/ui/button";

const schema = zod.object({
    name: zod.string().min(5).max(255),
    doc: zodFile(10240 * 1024),
});

function Create() {
    const form = useForm<zod.infer<typeof schema>>({
        resolver: zodResolver(schema),
        defaultValues: {
            name: "",
            doc: undefined,
        },
    });

    const { errors, flash } = usePage<{ flash: FlashMessage | null }>().props;

    useEffect(() => {
        if (flash) {
            toast(flash);
        }
        if (Object.keys(errors).length) setValidationError(form, errors);
    }, [errors, form, flash]);

    return (
        <div>
            <div className="py-4">
                <p>
                    <span className="font-franklin-medium">Note:</span>Tous les champs sont obligatoires.
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
        console.log(formData);
    }
}

export default Create;
