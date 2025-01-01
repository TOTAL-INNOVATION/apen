import {
    headingsPlugin,
    listsPlugin,
    quotePlugin,
    thematicBreakPlugin,
    markdownShortcutPlugin,
    type MDXEditorMethods,
    UndoRedo,
    BoldItalicUnderlineToggles,
    toolbarPlugin,
    BlockTypeSelect,
    ListsToggle,
    imagePlugin,
    InsertImage,
    tablePlugin,
    InsertTable,
	MDXEditorProps,
    RealmPlugin,
} from "@mdxeditor/editor";
import React from "react";
import MDXEditor from "./ui/editor";
import axios, { AxiosError } from "axios";
import { APP_URL } from "~/constants";
import { toast } from "./toast";
import { asset } from "~/lib/utils";

type AxiosFailedResponse = {
    message?: string;
    errors: Record<string, string[]>;
};

type UploadSucceedResponse = {
    message: string;
    path: string;
};

const PLUGINS: RealmPlugin[] = [
    headingsPlugin({
        allowedHeadingLevels: [1, 2, 3],
    }),
    listsPlugin(),
    quotePlugin(),
    thematicBreakPlugin(),
    markdownShortcutPlugin(),
    imagePlugin({
        imageUploadHandler: imageUploadHandler as (
            image: File
        ) => Promise<string>,
    }),
    tablePlugin(),
    toolbarPlugin({
        toolbarContents: () => <Toolbar />,
    }),
];

function RichEditor({value = "", ...props}: Omit<MDXEditorProps, "markdown"|"plugins"> & {value?: string}) {
    const ref = React.useRef<MDXEditorMethods>(null);

    return (
        <MDXEditor
            ref={ref}
            markdown={value}
            plugins={PLUGINS}
            {...props}
        />
    );
}

function Toolbar() {
    return (
        <>
            {" "}
            <UndoRedo />
            <BlockTypeSelect />
            <BoldItalicUnderlineToggles />
            <ListsToggle options={["bullet", "number"]} />
            <InsertImage />
            <InsertTable />
        </>
    );
}

async function imageUploadHandler(image: File) {
    const formData = new FormData();
    formData.append("image", image);
    try {
        const response = await axios.post<UploadSucceedResponse>(
            `${APP_URL}/article/images/upload`,
            formData
        );

        if (response.status === 200) {
            const { path, message } = response.data;

            toast({
                message: message,
            });
            return asset(path);
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
        const message = data.message || data.errors["image"][0];
        toast({
            type: "error",
            message,
        });
    }
}

export default RichEditor;
