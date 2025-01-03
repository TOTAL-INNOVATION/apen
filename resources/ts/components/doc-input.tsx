import React, { useState } from "react";
import { ImageInputProps } from "./ui/image-input";
import { useDropzone } from "react-dropzone";
import { useFormContext } from "react-hook-form";
import { cn, str } from "~/lib/utils";
import { FileText, Upload } from "lucide-react";

type DocInputProps = ImageInputProps;

export const DEFAULT_DOC_TYPES = {
    "text/plain": [".txt"],
    "application/pdf": [".pdf"],
    "application/msword": [".doc"],
    "application/vnd.openxmlformats-officedocument.wordprocessingml.document": [
        ".docx",
    ],
    "application/vnd.ms-powerpoint": [".ppt"],
    "application/vnd.openxmlformats-officedocument.presentationml.presentation":
        [".pptx"],
    "application/vnd.ms-excel": [".xls"],
    "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet": [
        ".xlsx",
    ],
};

const _1MO = (1024 * 1024);

function DocInput({
    authorizedTypes = DEFAULT_DOC_TYPES,
    name,
    onChange,
    className,
    id,
}: DocInputProps) {
    const [info, setInfo] = useState<{
        name: string;
        size: number;
        type: keyof typeof authorizedTypes;
    } | null>(null);
    const context = useFormContext();

    const { getRootProps, getInputProps, isDragAccept, isDragReject } =
        useDropzone({
            accept: authorizedTypes,
            onDropAccepted(files) {
                const { name, size, type } = files[0];
                setInfo({
                    name,
                    size,
                    type,
                });
            },
        });

    return (
        <div
            {...getRootProps({
                className: cn(
                    "relative p-4 border border-dashed border-rainee",
                    {
                        "border-error": isDragReject,
                        "border-success": isDragAccept,
                    },
                    className
                ),
            })}
        >
            <div className="mx-auto h-32 w-full bg-white border border-whisper">
                {info ? (
                    <div className="p-4 h-full bg-bright/25 flex flex-col justify-between relative">
                        <p className="text-xl font-franklin-medium">
                            {str(info.name).limit(75)}
                        </p>

                        <p className="space-x-1">
                            <span className="uppercase">{authorizedTypes[info.type][0].replace('.', '')}</span>
                            <span>-</span>
                            <span>{Number(info.size / _1MO).toFixed(2)} Mo</span>
                        </p>

						<div className="absolute top-0 left-0 w-full h-full flex justify-center items-center opacity-0 hover:opacity-100 hover:bg-dark/30 hover:backdrop-blur-sm transition-all">
						<div className="flex flex-col items-center justify-center">
                                <div>
                                    <Upload className="w-10 h-10 stroke-1 stroke-white" />
                                </div>
                                <p className="mt-4 text-white">
                                    Glissez déposer ou cliquez
                                </p>
                            </div>
						</div>
                    </div>
                ) : (
                    <div className="h-full w-full flex items-center justify-center">
                        <div>
                            <div className="w-fit mx-auto">
                                <FileText className="w-12 h-12 stroke-1 stroke-rainee" />
                            </div>
                            <p className="mt-4 text-dark/60">
                                Glissez déposer ou cliquez
                            </p>
                        </div>
                    </div>
                )}
            </div>

            <input {...getInputProps({ id, name, onChange: onInputChange })} />
        </div>
    );

    function onInputChange(event: React.ChangeEvent<HTMLInputElement>) {
        if (onChange) onChange(event);

        const files = event.target.files;

        if (files && files.length) context.setValue(name, files[0]);
    }
}

export default DocInput;
