export type PaginationLink = {
    url: string | null;
    label: string;
    active: boolean;
};

export type PaginationMeta = {
    current_page: number;
    from: number;
    last_page: number;
    path: string;
    links: PaginationLink[];
    per_page: number;
    to: number;
    total: number;
};

export interface PaginationData<T> {
    data: T[];
    links: {
        first: string;
        last: string;
        prev: string | null;
        next: string | null;
    };
    meta: PaginationMeta;
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
}

// Models and models fields types

export type Role = "Admin" | "Expert";

export type User = {
    id: string;
    firstname: string;
    lastname: string;
    fullname: string;
    email: string;
    phone?: string;
    birthday?: string;
    birthplace?: string;
    gender?: string;
    marital_status?: string;
    identity_photo?: string;
    role: Role;
    verified_at: string;
    avatar: string;
    created_at: string;
    updated_at: string;
};

export type Article = {
    id: string;
    slug: string;
    title: string;
    cover: string;
    content: ?string;
    published_at: string;
    created_at: string;
    updated_at: string;
};

export type Decree = {
    id: string;
    name: string;
    type: string;
    size: number;
    doc_path: string;
    created_at: string;
    updated_at: string;
};

export type Message = {
    id: string;
    firstname: string;
    lastname: string;
    email: string;
    subject: string;
    message: string;
    marked_as_read: boolean;
    created_at: string;
};

export type FlashInfo = {
    id: string;
    title: string;
    active: boolean;
    created_at: string;
    updated_at: string;
};

export type Statement = {
    id: string;
    title: string;
    content?: string;
    published_at: string;
    created_at: string;
    updated_at: string;
};

export type Subscriber = {
    id: string;
    email: string;
    created_at: string;
};

type ApprovalType = "Catégorie A" | "Catégorie B" | "Catégorie C";

export type ApprovalStatus = "En cours" | "Soumise" | "Validée" | "Rejétée";

type ExpertStatus = "Indépendant(e)" | "Salarié(e) ou attaché(e) à un Bureau";

type ActivitySector =
    | "Ministère"
    | "Institution"
    | "Collectivité térritoriale"
    | "EPE"
    | "Société étatique";

type StatusInSector =
    | "En activité"
    | "Mise à disposition"
    | "Détachement"
    | "Disponibilité"
    | "Retraité";

export type Approval = {
    id: string;
    type: ApprovalType;
    commercial_register?: string;
    country_of_residence?: string;
    single_tax_form?: string;
    geographic_region: string;
    region?: string;
    address?: string;
    province?: string;
    mailbox?: string;
    tel?: string;
    website?: string;
    mobile: string;
    fax?: string;
    expert_status?: ExpertStatus;
    has_been_public_agent: boolean;
    total_sectors: number;
    association?: string;
    category?: "A" | "B" | "C";
    activity_sector?: ActivitySector;
    status_in_sector?: StatusInSector;
    signature?: string;
    cv?: string;
    status: ApprovalStatus;

    //relations

    user: User;
    degree: Degree;
    trainings: Training[];
    certificates: Certificate[];
    society?: Society;
    associates: Associate[];
    domains: Domain[];
    attachments: Attachment[];
    
};

type DegreeLevel =
    | "DES"
    | "Doctorat"
    | "Master"
    | "Maîtrise"
    | "Licence"
    | "DEUG, BTS, DUT, DEUST"
    | "Baccalauréat"
    | "CAP, BEP";

export type Degree = {
    id: string;
    level: DegreeLevel;
    level_precision: string;
    years_of_experience: number;
    started_at: string;
    file: string;
};

export type Certificate = {
    id: string;
    subject: string;
    starts_at: string;
    ends_at: string;
    location: string;
    trainer_name: string;
    file: string;
};

type TrainingLevel =
| "BAC + 1"
| "BAC + 2"
| "BAC + 3"
| "BAC + 4"
| "BAC + 5"
| "BAC + 6"
| "BAC + 7"
| "BAC + 8"
| "BAC + 9"
| "BAC + 10"
| "BAC + 11"
| "BAC + 12"
| "BAC + 13"
;

export type Training = {
    id: string;
    name: string;
    level: TrainingLevel;
    level_precision: string;
    procured_at: number;
    trainer_name: string;
}


type LegalStatus = 
| "SARL"
| "SA"
| "SAS"
| "SCS"
| "SNC"
| "Autre";

export type Society = {
    id: string;
    name: string;
    commercial_name: string;
    founded_at: number;
    capital: number;
    legal_status: LegalStatus;
    legal_status_precision: string;
    status_file: string;
    staff_number: number;
    salaried_technical_staff: number;
    salaried_administrative_staff: number;
}

type Qualification = 
| "Expert Senior"
| "Expert Junior"
| "Expert Cadet"
| "Pas Expert";

export type Associate = {
    id: string;
    firstname: string;
    lastname: string;
    role: string;
    qualification: Qualification;
    approval: string;
}

export type Domain = {
    id: string;
    type: string;
    rank: number;
    first_subdomain: string;
    second_subdomain?: string;
    third_subdomain?: string;
}

export type Attachment = {
    id: string;
    nature: string;
    file: string;
}
