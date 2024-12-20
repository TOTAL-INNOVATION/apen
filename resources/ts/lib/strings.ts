export default class Str {
    private str: string;

    constructor(str: string) {
        this.str = str;
    }

    /*
     * Convert a string to uppercase
     */
    toUpper() {
        return this.str.toUpperCase();
    }

    /*
     * Convert a string to lowercase
     */
    toLower() {
        return this.str.toLowerCase();
    }

    /**
     * Converts the first character of a string to uppercase
     */
    ucFirst() {
        if (this.str.length < 2) this.toUpper();

        return this.str.charAt(0).toUpperCase() + this.str.slice(1);
    }

    /**
     * Limit the number of characters in a string.
     */
    limit(limit: number, end?: string) {
        if (!Number.isInteger(limit)) limit = parseInt(String(limit));

        if (this.str.length <= limit) return this.str;

        return this.str
            .slice(0, limit - (end ? end.length : 3))
            .padEnd(limit, end ?? '...')
    }
}
