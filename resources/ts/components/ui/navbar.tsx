import clsx from "clsx";
import React from "react";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuGroup,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
} from "./dropdown-menu";
import { DropdownMenuTrigger } from "@radix-ui/react-dropdown-menu";
import { Button } from "./button";
import { Link, router, usePage } from "@inertiajs/react";
import { LogOut, User2, Users2 } from "lucide-react";
import { User } from "~/types";
import axios from "axios";
import { asset } from "~/lib/utils";

const Navbar = ({ className }: { className?: string }) => {
    const user = (usePage().props.user as { data: User }).data;

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
                                src={asset(user.avatar)}
                                alt={user.fullname}
                            />
                        </span>
                        <span className="font-franklin-medium">{user.fullname}</span>
                    </Button>
                </DropdownMenuTrigger>
                <DropdownMenuContent className="w-44 mr-2">
                    <DropdownMenuLabel>
                        <strong>Mon compte</strong>
                    </DropdownMenuLabel>
                    <DropdownMenuSeparator />
                    <DropdownMenuGroup>
                        <DropdownMenuItem asChild>
                            <Link href="#">
                                <User2 className="mr-2 h-5 w-5" />
                                <strong>Profil</strong>
                            </Link>
                        </DropdownMenuItem>
                        <DropdownMenuItem asChild>
                            <Link href="#">
                                <Users2 className="mr-2 h-5 w-5" />
                                <strong>Équipe</strong>
                            </Link>
                        </DropdownMenuItem>
                        <DropdownMenuSeparator />
                        <DropdownMenuItem onClick={logout}>
                            <LogOut className="mr-2 h-5 w-5" />
                            <strong>Déconnexion</strong>
                        </DropdownMenuItem>
                    </DropdownMenuGroup>
                </DropdownMenuContent>
            </DropdownMenu>
        </header>
    );
};

async function logout() {
    const response = await axios.post<{message: string}>('/deconnexion');
    const {status, data} = response;
    
    if (status === 200 && data.message === "loggedOut") {
        window.location.reload();
    }
}

export default Navbar;
