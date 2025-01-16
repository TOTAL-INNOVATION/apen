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
import { PaginationData, FlashMessage, Subscriber } from "~/types";
import { Head, Link, usePage } from "@inertiajs/react";
import React, { useEffect } from "react";
import subscribersColumns from "~/components/columns/subscribers";

type PageProps = {
    subscribers: PaginationData<Subscriber>;
    flash: FlashMessage|null;
};

function Index() {

    const pageProps = usePage<PageProps>();
    const { subscribers, flash } = pageProps.props;
    const { data, meta } = subscribers;
    
    useEffect(() => {
        if (flash) {
            toast(flash);
        }
    }, [flash]);

    return (
		<div>
			<Head>
				<title>Newsletter</title>
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
                            <span className="font-franklin-medium">Newsletter</span>
                        </BreadcrumbItem>
                    </BreadcrumbList>
                </Breadcrumb>
            </div>

			<div className="mt-6">
                <div>
                    <h3 className="heading-3 uppercase">Liste des communiques</h3>
                </div>
				<DataTable<Subscriber>
                    columns={subscribersColumns}
                    data={data}
                    meta={meta}
                    emptyMessage="Aucune souscription disponible"
                />
			</div>
		</div>
	);
}

//@ts-ignore
Index.layout = (page) => <App children={page} />;

export default Index;
