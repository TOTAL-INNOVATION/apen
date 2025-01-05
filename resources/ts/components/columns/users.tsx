import React from "react";
import { User } from "~/types";
import { Column } from "../ui/datatable";
import DeleteUser from "./actions/deleteUser";
import EditUser from "./actions/editUser";

const userColumns: Column<User>[] = [
	{
		label: "Nom",
		name: "lastname",
		sortable: true,
	},
	{
		label: "Prénom",
		name: "firstname",
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
		label: "Actions",
		name: "id",
		format(row) {
			return (
				<div className="flex items-center space-x-4">
					<EditUser user={row} />
					<DeleteUser user={row} />
				</div>
			);
		},
	},
]

export default userColumns;
