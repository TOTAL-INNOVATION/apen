import * as React from "react";
import { useTheme } from "next-themes"
import { Toaster as Sonner } from "sonner"

type ToasterProps = React.ComponentProps<typeof Sonner>

const Toaster = ({ ...props }: ToasterProps) => {
  const { theme = "system" } = useTheme()

  return (
    <Sonner
      theme={theme as ToasterProps["theme"]}
      className="toaster group"
      toastOptions={{
        classNames: {
          toast:
            "font-inter text-sm group toast group-[.toaster]:bg-white group-[.toaster]:text-dark group-[.toaster]:border-whisper group-[.toaster]:rounded-xl group-[.toaster]:shadow-lg",
          description: "group-[.toast]:text-dark",
          actionButton:
            "group-[.toast]:bg-whisper group-[.toast]:text-dark",
          cancelButton:
            "group-[.toast]:bg-whisper group-[.toast]:text-dark",
        },
      }}
      {...props}
    />
  )
}

export { Toaster }
