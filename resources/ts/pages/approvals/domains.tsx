import React from "react";
import { Domain } from "~/types";
import { Card, CardContent, CardHeader, CardTitle } from "~/components/ui/card";
import { generateUuid } from "~/lib/utils";

export default function Domains({ domains }: { domains: Domain[] }) {
    return (
        <Card>
            <CardHeader className="sm:p-4 border-b border-whisper">
                <CardTitle className="heading-3 uppercase">
                    Domaines et sous domaines
                </CardTitle>
            </CardHeader>
            <CardContent className="px-4 py-2 sm:p-4 space-y-4">
                {domains.map((domain) => (
                    <div
                        className="p-2 w-full bg-whisper/30 border border-whisper/50"
                        key={generateUuid()}
                    >
                        <div className="p-1">
                            <span className="font-semibold">Nom: </span>
                            <span>{domain.type}</span>
                        </div>

                        <div className="p-1">
                            <span className="font-semibold">
                                Sous-domaine 1:{" "}
                            </span>
                            <span>{domain.first_subdomain}</span>
                        </div>

                        <div className="p-1">
                            <span className="font-semibold">
                                Sous-domaine 2:{" "}
                            </span>
                            <span>
                                {domain.second_subdomain ?? "Non défini"}
                            </span>
                        </div>

                        <div className="p-1">
                            <span className="font-semibold">
                                Sous-domaine 2:{" "}
                            </span>
                            <span>
                                {domain.third_subdomain ?? "Non défini"}
                            </span>
                        </div>
                    </div>
                ))}
            </CardContent>
        </Card>
    );
}
