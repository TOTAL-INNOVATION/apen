import { clsx, type ClassValue } from "clsx"
import { twMerge } from "tailwind-merge"
import Str from "./strings";
import { router } from "@inertiajs/react";
import PressHandler from "./pressHandler";
import { APP_URL } from "~/constants";

export const DEFAULT_ROUTER_STATE = {
  preserveState: true,
  preserveScroll: true,
  replace: true,
};

export function cn(...inputs: ClassValue[]) {
  return twMerge(clsx(inputs))
}

/**
 * string utility helper
 */
export const str = (str: string) => new Str(str);

export const generateUuid = () => crypto.randomUUID() as string;

export const debounce = (fn: Function, delay = 500) => {
    let timerId: null | NodeJS.Timeout = null;
    //@ts-ignore
    return (...args) => {
        clearTimeout(timerId as NodeJS.Timeout);
        timerId = setTimeout(() => fn(...args), delay);
    };
};

/**
 * equivalent of the `asset` helper in Laravel
 */
//@ts-ignore
export const asset = (assetUrl: string): string => `${APP_URL}/${assetUrl}`;

/**
 * Toogle form open state
 * @param state - Name of the form state
 * @param replace - Specify if precedent states should be erase
 * @returns
 */
export function handleOverlayOpen(state: string, replace?: boolean) {
  const queryParam = new URLSearchParams(state);
  const { origin, pathname } = window.location;
  const originUrl = origin + pathname;

  const url = window.location.href;

  if (!url.includes(state) && !replace) {
      router.get(url, Object.fromEntries(queryParam), DEFAULT_ROUTER_STATE);
      return;
  }

  if (!url.includes(state) && replace) {
      router.get(
          `${originUrl}?${queryParam.toString()}`,
          undefined,
          DEFAULT_ROUTER_STATE
      );
      return;
  }

  router.get(url.replace(state, ""), undefined, DEFAULT_ROUTER_STATE);
}

export const mousePress = (callback: (timerValue:number) => void)  => PressHandler.onPressIn(callback);

export const mouseRelease = (callback?: (timerValue: number) => void) => PressHandler.onPressOut(callback);
