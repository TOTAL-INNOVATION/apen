import React from "react";
import { Training } from "~/types";
import { Card, CardContent, CardHeader, CardTitle } from "~/components/ui/card";
import { generateUuid } from "~/lib/utils";

export default function Trainings({ trainings }: { trainings: Training[] }) {
    return (
        <Card>
            <CardHeader className="sm:p-4 border-b border-whisper">
                <CardTitle className="heading-3 uppercase">
                    Formations
                </CardTitle>
            </CardHeader>
            <CardContent className="px-4 py-2 sm:p-4 space-y-1">
                {trainings.map((training) => (
                    <div
                        className="p-2 w-full bg-whisper/30 border border-whisper/50"
                        key={generateUuid()}
                    >
                        <div className="p-1">
                            <span className="font-semibold">Nom: </span>
                            <span>{training.name}</span>
                        </div>
                        <div className="p-1">
                            <span className="font-semibold">Niveau: </span>
                            <span>{training.level}</span>
                        </div>
                        <div className="p-1">
                            <span className="font-semibold">
                                Précision du niveau:{" "}
                            </span>
                            <span>{training.level_precision}</span>
                        </div>
                        <div className="p-1">
                            <span className="font-semibold">
                                Année d'obtention:{" "}
                            </span>
                            <span>{training.procured_at}</span>
                        </div>
                        <div className="p-1">
                            <span className="font-semibold">
                                Établissement:{" "}
                            </span>
                            <span>{training.trainer_name}</span>
                        </div>
                    </div>
                ))}
            </CardContent>
        </Card>
    );
}
