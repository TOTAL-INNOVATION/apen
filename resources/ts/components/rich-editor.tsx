import { MDXEditorMethods } from "@mdxeditor/editor";
import React from "react";
import MDXEditor from "./ui/editor";

function RichEditor() {
	const ref = React.useRef<MDXEditorMethods>(null);

	return (
		<MDXEditor ref={ref} markdown="" />
	)
}

export default RichEditor;
