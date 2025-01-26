import { Download } from "lucide-react";
import React from "react";

type FileLinkProps = {
	name: string;
	url: string;
}

export function FileLink({name, url}: FileLinkProps) {
	return (
		<div className="p-2 flex items-center bg-whisper/40 text-dark border border-whisper">
			<div className="w-10/12 text-[15px] font-semibold">{name}</div>
			<div>
				<a href={url} className="p-1.5 inline-flex items-center space-x-2 border border-rainee/50" target="_blank" download>
					<Download className="w-5 h-5" />
					<span className="text-sm font-semibold">Télécharger</span>
				</a>
			</div>
		</div>
	);
}
