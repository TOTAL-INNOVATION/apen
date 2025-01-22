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
import { PaginationData, FlashMessage, Approval } from "~/types";
import { Head, Link, usePage } from "@inertiajs/react";
import React, { useEffect } from "react";
import approvalsColumns from "~/components/columns/approvals";

type PageProps = {
    approvals: PaginationData<Approval>;
    flash: FlashMessage|null;
};

function Index() {

    const pageProps = usePage<PageProps>();
    const { approvals, flash } = pageProps.props;
    const { data, meta } = approvals;
    
    useEffect(() => {
        if (flash) {
            toast(flash);
        }
    }, [flash]);

    return (
		<div>
			<Head>
				<title>Demandes d'agrément</title>
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
                            <span className="font-franklin-medium">Demandes d'agrément</span>
                        </BreadcrumbItem>
                    </BreadcrumbList>
                </Breadcrumb>
            </div>

			<div className="mt-6">
				<DataTable<Approval>
                    columns={approvalsColumns}
                    data={data}
                    meta={meta}
                    emptyMessage="Aucune demande disponible"
                />
			</div>
		</div>
	);
}

//@ts-ignore
Index.layout = (page) => <App children={page} />;

export default Index;
