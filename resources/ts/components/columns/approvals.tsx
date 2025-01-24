import React from "react";
import { Column } from "../ui/datatable";
import { Approval, ApprovalStatus } from "~/types";
import { cn } from "~/lib/utils";
import DeleteApproval from "./actions/deleteApproval";
import { Button } from "../ui/button";
import { Eye } from "lucide-react";
import { Link } from "@inertiajs/react";


const Status = ({value}: {value: ApprovalStatus}) => {
	const apparences: Record<typeof value, string> = {
		"En cours": "background-whisper/10 text-dark/75 border-rainee",
		"En attente de paiement": "background-chocolate/15 text-chocolate border-chocolate",
		"En attente de validation": "background-viridian/10 text-viridian border-viridian",
		"Rejétée": "background-error/10 text-secondary border-error",
		"Réçu et validée": "background-success/10 text-primary/75 border-success",
	};

	return (
		<div className={cn("w-fit p-1 font-semibold border-[1.5px]", apparences[value])}>
			{value}
		</div>
	);
}

const approvalsColumns: Column<Approval>[] = [
	{
		name: "type",
		label: "Type",
		sortable: true,
		format(row) {
			return <span className="font-franklin-medium">
				{row.type}
			</span>
		},
	},
	{
		name: "status",
		label: "Statut",
		sortable: true,
		format: (row) => <Status value={row.status} />
	},
	{
		name: "id",
		label: "Auteur",
		format(row) {
			return (
				<div className="max-w-48 text-wrap">
					{row.user.fullname}
				</div>
			)
		},
	},
	{
		name: "geographic_region",
		label: "Région géographique",
		sortable: true,
	},
	{
		name: "id",
		label: "Actions",
		format(row) {
			return (
				<div className="flex items-center space-x-4">
					
					<Button
                        size="sm"
                        variant="outline"
                        className="rounded-full"
                        asChild
                    >
                        <Link href={`/demandes-d-agrement/${row.id}`}>
                            <Eye className="w-[18px] h-[18px]" />
                        </Link>
                    </Button>

					<DeleteApproval approval={row} />

				</div>
			);
		},
	}
];

export default approvalsColumns;
