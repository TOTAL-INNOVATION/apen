import { cn, generateUuid } from "~/lib/utils";
import React from "react";
import { toast as sourceToast } from "sonner";

type ToastIcon = "success" | "error" | "warning";

type ToastProps = {
    id?: string;
    type?: ToastIcon;
    message: React.ReactNode;
	dismissable?: boolean;
};

export const toast = ({
    id = generateUuid(),
    type = "success",
    message,
	dismissable = true
}: ToastProps) => {
    const icon = getToastIcon(type);

    sourceToast(
        <div className="w-full py-1 flex justify-between">
            <div className="flex">
                <div className="flex-shrink-0">{icon}</div>
                <div className="ms-3">
                    <p className="mt-0.5 text-sm font-medium text-dark/80">
                        {message}
                    </p>
                </div>
            </div>
            {dismissable && (
				<div className="ms-auto">
                <button
                    type="button"
                    id="dismiss-btn"
                    className="inline-flex flex-shrink-0 justify-center items-center size-5 rounded-lg text-dark opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100"
					onClick={() => sourceToast.dismiss(id)}
                >
                    <span className="sr-only">Fermer</span>
                    <svg
                        className="flex-shrink-0 size-4"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        strokeWidth="2"
                        strokeLinecap="round"
                        strokeLinejoin="round"
                    >
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
			)}
        </div>,
        { id }
    );
};

function getToastIcon(type: ToastIcon): React.ReactElement {
    return (
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            strokeWidth="2"
            strokeLinecap="round"
            strokeLinejoin="round"
            className={cn({
                "fill-error stroke-white": type === "error",
                "fill-warning stroke-white": type === "warning",
                "fill-success stroke-white": type === "success",
            })}
        >
            {type === "error" ? (
                <>
                    <circle cx="12" cy="12" r="10" />
                    <path d="m15 9-6 6" />
                    <path d="m9 9 6 6" />
                </>
            ) : type === "warning" ? (
                <>
                    <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3" />
                    <path d="M12 9v4" />
                    <path d="M12 17h.01" />
                </>
            ) : (
                <>
                    <circle cx="12" cy="12" r="10" />
                    <path d="m9 12 2 2 4-4" />
                </>
            )}
        </svg>
    );
}
