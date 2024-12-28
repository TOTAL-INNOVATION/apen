import React from "react";
import { User } from "~/types";
import { Column } from "../ui/datatable";
import DeleteUser from "./actions/deleteUser";

const userColumns: Column<User>[] = [
	{
		label: "Nom",
		name: "firstname",
		sortable: true,
	},
	{
		label: "Prénom",
		name: "lastname",
		sortable: true,
	},
	{
		label: "Adresse email",
		name: "email",
		sortable: true,
	},
	{
		label: "Avatar",
		name: "avatar",
	},
	{
		label: "Rôle",
		name: "role",
		sortable: true,
	},
	{
		label: "Actions",
		name: "id",
		format(row) {
			return (
				<div className="flex items-center space-x-4">
					<DeleteUser user={row} />
				</div>
			);
		},
	}
]

export default userColumns;
