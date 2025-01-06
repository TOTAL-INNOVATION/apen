import { Head, Link, usePage } from '@inertiajs/react';
import {
    Breadcrumb,
    BreadcrumbList,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbSeparator,
} from "~/components/ui/breadcrumb";
import React, { useEffect } from 'react';
import { toast } from '~/components/toast';
import App from '~/layouts/app';
import { FlashMessage, User } from '~/types';
import Avatar from "./avatar";
import EditInfo from './edit-info';
import ChangePassword from './change-password';

type PageProps = {
	user: {data: User};
	flash: FlashMessage|null;
};

function Profile() {

	const props = usePage<PageProps>().props;
	const flash = props.flash;
	const user = props.user.data;

	useEffect(() => {
		if (flash) {
			toast(flash);
		}
		
	}, [flash]);

	return (
		<div>
			<Head>
				<title>Profil</title>
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
                                <Link href="#">Profil</Link>
                            </BreadcrumbLink>
                        </BreadcrumbItem>
                    </BreadcrumbList>
                </Breadcrumb>
            </div>

			<div className="mt-4 md:mt-6 lg:mt-8 article-container">
				<div className="w-fit mx-auto">
					<Avatar url={user.avatar} />
					<div className="mt-4 space-y-1 text-center">
						<p className="text-lg font-franklin-medium">
							{user.fullname}
						</p>
						<p>{user.email}</p>
					</div>
				</div>

				<EditInfo user={user} />
				<ChangePassword />
			</div>
		</div>
	);
};

//@ts-ignore
Profile.layout = page => <App children={page} />;

export default Profile;
