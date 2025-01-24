import App from "~/layouts/app";
import { Head, usePage } from "@inertiajs/react";
import React from "react";
import TotalCard from "~/components/columns/total-card";

type Totals = {

}

type PageProps = {
	stats: {
		totals: {
			totalUsers: number;
			totalArticles: number;
			totalApprovals: number;
			totalExpertSearches: number;
			totalStatements: number;
			totalMessages: number;
		};
	}
}

function Home() {

	const { stats } = usePage<PageProps>().props;
	const { totals } = stats;
	
	return (
		<div>
			<Head>
				<title>Acceuil</title>
			</Head>
			
			<div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
				<TotalCard
					label="Utilisateurs"
					count={totals.totalUsers}
				/>

				<TotalCard
					label="Agréments"
					count={totals.totalApprovals}
				/>

				<TotalCard
					label="Recherches d'expert"
					count={totals.totalExpertSearches}
				/>

				<TotalCard
					label="Messages"
					count={totals.totalMessages}
				/>

				<TotalCard
					label="Articles"
					count={totals.totalArticles}
				/>

				<TotalCard
					label="Communiqués"
					count={totals.totalStatements}
				/>
			</div>
			
		</div>
	);
}

//@ts-ignore
Home.layout = page => <App children={page} />

export default Home;
