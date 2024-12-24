import React from "react";
import { Head, Link } from "@inertiajs/react";
import {
    Breadcrumb,
    BreadcrumbList,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbSeparator,
} from "~/components/ui/breadcrumb";
import App from "~/layouts/app";

function Create() {
	
	return (
		<div>
			<Head>
				<title>Nouvel article</title>
			</Head>

			<div>
			<Breadcrumb>
                    <BreadcrumbList>
                        <BreadcrumbItem>
                            <BreadcrumbLink asChild>
                                <Link href="/panel">Acceuil</Link>
                            </BreadcrumbLink>
                        </BreadcrumbItem>
                        <BreadcrumbSeparator />
                        <BreadcrumbItem>
                            <BreadcrumbLink asChild>
								<Link href="/articles">Articles</Link>
							</BreadcrumbLink>
                        </BreadcrumbItem>
						<BreadcrumbSeparator />
						<BreadcrumbItem>
                            <strong>Ajouter</strong>
                        </BreadcrumbItem>
                    </BreadcrumbList>
                </Breadcrumb>
			</div>

			<div>
				
				<form>
					
				</form>
			</div>
		</div>
	);
}

//@ts-ignore
Create.layout = page => <App children={page} />

export default Create;
