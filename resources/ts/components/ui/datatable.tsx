import React, { useEffect, useState } from "react";
import { Input } from "./input";
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from "./table";
import { cn, debounce, generateUuid, str } from "~/lib/utils";
import clsx from "clsx";
import { PaginationLink, PaginationMeta } from "~/types";
import { Button } from "./button";
import { Link, router } from "@inertiajs/react";
import { ChevronLeft, ChevronRight } from "lucide-react";
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from "./select";

export interface Column<T> {
    name: keyof T;
    label?: string;
    sortable?: boolean;
    format?: (row: T) => React.ReactElement | string | number;
}

export interface DataTable<T extends Record<string, any>> {
    columns: Column<T>[];
    data: T[];
    searchPlaceholder?: string;
    emptyMessage?: string;
    meta?: PaginationMeta;
    bordered?: boolean;
}

const SortArrow = ({ className }: { className?: string }) => {
    return (
        <span
            className={clsx(
                "w-0 h-0 border-[4px] border-transparent border-t-rainee",
                className
            )}
        ></span>
    );
};

export const DataTable = <T extends Record<string, any>>({
    columns,
    data,
    searchPlaceholder,
    emptyMessage = "Aucun élément disponible",
    meta,
    bordered = false,
}: DataTable<T>) => {

    const [activeLink, setActiveLink] = useState<null|PaginationLink>(null);
    const [length, setLength] = useState<string>("15");

    useEffect(() => {
        if (meta) {
            setActiveLink(
                meta.links.find(link => link.active) || null
            );
        }

        if (location.search) {
            const params = new URLSearchParams(location.search);
            const length = params.get("length")
            if (length) {
                setLength(length);
            }
        }
    }, [length, meta, setLength]);

    return (
        <div className="px-1 py-3 space-y-3">
            <div>
                <Input
                    size="sm"
                    placeholder={searchPlaceholder || "Rechercher"}
                    className="max-w-64 text-base"
                    onChange={handleSearch}
                />
            </div>
            <div
                className={clsx({
                    "border border-whisper overflow-hidden":
                        bordered,
                })}
            >
                <Table>
                    <TableHeader>
                        <TableRow
                            className={clsx({ "rounded-t-lg": bordered })}
                        >
                            {columns.map((column) => {
                                const label =
                                    column.label ??
                                    str(column.name as string).ucFirst();
                                return (
                                    <TableHead className="text-nowrap" key={generateUuid()}>
                                        {column.sortable ? (
                                            <Button
                                                size="sm"
                                                variant="outline"
                                                className="inline-flex items-center text-base mx-auto bg-transparent border-0 rounded-md hover:bg-whisper"
                                                onClick={() =>
                                                    handleSort(
                                                        column.name as string
                                                    )
                                                }
                                            >
                                                <strong>{label}</strong>
                                                <span className="ml-1.5 flex flex-col space-y-1">
                                                    <SortArrow className="rotate-180" />
                                                    <SortArrow />
                                                </span>
                                            </Button>
                                        ) : (
                                            <strong>{label}</strong>
                                        )}
                                    </TableHead>
                                );
                            })}
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        {data.length ? (
                            data.map((row) => (
                                <TableRow key={row.id || generateUuid()}>
                                    {columns.map((column) => (
                                        <TableCell className="text-nowrap" key={generateUuid()}>
                                            {column.format
                                                ? column.format(row)
                                                : (column.sortable ? (
                                                    <div className="px-3">
                                                        {row[column.name]}
                                                    </div>
                                                ) : row[column.name]) || "-"}
                                        </TableCell>
                                    ))}
                                </TableRow>
                            ))
                        ) : (
                            <TableRow>
                                <TableCell colSpan={columns.length}>
                                    <div className="py-4 text-center text-dark">
                                        {emptyMessage}
                                    </div>
                                </TableCell>
                            </TableRow>
                        )}
                    </TableBody>
                </Table>
            </div>
            <div className="px-2 flex items-end sm:items-center justify-between sm:justify-end space-x-4 md:space-x-6">
                <div className="sm:inline-flex items-center space-y-4 sm:space-y-0 sm:space-x-2">
                    <p>
						<strong>Ligne par page</strong>
					</p>
                    <Select
                        onValueChange={handleRecordsLength}
                        defaultValue={length}
                        >
                        <SelectTrigger className="w-20">
                            <SelectValue placeholder="Sélectionner le rôle" />
                        </SelectTrigger>
                        <SelectContent className="min-w-20">
                            {["10", "15", "30"].map((value) => (
                                <SelectItem value={value} key={generateUuid()}>
                                    {value}
                                </SelectItem>
                            ))}
                        </SelectContent>
                    </Select>
                </div>

                {meta && (
                    <div className="flex flex-col sm:flex-row items-center gap-4">
                        <p>
                            <strong>
								Page {meta.current_page} sur {meta.last_page}
							</strong>
                        </p>

                        <div className="flex items-center space-x-2">
                            <Button
                                size="sm"
                                variant="outline"
                                disabled={!meta.links[0].url}
                                className="px-2"
                                asChild
                            >
                                <Link
                                    href={meta.links[0].url || "#"}
                                    className={cn({
                                        "opacity-50 pointer-events-none":
                                            !meta.links[0].url,
                                    })}
                                >
                                    <ChevronLeft className="stroke-1 w-5 h-5" />
                                </Link>
                            </Button>

                            <Button
                                size="sm"
                                variant="outline"
                                className="p-0 w-[38px] h-[38px]"
                                asChild
                            >
                                <Link href={activeLink?.url || "#"}>
                                    <strong>{activeLink?.label}</strong>
                                </Link>
                            </Button>

                            <Button
                                size="sm"
                                variant="outline"
                                disabled={!meta.links[meta.links.length - 1].url}
                                className="px-2 text-sm"
                                asChild
                            >
                                <Link
                                    href={meta.links[meta.links.length - 1].url || "#"}
                                    className={cn({
                                        "opacity-50 pointer-events-none":
                                            !meta.links[meta.links.length - 1].url,
                                    })}
                                >
                                    <ChevronRight className="stroke-1 w-5 h-5" />
                                </Link>
                            </Button>
                        </div>
                    </div>
                )}
            </div>
        </div>
    );

    function handleSort(columnName: string) {
        const params = new URLSearchParams(location.search);
        if (params.get('sort_by') !== columnName)
        {
            params.set('sort_by', columnName);
            params.set('sort_order', 'desc');

        } else if (params.get('sort_order') === 'desc')
            params.set('sort_order', 'asc');
        else
            params.set('sort_order', 'desc');        
        
        router.get(
            window.location.href,
            Object.fromEntries(params.entries()),
            { preserveState: true, replace: true }
        )
    }

    function handleRecordsLength(length: string) {
        const params = new URLSearchParams(location.search);
        params.set('length', length);
        router.get(
            window.location.href,
            Object.fromEntries(params.entries()),
            { preserveState: true, replace: true }
        );
    }

    function handleSearch(event: React.ChangeEvent<HTMLInputElement>) {
        const target = event.target;

        const url = window.location.href;

        debounce((query: string) => {
            router.get(
                url,
                { q: query },
                { preserveState: true, replace: true }
            );
        })(target.value);
    }
};
