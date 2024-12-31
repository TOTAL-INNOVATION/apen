import React, { useCallback } from "react";
import {
    createEditor,
    Descendant,
    Editor,
    Element as SlateElement,
    Text,
    Transforms,
} from "slate";
import { Editable, ReactEditor, Slate, useSlate, withReact } from "slate-react";
import { Button as BaseButton, ButtonProps } from "./button";
import { asset, cn, generateUuid } from "~/lib/utils";
import { Label } from "./label";
import {
    Bold,
    Image,
    Italic,
    List,
    ListOrdered,
    Quote,
    Trash2,
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
import isUrl from "is-url";
import imageExtensions from "image-extensions";
import { toast } from "../toast";
import axios, { AxiosError } from "axios";
import { APP_URL } from "~/constants";
import { SlateElementType } from "~/types";

type RichEditorProps = {
    id?: string;
    label?: string;
    name: string;
    value?: Descendant[];
    onChange: ((value: Descendant[], editor: Editor) => void);
};

type RenderElementProps = {
    children: any;
    element: {
        type: SlateElementType;
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

type ImageElement = {
    type: "image";
    url: string;
    children: Text[];
};

type AxiosFailedResponse = {
    message?: string;
    errors: Record<string, string[]>;
};

type UploadSucceedResponse = {
    message: string;
    path: string;
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

const ImageElement = ({
    attributes,
    children,
    element,
}: RenderElementProps & {
    element: RenderElementProps["element"] & { url: string };
}) => {
    const editor = useSlate();
    //@ts-ignore
    const path = ReactEditor.findPath(editor, element);

    return (
        <div {...attributes}>
            {children}
            <div className="relative w-full aspect-video" contentEditable={false}>
                <img className="w-full h-full object-cover" src={element.url} alt={element.url} />
                <div className="absolute top-0 w-full h-full bg-black/50 flex items-center justify-center">
                    <button
                        type="button"
                        onClick={handleDelete}
                    >
                        <Trash2 className="w-10 h-10 stroke-white" />
                    </button>
                </div>
            </div>
        </div>
    );

    async function handleDelete() {
        const imagePath = element.url?.replace(`${APP_URL}/`, "");
        try {
            const formData = new FormData;
            formData.append("path", imagePath);
            const response = await axios.post<UploadSucceedResponse>(
                `${APP_URL}/article/images/delete`,
                {path: imagePath}
            );

            if (response.status === 200) {
                Transforms.removeNodes(editor, { at: path });
                toast({
                    message: response.data.message
                })
            }
        } catch (error) {
            const response = (error as AxiosError<AxiosFailedResponse>).response;
            if (!response) {
                toast({
                    type: "error",
                    message:
                        "Il y'a eu une erreur inconnu. Cela peut-être dû à une mauvaise connnexion.",
                });
                return;
            }

            const data = response.data as AxiosFailedResponse;
            const message = data.message || data.errors["path"][0];
            toast({
                type: "error",
                message,
            });  
        }
        
    }
};

const RenderElement = ({
    attributes,
    children,
    element,
}: RenderElementProps) => {
    switch (element.type) {
        case "quote":
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

        case "image":
            return (
                <ImageElement
                    //@ts-ignore
                    element={element}
                    attributes={attributes}
                    children={children}
                />
            );

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
    onChange
}: RichEditorProps) {
    const renderElement = useCallback(
        (props: RenderElementProps) => <RenderElement {...props} />,
        []
    );
    const renderLeaf = useCallback(
        (props: RenderLeafProps) => <RenderLeaf {...props} />,
        []
    );
    const editor = withImages(withReact(createEditor()));

    return (
        <div>
            {label && (
                <Label htmlFor={id} onClick={() => ReactEditor.focus(editor)}>
                    {label}
                </Label>
            )}

            <Slate editor={editor} initialValue={value} onChange={(value) => onChange(value, editor)}>
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

const isImageUrl = (url: string) => {
    if (!url) return false;
    if (!isUrl(url)) return false;
    const ext = new URL(url).pathname.split(".").pop();
    return imageExtensions.includes(ext as string);
};

function withImages(editor: Editor): Editor {
    const { insertData, isVoid } = editor;

    editor.isVoid = (element) => {
        //@ts-ignore
        return element.type === "image" ? true : isVoid(element);
    };

    editor.insertData = (data) => {
        const text = data.getData("text/plain");
        const { files } = data;

        if (files && files.length > 0) {
            for (const file of files) {
                const reader = new FileReader();
                const [mime] = file.type.split("/");

                if (mime === "image") {
                    reader.addEventListener("load", () => {
                        const url = reader.result;
                        insertImage(editor, url as string);
                    });

                    reader.readAsDataURL(file);
                }
            }
        } else if (isImageUrl(text)) {
            insertImage(editor, text);
        } else {
            insertData(data);
        }
    };

    return editor;
}

function insertImage(editor: Editor, url: string) {
    const text = { text: "" };
    const image: ImageElement = { type: "image", url, children: [text] };
    //@ts-ignore
    Transforms.insertNodes(editor, image as Node);
    Transforms.insertNodes(editor, {
        type: "paragraph",
        children: [{ text: "" }],
    });
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
            type="button"
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

const ImageButton = () => {
    const id = generateUuid();
    const editor = useSlate();

    return (
        <span>
            <Button active={false}>
                <Label htmlFor={id} className="mb-0">
                    <Image className="w-4 h-4" />
                </Label>
            </Button>
            <input
                type="file"
                id={id}
                className="hidden"
                accept=".png, .jpg, .jpeg, .webp"
                onChange={handleImage}
            />
        </span>
    );

    async function handleImage(event: React.ChangeEvent<HTMLInputElement>) {
        const files = event.target.files;
        if (!files) return;

        const formData = new FormData();
        formData.append("image", files[0]);

        try {
            const response = await axios.post<UploadSucceedResponse>(
                `${APP_URL}/article/images/upload`,
                formData,
            );

            if (response.status === 200) {
                const { path, message } = response.data;
                insertImage(editor, asset(path));

                toast({
                    message: message,
                });
                return;
            }
        } catch (error) {
            const response = (error as AxiosError<AxiosFailedResponse>)
                .response;
            if (!response) {
                toast({
                    type: "error",
                    message:
                        "Il y'a eu une erreur inconnu. Cela peut-être dû à une mauvaise connnexion.",
                });
                return;
            }

            const data = response.data as AxiosFailedResponse;
            const message = data.message || data.errors["image"][0];
            toast({
                type: "error",
                message,
            });
        }
    }
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
                                active={isBlockActive(editor, props.value)}
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
            <BlockButton format="quote">
                <Quote className="w-4 h-4 stroke-[2.5]" />
            </BlockButton>
            <BlockButton format="numbered-list">
                <ListOrdered className="w-4 h-4" />
            </BlockButton>
            <BlockButton format="bulleted-list">
                <List className="w-4 h-4" />
            </BlockButton>
            <ImageButton />
        </div>
    );
}

export default RichEditor;
