import React from "react";
import { Attachment } from "~/types";
import { Card, CardContent, CardHeader, CardTitle } from "~/components/ui/card";
import { generateUuid } from "~/lib/utils";
import { FileLink } from "~/components/file-link";

export default function Attachments({
    attachments,
}: {
    attachments: Attachment[];
}) {
    return (
        <Card>
            <CardHeader className="sm:p-4 border-b border-whisper">
                <CardTitle className="heading-3 uppercase">
                    Fichiers joints
                </CardTitle>
            </CardHeader>
            <CardContent className="px-4 py-2 sm:p-4 space-y-4">
                {attachments.map((attachment) => (
                    <FileLink
                        name={attachment.nature}
                        url={attachment.file}
                        key={generateUuid()}
                    />
                ))}
            </CardContent>
        </Card>
    );
}
