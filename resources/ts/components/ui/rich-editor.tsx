import React from "react";
import { useState } from "react";
import { createEditor, Descendant } from "slate";
import { Editable, Slate, useSlate, withReact } from "slate-react";
import { Button, ButtonProps } from "./button";
import { cn } from "~/lib/utils";

type RichEditorProps = {
    value?: Descendant[];
};

function RichEditor({ value = [] }: RichEditorProps) {
    const editor = withReact(createEditor());

    return (
        <Slate editor={editor} initialValue={value}>
            <Toolbar />
            <Editable className="slate-editor" />
        </Slate>
    );
}

const ToolbarButton = ({
    active = false,
    ...props
}: Omit<ButtonProps, "size" | "variant" | "className"> & {
    active: boolean;
}) => {
    return (
        <Button
            size="sm"
            variant="outline"
            className={cn(
                "inline-flex items-center text-base mx-auto bg-transparent border-0 rounded-md hover:bg-whisper",
                { "bg-whisper": active }
            )}
            {...props}
        />
    );
};

function Toolbar() {

	const editor = useSlate();

    return (
        <div className="py-2 w-full flex items-center gap-x-2 border border-whisper border-b-transparent">
            <ToolbarButton active={false}>B</ToolbarButton>
        </div>
    );
}

export default RichEditor;
