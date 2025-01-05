import { Button } from "~/components/ui/button";
import {
    Dialog,
    DialogContent,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from "~/components/ui/dialog";
import { Message } from "~/types";
import { router } from "@inertiajs/react";
import { Eye } from "lucide-react";
import React from "react";

const ReadMessage = ({ message }: { message: Message }) => {
    return (
        <Dialog>
            <DialogTrigger asChild>
                <Button size="sm" variant="outline" className="rounded-full" title="Lire">
                    <Eye className="w-[18px] h-[18px]" />
                </Button>
            </DialogTrigger>
            <DialogContent aria-describedby={undefined}>
                <DialogHeader>
                    <DialogTitle>Le message</DialogTitle>
                </DialogHeader>

                <div className="max-h-svh overflow-scroll">
                    <div className="w-full border border-whisper">
						<div className="w-full divide-y divide-whisper">
							<div className="px-4 py-2">
								<p><strong>Auteur:</strong> <span>{`${message.firstname} ${message.lastname}`}</span></p>
							</div>

							<div className="px-4 py-2">
								<p><strong>Adresse email:</strong> <span>{message.email}</span></p>
							</div>
							<div className="px-4 py-2">
								<p><strong>Sujet:</strong> <span>{message.subject}</span></p>
							</div>
						</div>
					</div>

					<div className="mt-4">
						<p className="mb-2 font-franklin-medium">Contenu:</p>
						<div className="p-4 w-full bg-whisper/20 border border-whisper text-lg">
							{message.message}
						</div>
					</div>
                </div>
            </DialogContent>
        </Dialog>
    );
};

export default ReadMessage;
