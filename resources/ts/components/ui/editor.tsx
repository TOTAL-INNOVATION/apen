import React, { ForwardedRef } from "react";
import {
	headingsPlugin,
	listsPlugin,
	quotePlugin,
	thematicBreakPlugin,
	markdownShortcutPlugin,
	MDXEditor as BaseMDXEditor,
	type MDXEditorMethods,
	type MDXEditorProps
  } from '@mdxeditor/editor'
  

function InitializedEditor({
	editorRef,
	...props
  }: { editorRef: ForwardedRef<MDXEditorMethods> | null } & MDXEditorProps) {
	return (
	  <BaseMDXEditor
		plugins={[
		  // Example Plugin Usage
		  headingsPlugin(),
		  listsPlugin(),
		  quotePlugin(),
		  thematicBreakPlugin(),
		  markdownShortcutPlugin()
		]}
		{...props}
		ref={editorRef}
	  />
	)
  
}

const MDXEditor = React.forwardRef<MDXEditorMethods, MDXEditorProps>(
	(props, ref) => <InitializedEditor {...props} editorRef={ref} />
);

export default MDXEditor;
