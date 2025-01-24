import React from "react";
import { Approval } from "~/types";
import { Card, CardContent, CardHeader, CardTitle } from "~/components/ui/card";
import { FileLink } from "~/components/file-link";
import { asset } from "~/lib/utils";

export default function GeneralInfo({data}: {data: Approval}) {
	return (
		<Card>
		<CardHeader className="sm:p-4 border-b border-whisper">
			<CardTitle className="heading-3 uppercase">Informations Générales</CardTitle>
		</CardHeader>

		<CardContent className="p-0 sm:p-0">

			<div className="px-4 py-2 text-lg">
				<span className="font-semibold">Catégorie d'agrement: </span>
				<span>{data.type}</span>
			</div>

			<div className="px-4 py-2 text-lg">
				<span className="font-semibold">Statut de l'expert: </span>
				<span>{data.expert_status}</span>
			</div>

			{data.type !== "Catégorie C" && (
				<div className="px-4 py-2 text-lg">
					<span className="font-semibold">Registre commercial: </span>
					<span>{data.commercial_register ?? 'Non défini'}</span>
				</div>
			)}

			{data.type === "Catégorie B" && (
				<>
					<div className="px-4 py-2 text-lg">
						<span className="font-semibold">Numéro IFU: </span>
						<span>{data.single_tax_form ?? 'Non défini'}</span>
					</div>

					<div className="px-4 py-2 text-lg">
						<span className="font-semibold">A été agent public de l'État: </span>
						<span>{data.has_been_public_agent ? 'OUI' : 'NON'}</span>
					</div>
				</>
			)}

			<div className="px-4 py-2 text-lg">
				<span className="font-semibold">Association dont l'expert a été membre: </span>
				<span>{data.association ?? "Aucun"}</span>
			</div>

			<div className="px-4 py-2 text-lg">
				<FileLink name="Curriculum Vitae(CV)" url={asset(data.cv as string)} />
			</div>
			
		</CardContent>
	</Card>
	);
}
