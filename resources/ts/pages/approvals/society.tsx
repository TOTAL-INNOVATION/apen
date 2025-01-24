import React from "react";
import { Approval } from "~/types";
import { Card, CardContent, CardHeader, CardTitle } from "~/components/ui/card";
import { asset, generateUuid } from "~/lib/utils";
import { FileLink } from "~/components/file-link";

export default function Society({data}: {data: Approval}) {

	const {society, associates} = data;

	return (
		<>
		<Card>
			<CardHeader className="sm:p-4 border-b border-whisper">
				<CardTitle className="heading-3 uppercase">Société</CardTitle>
			</CardHeader>
			<CardContent className="p-0 sm:p-0">
				<div className="px-4 py-2 text-lg">
					<span className="font-semibold">Nom: </span>
					<span>{society?.name}</span>
				</div>

				<div className="px-4 py-2 text-lg">
					<span className="font-semibold">Nom commercial: </span>
					<span>{society?.commercial_name}</span>
				</div>

				<div className="px-4 py-2 text-lg">
					<span className="font-semibold">Année de création: </span>
					<span>{society?.founded_at}</span>
				</div>

				<div className="px-4 py-2 text-lg">
					<span className="font-semibold">Statut légal: </span>
					<span>{society?.legal_status}</span>
				</div>

				<div className="px-4 py-2 text-lg">
					<span className="font-semibold">Précision du statut: </span>
					<span>{society?.legal_status_precision}</span>
				</div>

				<div className="px-4 py-2 text-lg">
					<FileLink name="Statut(Fichier)" url={asset(society?.status_file as string)} />
				</div>

				<div className="px-4 py-2 text-lg">
					<span className="font-semibold">Capital: </span>
					<span>{society?.capital}</span>
				</div>

				<div className="px-4 py-2 text-lg">
					<span className="font-semibold">Total du personnel: </span>
					<span>{society?.staff_number}</span>
				</div>

				<div className="px-4 py-2 text-lg">
					<span className="font-semibold">Personel cadre technique salarié: </span>
					<span>{society?.salaried_technical_staff}</span>
				</div>

				<div className="px-4 py-2 text-lg">
					<span className="font-semibold">Personel administratif salarié: </span>
					<span>{society?.salaried_administrative_staff}</span>
				</div>
			</CardContent>
		</Card>
		
		<Card>
			<CardHeader className="sm:p-4 border-b border-whisper">
				<CardTitle className="heading-3 uppercase">Associés</CardTitle>
			</CardHeader>
			<CardContent className="px-4 py-2 sm:p-4 space-y-4">
				{associates.map(associate => (
					<div className="p-2 w-full bg-whisper/30 border border-whisper/50" key={generateUuid()}>
						<div className="p-1">
							<span className="font-semibold">Nom complet: </span>
							<span>{`${associate.firstname} ${associate.lastname}`}</span>
						</div>

						<div className="p-1">
							<span className="font-semibold">Qualification: </span>
							<span>{associate.qualification}</span>
						</div>

						<div className="p-1">
							<span className="font-semibold">Rôle: </span>
							<span>{associate.role}</span>
						</div>

						<div className="px-4 py-2 text-lg">
							<FileLink name="Agrément" url={asset(associate.approval)} />
						</div>
					</div>	
				))}
			</CardContent>
		</Card>
	</>
	);
}
