import React from "react";
import { User } from "~/types";
import { Column } from "../ui/datatable";
import DeleteUser from "./actions/deleteUser";
import EditUser from "./actions/editUser";

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
		format(row) {
			return (
			<div>
				<img
					src={`${row.avatar}`}
					alt={row.fullname}
					className="inline-block size-[35px] rounded-full ring-1 ring-primary ring-offset-1 ring-offset-transparent"
				/>
			</div>
			);
		},
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
					<EditUser user={row} />
				</div>
			);
		},
	}
]

export default userColumns;
