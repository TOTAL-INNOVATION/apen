import React from "react";
import { Certificate } from "~/types";
import { Card, CardContent, CardHeader, CardTitle } from "~/components/ui/card";
import { generateUuid } from "~/lib/utils";

export default function Certificates({
    certificates,
}: {
    certificates: Certificate[];
}) {
    return (
        <Card>
            <CardHeader className="sm:p-4 border-b border-whisper">
                <CardTitle className="heading-3 uppercase">
                    Certificats/Attestations
                </CardTitle>
            </CardHeader>
            <CardContent className="px-4 py-2 sm:p-4 space-y-4">
                {certificates.map((certificate) => (
                    <div
                        className="p-2 w-full bg-whisper/30 border border-whisper/50"
                        key={generateUuid()}
                    >
                        <div className="p-1">
                            <span className="font-semibold">Thème: </span>
                            <span>{certificate.subject}</span>
                        </div>

                        <div className="p-1">
                            <span className="font-semibold">
                                Date de début:{" "}
                            </span>
                            <span>
                                {new Date(
                                    certificate.starts_at
                                ).toLocaleDateString()}
                            </span>
                        </div>

                        <div className="p-1">
                            <span className="font-semibold">Date de fin: </span>
                            <span>
                                {new Date(
                                    certificate.ends_at
                                ).toLocaleDateString()}
                            </span>
                        </div>

                        <div className="p-1">
                            <span className="font-semibold">
                                Lieu de formation:{" "}
                            </span>
                            <span>{certificate.location}</span>
                        </div>

                        <div className="p-1">
                            <span className="font-semibold">
                                Structure/Organisme formateur(trice):{" "}
                            </span>
                            <span>{certificate.trainer_name}</span>
                        </div>
                    </div>
                ))}
            </CardContent>
        </Card>
    );
}
