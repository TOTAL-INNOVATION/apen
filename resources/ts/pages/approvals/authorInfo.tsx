import React from "react";
import { Approval } from "~/types";
import { Card, CardContent, CardHeader, CardTitle } from "~/components/ui/card";
import { FileLink } from "~/components/file-link";
import { asset } from "~/lib/utils";

export default function AuthorInfo({ data }: { data: Approval }) {
    const { user } = data;

    return (
        <Card>
            <CardHeader className="sm:p-4 border-b border-whisper">
                <CardTitle className="heading-3 uppercase">
                    Information sur l'auteur
                </CardTitle>
            </CardHeader>

            <CardContent className="p-0 sm:p-0 pb-4">
                <div className="px-4 py-2 text-lg">
                    <span className="font-semibold">Nom complet: </span>
                    <span>{user.fullname}</span>
                </div>

                <div className="px-4 py-2 text-lg">
                    <span className="font-semibold">Date de naissance: </span>
                    <span>{user.birthday}</span>
                </div>

                <div className="px-4 py-2 text-lg">
                    <span className="font-semibold">Lieu de naissance: </span>
                    <span>{user.birthplace}</span>
                </div>

                <div className="px-4 py-2 text-lg">
                    <span className="font-semibold">Genre: </span>
                    <span>{user.gender}</span>
                </div>

                <div className="px-4 py-2 text-lg">
                    <span className="font-semibold">Statut matrimonial: </span>
                    <span>{user.marital_status}</span>
                </div>

                <div className="px-4 py-2 text-lg">
                    <FileLink
                        name="Photo d'identité"
                        url={asset(user.identity_photo as string)}
                    />
                </div>

                <div className="px-4 py-2 text-lg">
                    <FileLink
                        name="Signature"
                        url={asset(data.signature as string)}
                    />
                </div>
            </CardContent>
        </Card>
    );
}
