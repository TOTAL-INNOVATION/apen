import { Button } from "~/components/ui/button";
import {
    Dialog,
    DialogContent,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from "~/components/ui/dialog";
import { Decree } from "~/types";
import { router } from "@inertiajs/react";
import { Trash2 } from "lucide-react";
import React from "react";

const DeleteDecree = ({ decree }: { decree: Decree }) => {
    return (
        <Dialog>
            <DialogTrigger asChild>
                <Button size="sm" variant="outline" className="rounded-full">
                    <Trash2 className="w-[18px] h-[18px] stroke-error" />
                </Button>
            </DialogTrigger>
            <DialogContent aria-describedby={undefined}>
                <DialogHeader>
                    <DialogTitle>Supprimer le decret</DialogTitle>
                </DialogHeader>
                <div className="my-4 mx-auto p-4 border-2 border-error rounded-full">
                    <Trash2 className="w-8 h-8 stroke-error" />
                </div>
                <div>
                    Vous êtes sur le point de rétirer le décret intitulé <strong>{decree.name}</strong>. Après cette action, l'utilisateur ne sera plus disponible dans la base de donnée. Voudrez-vous poursuivre?
                </div>
                <DialogFooter className="mt-4 w-full flex gap-x-3">
                    <DialogTrigger asChild>
                        <Button size="sm" variant="outline" className="w-full text-base">
                            Abandonner
                        </Button>
                    </DialogTrigger>
                    <form
                        className="w-full"
                        action={`/decrets/${decree.id}`}
                        onSubmit={removeDecree}
                    >
                        <Button
                            type="submit"
                            size="sm"
                            variant="error"
                            className="w-full text-base"
                        >
                            Poursuivre
                        </Button>
                    </form>
                </DialogFooter>
            </DialogContent>
        </Dialog>
    );

	function removeDecree(event: React.FormEvent<HTMLFormElement>) {
		event.preventDefault();
		const url = (event.target as HTMLFormElement).action;
	
		router.delete(url);
	}
};

export default DeleteDecree;
