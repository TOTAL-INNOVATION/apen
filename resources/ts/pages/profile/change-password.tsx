import { zodResolver } from "@hookform/resolvers/zod";
import {
    Form,
    FormControl,
    FormField,
    FormItem,
    FormLabel,
} from "~/components/ui/form";
import { Input } from "~/components/ui/input";
import React from "react";
import { useForm } from "react-hook-form";
import { Card, CardContent, CardFooter, CardHeader, CardTitle } from "~/components/ui/card";
import zod from "~/lib/zod";
import { Button } from "~/components/ui/button";

const schema = zod.object({
    password: zod.string().min(8).max(50),
    password_confirmation: zod.string().min(8).max(50),
});

function ChangePassword() {
    const form = useForm<zod.infer<typeof schema>>({
        resolver: zodResolver(schema),
        defaultValues: {
            password: "",
            password_confirmation: "",
        },
    });

    return (
        <div className="mt-4 md:mt-6 lg:mt-8">
            <Form {...form}>
                <form onSubmit={form.handleSubmit(onSubmit)}>
                    <Card className="shadow-none">
                        <CardHeader>
                            <CardTitle className="uppercase">
                                Changer mon mot de passe
                            </CardTitle>
                        </CardHeader>

                        <CardContent>
                            <FormField
                                control={form.control}
                                name="password"
                                render={({ field }) => (
                                    <FormItem>
                                        <FormLabel>Mot de passe</FormLabel>
                                        <FormControl>
                                            <Input
                                                type="password"
                                                placeholder="Entrez votre mot de passe"
                                                {...field}
                                            />
                                        </FormControl>
                                    </FormItem>
                                )}
                            />

                            <FormField
                                control={form.control}
                                name="password_confirmation"
                                render={({ field }) => (
                                    <FormItem>
                                        <FormLabel>Confirmez votre mot de passe</FormLabel>
                                        <FormControl>
                                            <Input
                                                type="password"
                                                placeholder="Entrez à nouveau votre mot de passe"
                                                {...field}
                                            />
                                        </FormControl>
                                    </FormItem>
                                )}
                            />
                        </CardContent>

						<CardFooter className="justify-center">
							<Button type="submit">Enrégistrer les modifications</Button>
						</CardFooter>
                    </Card>
                </form>
            </Form>
        </div>
    );

	function onSubmit(data: zod.infer<typeof schema>) {
		console.log(data);
	}
}

export default ChangePassword;
