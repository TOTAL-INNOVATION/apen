import { Button } from "~/components/ui/button";
import {
    Dialog,
    DialogContent,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from "~/components/ui/dialog";
import { User } from "~/types";
import { router } from "@inertiajs/react";
import { Trash2 } from "lucide-react";
import React from "react";

const DeleteUser = ({ user }: { user: User }) => {
    return (
        <Dialog>
            <DialogTrigger asChild>
                <Button size="sm" variant="outline" className="rounded-full">
                    <Trash2 className="w-[18px] h-[18px] stroke-danger" />
                </Button>
            </DialogTrigger>
            <DialogContent aria-describedby={undefined}>
                <DialogHeader>
                    <DialogTitle>Supprimer l'utilisateur</DialogTitle>
                </DialogHeader>
                <div className="my-4 mx-auto p-4 border-2 border-danger rounded-full">
                    <Trash2 className="w-8 h-8 stroke-danger" />
                </div>
                <div className="dark:text-info">
                    Vous êtes sur le point de rétirer l'utilisateur <strong>{user.fullname}</strong>. Après cette action, l'utilisateur ne sera plus disponible dans la base de donnée. Voudrez-vous poursuivre?
                </div>
                <DialogFooter className="mt-4 w-full flex gap-x-3">
                    <DialogTrigger asChild>
                        <Button size="sm" variant="outline" className="w-full">
                            Abandonner
                        </Button>
                    </DialogTrigger>
                    <form
                        className="w-full"
                        action={`/users/${user.id}`}
                        onSubmit={removeUser}
                    >
                        <Button
                            type="submit"
                            size="sm"
                            variant="error"
                            className="w-full"
                        >
                            Poursuivre
                        </Button>
                    </form>
                </DialogFooter>
            </DialogContent>
        </Dialog>
    );

	function removeUser(event: React.FormEvent<HTMLFormElement>) {
		event.preventDefault();
		const url = (event.target as HTMLFormElement).action;
	
		router.delete(url);
	}
};

export default DeleteUser;
