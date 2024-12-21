import * as React from "react"
import { Slot } from "@radix-ui/react-slot"
import { cva, type VariantProps } from "class-variance-authority"

import { cn } from "~/lib/utils"

const buttonVariants = cva(
  "inline-flex items-center justify-center gap-x-2 whitespace-nowrap ring-offset-white transition-colors outline-none focus-visible:ring-2 focus-visible:ring-transparent focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-70 transition-colors",
  {
    variants: {
      variant: {
        primary: "bg-primary text-white hover:bg-opacity-90",
        secondary: "bg-secondary text-white hover:bg-opacity-90",
        gold: "bg-gold text-dark hover:bg-opacity-90",
        success: "bg-success hover:bg-opacity-90",
        warning: "bg-warning text-dark hover:bg-opacity-90",
        error: "bg-error text-white hover:bg-opacity-90",
        outline: "text-dark bg-transparent border border-whisper hover:bg-bright/35",
        viridian: "bg-viridian text-white hover:bg-opacity-90",
        chocolate: "bg-chocolate text-white hover:bg-opacity-90",
        dark: "bg-dark text-white hover:bg-opacity-90",
      },
      size: {
        default: "text-base h-10 px-4 py-2",
        sm: "text-sm h-9 px-3",
        lg: "text-base h-11 px-8",
        icon: "h-10 w-10",
      },
    },
    defaultVariants: {
      variant: "primary",
      size: "default",
    },
  }
)

export interface ButtonProps
  extends React.ButtonHTMLAttributes<HTMLButtonElement>,
    VariantProps<typeof buttonVariants> {
  asChild?: boolean
}

const Button = React.forwardRef<HTMLButtonElement, ButtonProps>(
  ({ className, variant, size, asChild = false, ...props }, ref) => {
    const Comp = asChild ? Slot : "button"
    return (
      <Comp
        className={cn(buttonVariants({ variant, size, className }))}
        ref={ref}
        {...props}
      />
    )
  }
)
Button.displayName = "Button"

export { Button, buttonVariants }
