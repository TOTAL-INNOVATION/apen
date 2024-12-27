import React, { useCallback } from "react";
import {
    createEditor,
    Descendant,
    Editor,
    Element as SlateElement,
    Transforms,
} from "slate";
import { Editable, ReactEditor, Slate, useSlate, withReact } from "slate-react";
import { Button as BaseButton, ButtonProps } from "./button";
import { cn, generateUuid } from "~/lib/utils";
import { Label } from "./label";
import {
    Bold,
    Image,
    Italic,
    List,
    ListOrdered,
    Quote,
    Underline,
} from "lucide-react";
import {
    ComboBox,
    ComboBoxContent,
    ComboBoxItem,
    ComboBoxList,
    ComboBoxTrigger,
} from "./combobox";

import isHotkey from "is-hotkey";

type RichEditorProps = {
    id?: string;
    label?: string;
    value?: Descendant[];
};

type RenderElementProps = {
    children: any;
    element: {
        type:
            | "paragraph"
            | "block-quote"
            | "bulleted-list"
            | "heading-one"
            | "heading-two"
            | "heading-three"
            | "list-item"
            | "numbered-list";
        children: Descendant[];
    };
    attributes: {
        "data-slate-node": "element";
        "data-slate-inline"?: true;
        "data-slate-void"?: true;
        dir?: "rtl";
        ref: any;
    };
};

type Leaf = {
    bold: boolean;
    code: boolean;
    italic: boolean;
    underline: boolean;
};

type RenderLeafProps = {
    children: any;
    leaf: Leaf;
    text: Text;
    attributes: {
        "data-slate-leaf": true;
    };
};

const HOTKEYS = {
    "mod+b": "bold",
    "mod+i": "italic",
    "mod+u": "underline",
    "mod+`": "code",
};

type HotKey = keyof typeof HOTKEYS;

const LIST_TYPES = ["numbered-list", "bulleted-list"];
const TEXT_ALIGN_TYPES = ["left", "center", "right", "justify"];

const isBlockActive = (
    editor: Editor,
    format: RenderElementProps["element"]["type"],
    blockType = "type"
) => {
    const { selection } = editor;
    if (!selection) return false;

    const [match] = Array.from(
        Editor.nodes(editor, {
            at: Editor.unhangRange(editor, selection),
            match: (n) =>
                !Editor.isEditor(n) &&
                SlateElement.isElement(n) &&
                //@ts-ignore
                n[blockType] === format,
        })
    );

    return !!match;
};

const isMarkActive = (editor: Editor, format: string) => {
    const marks = Editor.marks(editor);
    //@ts-ignore
    return marks ? marks[format] === true : false;
};

const toggleMark = (editor: Editor, format: string) => {
    const isActive = isMarkActive(editor, format);

    if (isActive) {
        Editor.removeMark(editor, format);
        return;
    }

    Editor.addMark(editor, format, true);
};

const toggleBlock = (
    editor: Editor,
    format: RenderElementProps["element"]["type"]
) => {
    const isActive = isBlockActive(
        editor,
        format,
        TEXT_ALIGN_TYPES.includes(format) ? "align" : "type"
    );
    const isList = LIST_TYPES.includes(format);

    Transforms.unwrapNodes(editor, {
        match: (n) =>
            !Editor.isEditor(n) &&
            SlateElement.isElement(n) &&
            LIST_TYPES.includes(n.type) &&
            !TEXT_ALIGN_TYPES.includes(format),
        split: true,
    });
    let newProperties: Partial<SlateElement>;

    if (TEXT_ALIGN_TYPES.includes(format)) {
        newProperties = {
            //@ts-ignore
            align: isActive ? undefined : format,
        };
    } else {
        newProperties = {
            //@ts-ignore
            type: isActive ? "paragraph" : isList ? "list-item" : format,
        };
    }
    Transforms.setNodes<SlateElement>(editor, newProperties);

    if (!isActive && isList) {
        const block: RenderElementProps["element"] = {
            type: format,
            children: [],
        };
        Transforms.wrapNodes(editor, block as SlateElement);
    }
};

const RenderElement = ({
    attributes,
    children,
    element,
}: RenderElementProps) => {
    switch (element.type) {
        case "block-quote":
            return <blockquote {...attributes}>{children}</blockquote>;

        case "heading-one":
            return (
                <h1 className="heading-1" {...attributes}>
                    {children}
                </h1>
            );

        case "heading-two":
            return (
                <h2 className="heading-2" {...attributes}>
                    {children}
                </h2>
            );

        case "heading-three":
            return (
                <h3 className="heading-3" {...attributes}>
                    {children}
                </h3>
            );

        case "bulleted-list":
            return <ul {...attributes}>{children}</ul>;
        case "numbered-list":
            return <ol {...attributes}>{children}</ol>;

        case "list-item":
            return <li {...attributes}>{children}</li>;

        default:
            return <p {...attributes}>{children}</p>;
    }
};
const RenderLeaf = ({ attributes, children, leaf }: RenderLeafProps) => {
    if (leaf.bold) {
        children = <strong>{children}</strong>;
    }

    if (leaf.code) {
        children = <code>{children}</code>;
    }

    if (leaf.italic) {
        children = <em>{children}</em>;
    }

    if (leaf.underline) {
        children = <u>{children}</u>;
    }

    return <span {...attributes}>{children}</span>;
};

function RichEditor({
    id = generateUuid(),
    label,
    value = [{ type: "paragraph", children: [{ text: "" }] }],
}: RichEditorProps) {
    const renderElement = useCallback(
        (props: RenderElementProps) => <RenderElement {...props} />,
        []
    );
    const renderLeaf = useCallback(
        (props: RenderLeafProps) => <RenderLeaf {...props} />,
        []
    );
    const editor = withReact(createEditor());

    return (
        <div>
            {label && (
                <Label htmlFor={id} onClick={() => ReactEditor.focus(editor)}>
                    {label}
                </Label>
            )}

            <Slate editor={editor} initialValue={value}>
                <Toolbar />
                <Editable
                    id={id}
                    className="slate-editor p-4"
                    renderElement={renderElement}
                    /* @ts-ignore */
                    renderLeaf={renderLeaf}
                    onKeyDown={(event) => {
                        for (const hotkey in HOTKEYS) {
                            if (isHotkey(hotkey, event as any)) {
                                event.preventDefault();
                                const mark = HOTKEYS[hotkey as HotKey];
                                toggleMark(editor, mark);
                            }
                        }
                    }}
                />
            </Slate>
        </div>
    );
}

const Button = ({
    active = false,
    className,
    ...props
}: Omit<ButtonProps, "size" | "variant"> & {
    active: boolean;
}) => {
    return (
        <BaseButton
            size="sm"
            variant="outline"
            className={cn(
                "h-8 px-2 inline-flex items-center text-base bg-transparent rounded-md hover:bg-whisper",
                className,
                { "bg-whisper": active }
            )}
            {...props}
        />
    );
};

const MarkButton = ({
    format,
    children,
}: {
    format: "bold" | "italic" | "underline";
    children: React.ReactNode;
}) => {
    const editor = useSlate();

    return (
        <Button
            active={isMarkActive(editor, format)}
            onMouseDown={(event) => {
                event.preventDefault();
                toggleMark(editor, format);
            }}
        >
            {children}
        </Button>
    );
};

const BlockButton = ({
    format,
    children,
}: {
    format: RenderElementProps["element"]["type"];
    children: React.ReactNode;
}) => {
    const editor = useSlate();

    return (
        <Button
            active={isBlockActive(editor, format)}
            onMouseDown={(event) => {
                event.preventDefault();
                toggleBlock(editor, format);
            }}
        >
            {children}
        </Button>
    );
};

function Toolbar() {
    const editor = useSlate();
    const comboxBoxValues: {
        label: string;
        value: RenderElementProps["element"]["type"];
        active?: boolean;
    }[] = [
        {
            label: "Normal",
            value: "paragraph",
            active: true,
        },
        { label: "Titre 1", value: "heading-one" },
        { label: "Titre 2", value: "heading-two" },
        { label: "Titre 3", value: "heading-three" },
    ];

    return (
        <div className="p-2 w-full flex items-center gap-x-2 border border-whisper border-b-transparent">
            <ComboBox>
                <ComboBoxContent className="w-[120px]">
                    <ComboBoxTrigger className="h-8" />
                    <ComboBoxList className="w-[120px]">
                        {comboxBoxValues.map((props) => (
                            <ComboBoxItem
                                key={generateUuid()}
                                onSelect={(value) => toggleBlock(editor, value)}
                                {...props}
                            />
                        ))}
                    </ComboBoxList>
                </ComboBoxContent>
            </ComboBox>
            <MarkButton format="bold">
                <Bold className="w-4 h-4 stroke-[2.5]" />
            </MarkButton>
            <MarkButton format="italic">
                <Italic className="w-4 h-4 stroke-[2.5]" />
            </MarkButton>
            <MarkButton format="underline">
                <Underline className="w-4 h-4 stroke-[2.5]" />
            </MarkButton>
            <BlockButton format="block-quote">
                <Quote className="w-4 h-4 stroke-[2.5]" />
            </BlockButton>
            <BlockButton format="numbered-list">
                <ListOrdered className="w-4 h-4" />
            </BlockButton>
            <BlockButton format="bulleted-list">
                <List className="w-4 h-4" />
            </BlockButton>
            <Button active={false}>
                <Image className="w-4 h-4" />
            </Button>
        </div>
    );
}

export default RichEditor;
