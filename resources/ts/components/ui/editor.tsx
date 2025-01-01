import React, { ForwardedRef } from "react";
import {
    MDXEditor as BaseMDXEditor,
    type MDXEditorMethods,
    type MDXEditorProps,
} from "@mdxeditor/editor";

function InitializedEditor({
    editorRef,
    ...props
}: { editorRef: ForwardedRef<MDXEditorMethods> | null } & MDXEditorProps) {
    return <BaseMDXEditor {...props} ref={editorRef} />;
}

const MDXEditor = React.forwardRef<MDXEditorMethods, MDXEditorProps>(
    (props, ref) => <InitializedEditor {...props} editorRef={ref} />
);

export default MDXEditor;
