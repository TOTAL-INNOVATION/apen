import { Button } from "~/components/ui/button";
import {
    Dialog,
    DialogContent,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from "~/components/ui/dialog";
import { Article } from "~/types";
import { router } from "@inertiajs/react";
import { Trash2 } from "lucide-react";
import React from "react";

const DeleteArticle = ({ article }: { article: Article }) => {
    return (
        <Dialog>
            <DialogTrigger asChild>
                <Button size="sm" variant="outline" className="rounded-full">
                    <Trash2 className="w-[18px] h-[18px] stroke-error" />
                </Button>
            </DialogTrigger>
            <DialogContent aria-describedby={undefined}>
                <DialogHeader>
                    <DialogTitle>Supprimer l'article</DialogTitle>
                </DialogHeader>
                <div className="my-4 mx-auto p-4 border-2 border-error rounded-full">
                    <Trash2 className="w-8 h-8 stroke-error" />
                </div>
                <div>
                    Vous êtes sur le point de supprimer l'article titré <strong>{article.title}</strong>. Après cette action, cet article ne sera plus disponible. Voudrez-vous poursuivre?
                </div>
                <DialogFooter className="mt-4 w-full flex gap-x-3">
                    <DialogTrigger asChild>
                        <Button size="sm" variant="outline" className="w-full">
                            Abandonner
                        </Button>
                    </DialogTrigger>
                    <form
                        className="w-full"
                        action={`/articles/${article.id}`}
                        onSubmit={removeArticle}
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

	function removeArticle(event: React.FormEvent<HTMLFormElement>) {
		event.preventDefault();
		const url = (event.target as HTMLFormElement).action;
	
		router.delete(url);
	}
};

export default DeleteArticle;
