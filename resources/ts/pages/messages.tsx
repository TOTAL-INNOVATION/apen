import { Head, Link, usePage } from "@inertiajs/react";
import React, { useEffect } from "react";
import App from "~/layouts/app";
import {
    Breadcrumb,
    BreadcrumbList,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbSeparator,
} from "~/components/ui/breadcrumb";
import { FlashMessage, Message, PaginationData } from "~/types";
import { toast } from "~/components/toast";
import { DataTable } from "~/components/ui/datatable";
import messageColumns from "~/components/columns/messages";

type PageProps = {
	messages: PaginationData<Message>;
	flash: FlashMessage|null;
};

function Index() {
	
		const { messages, flash } = usePage<PageProps>().props;
		const { data, meta } = messages;
		
		useEffect(() => {
			if (flash) {
				toast(flash);
			}
		}, [flash]);

	return (
		<div>
			<Head>
				<title>Messages</title>
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
                            <span className="font-franklin-medium">Messages</span>
                        </BreadcrumbItem>
                    </BreadcrumbList>
                </Breadcrumb>
            </div>

			<div className="mt-6">
                <div className="sm:flex sm:items-center sm:justify-between">
                    <h3 className="heading-3 uppercase">Messages</h3>
				</div>

				<DataTable<Message>
                    columns={messageColumns}
                    data={data}
                    meta={meta}
                    emptyMessage="Aucun message disponible"
                />

			</div>
		</div>
	);
}

//@ts-ignore
Index.layout = page => <App children={page} />;

export default Index;
