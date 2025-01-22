import React, { useEffect } from "react";
import { Head, Link, router, usePage } from "@inertiajs/react";
import {
    Breadcrumb,
    BreadcrumbList,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbSeparator,
} from "~/components/ui/breadcrumb";
import App from "~/layouts/app";
import zod from "~/lib/zod";
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
import RichEditor from "~/components/rich-editor";
import { Button } from "~/components/ui/button";
import { setValidationError } from "~/lib/form";
import { FlashMessage, Statement } from "~/types";
import { toast } from "~/components/toast";

type PageProps = {
    statement: { data: Statement };
    flash: FlashMessage | null;
};

const schema = zod.object({
	title: zod.string().min(5).max(255),
	published_at: zod.coerce.date().or(zod.string()),
	content: zod.string().min(5),
});

function Edit() {
    const props = usePage<PageProps>().props;
    const { errors, flash } = props;
    const statement = props.statement.data;

    const form = useForm<zod.infer<typeof schema>>({
        resolver: zodResolver(schema),
        defaultValues: {
            title: statement.title,
            published_at: new Date(statement.published_at),
            content: statement.content ?? "",
        },
    });

    useEffect(() => {
        if (flash) {
            toast(flash);
        }
        if (Object.keys(errors).length) setValidationError(form, errors);
    }, [errors, form, flash]);

    return (
        <div>
            <Head>
                <title>Editer le communiqué</title>
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
                                <Link href="/communiques">Communiqués</Link>
                            </BreadcrumbLink>
                        </BreadcrumbItem>
                        <BreadcrumbSeparator />
                        <BreadcrumbItem>
                            <span className="font-franklin-medium">Editer</span>
                        </BreadcrumbItem>
                    </BreadcrumbList>
                </Breadcrumb>
            </div>

            <div className="mt-4 md:mt-6 lg:mt-8 article-container">
                <h2 className="heading-2 uppercase">Editer le communiqué</h2>
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
                                                placeholder="Entrez le titre du communiqué"
                                                {...field}
                                            />
                                        </FormControl>
                                        <FormMessage />
                                    </FormItem>
                                )}
                            />

                            <FormField
                                control={form.control}
                                name="published_at"
                                render={({ field }) => (
                                    <FormItem>
                                        <FormLabel>Date de publication</FormLabel>
                                        <FormControl>
                                            <Input
                                                type="date"
                                                {...field}
                                                value={
                                                    field.value instanceof Date
                                                        ? field.value
                                                              .toISOString()
                                                              .split("T")[0]
                                                        : field.value
                                                }
                                            />
                                        </FormControl>
                                        <FormMessage />
                                    </FormItem>
                                )}
                            />

                            <FormField
                                control={form.control}
                                name="content"
                                render={({ field }) => (
                                    <FormItem>
                                        <FormLabel>
                                            Contenu du communiqué
                                        </FormLabel>
                                        <FormControl>
                                            <RichEditor
                                                {...field}
                                                placeholder="Contenu du communiqué"
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
            </div>
        </div>
    );

    function onSubmit(formData: zod.infer<typeof schema>) {
        router.put(`/communiques/${statement.id}`, formData);
    }
}

//@ts-ignore
Edit.layout = (page) => <App children={page} />;

export default Edit;
