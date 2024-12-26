import { InertiaLinkProps, Link, usePage } from "@inertiajs/react";
import clsx from "clsx";
import React from "react";
import { Tooltip, TooltipContent, TooltipTrigger } from "./tooltip";

type NavProps = {
    className?: string;
    children: React.ReactNode;
    direction?: "horizontal" | "vertical";
};

type NavItemProps = InertiaLinkProps & {
    tooltipName?: string;
    tooltipPosition?: "left" | "top" | "right" | "bottom";
};

const Nav = ({ className, children, direction = "horizontal" }: NavProps) => {
    return (
        <nav
            className={clsx(
                "p-2",
                className,
                direction === "horizontal"
                    ? "flex-row space-x-2"
                    : "flex-col space-y-2"
            )}
        >
            {children}
        </nav>
    );
};

const NavItem = React.forwardRef<HTMLAnchorElement, NavItemProps>(
    (props, ref) => {
        const {
            children,
            className,
            href,
            tooltipName,
            tooltipPosition = "right",
            ...properties
        } = props;

        const url = usePage().url;

        const classNames = clsx(
            "w-full py-2 px-2.5 font-franklin-medium inline-flex items-center justify-start space-x-2 cursor-pointer hover:bg-bright transition-colors rounded-sm",
            className,
            {
                "text-primary bg-primary/15 hover:bg-primary/15":
                    url === href || url.startsWith(href),
            }
        );

        return tooltipName ? (
            <Tooltip>
                <TooltipTrigger asChild>
                    <Link
                        {...properties}
                        href={href}
                        ref={ref}
                        className={classNames}
                    >
                        {children}
                    </Link>
                </TooltipTrigger>
                <TooltipContent
                    className={clsx({
                        "mb-4": ["right", "left"].includes(tooltipPosition),
                    })}
                    side={tooltipPosition}
                >
                    <p>{tooltipName}</p>
                </TooltipContent>
            </Tooltip>
        ) : (
            <Link {...properties} href={href} ref={ref} className={classNames}>
                {children}
            </Link>
        );
    }
);

export { Nav, NavItem };
