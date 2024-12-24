import React from "react";
import { Article } from "~/types";
import { Column } from "../ui/datatable";
import { Button } from "../ui/button";
import { Link } from "@inertiajs/react";
import { Pen } from "lucide-react";
import DeleteArticle from "./actions/deleteArticle";

const articlesColumns: Column<Article>[] = [
    {
        name: "title",
        label: "Titre",
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
                        <Link href={`/products/${row.id}/edit`}>
                            <Pen className="w-4 h-4" />
                        </Link>
                    </Button>
                    <DeleteArticle article={row} />
                </div>
            );
        },
    },
];

export default articlesColumns;
