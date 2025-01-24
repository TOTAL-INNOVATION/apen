import React from "react";
import { Column } from "../ui/datatable";
import { ExpertSearch } from "~/types";
import DeleteExpertSearch from "./actions/deleteExpertSearch";
import { Button } from "../ui/button";

const expertSearchesColumns: Column<ExpertSearch>[] = [
	{
		name: "structure",
		label: "Structure",
		sortable: true,
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
	},
	{
		name: "address",
		label: "Adresse",
		format(row) {
			return (
				<div className="w-[100px] text-wrap">
					{row.address}
				</div>
			);
		},
	},
	{
		name: "expert_domain",
		label: "Domaine de l'expert"
	},
	{
		name: "marked_as_read",
		label: "Statut",
		sortable: true,
		format(row) {
			return (
				<div className="font-semibold">
					{row.marked_as_read ? "Lu" : "Non lu"}
				</div>
			);
		},
	},
	{
		name: "id",
		label: "Actions",
		format(row) {
			return (
				<div>
					<DeleteExpertSearch expertSearch={row} />
				</div>
			);
		},
	}
];

export default expertSearchesColumns;
