import React from "react";
import { Nav, NavItem } from "./nav";
import { TooltipProvider } from "./tooltip";
import { LayoutDashboard} from "lucide-react";

const Sidebar = () => {
    return (
        <TooltipProvider>
            <aside
                id="application-sidebar"
                className="w-[62px]
  
  fixed inset-y-0 start-0 z-40
  bg-white border-r border-whisper
  lg:translate-x-0 lg:end-auto lg:bottom-0"
                tabIndex={-1}
                role="dialog"
                aria-label="sidebar"
            >
                <div className="h-[55px] p-1 flex items-center justify-center border-b border-whisper">
                    <img
                        src="/logo.png"
                        alt="Gexion"
                        className="w-12 h-12 rounded-xl"
                    />
                </div>
                <Nav direction="vertical">
                    <NavItem href="/home">
                        <LayoutDashboard className="w-5.5 h-5.5" />
						<span>Accueil</span>
                    </NavItem>
                </Nav>
            </aside>
        </TooltipProvider>
    );
};

export default Sidebar;
