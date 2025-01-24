import React from "react";
import {Degree as DegreeType} from "~/types";
import { Card, CardContent, CardHeader, CardTitle } from "~/components/ui/card";
import { FileLink } from "~/components/file-link";
import { asset } from "~/lib/utils";

export default function Degree({degree}: {degree: DegreeType}) {
	return (
		<Card>
		<CardHeader className="sm:p-4 border-b border-whisper">
			<CardTitle className="heading-3 uppercase">Diplôme</CardTitle>
		</CardHeader>
		<CardContent className="p-0 sm:p-0">
			<div className="px-4 py-2 text-lg">
				<span className="font-semibold">Niveau: </span>
				<span>{degree?.level}</span>
			</div>

			<div className="px-4 py-2 text-lg">
				<span className="font-semibold">Précision du niveau: </span>
				<span>{degree?.level_precision}</span>
			</div>

			<div className="px-4 py-2 text-lg">
				<span className="font-semibold">Précision du niveau: </span>
				<span>{(new Date(degree?.started_at).toLocaleDateString())}</span>
			</div>

			<div className="px-4 py-2 text-lg">
				<span className="font-semibold">Nombre d'années d'expérience: </span>
				<span>{degree?.years_of_experience}</span>
			</div>

			<div className="px-4 py-2 text-lg">
				<FileLink name="Diplôme(Fichier)" url={asset(degree?.file as string)} />
			</div>
		</CardContent>
	</Card>
	);
}
