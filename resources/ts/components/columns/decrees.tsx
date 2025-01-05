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
        format: (row) => (
            <div className="max-w-48 md:max-w-60 inline-block text-nowrap overflow-hidden text-ellipsis">
                {row.name}
            </div>
        ),
    },
    {
        name: "type",
        label: "Format",
        sortable: true,
        format: (row) => <p className="uppercase md:indent-5">{row.type}</p>,
    },
    {
        name: "size",
        label: "Size",
        sortable: true,
        format: (row) => <span>{row.size} Mo</span>,
    },
    {
        name: "doc_path",
        label: "Télécharger",
        format(row) {
            return (
                <div className="w-full">
                    <Button
                        size="sm"
                        variant="outline"
                        className="px-6 hover:bg-white"
                        asChild
                    >
                        <a href={row.doc_path} target="_blank" download>
                            <Download className="w-6 h-6 stroke-warning" />
                        </a>
                    </Button>
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
                    <EditDecree decree={row} />
                    <DeleteDecree decree={row} />
                </div>
            );
        },
    },
];

export default decreesColumns;
