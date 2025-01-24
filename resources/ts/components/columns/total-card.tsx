import React from "react";
import { Card, CardContent, CardHeader, CardTitle } from "../ui/card";

type TotalCardProps = {
	label: string;
	count: number;
}

export default function TotalCard({ count, label }: TotalCardProps) {
	return (
		<Card className="flex flex-col justify-between">
			<CardHeader className="sm:p-4">
				<h3 className="text-3xl font-texta-black uppercase">{label}</h3>
			</CardHeader>
			<CardContent className="sm:p-4">
				<p className="text-3xl font-texta-black">{count}</p>
			</CardContent>
		</Card>
	);
}
