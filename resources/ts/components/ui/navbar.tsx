import clsx from "clsx";
import React from "react";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuGroup,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuShortcut,
} from "./dropdown-menu";
import { DropdownMenuTrigger } from "@radix-ui/react-dropdown-menu";
import { Button } from "./button";
import { router, usePage } from "@inertiajs/react";
import { LogOut, Settings, User2, Users2 } from "lucide-react";

const Navbar = ({ className }: { className?: string }) => {
    /* const user = (usePage().props.user as { data: User }).data; */

    return (
        <header
            className={clsx(
                "h-[55px] w-full px-4 py-1 flex items-center justify-end z-50 bg-white border-b border-whisper/75 sticky top-0",
                className
            )}
        >
            <DropdownMenu>
                <DropdownMenuTrigger asChild>
                    <Button
                        className="p-0 border-0 hover:bg-transparent focus:bg-transparent"
                        variant="outline"
                    >
                        <span className="p-[1px] border-2 border-whisper/75 rounded-full">
                            <img
                                className="inline-block size-[38px] rounded-full"
                                src="/defaults/avatar.svg"
                                alt="John Doe"
                            />
                        </span>
                        <span className="font-franklin-medium">John Doe</span>
                    </Button>
                </DropdownMenuTrigger>
                <DropdownMenuContent className="w-44 mr-2">
                    <DropdownMenuLabel>Mon compte</DropdownMenuLabel>
                    <DropdownMenuSeparator />
                    <DropdownMenuGroup>
                        <DropdownMenuItem>
                            <User2 className="mr-2 h-4 w-4" />
                            <span>Profile</span>
                            <DropdownMenuShortcut>⇧⌘P</DropdownMenuShortcut>
                        </DropdownMenuItem>
                        <DropdownMenuItem>
                            <Users2 className="mr-2 h-4 w-4" />
                            <span>Équipe</span>
                        </DropdownMenuItem>
                        <DropdownMenuItem>
                            <Settings className="mr-2 h-4 w-4" />
                            <span>Paramètres</span>
                        </DropdownMenuItem>
                        <DropdownMenuSeparator />
                        <DropdownMenuItem onClick={logout}>
                            <LogOut className="mr-2 h-4 w-4" />
                            <span>Déconnexion</span>
                            <DropdownMenuShortcut>⇧⌘Q</DropdownMenuShortcut>
                        </DropdownMenuItem>
                    </DropdownMenuGroup>
                </DropdownMenuContent>
            </DropdownMenu>
        </header>
    );
};

function logout() {
    router.post('logout');
}

export default Navbar;
