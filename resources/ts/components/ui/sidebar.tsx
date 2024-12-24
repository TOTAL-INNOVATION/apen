import React from "react";
import { Nav, NavItem } from "./nav";
import { TooltipProvider } from "./tooltip";
import { LayoutDashboard, Newspaper } from "lucide-react";

const Sidebar = () => {
    return (
        <TooltipProvider>
            <aside
                id="application-sidebar"
                className="w-[260px] 
                hidden
  fixed inset-y-0 start-0 z-40
  bg-white border-r border-whisper/75
  lg:block lg:translate-x-0 lg:end-auto lg:bottom-0"
                tabIndex={-1}
                role="dialog"
                aria-label="sidebar"
            >
                <div className="h-[55px] w-full px-2 py-1 border-b border-whisper/50">
                    <span className="ml-2 text-4xl leading-[normal!important] font-texta-black uppercase">
                        <span className="text-primary">Apen</span>{" "}
                        <span>Admin</span>
                    </span>
                </div>
                <Nav direction="vertical">
                    <NavItem href="/panel">
                        <LayoutDashboard className="w-6 h-6" />
                        <strong>Accueil</strong>
                    </NavItem>

                    <NavItem href="/articles">
                        <Newspaper className="w-6 h-6" />
                        <strong>Actualités</strong>
                    </NavItem>                    
                </Nav>
            </aside>
        </TooltipProvider>
    );
};

export default Sidebar;
