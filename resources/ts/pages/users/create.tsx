import React, { useState } from "react";
import { Head, Link, router } from "@inertiajs/react";
import {
    Breadcrumb,
    BreadcrumbList,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbSeparator,
} from "~/components/ui/breadcrumb";
import App from "~/layouts/app";
import useForm from "~/components/ui/form";
import { Role } from "~/types";
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "~/components/ui/select";
import { Label } from "~/components/ui/label";
import { Button } from "~/components/ui/button";

type FormDataProps = {
    firstname: string;
    lastname: string;
    email: string;
    role: Role;
};

function Create() {
    const { Form, FormField, data, setData, post } = useForm<FormDataProps>({
        firstname: "",
        lastname: "",
        email: "",
        role: "Expert",
    });

    const setRole = (value: Role) => setData("role", value);

    return (
        <div>
            <Head>
                <title>Nouvel utilisateur</title>
            </Head>

            <div>
                <Breadcrumb>
                    <BreadcrumbList>
                        <BreadcrumbItem>
                            <BreadcrumbLink asChild>
                                <Link href="/panel">Acceuil</Link>
                            </BreadcrumbLink>
                        </BreadcrumbItem>
                        <BreadcrumbSeparator />
                        <BreadcrumbItem>
                            <BreadcrumbLink asChild>
                                <Link href="/utilisateurs">Utilisateurs</Link>
                            </BreadcrumbLink>
                        </BreadcrumbItem>
                        <BreadcrumbSeparator />
                        <BreadcrumbItem>
                            <span className="font-franklin-medium">
                                Ajouter
                            </span>
                        </BreadcrumbItem>
                    </BreadcrumbList>
                </Breadcrumb>
            </div>

            <div className="mt-4 md:mt-6 lg:mt-8 article-container">
                <Form onSubmit={(_) => post("/utilisateurs")}>
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <FormField
                            name="lastname"
                            label="Nom"
                            placeholder="Entrez le nom"
                            required
                        />
                        <FormField
                            name="firstname"
                            label="Prénom"
                            placeholder="Entrez le prénom"
                            required
                        />
                        <FormField
                            name="email"
                            label="Adresse email"
                            placeholder="ex: exemple@gmail.com"
                            required
                        />

                        <div className="mb-2 sm:mb-4">
                            <Label>Rôle</Label>
                            <Select
                                onValueChange={(value) =>
                                    setData("role", value as Role)
                                }
								defaultValue={data.role}
                            >
                                <SelectTrigger className="w-full">
                                    <SelectValue placeholder="Sélectionner le rôle" />
                                </SelectTrigger>
                                <SelectContent>
                                    {(["Admin", "Expert"] as Role[]).map(
                                        (role) => (
                                            <SelectItem value={role} key={role}>
                                                {role}
                                            </SelectItem>
                                        )
                                    )}
                                </SelectContent>
                            </Select>
                        </div>
                    </div>

                    <div className="mt-6 md:mt-8">
                        <Button type="submit">Enrégistrer</Button>
                    </div>
                </Form>
            </div>
        </div>
    );
}

//@ts-ignore
Create.layout = (page) => <App children={page} />;

export default Create;
