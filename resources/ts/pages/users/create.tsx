import React, { useEffect } from "react";
import { useForm } from "react-hook-form";
import { FlashMessage, Role } from "~/types";
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "~/components/ui/select";
import { Button } from "~/components/ui/button";
import zod from "~/lib/zod";
import { zodResolver } from "@hookform/resolvers/zod";
import {
    Form,
    FormControl,
    FormField,
    FormItem,
    FormLabel,
    FormMessage,
} from "~/components/ui/form";
import { Input } from "~/components/ui/input";
import { router, usePage } from "@inertiajs/react";
import { setValidationError } from "~/lib/form";
import { toast } from "~/components/toast";

export const userFormSchema = zod.object({
    firstname: zod.string().min(2).max(50),
    lastname: zod.string().min(2).max(50),
    email: zod.string().email(),
    role: zod.enum<Role, [Role, ...Role[]]>(["Admin", "Expert"]),
});

function Create() {

    const form = useForm<zod.infer<typeof userFormSchema>>({
        resolver: zodResolver(userFormSchema),
        defaultValues: {
            firstname: "",
            lastname: "",
            email: "",
            role: "Expert",
        },
    });

    const {errors, flash} = usePage<{flash: FlashMessage|null}>().props;

    useEffect(() => {
        if (flash) {
            toast(flash);
        }
        if (Object.keys(errors).length)
            setValidationError(form, errors);

    }, [errors, form, flash]);

    return (
        <div>
            <div className="py-4">
                <p>
                    <span className="font-franklin-medium">Note:</span>Un mot de
                    passe généré sera envoyer à l'email de l'utilisateur.
                </p>
            </div>

            <Form {...form}>
                <form onSubmit={form.handleSubmit(onSubmit)}>
                <FormField
                    control={form.control}
                    name="role"
                    render={({ field }) => (
                        <FormItem>
                            <FormLabel>Rôle</FormLabel>
                            <FormControl>
                                <Select
                                    onValueChange={(value: Role) =>
                                        form.setValue("role", value)
                                    }
                                    defaultValue={field.value}
                                    >
                                    <SelectTrigger className="w-full">
                                        <SelectValue placeholder="Sélectionner le rôle" />
                                    </SelectTrigger>
                                    <SelectContent>
                                        {(["Admin", "Expert"] as Role[]).map((role) => (
                                            <SelectItem value={role} key={role}>
                                                {role}
                                            </SelectItem>
                                        ))}
                                    </SelectContent>
                                </Select>
                            </FormControl>
                        </FormItem>
                    )}
                />

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

                    <div className="mt-6 md:mt-8 text-center">
                        <Button type="submit" className="w-full font-franklin-medium">Enrégistrer</Button>
                    </div>
                </form>
            </Form>
        </div>
    );

    function onSubmit(formData: zod.infer<typeof userFormSchema>) {
        router.post(
            "/utilisateurs",
            formData,
        );
    }
}

export default Create;
