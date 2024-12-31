import { Node as SlateNode, Text } from "slate";
import escapeHtml from "escape-html";
import { SlateElementType } from "~/types";

export type Node = SlateNode & {
	type: SlateElementType;
    bold: boolean;
    italic: boolean;
    underline: boolean;
    code: boolean;
	url: string;
};

export enum NodeType {
    PARAGRAPH = "paragraph",
    HEADING_ONE = "heading-one",
    HEADING_TWO = "heading-two",
    HEADING_THREE = "heading-three",
    BULLETED_LIST = "bulleted-list",
    NUMBERED_LIST = "numbered-list",
    LIST_ITEM = "list-item",
    IMAGE = "image",
    QUOTE = "quote",
}

function serialize(node: Node): string {
    if (Text.isText(node)) {
        let string = escapeHtml(node.text);
        if (node.bold) {
            string = `<strong class="font-franklin-medium">${string}</strong>`;
        }

        if (node.underline) string = `<u>${string}</u>`;
		
		if (node.italic) string = `<i>${string}</i>`;

		if (node.code) string = `<code>${string}</code>`;

        return string;
    }

	const children = node.children.map(n => serialize(n as Node)).join('');

	switch (node.type) {

		case NodeType.PARAGRAPH:
			return `<p>${children}</p>`;

		case NodeType.QUOTE:
			return `
				<blockquote class="relative">
					<svg class="absolute -top-6 -start-8 size-16 text-whisper" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
						<path d="M7.39762 10.3C7.39762 11.0733 7.14888 11.7 6.6514 12.18C6.15392 12.6333 5.52552 12.86 4.76621 12.86C3.84979 12.86 3.09047 12.5533 2.48825 11.94C1.91222 11.3266 1.62421 10.4467 1.62421 9.29999C1.62421 8.07332 1.96459 6.87332 2.64535 5.69999C3.35231 4.49999 4.33418 3.55332 5.59098 2.85999L6.4943 4.25999C5.81354 4.73999 5.26369 5.27332 4.84476 5.85999C4.45201 6.44666 4.19017 7.12666 4.05926 7.89999C4.29491 7.79332 4.56983 7.73999 4.88403 7.73999C5.61716 7.73999 6.21938 7.97999 6.69067 8.45999C7.16197 8.93999 7.39762 9.55333 7.39762 10.3ZM14.6242 10.3C14.6242 11.0733 14.3755 11.7 13.878 12.18C13.3805 12.6333 12.7521 12.86 11.9928 12.86C11.0764 12.86 10.3171 12.5533 9.71484 11.94C9.13881 11.3266 8.85079 10.4467 8.85079 9.29999C8.85079 8.07332 9.19117 6.87332 9.87194 5.69999C10.5789 4.49999 11.5608 3.55332 12.8176 2.85999L13.7209 4.25999C13.0401 4.73999 12.4903 5.27332 12.0713 5.85999C11.6786 6.44666 11.4168 7.12666 11.2858 7.89999C11.5215 7.79332 11.7964 7.73999 12.1106 7.73999C12.8437 7.73999 13.446 7.97999 13.9173 8.45999C14.3886 8.93999 14.6242 9.55333 14.6242 10.3Z" fill="currentColor"></path>
					</svg>
					<div class="relative z-10">
						<p class="text-dark"><em>
							${children}
						</em></p>
					</div>
				</blockquote>
			`;

		case NodeType.HEADING_ONE:
			return `<h1 class="heading-1">${children}</h1>`;
		
		case NodeType.HEADING_TWO:
			return `<h2 class="heading-2">${children}</h2>`;
		
		case NodeType.HEADING_THREE:
			return `<h3 class="heading-3">${children}</h3>`;
		
		case NodeType.BULLETED_LIST:
			return `<ul>${children}</ul>`;
		
		case NodeType.NUMBERED_LIST:
			return `<ol>${children}</ol>`;

		case NodeType.LIST_ITEM:
			return `<li>${children}</li>`;

		case NodeType.IMAGE:
			return `
			<div class="w-full aspect-video">
				<img class="w-full h-full object-cover" src="${node.url}" alt="${node.url}" />
			</div>
			`;
		
		default:
			return children;
	}
}

export default serialize;
