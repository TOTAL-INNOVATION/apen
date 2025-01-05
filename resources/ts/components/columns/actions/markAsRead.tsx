import { router } from "@inertiajs/react";
import { CheckCheck } from "lucide-react";
import React from "react";
import { Button } from "~/components/ui/button";


function MarkAsRead({messageId}: {messageId: string}) {
	return (
		<form action={`/messages/${messageId}`} onSubmit={onSubmit} title="Marquer comme lu">
			<Button type="submit" size="sm" variant="outline" className="rounded-full">
				<CheckCheck className="w-[18px] h-[18px] stroke-primary" />
			</Button>
		</form>
	);

	function onSubmit(event: React.FormEvent<HTMLFormElement>) {
		event.preventDefault();
		const url = (event.target as HTMLFormElement).action;
	
		router.put(url);
	}
}

export default MarkAsRead;
