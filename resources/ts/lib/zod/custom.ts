import { DEFAULT_AUTHORIZED_TYPES } from "~/components/ui/image-input";
import zod from ".";

export const DEFAULT_MAX_SIZE = 3072 * 1024;
export const DEFAULT_TYPES = Object.keys(DEFAULT_AUTHORIZED_TYPES);

export default function zodFile(
    maxSize: number = DEFAULT_MAX_SIZE,
    types: string[] = DEFAULT_TYPES,
    isOptional = false,
    sizeMessage?: string,
    typeMessage?: string
): zod.ZodType<File, zod.ZodTypeDef, File> {
    const sizeInMB = maxSize / (1024 * 1024);
    const validation = zod.instanceof(File, {message: "Ce champ ne prend qu'un fichier."});

    if (isOptional) validation.optional();
    validation
        .refine((file) => {
            return file ? (file as File).size <= maxSize : true;
        }, sizeMessage || `La taille de l'image ne doit pas dépasser les ${sizeInMB}MB.`)
        .refine((file) => {
            return file
                ? Object.keys(types).includes((file as File).type)
                : true;
        }, typeMessage || "Le fichier doit être de type .png, .jpg ou .jpeg");

    return validation;
}
