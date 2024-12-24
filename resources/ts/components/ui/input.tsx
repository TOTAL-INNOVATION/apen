import * as React from "react";

import { cn } from "~/lib/utils";
import { cva, VariantProps } from "class-variance-authority";

const inputVariant = cva(
    "flex h-10 w-full border border-whisper outline-transparent bg-white ring-offset-white file:border-0 file:bg-transparent file:font-franklin-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:border-transparent focus-visible:ring-offset-0 disabled:cursor-not-allowed disabled:opacity-50 transition-all",
    {
        variants: {
            size: {
                sm: "py-2 px-3 text-sm",
                base: "py-2.5 px-4 text-base",
                lg: "p-4 sm:p-4.5 text-base",
            },
        },
        defaultVariants: {
            size: "base",
        },
    }
);

export interface InputProps
    extends Omit<React.InputHTMLAttributes<HTMLInputElement>, "size">,
        VariantProps<typeof inputVariant> {
    roundedFull?: boolean;
}

const Input = React.forwardRef<HTMLInputElement, InputProps>(
    (
        { className, type, size, roundedFull = false, onChange, ...props },
        ref
    ) => {
        return (
            <input
                type={type}
                className={cn(
                    inputVariant({ size }),
                    roundedFull ? "rounded-full" : "",
                    className
                )}
                onChange={onChange}
                ref={ref}
                {...props}
            />
        );
    }
);
Input.displayName = "Input";

export { Input };
