import { toast } from "~/components/toast";
import {
    Breadcrumb,
    BreadcrumbList,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbSeparator,
} from "~/components/ui/breadcrumb";
import { DataTable } from "~/components/ui/datatable";
import App from "~/layouts/app";
import { PaginationData, FlashMessage, ExpertSearch } from "~/types";
import { Head, Link, usePage } from "@inertiajs/react";
import React, { useEffect } from "react";
import expertSearchesColumns from "~/components/columns/expert-searches";

type PageProps = {
    expert_searches: PaginationData<ExpertSearch>;
    flash: FlashMessage|null;
};

function ExpertSearches() {

    const pageProps = usePage<PageProps>();
    const { expert_searches, flash } = pageProps.props;
    const { data, meta } = expert_searches;
    
    useEffect(() => {
        if (flash) {
            toast(flash);
        }
    }, [flash]);

    return (
		<div>
			<Head>
				<title>Recherches d'expert</title>
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
                            <span className="font-franklin-medium">Recherches d'expert</span>
                        </BreadcrumbItem>
                    </BreadcrumbList>
                </Breadcrumb>
            </div>

			<div className="mt-6">
				<DataTable<ExpertSearch>
                    columns={expertSearchesColumns}
                    data={data}
                    meta={meta}
                    emptyMessage="Aucune recherche disponible"
                />
			</div>
		</div>
	);
}

//@ts-ignore
ExpertSearches.layout = (page) => <App children={page} />;

export default ExpertSearches;
