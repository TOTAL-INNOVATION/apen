import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "~/components/ui/select";
import { Button } from "~/components/ui/button";
import {
    Dialog,
    DialogContent,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from "~/components/ui/dialog";
import { Role, User } from "~/types";
import { router, usePage } from "@inertiajs/react";
import React from "react";
import { Pen } from "lucide-react";
import { userFormSchema } from "~/pages/users/create";
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

function EditUser({user}: {user: User}) {

	const url = usePage().url;
	const dialogStateValue = `edit=${user.id}`;
	const form = useForm<zod.infer<typeof userFormSchema>>({
		resolver: zodResolver(userFormSchema),
		defaultValues: {
			firstname: user.firstname,
			lastname: user.lastname,
			email: user.email,
			role: user.role,
		},
	});

	return (
		<Dialog open={url.includes(dialogStateValue)} onOpenChange={() => handleOverlayOpen(dialogStateValue)}>
            <DialogTrigger asChild>
                <Button size="sm" variant="outline" className="rounded-full">
                    <Pen className="w-[18px] h-[18px] stroke-viridian" />
                </Button>
            </DialogTrigger>
            <DialogContent aria-describedby={undefined}>
                <DialogHeader>
                    <DialogTitle>Editer l'utilisateur</DialogTitle>
                </DialogHeader>


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
			</DialogContent>
		</Dialog>
	);

	function onSubmit(formData: zod.infer<typeof userFormSchema>) {
		
		router.put(
			`/utilisateurs/${user.id}`,
			formData,
		);
	}
}

export default EditUser
