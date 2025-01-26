import { Head, Link, router, usePage } from "@inertiajs/react";
import { ArchiveRestore, Check, X } from "lucide-react";
import React, { useEffect } from "react";
import { toast } from "~/components/toast";
import {
    Breadcrumb,
    BreadcrumbList,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbSeparator,
} from "~/components/ui/breadcrumb";
import { Button } from "~/components/ui/button";
import App from "~/layouts/app";
import { Approval, FlashMessage } from "~/types";
import GeneralInfo from "./generalInfo";
import AuthorInfo from "./authorInfo";
import AuthorAddresses from "./authorAddresses";
import Degree from "./degree";
import Trainings from "./trainings";
import Society from "./society";
import Certificates from "./certificates";
import Domains from "./domains";
import Attachments from "./attachments";
import { cn } from "~/lib/utils";

enum Status {
	SUBMITTED = "En attente de validation",
	VALIDATED = "Réçu et validée",
	REJECTED = "Rejétée",
};

type PageProps = {
	approval: {data: Approval};
	flash: FlashMessage;
};

function Show() {

	const {approval, flash} = usePage<PageProps>().props;
	const data = approval.data;
	const {user, degree, trainings, certificates, domains, attachments} = data;

	useEffect(() => {
		
		if (flash) {
			toast(flash);
		}
	}, [flash]);

	return (
		<div>
			<Head>
				<title>{`Agrément de ${user.fullname}`}</title>
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
						<BreadcrumbLink asChild>
                                <Link href="/demandes_d_agrement">Demandes d'agrément</Link>
                            </BreadcrumbLink>
                        <BreadcrumbSeparator />
                        <BreadcrumbItem>
                            <span className="font-franklin-medium">Detail</span>
                        </BreadcrumbItem>
                    </BreadcrumbList>
                </Breadcrumb>
			</div>

			<div className="mt-6">
				<div className="py-2 sm:py-4 w-full md:flex md:items-center md:justify-between">

					<div className="mb-2 md:mb-0 text-lg font-semibold uppercase">
						<span>Status: </span>
						<span className={cn("text-primary", {"text-error": data.status === Status.REJECTED})}>{data.status}</span>
					</div>

					{data.status === "En attente de validation" && (
						<div className="flex p-2 sm:space-x-4">
						<Button variant="error" onClick={() => changeStatus(Status.REJECTED)}>
							<X className="w-5 h-5" />
							<span className="font-semibold">Rejéter</span>
						</Button>

						<Button variant="success" onClick={() => changeStatus(Status.VALIDATED)}>
							<Check className="w-5 h-5" />
							<span className="font-semibold">Valider</span>
						</Button>
					</div>
					)}

					{data.status === Status.REJECTED || data.status === Status.VALIDATED && (
						<div>
							<Button variant="success" onClick={() => changeStatus(Status.SUBMITTED)}>
								<ArchiveRestore className="w-5 h-5" />
								<span className="font-semibold">Reconsidérer</span>
							</Button>
						</div>
					)}

				</div>

				<div className="grid grid-cols-1 md:grid-cols-2 gap-4">

					<GeneralInfo data={data} />
					<AuthorInfo data={data} />
					<AuthorAddresses data={data} />
					<Degree degree={degree} />
					<Trainings trainings={trainings} />


					{data.type === "Catégorie A" && (
						<Society data={data} />
					)}

					{certificates.length !== 0 && (
						<Certificates certificates={certificates} />
					)}

					<Domains domains={domains} />
					<Attachments attachments={attachments} />
				</div>
			</div>
		</div>
	);

	function changeStatus(status: string) {
		router.put(
			`/demandes-d-agrement/${data.id}`,
			{status}
		)
	}
}

//@ts-ignore
Show.layout = (page) => <App children={page} />;

export default Show;
