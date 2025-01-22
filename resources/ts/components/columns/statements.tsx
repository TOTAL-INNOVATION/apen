import React from "react";
import { Column } from "../ui/datatable";
import { Statement } from "~/types";
import { Button } from "../ui/button";
import { Link } from "@inertiajs/react";
import { Pen } from "lucide-react";
import DeleteStatement from "./actions/deleteStatement";

const statementsColumns: Column<Statement>[] = [
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
        name: "published_at",
        label: "Publié le",
        sortable: true,
        format(row) {
            return <div>{new Date(row.published_at).toLocaleDateString()}</div>;
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
                    <Button
                        size="sm"
                        variant="outline"
                        className="rounded-full"
                        asChild
                    >
                        <Link href={`/communiques/${row.id}/edit`}>
                            <Pen className="w-4 h-4" />
                        </Link>
                    </Button>
                    <DeleteStatement statement={row} />
                </div>
            );
        },
    },
];

export default statementsColumns;
