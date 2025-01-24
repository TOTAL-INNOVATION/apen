import React from "react";
import { Approval } from "~/types";
import { Card, CardContent, CardHeader, CardTitle } from "~/components/ui/card";

export default function AuthorAddresses({data}: {data: Approval}) {

	const {user} = data;
	
	return (
		<Card>
		<CardHeader className="sm:p-4 border-b border-whisper">
			<CardTitle className="heading-3 uppercase">Adresses de l'auteur</CardTitle>
		</CardHeader>

		<CardContent className="p-0 sm:p-0">
			<div className="px-4 py-2 text-lg">
				<span className="font-semibold">Adresse email: </span>
				<span>{user.email}</span>
			</div>
			<div className="px-4 py-2 text-lg">
				<span className="font-semibold">Téléphone mobile: </span>
				<span>{data.mobile}</span>
			</div>
			<div className="px-4 py-2 text-lg">
				<span className="font-semibold">Téléphone fix: </span>
				<span>{data.tel ?? "Non défini"}</span>
			</div>
			<div className="px-4 py-2 text-lg">
				<span className="font-semibold">Région géographique: </span>
				<span>{data.geographic_region}</span>
			</div>
			{data.region ? (
				<>
					<div className="px-4 py-2 text-lg">
						<span className="font-semibold">Région: </span>
						<span>{data.region}</span>
					</div>
					<div className="px-4 py-2 text-lg">
						<span className="font-semibold">Province: </span>
						<span>{data.province}</span>
					</div>
				</>
			) : (
			<div className="px-4 py-2 text-lg">
				<span className="font-semibold">Adresse: </span>
				<span>{data.address}</span>
			</div>
			)}

			<div className="px-4 py-2 text-lg">
				<span className="font-semibold">Boîte postale: </span>
				<span>{data.mailbox ?? "Non définie"}</span>
			</div>

			<div className="px-4 py-2 text-lg">
				<span className="font-semibold">Fax: </span>
				<span>{data.fax ?? "Non défini"}</span>
			</div>

			<div className="px-4 py-2 text-lg">
				<span className="font-semibold">Site web: </span>
				<span>{data.website ?? "Non défini"}</span>
			</div>

		</CardContent>
	</Card>
	);
}
