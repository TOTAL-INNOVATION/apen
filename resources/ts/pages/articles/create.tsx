import React from "react";
import { Head, Link } from "@inertiajs/react";
import {
    Breadcrumb,
    BreadcrumbList,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbSeparator,
} from "~/components/ui/breadcrumb";
import App from "~/layouts/app";
import RichEditor from "~/components/ui/rich-editor";
import zod from "~/lib/zod";
import zodFile from "~/lib/zod/custom";
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
import { Input } from "~/components/ui/input";
import ImageInput from "~/components/ui/image-input";

const articleSchema = zod.object({
    title: zod.string().min(5).max(50),
    cover: zodFile(),
    content: zod.string().min(5),
});

function Create() {
    const form = useForm<zod.infer<typeof articleSchema>>({
        resolver: zodResolver(articleSchema),
        defaultValues: {
            title: "",
            cover: undefined,
            content: "",
        },
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
                            <span className="font-franklin-medium">
                                Ajouter
                            </span>
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
                    <Form {...form}>
                        <form onSubmit={form.handleSubmit(onSubmit)}>
                            <FormField
                                control={form.control}
                                name="title"
                                render={({ field }) => (
                                    <FormItem>
                                        <FormLabel>Titre</FormLabel>
                                        <FormControl>
                                            <Input
                                                placeholder="Entrez le titre de l'article"
                                                {...field}
                                            />
                                        </FormControl>
                                        <FormMessage />
                                    </FormItem>
                                )}
                            />

                            <FormField
                                control={form.control}
                                name="cover"
                                render={({ field }) => (
                                    <FormItem>
                                        <FormLabel>Image de couverture</FormLabel>
                                        <FormControl>
                                            <ImageInput
                                                {...field}
                                            />
                                        </FormControl>
                                        <FormMessage />
                                    </FormItem>
                                )}
                            />
                        </form>
                    </Form>
                    
                    <div className="mb-2 sm:mb-4">
                        <RichEditor label="Contenu de l'article" />
                    </div>
                </div>
            </div>
        </div>
    );

    function onSubmit(formData: zod.infer<typeof articleSchema>) {}
}

//@ts-ignore
Create.layout = (page) => <App children={page} />;

export default Create;
