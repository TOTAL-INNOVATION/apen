import React, { useEffect } from "react";
import { Head, Link, usePage } from "@inertiajs/react";
import App from "~/layouts/app";
import {
    Breadcrumb,
    BreadcrumbList,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbSeparator,
} from "~/components/ui/breadcrumb";
import { Button } from "~/components/ui/button";
import { UserPlus2 } from "lucide-react";
import { PaginationData, User } from "~/types";
import { toast } from "~/components/toast";
import userColumns from "~/components/columns/users";
import { DataTable } from "~/components/ui/datatable";

export function Index() {

	const tableData = usePage().props.users as PaginationData<User>;
		const successMessage = usePage().props.success as null | string;
		const { data, meta } = tableData;
	
		useEffect(() => {
			if (successMessage) {
				toast({
					message: successMessage,
				});
			}
		}, [successMessage]);

	return(
		<div>
			<Head>
				<title>Utilisateur</title>
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
                            <strong>Utilisateurs</strong>
                        </BreadcrumbItem>
                    </BreadcrumbList>
                </Breadcrumb>
            </div>

			<div className="mt-6">
                <div className="sm:flex sm:items-center sm:justify-between">
                    <h3 className="heading-3 uppercase">Liste des utilisateurs</h3>
                    <Button className="mt-2 sm:mt-0" asChild>
                        <Link href="/utilisateurs/create">
                            <UserPlus2 className="w-5 h-5" />
                            <strong>Nouvel utilisateur</strong>
                        </Link>
                    </Button>
                </div>
				<DataTable<User>
                    columns={userColumns}
                    data={data}
                    meta={meta}
                    emptyMessage="Aucun utilisateur disponible"
                />

			</div>
		</div>
	);
}

//@ts-ignore
Index.layout = (page) => <App children={page} />

export default Index;
