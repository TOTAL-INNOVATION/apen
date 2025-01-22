import React from "react";
import { Column } from "../ui/datatable";
import { FlashInfo } from "~/types";
import { cn, str } from "~/lib/utils";
import DeleteInfo from "./actions/deleteInfo";
import EditInfo from "./actions/editInfo";

const flashInfoColumns: Column<FlashInfo>[] = [
	{
		name: "title",
		label: "Titre",
		format(row) {
            return (
                <div className="w-full max-w-48 md:max-w-[300px] lg:max-w-[400px] overflow-hidden text-ellipsis">
                    {row.title}
                </div>
            );
        },
	},
	{
		name: "active",
		label: "Statut",
		format(row) {
			const status = row.active;

			return (
				<div
					className={cn(
						"w-fit py-1 px-2 text-sm font-franklin-medium border-2 rounded-full",
						{
							"text-success border-success": status,
							"text-error border-error": !status,
						}
					)}
				>
					{status ? "Active" : "Inactive"}
				</div>
			);
		},
	},
	{
        name: "created_at",
        label: "Ajouté le",
		sortable: true,
        format(row) {
            return <div>{new Date(row.created_at).toLocaleDateString()}</div>;
        },
    },
    {
        name: "updated_at",
        label: "Modifié le",
		sortable: true,
        format(row) {
            return <div>{new Date(row.updated_at).toLocaleDateString()}</div>;
        },
    },
	{
		name: "id",
		label: "Actions",
		format(row) {
			return (
				<div className="flex items-center space-x-4">
					<EditInfo info={row} />
					<DeleteInfo info={row} />
				</div>
			);
		},
	}
];

export default flashInfoColumns;
