import React from "react";
import { Column } from "../ui/datatable";
import { Subscriber } from "~/types";
import DeleteSubscriber from "./actions/deleteSubscriber";

const subscribersColumns: Column<Subscriber>[] = [
    {
        name: "email",
        label: "Adresse email",
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
        name: "id",
        label: "Action",
        format(row) {
            return <DeleteSubscriber subscriber={row} />;
        },
    },
];

export default subscribersColumns;
