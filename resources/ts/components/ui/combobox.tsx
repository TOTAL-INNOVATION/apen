import React, { useContext, useEffect, useState } from "react";
import { Popover, PopoverContent, PopoverTrigger } from "./popover";
import {
    Command,
    CommandEmpty,
    CommandGroup,
    CommandInput,
    CommandItem,
    CommandList,
} from "./command";
import { Button, ButtonProps } from "./button";
import { Check, ChevronsUpDown } from "lucide-react";
import { cn } from "~/lib/utils";

type ComboBoxProps = {
    open?: boolean;
    children: React.ReactNode;
    className?: string;
    emptyMessage?: string;
};

interface ItemProps <V extends string>{
    value: V;
    label: string;
};

const ComboboxContext = React.createContext({
    open: false,
    //@ts-ignore
    setOpen(value: boolean) {},
    emptyMessage: "",
    activeItem: {
        value: "",
        label: "",
    },
    //@ts-ignore
    setActiveItem(item: ItemProps) {},
});

const ComboBox = ({
    children,
    open = false,
    emptyMessage = "Aucun élement trouvé",
    className,
}: ComboBoxProps) => {
    const [boxOpen, setBoxOpen] = useState(open);
    const [activeItem, setActiveItem] = useState<ItemProps<string>>({
        value: "",
        label: "",
    });

    return (
        <div className={cn(className)}>
            <ComboboxContext.Provider
                value={{
                    open: boxOpen,
                    setOpen: setBoxOpen,
                    activeItem,
                    setActiveItem,
                    emptyMessage,
                }}
            >
                {children}
            </ComboboxContext.Provider>
        </div>
    );
};

ComboBox.displayName = "ComboBox";

const ComboBoxContent = ({
    children,
    className,
}: {
    children: React.ReactNode;
    className?: string;
}) => {
    const { open, setOpen } = React.useContext(ComboboxContext);

    return (
        <div className={cn(className)}>
            <Popover open={open} onOpenChange={setOpen}>
                {children}
            </Popover>
        </div>
    );
};

ComboBoxContent.displayName = "ComboBoxContent";

const ComboBoxItem = <V extends string>({
    label,
    value,
    children,
    className,
    active = false,
    onSelect,
}: ItemProps<V> & {
    children?: React.ReactNode;
    className?: string;
    active?: boolean;
    onSelect?: (currentValue: V) => void;
}) => {
    const { activeItem, setActiveItem, open, setOpen } =
        React.useContext(ComboboxContext);

    const handleSelect = (currentValue: V) => {
        if (onSelect) onSelect(currentValue);
        setActiveItem({ label, value: currentValue });
        setOpen(!open);
    };

    return (
        <CommandItem
            key={value}
            value={value}
            onSelect={handleSelect as (currentValue: string) => void}
            className={cn("flex justify-between items-center cursor-pointer hover:bg-whisper/50", className)}
            data-active={active}
        >
            {children || label}
            <Check
                className={cn(
                    "mr-2 h-4 w-4",
                    value === activeItem.value ? "opacity-100" : "opacity-0"
                )}
            />
        </CommandItem>
    );
};

ComboBoxItem.displayName = "ComboBoxItem";

const ComboBoxList = ({
    children,
    className,
}: {
    children: React.ReactNode;
    className?: string;
}) => {
    const { emptyMessage } = React.useContext(ComboboxContext);
    const { setActiveItem } = useContext(ComboboxContext);

    useEffect(() => {
        if (!Array.isArray(children)) return;
        const activeChild = (
            children as React.ReactElement<{ label: string; value: string }>[]
        ).find((child) => child.props);

        if (!activeChild) return;

        const { label, value } = activeChild.props;

        setActiveItem({
            label: (label as string) || "",
            value: (value as string) || "",
        });
    }, [children, setActiveItem]);

    return (
        <PopoverContent className={cn("w-[200px] border-whisper p-0", className)}>
            <Command>
                <CommandList>
                    <CommandEmpty>{emptyMessage}</CommandEmpty>
                    <CommandGroup>{children}</CommandGroup>
                </CommandList>
            </Command>
        </PopoverContent>
    );
};

ComboBoxList.displayName = "ComboBoxContent";

const ComboBoxTrigger = ({
    placeholder,
    size = "sm",
    variant = "outline",
    className,
    ...props
}: ButtonProps & { placeholder?: string }) => {
    const { open, activeItem } = React.useContext(ComboboxContext);

    return (
        <PopoverTrigger asChild>
            <Button
                size={size}
                variant={variant}
                role="combobox"
                aria-expanded={open}
                className={cn("w-full justify-between", className)}
                {...props}
            >
                <span className="font-franklin-medium">
					{activeItem.value
						? activeItem.label
						: placeholder || "Selectionner"
					}
				</span>
                <ChevronsUpDown className="ml-2 h-4 w-4 shrink-0 opacity-50" />
            </Button>
        </PopoverTrigger>
    );
};

ComboBoxTrigger.displayName = "ComboBoxTrigger";

const ComboBoxSearchInput = CommandInput;

ComboBoxSearchInput.displayName = "ComboBoxSearchInput";

export {
    ComboBox,
    ComboBoxList,
    ComboBoxContent,
    ComboBoxTrigger,
    ComboBoxSearchInput,
    ComboBoxItem,
};
