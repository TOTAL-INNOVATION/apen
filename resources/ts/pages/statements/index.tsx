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
import { PaginationData, FlashMessage, Statement } from "~/types";
import { Head, Link, usePage } from "@inertiajs/react";
import { Newspaper } from "lucide-react";
import React, { useEffect } from "react";
import statementsColumns from "~/components/columns/statements";

type PageProps = {
    statements: PaginationData<Statement>;
    flash: FlashMessage|null;
};

function Index() {

    const pageProps = usePage<PageProps>();
    const { statements, flash } = pageProps.props;
    const { data, meta } = statements;
    
    useEffect(() => {
        if (flash) {
            toast(flash);
        }
    }, [flash]);

    return (
		<div>
			<Head>
				<title>Communiqués</title>
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
                            <span className="font-franklin-medium">Communiqués</span>
                        </BreadcrumbItem>
                    </BreadcrumbList>
                </Breadcrumb>
            </div>

			<div className="mt-6">
                <div className="sm:flex sm:items-center sm:justify-between">
                    <h3 className="heading-3 uppercase">Liste des communiques</h3>
                    <Button className="mt-2 sm:mt-0" asChild>
                        <Link href="/communiques/create">
                            <Newspaper className="w-5 h-5" />
                            <strong>Nouveau communiqué</strong>
                        </Link>
                    </Button>
                </div>
				<DataTable<Statement>
                    columns={statementsColumns}
                    data={data}
                    meta={meta}
                    emptyMessage="Aucun communiqué disponible"
                />
			</div>
		</div>
	);
}

//@ts-ignore
Index.layout = (page) => <App children={page} />;

export default Index;
