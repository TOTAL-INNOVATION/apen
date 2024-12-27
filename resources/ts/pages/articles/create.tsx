import React, { useState } from "react";
import { Head, Link } from "@inertiajs/react";
import {
    Breadcrumb,
    BreadcrumbList,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbSeparator,
} from "~/components/ui/breadcrumb";
import App from "~/layouts/app";
import useForm from "~/components/ui/form";
import { Editable, Slate, withReact } from "slate-react";
import { createEditor } from "slate";
import RichEditor from "~/components/ui/rich-editor";

function Create() {
    const { data, setData, Form, FormField } = useForm<{
        title: string;
        cover: File | null;
        content: string;
    }>({
        title: "",
        cover: null,
        content: "",
    });

    return (
        <div>
            <Head>
                <title>Nouvel article</title>
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
                                <Link href="/articles">Articles</Link>
                            </BreadcrumbLink>
                        </BreadcrumbItem>
                        <BreadcrumbSeparator />
                        <BreadcrumbItem>
                            <span className="font-franklin-medium">Ajouter</span>
                        </BreadcrumbItem>
                    </BreadcrumbList>
                </Breadcrumb>
            </div>

            <div className="mt-4 md:mt-6 lg:mt-8 article-container">
                <h2 className="heading-2 uppercase">Nouvel article</h2>
                <div className="mt-4 md:mt-6 lg:mt-8">
                    <div className="mb-4">
                        <p>
                            <span className="font-franklin-medium">Note:</span>{" "}
                            <span>Tous les champs sont obligatoires</span>
                        </p>
                    </div>
                    <Form asChild>
                        <div>
                            <FormField
                                label="Titre"
                                name="title"
                                placeholder="Entrez le titre de l'article"
                                required
                            />

                            <FormField
                                label="Image de couverture"
                                name="cover"
                                elementType="image"
                                required
                            />
                            <div className="mb-2 sm:mb-4">
                                <RichEditor label="Contenu de l'article" />
                            </div>
                        </div>
                    </Form>
                </div>
            </div>
        </div>
    );
}

//@ts-ignore
Create.layout = (page) => <App children={page} />;

export default Create;
