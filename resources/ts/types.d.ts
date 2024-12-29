export type PaginationLink = {
    url: string|null;
    label: string;
    active: boolean;
}

export type PaginationMeta = {
    current_page: number;
    from: number;
    last_page: number;
	path: string;
    links: PaginationLink[];
    per_page: number;
    to: number;
    total: number;
}

export interface PaginationData <T>{
	data: T[];
	links: {
		first: string;
		last: string;
		prev: string|null;
		next: string|null;
	};
	meta:PaginationMeta;
}

export type FlashMessage = {
	type: "success" | "error";
	message: string;
};

export interface ImageFieldProps<T extends FieldValues> {
	name: Path<T>;
	control: Control<T, any>;
	authorizeTypes: Record<string, string[]>;
	onChange?: (event: React.ChangeEvent<HTMLInputElement>) => void;
};

export type Role = "Admin" | "Expert";

export type User = {
	id: string;
	firstname: string;
	lastname: string;
	fullname: string;
	email: string;
	role: "Admin" | "Expert";
	verified_at: string;
	avatar: string;	
}

export type Article = {
	id: string;
	slug: string;
	title: string;
	cover: string;
	content_path: string;
	published_at: string;
	created_at: string;
	updated_at: string;
}
