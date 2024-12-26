import { clsx, type ClassValue } from "clsx"
import { twMerge } from "tailwind-merge"
import Str from "./strings";

export function cn(...inputs: ClassValue[]) {
  return twMerge(clsx(inputs))
}

/**
 * string utility helper
 */
export const str = (str: string) => new Str(str);

export const generateUuid = () => crypto.randomUUID() as string;

export const debounce = (fn: Function, delay = 500) => {
    let timerId: null | NodeJS.Timeout = null;
    //@ts-ignore
    return (...args) => {
        clearTimeout(timerId as NodeJS.Timeout);
        timerId = setTimeout(() => fn(...args), delay);
    };
};

/**
 * equivalent of the `asset` helper in Laravel
 */
//@ts-ignore
export const asset = (assetUrl: string): string => `${import.meta.env.VITE_APP_URL}/${assetUrl}`;
