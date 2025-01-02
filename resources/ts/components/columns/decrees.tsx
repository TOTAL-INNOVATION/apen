import React from "react";
import { Decree } from "~/types";
import { Column } from "../ui/datatable";
import EditDecree from "./actions/editDecree";
import { Download } from "lucide-react";
import { Button } from "../ui/button";
import DeleteDecree from "./actions/deleteDecree";

const decreesColumns: Column<Decree>[] = [
	{
		name: "name",
		label: "Nom",
		sortable: true,
	},
	{
		name: "doc_path",
		label: "Télécharger",
		format(row) {
			return (
				<div className="w-fit mx-auto">
					<Button size="sm" variant="outline" asChild>
						<a href={row.doc_path} target="_blank">
							<Download className="w-[18px] h-[18px] stroke-warning" />
						</a>
					</Button>
				</div>
			);
		},
	},
	{
		name: "id",
		label: "Actions",
		format(row) {
			return (
				<div className="flex items-center space-x-4">
					<EditDecree decree={row} />
					<DeleteDecree decree={row} />
				</div>
			);
		},
	}
];

export default decreesColumns;
