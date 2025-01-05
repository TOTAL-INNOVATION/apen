import React from "react";
import { Message } from "~/types";
import { Column } from "../ui/datatable";
import { cn } from "~/lib/utils";
import ReadMessage from "./actions/readMessage";
import DeleteMessage from "./actions/deleteMessage";
import MarkAsRead from "./actions/markAsRead";

const messageColumns: Column<Message>[] = [
    {
        label: "Sujet",
        name: "subject",
        format(row) {
            return (
                <div className="max-w-32 inline-block text-nowrap overflow-hidden text-ellipsis">
                    {row.subject}
                </div>
            );
        },
    },
    {
        label: "Nom",
        name: "id",
        format: (row) => (
            <p>
                {row.firstname} {row.lastname}
            </p>
        ),
    },
    {
        label: "Adresse email",
        name: "email",
        sortable: true,
    },
    {
        label: "Statut",
        name: "marked_as_read",
        sortable: true,
        format(row) {
            const status = row.marked_as_read;

            return (
                <div
                    className={cn(
                        "w-fit py-1 px-2 text-sm font-franklin-medium border-2 rounded-full",
                        {
                            "text-success border-success ml-5": status,
                            "text-error border-error": !status,
                        }
                    )}
                >
                    {status ? "Lu" : "Non lu"}
                </div>
            );
        },
    },
    {
        name: "created_at",
        label: "Envoyé le",
        sortable: true,
        format(row) {
            return <div>{new Date(row.created_at).toLocaleDateString()}</div>;
        },
    },
    {
        name: "id",
        label: "Actions",
        format(row) {
            return (
                <div className="flex items-center space-x-4">
                    {!row.marked_as_read ? (
                        <MarkAsRead messageId={row.id} />
                    ) : null}
                    <ReadMessage message={row} />
                    <DeleteMessage message={row} />
                </div>
            );
        },
    },
];

export default messageColumns;
