import { zodResolver } from "@hookform/resolvers/zod";
import { router, usePage } from "@inertiajs/react";
import React, { useEffect } from "react";
import { useForm } from "react-hook-form";
import { Button } from "~/components/ui/button";
import { Card, CardContent, CardFooter, CardHeader, CardTitle } from "~/components/ui/card";
import {
    Form,
    FormControl,
    FormField,
    FormItem,
    FormLabel,
} from "~/components/ui/form";
import { Input } from "~/components/ui/input";
import { setValidationError } from "~/lib/form";
import zod from "~/lib/zod";
import { User } from "~/types";

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
		if (Object.keys(errors).length)
            setValidationError(form, errors);
	});

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
                                        </FormItem>
                                    )}
                                />
                            </div>
                        </CardContent>

						<CardFooter className="justify-center">
							<Button type="submit">Enrégistrer les modifications</Button>
						</CardFooter>
                    </Card>
                </form>
            </Form>
        </div>
    );

	function onSubmit(formData: zod.infer<typeof schema>) {
		router.put(
			"/profil/modifier-mes-infos",
			formData
		);
	}
}

export default EditInfo;
