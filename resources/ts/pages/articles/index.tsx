import articlesColumns from "~/components/columns/articles";
import { toast } from "~/components/toast";
import {
    Breadcrumb,
    BreadcrumbList,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbSeparator,
} from "~/components/ui/breadcrumb";
import { Button } from "~/components/ui/button";
import { DataTable } from "~/components/ui/datatable";
import App from "~/layouts/app";
import { PaginationData, Article } from "~/types";
import { Head, Link, usePage } from "@inertiajs/react";
import { Newspaper } from "lucide-react";
import React, { useEffect } from "react";

function Index() {

	const tableData = usePage().props.articles as PaginationData<Article>;
    const successMessage = usePage().props.success as null | string;
    const { data, meta } = tableData;

    useEffect(() => {
        if (successMessage) {
            toast({
                message: successMessage,
            });
        }
    }, [successMessage]);

    return (
		<div>
			<Head>
				<title>Articles</title>
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
                            <strong>Articles</strong>
                        </BreadcrumbItem>
                    </BreadcrumbList>
                </Breadcrumb>
            </div>

			<div className="mt-6">
                <div className="sm:flex sm:items-center sm:justify-between">
                    <h3 className="heading-3 uppercase">Liste des articles</h3>
                    <Button className="mt-2 sm:mt-0" asChild>
                        <Link href="/articles/create">
                            <Newspaper className="w-5 h-5" />
                            <strong>Nouvel article</strong>
                        </Link>
                    </Button>
                </div>
				<DataTable<Article>
                    columns={articlesColumns}
                    data={data}
                    meta={meta}
                    emptyMessage="Aucun article disponible"
                />
			</div>
		</div>
	);
}

//@ts-ignore
Index.layout = (page) => <App children={page} />;

export default Index;
