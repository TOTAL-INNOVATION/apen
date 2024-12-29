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
import { UserRoundPlus } from "lucide-react";
import { FlashMessage, PaginationData, User } from "~/types";
import { toast } from "~/components/toast";
import userColumns from "~/components/columns/users";
import { DataTable } from "~/components/ui/datatable";
import { Dialog, DialogContent, DialogHeader, DialogOverlay, DialogTitle, DialogTrigger } from "~/components/ui/dialog";
import Create from "./create";
import { handleOverlayOpen } from "~/lib/utils";

type PageProps = {
    users: PaginationData<User>;
    flash: FlashMessage|null;
};
export function Index() {

    const pageProps = usePage<PageProps>();
    const { users, flash } = pageProps.props;
    const url = pageProps.url;
    const { data, meta } = users;
	
    useEffect(() => {
        if (flash) {
            toast(flash);
        }
    }, [flash]);

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
                            <span className="font-franklin-medium">Utilisateurs</span>
                        </BreadcrumbItem>
                    </BreadcrumbList>
                </Breadcrumb>
            </div>

			<div className="mt-6">
                <div className="sm:flex sm:items-center sm:justify-between">
                    <h3 className="heading-3 uppercase">Liste des utilisateurs</h3>
                    <Dialog
                        open={url.includes("form=true")}
                        onOpenChange={() => handleOverlayOpen("form=true")}
                    >
                        <DialogTrigger asChild>
                            <Button className="mt-2 sm:mt-0">
                                <UserRoundPlus className="w-5 h-5" />
                                <span className="font-franklin-medium">Nouvel utilisateur</span>
                            </Button>
                        </DialogTrigger>
                        <DialogOverlay>
                            <DialogContent aria-describedby={undefined}>
                                <DialogHeader>
                                    <DialogTitle>Ajouter un utilisateur</DialogTitle>
                                </DialogHeader>
                                <div className="mt-4">
                                    <Create />
                                </div>
                            </DialogContent>
                        </DialogOverlay>
                    </Dialog>
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
