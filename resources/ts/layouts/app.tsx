import Navbar from "~/components/ui/navbar";
import Sidebar from "~/components/ui/sidebar";
import { Toaster } from "~/components/ui/sonner";
import React from "react";

const App = ({children}: React.PropsWithChildren) => {
	return (
		<div className="flex text-dark">
			<Sidebar />
			<div className="w-full lg:pl-[260px]">
				<Navbar />
				<main className="p-4">
					{children}
				</main>
			</div>
			<Toaster />
		</div>
	);
}

export default App;
