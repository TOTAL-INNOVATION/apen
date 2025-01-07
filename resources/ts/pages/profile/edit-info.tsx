import { zodResolver } from "@hookform/resolvers/zod";
import { router, usePage } from "@inertiajs/react";
import axios, { AxiosError, AxiosResponse } from "axios";
import React, { useEffect } from "react";
import { useForm } from "react-hook-form";
import { toast } from "~/components/toast";
import { Button } from "~/components/ui/button";
import {
    Card,
    CardContent,
    CardFooter,
    CardHeader,
    CardTitle,
} from "~/components/ui/card";
import {
    Form,
    FormControl,
    FormField,
    FormItem,
    FormLabel,
    FormMessage,
} from "~/components/ui/form";
import { Input } from "~/components/ui/input";
import { formatErrors, setValidationError } from "~/lib/form";
import zod from "~/lib/zod";
import { FlashMessage, User } from "~/types";

const schema = zod.object({
    firstname: zod.string().min(2).max(255),
    lastname: zod.string().min(2).max(255),
    email: zod.string().email(),
    email_confirmation: zod.string().email(),
});

function EditInfo({ user }: { user: User }) {
    const form = useForm<zod.infer<typeof schema>>({
        resolver: zodResolver(schema),
        defaultValues: {
            firstname: user.firstname,
            lastname: user.lastname,
            email: user.email,
            email_confirmation: user.email,
        },
    });

    const { errors } = usePage().props;

    useEffect(() => {
        if (Object.keys(errors).length) setValidationError(form, errors);
    }, [errors, form]);

    return (
        <div className="mt-4 md:mt-6 lg:mt-8">
            <Form {...form}>
                <form onSubmit={form.handleSubmit(onSubmit)}>
                    <Card className="shadow-none">
                        <CardHeader>
                            <CardTitle className="uppercase">
                                Modifier mes informations
                            </CardTitle>
                        </CardHeader>

                        <CardContent>
                            <div className="grid grid-cols-1 sm:grid-cols-2 sm:gap-x-4">
                                <FormField
                                    control={form.control}
                                    name="lastname"
                                    render={({ field }) => (
                                        <FormItem>
                                            <FormLabel>Nom</FormLabel>
                                            <FormControl>
                                                <Input
                                                    placeholder="Entrez votre nom"
                                                    {...field}
                                                />
                                            </FormControl>
                                            <FormMessage />
                                        </FormItem>
                                    )}
                                />

                                <FormField
                                    control={form.control}
                                    name="firstname"
                                    render={({ field }) => (
                                        <FormItem>
                                            <FormLabel>Prénom</FormLabel>
                                            <FormControl>
                                                <Input
                                                    placeholder="Entrez votre prénom"
                                                    {...field}
                                                />
                                            </FormControl>
                                            <FormMessage />
                                        </FormItem>
                                    )}
                                />

                                <FormField
                                    control={form.control}
                                    name="email"
                                    render={({ field }) => (
                                        <FormItem>
                                            <FormLabel>Adresse email</FormLabel>
                                            <FormControl>
                                                <Input
                                                    type="email"
                                                    placeholder="ex: exemple@gmail.com"
                                                    {...field}
                                                />
                                            </FormControl>
                                            <FormMessage />
                                        </FormItem>
                                    )}
                                />

                                <FormField
                                    control={form.control}
                                    name="email_confirmation"
                                    render={({ field }) => (
                                        <FormItem>
                                            <FormLabel>
                                                Confirmez votre adresse email
                                            </FormLabel>
                                            <FormControl>
                                                <Input
                                                    type="email"
                                                    placeholder="ex: exemple@gmail.com"
                                                    {...field}
                                                />
                                            </FormControl>
                                            <FormMessage />
                                        </FormItem>
                                    )}
                                />
                            </div>
                        </CardContent>

                        <CardFooter className="justify-center">
                            <Button type="submit">
                                Enrégistrer les modifications
                            </Button>
                        </CardFooter>
                    </Card>
                </form>
            </Form>
        </div>
    );

    async function onSubmit(formData: zod.infer<typeof schema>) {
        try {
            const response = await axios.post(
                "/profil/modifier-mes-infos",
                formData,
                {
                    headers: {
                        "X-FROM-PANEL": "true"
                    }
                }
            );

            if (response.status !== 200) {
                toast({
                    type: "error",
                    message: "Il y\'a eu une erreur inattendu. Reéssayez.",
                });
                return;
            }

            toast((response.data as {flash: FlashMessage}).flash);

            if (formData.email !== user.email)
                window.location.reload();
            
        } catch (error) {
            const { response } = (error as AxiosError);
            if (!response) {
                toast({
                    type: "error",
                    message: "Il y\'a eu une erreur inattendu. Reéssayez.",
                });
                return;
            }

            if (response.status === 422) {
                const errors = (response as AxiosResponse<{errors: Record<string, string[]>}>).data.errors;
                const formErrors = formatErrors(errors);
                
                setValidationError(form, formErrors);
                return;
            }

            toast((response as AxiosResponse<{flash: FlashMessage}>).data.flash);
        }
    }
}

export default EditInfo;
