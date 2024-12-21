import App from "~/layouts/app";
import { Head } from "@inertiajs/react";
import React from "react";

const Home = () => {
	
	return (
		<div>
			<Head>
				<title>Acceuil</title>
			</Head>
			<h1>Hello</h1>
		</div>
	);
}

//@ts-ignore
Home.layout = page => <App children={page} />

export default Home;
